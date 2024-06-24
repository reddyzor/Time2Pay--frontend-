<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
     
    
    <title>Вывод средств</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="header">
        <div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = <span id="usdt-value">ЗАГРУЗКА</span></div>
    </div>
    <br><div class="title"><img src="../images/wallet/index.png" id="s_image">&nbsp;Вывод средств</div>
    <div class="withdraw_container">
        <div class="withdraw_card">
            <p class="withdraw_subtitle">Вывод средств с баланса прибыли от приёма (прибыль от сделок)</p>
            <div class="withdraw_balance">
                <h2 class="withdraw_balance-title">ПРИБЫЛЬ С ПРИЕМА</h2>
                <p class="withdraw_balance-amount"><b>431,6 USDT</b></p>
                <p class="withdraw_balance-amount-rub"><b>40 534,37 Р</b></p>
                <div class="withdraw_pagination">
                    <span class="withdraw_dot active"></span>
                    <span class="withdraw_dot"></span>
                    <span class="withdraw_dot"></span>
                </div>
            </div>
            <div class="withdraw_form">
                <label for="wallet" class="withdraw_label">КОШЕЛЕК ДЛЯ ВЫВОДА</label>
                <select id="wallet" class="withdraw_select">
                    <option><span class="withdraw_input-icon">💵</span> Кошелек не выбран</option>
                </select>

                <label for="amount_usdt" class="withdraw_label">СУММА В USDT TRC-20</label>
                <div class="withdraw_input-group">
                    <span class="withdraw_input-icon">💵</span>
                    <input type="text" id="amount_usdt" class="withdraw_input" placeholder="Сумма в USDT">
                </div>

                <label for="amount_rub" class="withdraw_label">ЭКВИВАЛЕНТНАЯ СУММА В ВАЛЮТЕ</label>
                <div class="withdraw_input-group">
                    <span class="withdraw_input-icon">💵</span>
                    <input type="text" id="amount_rub" class="withdraw_input" placeholder="Сумма в Р">
                </div>

                <center><button class="withdraw_button">Вывести средства</button></center>
            </div>
        </div>
    </div>
    
    <div class="br-post-devices">&nbsp;</div>

	<div class="footer">
        <a href="../accounts/index.php"><img src="../images/icon1.png" alt="icon"></a>
        <a href="index.php"><img src="../images/icon2.png" alt="icon"></a>
        <a href="../devices/index.php"><img src="../images/icon3.png" alt="icon"></a>
        <a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
        <a href="../messages/index.php"><img src="../images/icon5.png" alt="icon"></a>
	</div>

    <script src="../script.js"></script>
</body>
</html>
