const form_get = document.querySelector('.get-user');
const form_put = document.querySelector('.put-user');
const form_post = document.querySelector('.post-user')
const form_delete = document.querySelector('.delete-user');


function modal_list_users() {
    form_post.style.display = 'none';
    form_put.style.display = 'none';

    list_users();
}

function list_users() {
    form_delete.style.display = 'none';
    form_put.style.display = 'none';
    form_get.style.display = 'flex';

    fetch('http://localhost:8000/user/lista')
    .then(resp => resp.json())
    .then(content => {
        console.log(content);
        content.data.forEach(e => {
            create_card(e);
        });
    })
}

function create_card(data) {
    const card = document.querySelector('.user').cloneNode(true);

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
    
    form_get.appendChild(card);
}

function modal_delete_user(button, id) {
    const form_get = document.querySelector('.get-user');
    form_get.style.display = 'none';
    form_delete.style.display = 'flex';
    const area_card_delete = form_delete.querySelector('.card-delete');
    area_card_delete.innerHTML = "";
    const card = button.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_delete.appendChild(card);
    form_delete.setAttribute('action', 'http://127.0.0.1:8000/user/deletar/' +  id);
}

function modal_put_user(button, id) {
    const form_get = document.querySelector('.get-user');
    form_get.style.display = 'none';
    form_put.style.display = 'flex';
    const area_card_put = form_put.querySelector('.card-put');
    area_card_put.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_put.appendChild(card);
    form_put.setAttribute('action', 'http://127.0.0.1:8000/user/alterar/' +  id);
}