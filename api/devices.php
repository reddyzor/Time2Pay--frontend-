<?php // api/devices.php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            get_device_fromID($db, $_GET['id']);
        } else {
            get_devices($db);
        }
        break;
    case 'POST':
        create_device($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_devices($db) {
    $query = "
        SELECT d.*, COUNT(a.id) as account_count 
        FROM devices d
        LEFT JOIN accounts a ON d.id = a.device
        GROUP BY d.id
    ";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($devices);
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

    // Логирование данных
    //error_log('Полученные данные: ' . print_r($data, true));

    // Проверка на наличие всех необходимых полей
    if (empty($data['user_id']) || empty($data['device_name']) || empty($data['sim_number']) || empty($data['model'])) {
        echo json_encode(["message" => "Missing required fields."]);
        return;,
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
    if($stmt->execute()) {
        echo json_encode(["message" => "Device added successfully."]);
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log('Ошибка при выполнении запроса: ' . print_r($errorInfo, true));
        echo json_encode(["message" => "Failed to add device."]);
    }
}
?>
