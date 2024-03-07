import './bootstrap';
import { Toast } from 'bootstrap';

window.Toast = Toast;

document.addEventListener("DOMContentLoaded", function(){
    const element = document.getElementById("toastNotification");

    if (element) {
        const toastNotification = new Toast(element);
        toastNotification.show();
    }
});