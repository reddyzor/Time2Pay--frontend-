<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json; charset=UTF-8");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        get_wallet();
        break;
    default:
        header("HTTP/1.1 405 Method Not Allowed");
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}

function get_wallet() {
    // Возвращаем фиксированное значение для тестирования
    $wallet = [
        "balance" => 155
    ];
    echo json_encode([$wallet]);
}
?>
