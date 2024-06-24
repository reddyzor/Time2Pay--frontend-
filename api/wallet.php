<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
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

// Функция для получения реального курса USDT к рублю
function get_wallet() {
    $url_usdt = 'https://api.binance.com/api/v3/ticker/price?symbol=USDTRUB';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url_usdt);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response_usdt = curl_exec($ch);

    curl_close($ch);

    $data_usdt = json_decode($response_usdt, true);

    // Проверка, что данные получены
    if (isset($data_usdt['price'])) {
        // Округление до целого числа
        $wallet = [
            "balance" => round($data_usdt['price'])
        ];
    } else {
        $wallet = [
            "balance" => 'ERROR' // Возвращаем 0, если данные не получены
        ];
    }

    echo json_encode([$wallet]);
}