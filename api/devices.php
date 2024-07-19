<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
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
    $query = "SELECT * FROM devices";
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
    $query = "INSERT INTO devices (user_id, device_name, sim_number, model) VALUES (:user_id, :device_name, :sim_number, :model)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":device_name", $data['device_name']);
    $stmt->bindParam(":sim_number", $data['sim_number']);
    $stmt->bindParam(":model", $data['model']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Device added successfully."]);
    } else {
        echo json_encode(["message" => "Failed to add device."]);
    }
}
?>
