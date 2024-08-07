<?php  // api/users.php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve accounts
        echo 'fuck off';
        #get_accounts($db);
        break;
    case 'POST':
        // Create a new account
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

function create_account($db) {
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Check if the user exists
    $query = "SELECT * FROM users WHERE uid = :uid";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":uid", $data['user_id']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Account already exists."]);
        return;
    }

    // Create the user
    $query = "INSERT INTO users (uid, username) VALUES (:uid, :username)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":uid", $data['user_id']);
    $stmt->bindParam(":username", $data['user_id']);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Account created successfully."]);
    } else {
        echo json_encode(["message" => "Failed to create account."]);
    }
}
?>
