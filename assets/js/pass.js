const inputPass = document.querySelector('.input-pass');
const checkPass = document.querySelector('.check-pass');

checkPass.addEventListener('change', () => {
    if (checkPass.checked) {
        inputPass.type = 'text';
    }else {
        inputPass.type = 'password';
    }
});