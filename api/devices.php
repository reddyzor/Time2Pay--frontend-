<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

function get_devices($db, $sort, $status, $search = '') {
    $order = $sort === 'oldest' ? 'ASC' : 'DESC';
    $statusCondition = '';
    $searchCondition = '';

    if ($status === 'working') {
        $statusCondition = 'd.working = 1';
    } else if ($status === 'off') {
        $statusCondition = 'd.working = 0';
    }

    if (!empty($search)) {
        $search = "%$search%";
        $searchCondition = "(d.device_name LIKE :search OR d.sim_number LIKE :search OR d.model LIKE :search)";
    }

    $conditions = array_filter([$statusCondition, $searchCondition]);
    $whereClause = '';
    if (count($conditions) > 0) {
        $whereClause = 'WHERE ' . implode(' AND ', $conditions);
    }

    $query = "
        SELECT d.*, COUNT(a.id) as account_count 
        FROM devices d
        LEFT JOIN accounts a ON d.id = a.device
        $whereClause
        GROUP BY d.id
        ORDER BY d.created_at $order
    ";

    $stmt = $db->prepare($query);
    
    if (!empty($search)) {
        $stmt->bindParam(':search', $search);
    }
    
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($devices);
}

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            get_device_fromID($db, $_GET['id']);
        } else {
            $sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
            $status = isset($_GET['status']) ? $_GET['status'] : 'all';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            get_devices($db, $sort, $status, $search);
        }
        break;
    case 'POST':
        create_device($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_device_fromID($db, $id) {
    $query = "SELECT * FROM devices WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $device = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($device) {
        echo json_encode($device);
    } else {
        echo json_encode(["message" => "Device not found."]);
    }
}

function create_device($db) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Проверка на наличие всех необходимых полей
    if (empty($data['user_id']) || empty($data['device_name']) || empty($data['sim_number']) || empty($data['model'])) {
        echo json_encode(["message" => "Missing required fields."]);
        return;
    }

    // Проверка, существует ли пользователь с данным uid
    $query = "SELECT * FROM users WHERE uid = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(["message" => "User not found."]);
        return;
    }

    // Получение user_id из таблицы users
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $user['id'];

    $query = "INSERT INTO devices (user_id, device_name, sim_number, model) VALUES (:user_id, :device_name, :sim_number, :model)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->bindParam(":device_name", $data['device_name']);
    $stmt->bindParam(":sim_number", $data['sim_number']);
    $stmt->bindParam(":model", $data['model']);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Device added successfully."]);
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log('Ошибка при выполнении запроса: ' . print_r($errorInfo, true));
        echo json_encode(["message" => "Failed to add device."]);
    }
}
?>
