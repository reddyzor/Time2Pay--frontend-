<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    
    <title>Устройства</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="header">
        <?php require '../header.php'; ?>
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

    <script src="../script.js"></script>
    <script>
        function addDevice() {
            const deviceName = document.getElementById('device-name').value.trim();
            const simNumber = document.getElementById('sim-number').value.trim();
            const model = document.getElementById('model').value.trim();
            const messageElement = document.getElementById('message');

            if (!deviceName || !simNumber || !model) {
                messageElement.innerHTML = '<p style="font-weight: bold; color: red; background-color:white;">Ошибка: Все поля должны быть заполнены.</p>';
                return;
            }

            const deviceData = {
                user_id: getUidFromCookie(), // Функция для получения user_id из куки
                device_name: deviceName,
                sim_number: simNumber,
                model: model
            };

            fetch('../api/devices.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(deviceData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => { throw new Error(text) });
                }
                return response.json();
            })
            .then(data => {
                console.log('Ответ сервера:', data);
                if (data.message === 'Device added successfully.') {
                    alert('Устройство успешно добавлено.');
                    window.location.href = 'index.php';
                } else {
                    alert('Ошибка при добавлении устройства: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка при добавлении устройства.');
            });
        }

        // Функция для получения user_id из куки
        function getUidFromCookie() {
            const name = 'uid=';
            const decodedCookie = decodeURIComponent(document.cookie);
            const ca = decodedCookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>
</body>
</html>
