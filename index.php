<!-- /index.php -->
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
    <div class="header">
        <div class="usdt"><img src="images/usdt.png" id="y_image">&nbsp;USDT = <span id="usdt-value">555RUB</span></div>
    </div>
    
    <br><div class="title">Time2Pay</div>

    <div class="devices">
        <div class="device">
            <center>
                <b style="text-align: center;"><a href="device_info.php">Добро пожаловать!</a></b>
                <p>P2P-процессинг для бизнеса 👨‍💼</p>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        // Получение значения uid из POST-запроса
                        $uid = htmlspecialchars($_GET['uid']);
                        // Вывод значения uid
                        echo "<p style =\"color: yellow;\">Вы авторизованы в системе.<br>Ваш идентификатор: <strong>$uid</strong></p>";
                    } else {
                        echo "<p style =\"color: black;\">Вы не авторизованы, причина: отправлены неизвестные данные авторизации.<br>Зайдите на платформу через официальный бот:</p><a href=\"https://t.me/Time2PayBot\">https://t.me/Time2PayBot</a>";
                    }
                ?>
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
