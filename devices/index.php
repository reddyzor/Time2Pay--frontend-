<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->

    <link rel="stylesheet" href="../style.css">
    <title>Устройства</title>
</head>
<body>
    <div class="header">
        <?php require '../header.php'; ?>
    </div>
    
    <br><div class="title"><img src="../images/devices.png" id="s_image">&nbsp;Устройства</div><div style="color:white;font-size:35px; float:right; margin-top:-55px;margin-right:25px;"><a href="add.php">+</a></div>

    <div id="devices-container"></div>

    <div class="br-post-devices">&nbsp;</div>
    
    <div class="footer">
        <a href="index.php"><img src="../images/icon1.png" alt="icon"></a>
        <a href="../wallet/index.php"><img src="../images/icon2.png" alt="icon"></a>
        <a href="../devices/index.php"><img src="../images/icon3.png" alt="icon"></a>
        <a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
        <a href="../messages/index.php"><img src="../images/icon5.png" alt="icon"></a>
    </div>

    <script src="../script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('../api/devices.php')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('devices-container');
                    container.innerHTML = '';

                    if (data.length === 0) {
                        container.innerHTML = '<p style="color: white; text-align: center;">Нет доступных устройств</p>';
                    } else {
                        data.forEach(device => {
                            const deviceElement = document.createElement('div');
                            deviceElement.classList.add('devices');
                            deviceElement.innerHTML = `
                                <div class="center" style="font-size: 1.0rem;"><a href="info.php?id=${device.id}">${device.device_name}</a></div><br>
                                <div class="row">
                                    <div class="left"><img src="../images/device.png">&nbsp;${device.device_name}</div>
                                    <div class="right" style="font-size: 1.0rem;">${device.model}</div>
                                </div>
                                <div class="row">
                                    <div class="left"><img src="../images/inwork.png" style="width:25px;">&nbsp;В работе</div>
                                    <div class="right" style="font-family: monospace;">${device.status}</div>
                                </div>
                                <div class="row">
                                    <div class="right"><img src="../images/sbp.png"></div>
                                </div>
                            `;
                            container.appendChild(deviceElement);
                        });
                    }
                })
                .catch(error => {
                    const container = document.getElementById('devices-container');
                    container.innerHTML = '<p style="color: red; text-align: center;">Ошибка при загрузке устройств</p>';
                    console.error('Error fetching devices:', error);
                });
        });
    </script>
</body>
</html>
