<?php  // api/messages.php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve messages
        get_messages($db);
        break;
    case 'POST':
        // Create a new message
        create_message($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_messages($db) {
    $query = "SELECT * FROM messages";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);
}

function create_message($db) {
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "INSERT INTO messages (user_id, message_text) VALUES (:user_id, :message_text)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":message_text", $data['message_text']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Message created successfully."]);
    } else {
        echo json_encode(["message" => "Failed to create message."]);
    }
}
?>
