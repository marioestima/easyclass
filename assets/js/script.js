const container = document.getElementById('container');

const BtnLogin = document.querySelector('#login').addEventListener('click', () => {
    container.classList.remove('active');
});
const BtnRegister = document.querySelector('#register').addEventListener('click', () => {
    container.classList.add('active');
});

