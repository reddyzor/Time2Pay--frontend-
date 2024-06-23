<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Получение и разбор пути запроса
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', trim($uri, '/'));

// Проверяем, что запрос идет к /api/
if (count($uri) < 2 || $uri[0] !== 'api.php') {
    header("HTTP/1.1 404 Not Found");
    echo json_encode(["message" => "Endpoint not found"]);
    exit();
}

$resource = $uri[1];

switch ($resource) {
    case 'accounts':
        include 'api/accounts.php';
        break;
    case 'devices':
        include 'api/devices.php';
        break;
    case 'disputes':
        include 'api/disputes.php';
        break;
    case 'messages':
        include 'api/messages.php';
        break;
    case 'wallet':
        include 'api/wallet.php';
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo json_encode(["message" => "Endpoint not found"]);
        break;
}
?>
