// /api/wallet.php
<?php
include_once '../config/database.php';

$database = new Database();
$db = $database->getConnection();

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrieve wallet details
        get_wallet($db);
        break;
    case 'POST':
        // Update wallet balance
        update_wallet($db);
        break;
    // Additional cases for PUT, DELETE if needed
}

function get_wallet($db) {
    $query = "SELECT * FROM wallet";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $wallet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($wallet);
}

function update_wallet($db) {
    $data = json_decode(file_get_contents("php://```php
input"), true);
    $query = "UPDATE wallet SET balance = :balance WHERE user_id = :user_id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":balance", $data['balance']);
    $stmt->bindParam(":user_id", $data['user_id']);
    if($stmt->execute()) {
        echo json_encode(["message" => "Wallet updated successfully."]);
    } else {
        echo json_encode(["message" => "Failed to update wallet."]);
    }
}
?>
