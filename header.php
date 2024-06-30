<?php
if (isset($_COOKIE['uid']))
{
    echo '<div class="usdt" style="text-align: left;"><img src="../images/uid.png" id="y_image">&nbsp;'.$_COOKIE['uid'].'</div>';
}
else
{
    echo "<center><p style='color: white;'><text style='color: yellow;'>Отправлены неизвестные данные авторизации.</text><br>Зайдите на платформу через официальный бот ↙️</p><a href='https://t.me/Time2PayBot'><button class=\"withdraw_button\" style=\"font-size: 13px;\">Открыть бот</button></a></center>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <header>
    </header>
</body>
</html>


<div class="usdt"><img src="../images/usdt.png" id="y_image">&nbsp;USDT = <span id="usdt-value">ЗАГРУЗКА</span></div>