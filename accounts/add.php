<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление аккаунта</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container_account-add">
        <div class="header">
            <div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = 555RUB</div>
        </div>
        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Новый аккаунт</div>
        <main>
            <form>
            <center>
                <div class="form-group">
                    <label for="name"><i class="fas fa-building"></i> Название</label>
                    <input type="text" id="name" placeholder="Название">
                </div>
                <div class="form-group">
                    <label for="surname"><i class="fas fa-user"></i> Фамилия</label>
                    <input type="text" id="surname" placeholder="Фамилия">
                </div>
                <div class="form-group">
                    <label for="firstname"><i class="fas fa-user"></i> Имя</label>
                    <input type="text" id="firstname" placeholder="Имя">
                </div>
                <div class="form-group">
                    <label for="patronymic"><i class="fas fa-user"></i> Отчество</label>
                    <input type="text" id="patronymic" placeholder="Отчество">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Номер Телефона</label>
                    <input type="text" id="phone" placeholder="Номер Телефона">
                </div>
                <div class="form-group">
                    <label for="device"><i class="fas fa-mobile-alt"></i> Устройство</label>
                    <input type="text" id="device" placeholder="Устройство">
                </div>
                <div class="form-group">
                    <label for="bank"><i class="fas fa-university"></i> Банк</label>
                    <input type="text" id="bank" placeholder="Банк">
                </div>
                <div class="form-group">
                    <label for="limit"><i class="fas fa-money-bill-wave"></i> Суточный Лимит</label>
                    <input type="text" id="limit" placeholder="Суточный Лимит">
                </div>
                <div class="form-group">
                    <label for="note"><i class="fas fa-clipboard"></i> Примечание</label>
                    <input type="text" id="note" placeholder="Примечание">
                </div>
            </center>
            </form>
            <br>
            <center><a href="#" class="button7">Добавить</a></center>
        </main>
			<div class="footer">
				<a href="index.php"><img src="../images/icon1.png" alt="icon"></a>
				<a href="../wallet/index.php"><img src="../images/icon2.png" alt="icon"></a>
				<a href="../devices/index.php"><img src="../images/icon3.png" alt="icon"></a>
				<a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
				<a href="../messages/index.php"><img src="../images/icon5.png" alt="icon"></a>
			</div>
    </div>
    <div class="br-post-devices">&nbsp;</div>
</body>
</html>