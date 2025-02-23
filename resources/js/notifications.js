function showNotification(message, duration = 3000) {
    // Находим элемент уведомления
    const toastElement = document.getElementById('liveToast');

    // Находим элементы для времени и текста уведомления
    const timeElement = toastElement.querySelector('.toast-header small');
    const messageElement = toastElement.querySelector('.toast-body');

    // Устанавливаем текущее время
    const now = new Date();
    const timeString = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    timeElement.textContent = timeString;

    // Устанавливаем кастомный текст
    messageElement.textContent = message;

    // Показываем уведомление
    toastElement.classList.remove('hide');
    toastElement.classList.add('show');

    // Скрываем уведомление через указанное время
    setTimeout(() => {
        toastElement.classList.remove('show');
        toastElement.classList.add('hide');
    }, duration);
}

window.showNotification = showNotification;
