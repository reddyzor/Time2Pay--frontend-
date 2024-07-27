<?php 
    // accounts/add.php
    if (!isset($_COOKIE['uid']))
    {
        exit();
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
     
    <title>Добавление аккаунта</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container_account-add">
        <div class="header">
            <?php require '../header.php'; ?>
        </div>
        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Новый аккаунт</div>
        <main>
            <form id="add-account-form">
            <center>
                <div class="form-group">
                    <label for="name"><i class="fas fa-building"></i> Название</label>
                    <input type="text" id="name" placeholder="Название" required>
                </div>
                <div class="form-group">
                    <label for="surname"><i class="fas fa-user"></i> Фамилия</label>
                    <input type="text" id="surname" placeholder="Фамилия" required>
                </div>
                <div class="form-group">
                    <label for="firstname"><i class="fas fa-user"></i> Имя</label>
                    <input type="text" id="firstname" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <label for="patronymic"><i class="fas fa-user"></i> Отчество</label>
                    <input type="text" id="patronymic" placeholder="Отчество" required>
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Номер Телефона</label>
                    <input type="text" id="phone" placeholder="Номер Телефона" required>
                </div>
                <div class="form-group">
                    <label for="device"><i class="fas fa-mobile-alt"></i> Устройство</label>
                    <select id="device" required>
                        <option value="" disabled selected>Выберите устройство</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bank"><i class="fas fa-university"></i> Банк</label>
                    <input type="text" id="bank" placeholder="Банк" required>
                </div>
                <div class="form-group">
                    <label for="limit"><i class="fas fa-money-bill-wave"></i> Суточный Лимит</label>
                    <input type="text" id="limit" placeholder="Суточный Лимит" required>
                </div>
                <div class="form-group">
                    <label for="note"><i class="fas fa-clipboard"></i> Примечание</label>
                    <input type="text" id="note" placeholder="Примечание">
                </div>
            </center>
            <br>
            <center><button type="submit" class="pay1_button">Добавить</button></center>
            </form>
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

    <script src="../script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchDevices();

            function fetchDevices() {
                fetch('../api/devices.php')
                    .then(response => response.json())
                    .then(data => {
                        const deviceSelect = document.getElementById('device');
                        data.forEach(device => {
                            const option = document.createElement('option');
                            option.value = device.id; // Assuming the device object has an id property
                            option.textContent = device.device_name; // Assuming the device object has a device_name property
                            deviceSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching devices:', error));
            }
        });
    </script>
</body>
</html>
