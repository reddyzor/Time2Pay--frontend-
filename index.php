<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->

    <link rel="stylesheet" href="style.css">
    <title>Time2Pay</title>
</head>
<body>
    
    <?php
    // Установка времени жизни куки (например, 1 год)
    $cookie_lifetime = time() + (365 * 24 * 60 * 60);

    // Функция для установки uid в куку
    function set_cookie_uid($uid) {
        global $cookie_lifetime;
        setcookie('uid', $uid, $cookie_lifetime, "/");
    }

    // Функция для проверки куки
    function check_cookie() {
        return isset($_COOKIE['uid']);
    }

    // Функция для создания учетной записи
    function create_account($uid) {
        $url = 'http://t2p.test/api/users.php';
        $data = json_encode(["user_id" => $uid]);

        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => $data,
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            return "Error connecting to API";
        }

        $response = json_decode($result, true);

        if ($response === null) {
            return "Error decoding API response";
        }

        return $response['message'];
    }

    // Обработка входящих запросов
    $message = "";
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['uid'])) {
            $uid = htmlspecialchars($_GET['uid']);
            if (strlen($uid) > 7) {
                set_cookie_uid($uid);
                $message = create_account($uid);
            } else {
                $message = "UID is too short";
            }
        }
    }
    ?>

    <div class="header">
        <?php require 'header.php'; ?>
    </div>
    
    <br><div class="title">Time2Pay</div>

    <div class="devices">
        <div class="device">
            <center>
                <b style="text-align: center;"><a href="/">Добро пожаловать!</a></b>
                <p>P2P-процессинг для бизнеса 👨‍💼</p>
            </center>
        </div>
    </div>

    <div class="footer">
        <a href="accounts/index.php"><img src="images/icon1.png" alt="icon"></a>
        <a href="wallet/index.php"><img src="images/icon2.png" alt="icon"></a>
        <a href="devices/index.php"><img src="images/icon3.png" alt="icon"></a>
        <a href="disputes/index.php"><img src="images/icon4.png" alt="icon"></a>
        <a href="messages/index.php"><img src="images/icon5.png" alt="icon"></a>
    </div>

    <script src="../script.js"></script>
</body>
</html>
