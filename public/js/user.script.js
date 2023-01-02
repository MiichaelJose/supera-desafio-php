const form_get_user = document.querySelector('.get-user');
const form_put_user = document.querySelector('.put-user');
const form_post_user = document.querySelector('.post-user')
const form_delete_user = document.querySelector('.delete-user');


function modalListUsers() {
    form_post_user.style.display = 'none';
    form_put_user.style.display = 'none';
    list();
}

function list() {
    console.log('entrou');
    form_delete_user.style.display = 'none';

    form_put_user.style.display = 'none';

    form_get_user.style.display = 'flex';

    //form_get_user.innerHTML = "";

    fetch('http://localhost:8000/users')
    .then(resp => resp.json())
    .then(content => {
        console.log(content);
        content.data.forEach(e => {
            
            createCard(e);
        });
    })
}

function createCard(data) {

    const card = document.querySelector('.user').cloneNode(true);

    console.log(card);
    const buttonAlt = card.querySelectorAll('button')[0];
    const buttonDele = card.querySelectorAll('button')[1];

    card.style.display = 'flex'

    const p = card.querySelectorAll('p');

    card.querySelector('.buttons').style.display = 'flex';

    buttonDele.setAttribute('id', data.id);
    buttonAlt.setAttribute('id', data.id);

    buttonDele.addEventListener('click', (btn) => {
        modal_delete_user(btn.target, btn.target.getAttribute('id'));
    });

    buttonAlt.addEventListener('click', (btn) => {
        modal_put_user(btn.target, btn.target.getAttribute('id'));
    })
  
    p[0].innerHTML = data.name;
    p[1].innerHTML = data.cpf;
    
    form_get_user.appendChild(card);
}

function modal_delete_user(button, id) {
    const form_get_user = document.querySelector('.get-user');
    form_get_user.style.display = 'none';
    form_delete_user.style.display = 'flex';
    const area_card_delete = form_delete_user.querySelector('.card-delete');
    area_card_delete.innerHTML = "";
    const card = button.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_delete.appendChild(card);
    form_delete_user.setAttribute('action', 'http://127.0.0.1:8000/user/' +  id);
}

function modal_put_user(button, id) {
    const form_get_maintenance = document.querySelector('.get-maintenance');
    form_get_maintenance.style.display = 'none';
    form_put_maintenance.style.display = 'flex';
    const area_card_put = form_put_maintenance.querySelector('.card-put');
    area_card_put.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_put.appendChild(card);
    form_put_maintenance.setAttribute('action', 'http://127.0.0.1:8000/user/' +  id);
}