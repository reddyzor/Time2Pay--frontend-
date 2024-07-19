#api/accounts
<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        if (isset($_GET['id'])) {
            get_account_fromID($db, $_GET['id']);
        } else {
            get_accounts($db);
        }
        break;
    case 'POST':
        create_account($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_accounts($db) {
    $query = "SELECT * FROM accounts";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($accounts);
}

function get_account_fromID($db, $id) {
    $query = "SELECT * FROM accounts WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($account) {
        echo json_encode($account);
    } else {
        echo json_encode(["message" => "Account not found."]);
    }
}

function create_account($db) {
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if user exists
    $query = "SELECT * FROM users WHERE uid = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(["message" => "User not found."]);
        return;
    }

    // Insert new account
    $query = "INSERT INTO accounts (user_id, name, surname, firstname, patronymic, phone, device, bank, `limit`, note) VALUES (:user_id, :name, :surname, :firstname, :patronymic, :phone, :device, :bank, :limit, :note)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":name", $data['name']);
    $stmt->bindParam(":surname", $data['surname']);
    $stmt->bindParam(":firstname", $data['firstname']);
    $stmt->bindParam(":patronymic", $data['patronymic']);
    $stmt->bindParam(":phone", $data['phone']);
    $stmt->bindParam(":device", $data['device']);
    $stmt->bindParam(":bank", $data['bank']);
    $stmt->bindParam(":limit", $data['limit']);
    $stmt->bindParam(":note", $data['note']);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Account created successfully."]);
    } else {
        echo json_encode(["message" => "Failed to create account."]);
    }
}
?>
