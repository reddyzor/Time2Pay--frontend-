<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    
    <title>Инфо об аккаунте</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container_account_info">
        <div class="header">
            <?php require '../header.php'; ?>
        </div>
        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Информация об аккаунте</div>
        <div id="account-info"></div>

        <br><div class="title"><img src="../images/accounts.png" id="s_image">&nbsp;Статистика профиля</div>
        <div id="account-stats"></div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const params = new URLSearchParams(window.location.search);
            const accountId = params.get('id');

            if (!accountId) {
                document.getElementById('account-info').
                innerHTML = '<p style="color: red; text-align: center;">ID аккаунта не указан.</p>';
                return;
            }

            fetch(`../api/accounts.php?id=${accountId}`)
                .then(response => response.json())
                .then(account => {
                    if (account.message) {
                        document.getElementById('account-info').innerHTML = `<p style="color: red; text-align: center;">${account.message}</p>`;
                        return;
                    }

                    const accountInfo = `
                        <div class="accounts_info">
                            <div class="">
                                <img src="../images/accounts_info/fio.png">
                                <p>ФИО</p>
                                <p><b>${account.surname} ${account.name} ${account.firstname}</b></p>
                            </div>
                        </div>
                        <div class="accounts_info">
                            <div class="">
                                <img src="../images/accounts_info/nomer.png">
                                <p>Номер телефона</p>
                                <p><b>${account.phone}</b></p>
                            </div>
                        </div>
                        <div class="accounts_info">
                            <div class="">
                                <img src="../images/accounts_info/bank.png">
                                <p>Банк профиля</p>
                                <p><b>${account.bank}</b></p>
                            </div>
                        </div>
                        <div class="accounts_info">
                            <div class="">
                                <img src="../images/accounts_info/ist.png">
                                <p>Устройство</p>
                                <p><b>${account.device}</b></p>
                            </div>
                        </div>
                        <div class="accounts_info">
                            <div class="">
                                <p>Примечание</p>
                                <p>${account.note}</p>
                            </div>
                        </div>
                    `;

                    const accountStats = `
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
                            <p><b>74000 / ${account.limit}</b></p>
                        </div>
                        <div class="accounts_info">
                            <img src="../images/accounts_info/fio.png">
                            <p>В работе</p>
                            <label class="switch" for="checkbox">
                                <input type="checkbox" id="checkbox" checked />
                                <div class="slider round"></div>
                            </label>
                            <p><b>${account.name} ${account.surname}</b></p>
                        </div>
                    `;

                    document.getElementById('account-info').innerHTML = accountInfo;
                    document.getElementById('account-stats').innerHTML = accountStats;
                })
                .catch(error => {
                    document.getElementById('account-info').innerHTML = '<p style="color: red; text-align: center;">Ошибка при загрузке данных аккаунта</p>';
                    console.error('Error fetching account:', error);
                });
        });
    </script>
</body>
</html>
