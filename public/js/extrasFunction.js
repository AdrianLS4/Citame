

// funcion para ocultar notificaciones de exito
const notification = document.getElementById('notification');
if (notification) {
    setTimeout(() => {
        notification.style.display = 'none';
    }, 2000);
}