const InputPassword = document.querySelector('.input-Password');
const eye = document.querySelector('.fa-eye');



eye.addEventListener('click', () => {
    if (InputPassword.type == "password") {
        InputPassword.type = "text";
    } else {
        InputPassword.type = "password";
    }
})