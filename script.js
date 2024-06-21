// Модальное окно оплаты №1
document.getElementById('openModalBtn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'flex';
});

document.getElementById('closeModalBtn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
    }
});

// Модальное окно оплаты №2
document.getElementById('openModal2Btn').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('modal2').style.display = 'flex';
});

document.getElementById('closeModalBtn2').addEventListener('click', function() {
    document.getElementById('modal2').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('modal2')) {
        document.getElementById('modal2').style.display = 'none';
    }
});


// Кнопка вывода
// Получаем ссылку на кнопку
const redirectButton = document.querySelector('.btn-withdraw');

// Добавляем обработчик события 'click'
redirectButton.addEventListener('click', function() {
  // Перенаправляем на новую страницу
  window.location.href = '/wallet/widthraw.html';
});
const redirectButton2 = document.querySelector('#btn2');

// Добавляем обработчик события 'click'
redirectButton2.addEventListener('click', function() {
  // Перенаправляем на новую страницу
  window.location.href = '/wallet/widthraw.html';
});


document.addEventListener('DOMContentLoaded', () => {
    // Отменить заявку
    const cancelButton = document.querySelector('.pay2_cancel-button');
    const showQrButton = document.querySelector('.pay2_show-qr-button');
    const qrCodeImage = document.querySelector('.pay2_qr-code img');

    cancelButton.addEventListener('click', () => {
        alert('Отменено');
    });

    // Скопировать адрес кошелька
    const copyButton = document.querySelector('.pay2_copy-button');
    const walletInput = document.getElementById('pay2_wallet');

    copyButton.addEventListener('click', () => {
        // Выделить текст
        walletInput.select();
        walletInput.setSelectionRange(0, 99999); // Для мобильных устройств

        // Копировать текст в буфер обмена
        document.execCommand('copy');

        // Снять выделение
        window.getSelection().removeAllRanges();

        // Оповещение пользователя
        alert('Адрес кошелька скопирован: ' + walletInput.value);
    });

    // Показать QR-код
    showQrButton.addEventListener('click', () => {
        qrCodeImage.style.display = 'block';
        showQrButton.style.display = 'none';
    });

    // Обратный отсчёт
    const countdownElement = document.getElementById('countdown');
    let timeLeft = 24 * 60; // 24 минуты в секундах

    function updateCountdown() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        if (timeLeft > 0) {
            timeLeft--;
        } else {
            clearInterval(countdownInterval);
            countdownElement.textContent = 'Время истекло';
        }
    }

    const countdownInterval = setInterval(updateCountdown, 1000);
});