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
    <title>Информация об устройстве</title>
</head>
<body>
    <div class="header">
        <?php require '../header.php'; ?>
    </div>
    
    <br><div class="title"><img src="../images/devices.png" height="25px" id="s_image">&nbsp;Устройства</div>

    <div id="device-info"></div>

    <div class="br-post-devices">&nbsp;</div>

    <div class="footer">
        <a href="../accounts/index.php"><img src="../images/icon1.png" alt="icon"></a>
        <a href="../wallet/index.php"><img src="../images/icon2.png" alt="icon"></a>
        <a href="index.php"><img src="../images/icon3.png" alt="icon"></a>
        <a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
        <a href="../messages/index.php"><img src="../images/icon5.png" alt="icon"></a>
    </div>

    <script src="../script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const deviceId = params.get('id');

            if (!deviceId) {
                document.getElementById('device-info').innerHTML = '<p style="color: red; text-align: center;">ID устройства не указан.</p>';
                return;
            }

            fetch(`../api/devices.php?id=${deviceId}`)
                .then(response => response.json())
                .then(device => {
                    if (device.message) {
                        document.getElementById('device-info').innerHTML = `<p style="color: red; text-align: center;">${device.message}</p>`;
                        return;
                    }

                    const deviceInfo = `
                        <div class="device_info">
                            <div class="centered"><img src="../images/nameormodel.png" style="width: 35px;"><br>&nbsp;&nbsp;Название устройства<br><small>${device.device_name}</small></div><br>
                            <div class="centered"><img src="../images/inwork.png" style="width: 35px;"><br>&nbsp;&nbsp;В работе<br><small>${device.status}</small></div>
                            <span class="left"><img src="../images/wifi.png" style="width: 25px;" style="width: 25px;">&nbsp;&nbsp;WI-FI<span class="right" style="float: right;">${device.wifi_speed}</span></span>
                            <span class="left"><img src="../images/sim.png" style="width: 25px;">&nbsp;&nbsp;Номер SIM<span class="right" style="float: right;">${device.sim_number}</span></span>
                            <br><div class="title" style="font-size: 14px; font-weight: bold;">&nbsp;&nbsp;Данные об устройстве</div>
                            <br>
                            <span class="left"><img src="../images/nameormodel.png"  style="width: 25px;">&nbsp;&nbsp;Модель<span class="right" style="float: right;">${device.model}</span></span>
                            <span class="left"><img src="../images/finger.png"  style="width: 25px;">&nbsp;&nbsp;Fingerprint<span class="right" style="float: right;">${device.fingerprint}</span></span>
                            <span class="left"><img src="../images/uuid.png" style="width: 25px;">&nbsp;&nbsp;UUID<span class="right" style="float: right;">${device.uuid}</span></span> 
                            <span class="left"><img src="../images/added.png" style="width: 25px;">&nbsp;&nbsp;Добавлен<span class="right" style="float: right;">${device.added_date}</span></span>
                            <br>
                            <div class="device_info_container">
                                <span class="left"><p style=" ">Поледняя активность<br><br><img src="../images/lastActive.png" style="width: 35px; margin: -5px;"><text style="font-size: 15px; vertical-align: top; margin-top: -20px;">&nbsp;&nbsp;Запущено: ${device.last_active}</text></p></span>
                                <span class="right" style="float: right;"><p style="">Health check<br><br><img src="../images/health.png" style="width: 35px; margin: -5px;"><text style="font-size: 15px; vertical-align: top; margin-top: -20px;">&nbsp;&nbsp;${device.health_check}</text></p></span>
                            </div>
                        </div>
                    `;

                    document.getElementById('device-info').innerHTML = deviceInfo;
                })
                .catch(error => {
                    document.getElementById('device-info').innerHTML = '<p style="color: red; text-align: center;">Ошибка при загрузке данных устройства</p>';
                    console.error('Error fetching device:', error);
                });
        });
    </script>
</body>
</html>
