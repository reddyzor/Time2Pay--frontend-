<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve devices
        get_devices($db);
        break;
    case 'POST':
        // Add a new device
        create_device($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_devices($db) {
    $query = "SELECT * FROM devices";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $devices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($devices);
}

function create_device($db) {
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "INSERT INTO devices (user_id, device_name) VALUES (:user_id, :device_name)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":device_name", $data['device_name']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Device added successfully."]);
    } else {
        echo json_encode(["message" => "Failed to add device."]);
    }
}
?>
