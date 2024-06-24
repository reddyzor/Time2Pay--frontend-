<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <!-- ЭКСПЕРИМЕНТАЛЬНЫЙ КОД -->
     
    
    <title>Финансы</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container_wallet">
        <div class="header">
            <div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = <span id="usdt-value">ЗАГРУЗКА</span></div>
        </div>
        <br><div class="title"><img src="../images/wallet/index.png" id="s_image">&nbsp;Финансы</div>
        <main>
            <div id="modal" class="modal" style="display: none;">
                <div class="modal-content pay1_card">
                    <span id="closeModalBtn" class="modal-close">&times;</span>
                    <h2 class="pay1_step">Шаг 1</h2>
                    <h1 class="pay1_title">ПОПОЛНЕНИЕ БАЛАНСА</h1>
                    <p class="pay1_subtitle">ВВЕДИТЕ <span class="pay1_highlight">СУММУ ПОПОЛНЕНИЯ</span> В <span class="pay1_highlight">USDT</span><br>И НАЖМИТЕ "ПРОДОЛЖИТЬ"</p>
                    <div class="pay1_form">
                        <label for="pay1_amount_usdt" class="pay1_label">СУММА В USDT TRC-20</label>
                        <div class="pay1_input-group">
                            <span class="pay1_input-icon">💵</span>
                            <input type="text" id="pay1_amount_usdt" class="pay1_input" placeholder=" Сумма в USDT">
                        </div>
                        <button id="openModal2Btn" class="pay1_button">Продолжить</button>
                    </div>
                </div>
            </div>

            <div id="modal2" class="modal" style="display: none;">
                <div class="modal-content pay2_container">
                    <span id="closeModalBtn2" class="modal-close">&times;</span>
                    <h2 class="pay2_title">Шаг 2</h2>
                    <h3 class="pay2_subtitle">Пополнение баланса</h3>
                    <p class="pay2_instruction">
                        <span class="pay2_highlight">TRANSFER</span> ВЫБРАННУЮ СУММУ В USDT ПО УКАЗАННОМУ КОШЕЛЬКУ ДЛЯ ПОПОЛНЕНИЯ И ПОДТВЕРДИТЕ ПЕРЕВОД
                    </p>
                    <div class="pay2_input-group">
                        <label for="pay2_amount">СУММА В USDT TRC-20</label>
                        <div class="pay2_input-wrapper">
                            <!--<span class="pay2_input-icon-left">💵</span>-->
                            <input type="text" id="pay2_amount" value="500 USDT" readonly>
                            <!--<span class="pay2_input-icon-right">📋</span>-->
                        </div>
                    </div>
                    <div class="pay2_input-group">
                        <label for="pay2_wallet">КОШЕЛЕК ДЛЯ ПОПОЛНЕНИЯ</label>
                        <div class="pay2_input-wrapper">
                            <!--<span class="pay2_input-icon-left">💼</span>-->
                            <input type="text" id="pay2_wallet" value="CXklsm286gtr93fde95fge" readonly>
                            <button class="pay2_copy-button">📋</button>
                        </div>
                    </div><br>
                    <div class="pay2_qr-code">
                        <img src="../images/wallet/qr.gif" alt="QR-код для пополнения" style="display: none;">
                        <button class="pay2_show-qr-button">ПОКАЗАТЬ QR-КОД</button>
                    </div>
                    
                    <br><br><small>Время на оплату</small><br><br>
                    <div class="pay2_timer">
                        <img src="../images/wallet/carbon_time.png" alt="Время на оплату">
                        <span id="countdown">24:00</span>
                    </div><br>
                    <div class="pay2_warning">
                        <strong><center>IMPORTANT WARNING</center></strong><br>
                        ДАННЫЙ АДРЕС ПРЕДНАЗНАЧЕН ТОЛЬКО ДЛЯ ПЕРЕВОДОВ TETHER ПО ПРОТОКОЛУ TRC20. ПЕРЕВОДЫ СО СМАРТ-КОНТРАКТОВ, МОНЕТ TRX ИЛИ ЛЮБОЙ ДРУГОЙ КРИПТОВАЛЮТЫ ЗАЧИСЛЕНЫ НЕ БУДУТ.
                    </div>
                    <button class="pay2_cancel-button">ОТМЕНИТЬ ПЕРЕВОД СРЕДСТВ</button>
                </div>
            </div>

            <section class="balances">
                <h4>Балансы</h4>
                <div class="balance-grid">
                    <div class="balance-card">
                        <h3>ТРАСТ</h3>
                        <p class="amount"><b>316,72 USDT</b></p>
                        <p class="amount-rub">29 724,21 Р</p><br><br>
                        <img src="../images/wallet/pay.png" id="s_image"><br>
                        <button id="openModalBtn" class="btn-replenish">пополнить</button>
                    </div>
                    <div class="balance-card">
                        <h3>ПРИБЫЛИ С ПРИЁМА</h3>
                        <p class="amount"><b>431,6 USDT</b></p>
                        <p class="amount-rub">40 534,37 Р</p><br><br>
                        <img src="../images/wallet/index.png" id="s_image"><br>
                        <button class="btn-withdraw">вывод</button>
                    </div>
                    <div class="balance-card">
                        <h3>ПРИБЫЛЬ С ВЫПЛАТ</h3>
                        <p class="amount"><b>316,72 USDT</b></p>
                        <p class="amount-rub">31 724,21 Р</p><br><br>
                        <img src="../images/wallet/index.png" id="s_image"><br>
                        <button class="btn-withdraw" id="btn2">вывод</button>
                    </div>
                    <div class="balance-card">
                        <h3>РЕФЕРАЛЬНЫЙ</h3>
                        <p class="amount"><b>19,7 USDT</b></p>
                        <p class="amount-rub">2 534,37 Р</p>
                    </div>
                </div>
            </section>
            <section class="frozen-funds">
                <h4>Замороженные средства</h4>
                <div class="balance-grid">
                    <div class="balance-card">
                        <h3>ЭСКРОУ-СЧЁТ (ПРОВОДИТСЯ СДЕЛКА)</h3><br>
                        <p class="amount"><b>27,72 USDT</b></p>
                        <p class="amount-rub">2 524,11 Р</p>
                    </div>
                    <div class="balance-card">
                        <h3>СПОРНЫЕ СДЕЛКИ</h3><br>
                        <p class="amount"><b>109,72 USDT</b></p>
                        <p class="amount-rub">10 007,41 Р</p>
                    </div>
                </div>
            </section>
        </main>
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
