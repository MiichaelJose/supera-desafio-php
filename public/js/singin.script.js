const btn_content = document.querySelector('#btn-content');
const btn_singin = document.querySelector('#btn-login');

btn_content.addEventListener('click', () => content());
btn_singin.addEventListener('click', () => singin());

function content() {
    const singin = document.querySelector('.box-singin');
    const content = document.querySelector('.box-content');

    singin.style.display = 'flex';
    content.style.display = 'none';
}

function singin() {
    localStorage.clear();
}