<?php 
    // messages/index.php
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
     
    
   <link rel="stylesheet" href="../style.css">
   <title>Сообщения</title>
</head>
<body>
   <div class="container_messages">
       <div class="header">
            <?php require '../header.php'; ?>
       </div>
       <br><div class="title"><img src="../images/messages/8.png" height="25px" id="s_image">&nbsp;Сообщения</div>
       <main>
           <div class="search-bar">
               <input type="text" placeholder="Искать сообщения">
               <i class="fas fa-search"></i>
           </div>
           <div class="advanced-search">
               <button id="openSearchModal">Расширенный <i class="fas fa-chevron-down"></i></button>
               <button>Сначала новые <i class="fas fa-sort"></i></button>
           </div>
           <div class="messages">
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 9912р от Николай Б</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 1134р от Кристина М</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 831р от Артём К</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 612р от Николай Б</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 518р от Николай Б</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <div class="message">
                   <div class="message-icon">
                       <i class="fas fa-comment-dots"></i>
                   </div>
                   <img src="../images/messages/10.png" style="margin: 21px;">
                   <div class="message-info">
                       <div class="message-title">900</div>
                       <div class="message-details">MIR-6182 20:13 перевод 1578р от Николай Б</div>
                       <div class="message-time"><br>Сегодня в 20:24</div>
                   </div>
               </div>
               <!-- остальные сообщения -->
           </div>
       </main>
       <div class="br-post-devices">&nbsp;</div>
       <div class="footer">
           <a href="../accounts/index.php"><img src="../images/icon1.png" alt="icon"></a>
           <a href="../wallet/index.php"><img src="../images/icon2.png" alt="icon"></a>
           <a href="../devices/index.php"><img src="../images/icon3.png" alt="icon"></a>
           <a href="../disputes/index.php"><img src="../images/icon4.png" alt="icon"></a>
           <a href="index.php"><img src="../images/icon5.png" alt="icon"></a>
       </div>
   </div>

   <!-- Модальное окно -->
   <div class="search_overlay" id="searchModal" style="display: none;">
       <div class="search_modal">
           <div class="search_filter-container">
               <select>
                   <option value="all">Все типы</option>
                   <option value="type1" style="font-size: 25px;">Тип 1</option>
                   <option value="type2" style="font-size: 25px;">Тип 2</option>
               </select>
               <select>
                   <option value="all">Все устройства</option>
                   <option value="device1" style="font-size: 25px;">Устройство 1</option>
                   <option value="device2" style="font-size: 25px;">Устройство 2</option>
               </select>
               <select>
                   <option value="all">Все реквизиты</option>
                   <option value="req1" style="font-size: 25px;">Реквизит 1</option>
                   <option value="req2" style="font-size: 25px;">Реквизит 2</option>
               </select>
                <div class="search_date-inputs">
                <input type="text" placeholder="От">
                    <input type="text" placeholder="До">
                </div>
               <button id ='accept_filters'>Применить фильтры</button>
           </div>
       </div>
   </div>

   <script src="../script.js"></script>
</body>
</html>