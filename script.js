document.addEventListener('DOMContentLoaded', () => {

    // Функция для открытия и закрытия модальных окон
    function toggleModal(modalId, displayStyle) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = displayStyle;
        }
    }

    // Обработчики для модального окна оплаты №1
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    if (openModalBtn && closeModalBtn) {
        openModalBtn.addEventListener('click', () => toggleModal('modal', 'flex'));
        closeModalBtn.addEventListener('click', () => toggleModal('modal', 'none'));
        window.addEventListener('click', (event) => {
            if (event.target === document.getElementById('modal')) {
                toggleModal('modal', 'none');
            }
        });
    }

    // Обработчики для модального окна оплаты №2
    const openModal2Btn = document.getElementById('openModal2Btn');
    const closeModalBtn2 = document.getElementById('closeModalBtn2');

    if (openModal2Btn && closeModalBtn2) {
        openModal2Btn.addEventListener('click', () => {
            toggleModal('modal', 'none');
            toggleModal('modal2', 'flex');
        });
        closeModalBtn2.addEventListener('click', () => toggleModal('modal2', 'none'));
        window.addEventListener('click', (event) => {
            if (event.target === document.getElementById('modal2')) {
                toggleModal('modal2', 'none');
            }
        });
    }

    // Обработчик для кнопки вывода
    const redirectButton = document.querySelector('.btn-withdraw');
    if (redirectButton) {
        redirectButton.addEventListener('click', () => {
            window.location.href = '/wallet/widthraw.php';
        });
    }

    const redirectButton2 = document.querySelector('#btn2');
    if (redirectButton2) {
        redirectButton2.addEventListener('click', () => {
            window.location.href = '/wallet/widthraw.php';
        });
    }

    // Функция для добавления устройства
    window.addDevice = function addDevice() {
        const deviceName = document.getElementById('device-name').value.trim();
        const simNumber = document.getElementById('sim-number').value.trim();
        const model = document.getElementById('model').value.trim();

        const messageElement = document.getElementById('message');

        if (!deviceName || !simNumber || !model) {
            messageElement.innerHTML = '<p style="font-weight: bold; color: red; background-color:white;">Ошибка: Все поля должны быть заполнены.</p>';
        } else {
            // Здесь можно добавить код для отправки данных на сервер или выполнения других действий
            console.log('Название устройства:', deviceName);
            console.log('Номер SIM:', simNumber);
            console.log('Модель:', model);

            // Очищаем поля ввода после добавления устройства
            document.getElementById('device-name').value = '';
            document.getElementById('sim-number').value = '';
            document.getElementById('model').value = '';

            // Выводим сообщение об успешном добавлении устройства
            messageElement.innerHTML = '<p style="font-weight: bold; color: green; background-color:white;">Устройство успешно добавлено.</p>';
        }
    }

    // Обработчики для модального окна поиска в messages/index.php
    const openSearchModalBtn = document.getElementById('openSearchModal');
    const searchModal = document.getElementById('searchModal');
    const acceptFiltersBtn = document.getElementById('accept_filters');

    if (openSearchModalBtn && searchModal && acceptFiltersBtn) {
        openSearchModalBtn.addEventListener('click', () => {
            searchModal.style.display = 'flex';
        });

        window.addEventListener('click', (event) => {
            if (event.target === searchModal || event.target === acceptFiltersBtn) {
                searchModal.style.display = 'none';
            }
        });
    }

    // Функция для обновления курса из API
    function updateExchangeRate() {
        fetch('api.php/wallet')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data && data.length > 0) {
                    document.getElementById('usdt-value').textContent = `${data[0].balance} RUB`;
                }
            })
            .catch(error => console.error('Error fetching wallet data:', error));
    }
    updateExchangeRate();

    // Обработчик для отмены заявки
    const cancelButton = document.querySelector('.pay2_cancel-button');
    if (cancelButton) {
        cancelButton.addEventListener('click', () => {
            alert('Отменено');
        });
    }

    // Обработчик для копирования адреса кошелька
    const copyButton = document.querySelector('.pay2_copy-button');
    const walletInput = document.getElementById('pay2_wallet');

    if (copyButton && walletInput) {
        copyButton.addEventListener('click', () => {
            walletInput.select();
            walletInput.setSelectionRange(0, 99999); // Для мобильных устройств
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            alert('Адрес кошелька скопирован: ' + walletInput.value);
        });
    }

    // Обработчик для показа QR-кода
    const showQrButton = document.querySelector('.pay2_show-qr-button');
    const qrCodeImage = document.querySelector('.pay2_qr-code img');

    if (showQrButton && qrCodeImage) {
        showQrButton.addEventListener('click', () => {
            qrCodeImage.style.display = 'block';
            showQrButton.style.display = 'none';
        });
    }

    // Обратный отсчет
    const countdownElement = document.getElementById('countdown');
    if (countdownElement) {
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
    }

    // wallet/withdraw.php
    
    /* Очистка лишних символов в полях ввода */
    // Получаем ссылки на поля ввода
    const amountUsdtInput = document.getElementById('amount_usdt');
    const amountRubInput = document.getElementById('amount_rub');

    // Функция для проверки и очистки полей ввода
    function cleanInputFields() {
    // Регулярное выражение для проверки наличия нецифровых символов
    const nonDigitRegex = /\D/;

    // Проверяем поле amount_usdt
    if (nonDigitRegex.test(amountUsdtInput.value)) {
        amountUsdtInput.value = ''; // Очищаем поле, если есть нецифровые символы
    }

    // Проверяем поле amount_rub
    if (nonDigitRegex.test(amountRubInput.value)) {
        amountRubInput.value = ''; // Очищаем поле, если есть нецифровые символы
    }
    }

    // Запускаем проверку и очистку полей каждую секунду
    setInterval(cleanInputFields, 1000);

    /* Обработчик кнопки "Вывести средсва" */
    // Получаем ссылку на кнопку
    const withdrawButton = document.querySelector('.withdraw_button');

    // Добавляем обработчик события 'click'
    withdrawButton.addEventListener('click', function() {
    // Получаем значения полей ввода
    const amountUsdt = document.getElementById('amount_usdt').value;
    const amountRub = document.getElementById('amount_rub').value;

    // Проверяем, что поля не пустые
    if (amountUsdt && amountRub) {
        // Выполняем необходимые действия с введенными значениями
        console.log('Сумма в USDT:', amountUsdt);
        console.log('Сумма в рублях:', amountRub);

        // Дополнительные действия, например, отправка данных на сервер или открытие модального окна
    } else {
        // Выводим сообщение об ошибке, если поля пустые
        alert('Пожалуйста, введите сумму для вывода.');
    }
    });
});
