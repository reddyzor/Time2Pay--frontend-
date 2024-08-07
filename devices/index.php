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
    
    <br><div class="title"><img src="../images/devices.png" height="25px" id="s_image">&nbsp;Устройства</div><div style="color:white;font-size:35px; float:right; margin-top:-55px;margin-right:25px;"><a href="/devices/add.php">+</a></div>
    
    <div class="search-container">
        <input type="text" class="search" id="search-input" placeholder="Искать устройства...">
    </div>

    <div class="params">
        <div class="params-label" style="font-size:13px; margin-left: 8px;"><img src="../images/params_search.png" style="width:13px;">&nbsp;Параметры поиска:</div>
        <div class="sort" style="font-size:13px; margin-right: 11px;"><img src="../images/sort_results.png" style="width:13px;">&nbsp;Сортировка:</div>
    </div>
    
    <div class="params">
        <div class="params-label">
            <select class="select" id="status-filter" style="color:black;">
                <option value="all">Все устройства</option>
                <option value="working">В работе</option>
                <option value="off">Отключено</option>
            </select>
        </div>
        <div class="sort">
            <button class="button" id="sort-button" style="color:black;">Сначала новые</button>
        </div>
    </div>

    <div class="devices" id="devices-container">
        <!-- Динамически добавляемые устройства будут отображаться здесь -->
    </div>

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
            let sort = 'newest';
            let status = 'all';
            let searchQuery = '';

            const fetchDevices = () => {
                fetch(`../api/devices.php?sort=${sort}&status=${status}&search=${searchQuery}`)
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('devices-container');
                        container.innerHTML = '';

                        if (data.length === 0) {
                            container.innerHTML = '<p style="color: white; text-align: center;">Нет доступных устройств</p>';
                        } else {
                            data.forEach(device => {
                                const deviceElement = document.createElement('div');
                                deviceElement.classList.add('device');
                                deviceElement.innerHTML = `
                                    <span style="float: left;">
                                        <a href="info.php?id=${device.id}">
                                            <img src="../images/dev-info.png" style="float: left; margin: -5px;">
                                        </a>
                                        <b style="margin: 15px;">
                                            <a href="info.php?id=${device.id}">${device.device_name}</a>
                                        </b>
                                        <p style="margin-left: 49px; margin-top: 5px;">${device.sim_number}</p>
                                    </span>
                                    <br><br><br><br>
                                    <span style="float: left;"><b>Реквизиты: ${device.account_count}</b></span>
                                    <br>
                                    <span style="float: left;">Запущено: ${device.created_at}</span>
                                    <br><br>
                                    <span style="float: right;">
                                        <img src="../images/battery.png" style="width: 17px; float: left;">
                                        <text style="margin: 15px;"><b>86%</b> Онлайн</text>
                                    </span>
                                    <span style="float: right;">
                                        <img src="../images/wi-fi.png" style="width: 17px; float: left;">
                                        <text style="margin: 15px;"><b>30.0 Мб/с</b></text>
                                    </span>
                                    <br><br><br>
                                    <span style="float: left;">
                                        <img src="../images/${device.working ? 'inwork' : 'nowork'}.png" style="width: 29px; float: left; margin: -6px;">
                                        <text style="margin: 15px;">${device.working ? 'В работе' : 'Отключено'}</text>
                                    </span>
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
            };

            document.getElementById('status-filter').addEventListener('change', (event) => {
                status = event.target.value;
                fetchDevices();
            });

            document.getElementById('sort-button').addEventListener('click', () => {
                sort = sort === 'newest' ? 'oldest' : 'newest';
                document.getElementById('sort-button').textContent = sort === 'newest' ? 'Сначала новые' : 'Сначала старые';
                fetchDevices();
            });

            document.getElementById('search-input').addEventListener('input', (event) => {
                searchQuery = event.target.value.toLowerCase();
                fetchDevices();
            });

            fetchDevices();
        });
    </script>
</body>
</html>
