// index.php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

// /api/[resource]
if ($uri[1] !== 'api') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$resource = $uri[2];

// Определение файла API, который будет обрабатывать запросы
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
        exit();
}
?>
