// /api/accounts.php
<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve accounts
        get_accounts($db);
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
    $query = "INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $data['username']);
    $stmt->bindParam(":password", password_hash($data['password'], PASSWORD_BCRYPT));
    $stmt->bindParam(":email", $data['email']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Account created successfully."]);
    } else {
        echo json_encode(["message" => "Failed to create account."]);
    }
}
?>
