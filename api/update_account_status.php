<?php // update_account_status.php
include_once '../config/database.php';
$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id'], $data['active'])) {
    echo json_encode(["message" => "Недостаточно данных"]);
    exit;
}

try {
    // Получение текущего статуса аккаунта
    $query = "SELECT active FROM accounts WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $data['id']);
    $stmt->execute();
    $currentStatus = $stmt->fetch(PDO::FETCH_ASSOC)['active'];

    // Получение текущего статуса связанных устройств
    $query = "SELECT working FROM devices WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $data['id']);
    $stmt->execute();
    $currentDeviceStatus = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Обновление статуса аккаунта
    $stmt = $db->prepare("UPDATE accounts SET active = :active WHERE id = :id");
    $stmt->execute(['active' => $data['active'], 'id' => $data['id']]);

    // Обновление статуса связанных устройств
    $stmt = $db->prepare("UPDATE devices SET working = :active WHERE id = :id");
    $stmt->execute(['active' => $data['active'], 'id' => $data['id']]);

    echo json_encode([
        "message" => "Статус успешно обновлён",
        "previousStatus" => $currentStatus,
        "previousDeviceStatus" => $currentDeviceStatus
    ]);
} catch (Exception $e) {
    echo json_encode(["message" => "Ошибка при обновлении: " . $e->getMessage()]);
}
?>
