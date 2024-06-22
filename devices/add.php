<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Устройства</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="header">
        <div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = 555RUB</div>
    </div>
    
    <br><div class="title"><img src="../images/devices.png" height="25px" id="s_image">&nbsp;Новое устройство</div>
	<a href="index.php"><img src="../images/devices/back.png" alt="Назад" class="add_back-icon"></a>
    <div class="add_container">
        <div class="add_form">
			<center>

			<div id="message" style="width:100%;"></div>

            <div class="add_form-group"><label for="device-name">Название Устройства</label>
                <input type="text" id="device-name" placeholder="Введите название устройства">
            </div>
            <div class="add_form-group">
                <label for="sim-number">Номер SIM</label>
                <input type="text" id="sim-number" placeholder="Введите номер SIM">
            </div>
            <div class="add_form-group">
                <label for="model">Модель</label>
                <input type="text" id="model" placeholder="Введите модель">
            </div>
			</center>
			<center><br><a href="#" class="add_device-button" onclick="addDevice()">Добавить устройство</a><br><br></center>
        </div>
    </div>

	<div class="br-post-devices">&nbsp;</div>

	<div class="footer">
        <a href="../accounts/index.php"><img src="../images/icon1.png" alt="Accounts"></a>
        <a href="../wallet/index.php"><img src="../images/icon2.png" alt="Wallet"></a>
        <a href="index.php"><img src="../images/icon3.png" alt="icon"></a>
        <a href="../disputes/index.php"><img src="../images/icon4.png" alt="Disputes"></a>
        <a href="../messages/index.php"><img src="../images/icon5.png" alt="Messages"></a>
	</div>

    <script>
        function addDevice() {
            const deviceName = document.getElementById('device-name').value.trim();
            const simNumber = document.getElementById('sim-number').value.trim();
            const model = document.getElementById('model').value.trim();

            if (deviceName === '' || simNumber === '' || model === '') {
                document.getElementById('message').innerHTML = '<p style="font-weight: bold; color: red; background-color:white;">Ошибка: Все поля должны быть заполнены.</p>';
            } else {
                // Здесь можно добавить код для отправки данных на сервер или выполнения других действий
                console.log('Название устройства:', deviceName);
                console.log('Номер SIM:', simNumber);
                console.log('Модель:', model);

                // Очищаем поля ввода после добавления устройства
                document.getElementById('device-name').value = '';
                document.getElementById('sim-number').value = '';
                document.getElementById('model').value = '';

                // Выводим сообщение об успешном добавлении устройства
                document.getElementById('message').innerHTML = '<p style="font-weight: bold; color: green; background-color:white;">Устройство успешно добавлено.</p>';
            }
        }
    </script>
</body>
</html>