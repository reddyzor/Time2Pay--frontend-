<?php  // api/disputes.php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve disputes
        get_disputes($db);
        break;
    case 'POST':
        // Create a new dispute
        create_dispute($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_disputes($db) {
    $query = "SELECT * FROM disputes";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $disputes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($disputes);
}

function create_dispute($db) {
    $data = json_decode(file_get_contents("php://input"), true);
    $query = "INSERT INTO disputes (user_id, dispute_text, status) VALUES (:user_id, :dispute_text, :status)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->bindParam(":dispute_text", $data['dispute_text']);
    $stmt->bindParam(":status", $data['status']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Dispute created successfully."]);
    } else {
        echo json_encode(["message" => "Failed to create dispute."]);
    }
}
?>
