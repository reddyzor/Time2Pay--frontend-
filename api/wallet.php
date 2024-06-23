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

// Функция для получения реального курса USDT к рублю
function get_wallet() {
    $url = 'https://api.coingecko.com/api/v3/simple/price?ids=tether&vs_currencies=rub';
    
    // Инициализация cURL
    $ch = curl_init();
    
    // Настройка cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    // Выполнение запроса и получение ответа
    $response = curl_exec($ch);
    
    // Закрытие cURL
    curl_close($ch);
    
    // Декодирование JSON-ответа
    $data = json_decode($response, true);
    
    // Проверка, что данные получены
    if (isset($data['tether']['rub'])) {
        $wallet = [
            "balance" => $data['tether']['rub']
        ];
    } else {
        $wallet = [
            "balance" => 0 // Возвращаем 0, если данные не получены
        ];
    }

    // Возврат данных в формате JSON
    echo json_encode([$wallet]);
}
