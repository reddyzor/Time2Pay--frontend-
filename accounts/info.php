<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Инфо об аккаунте</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container_account_info">
        <div class="header">
            <div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = <span id="usdt-value">555RUB</span></div>
        </div>
        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Анна Смирнова</div>
        <div class="accounts_info">
            <div class=" ">
                <img src="../images/accounts_info/fio.png">
                <p>ФИО</p>
                <p><b>Смирнова Анна Сергеевна</b></p>
            </div>
        </div>
        <div class="accounts_info">
            <div class=" ">
                <img src="../images/accounts_info/nomer.png">
                <p>Номер телефона</p>
                <p><b>+79372431265</b></p>
            </div>
        </div>
        <div class="accounts_info">
            <div class=" ">
                <img src="../images/accounts_info/bank.png">
                <p>Банк профиля</p>
                <p><b>Sberbank</b></p>
            </div>
        </div>
        <div class="accounts_info">
            <div class=" ">
                <img src="../images/accounts_info/ist.png">
                <p>Источник</p>
                <p><b>Владимир Попов 28.03</b><br><br>1850</p>
            </div>
        </div>
        <div class="accounts_info">
            <div class=" ">
                <p>Примечание</p>
                <p>Есть предупреждение от банка</p>
            </div>
        </div>

        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Статистика профиля</div>

        <div class="accounts_info">
            <p>Общая конверсия</p>
            <p><b>33%</b></p>
        </div>
        <div class="accounts_info">
            <p>Успешные сделки</p>
            <p><b>30 USDT / 7 сделок</b></p>
        </div>
        <div class="accounts_info">
            <p>Использовано средств / Лимит</p>
            <p><b>74000 / 400000</b></p>
        </div>

        <div class="accounts_info">
            <img src="../images/accounts_info/fio.png">
            <p>В работе</p>
            <label class="switch" for="checkbox">
                <input type="checkbox" id="checkbox" checked /> <!-- checked статус-->
                <div class="slider round"></div> 
            </label>
            <p><b>Анна Смирнова Вирт 1</b></p>
        </div>
    </div>
    <div class="br-post-devices">&nbsp;</div>
    
	<div class="footer">
        <a href="index.php"><img src="../images/icon1.png" alt="icon"></a>
        <a href="../wallet/index.php"><img src="../images/icon2.png" alt="icon"></a>
        <a href="../devices/index.php"><img src="../images/icon3.png" alt="icon"></a>
        <a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
        <a href="../messages/index.php"><img src="../images/icon5.png" alt="icon"></a>
	</div>

    <script src="../script.js"></script>
</body>
</html>
