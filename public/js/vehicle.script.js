const form_get_vehicle = document.querySelector('.get-vehicle');
const form_put_vehicle = document.querySelector('.put-vehicle');
const form_post_vehicle = document.querySelector('.post-vehicle')
const form_delete_vehicle = document.querySelector('.delete-vehicle');

function list_users() {
    const select = document.querySelector('#select-users');
    fetch('http://localhost:8000/user/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            let option = document.createElement('option');

            option.innerHTML = e.name + ", " + e.cpf;
            option.setAttribute('value', e.id);

            select.appendChild(option);
        });
    })
}

function list_users_put() {
    const select = document.querySelector('#select-users-put');
    fetch('http://localhost:8000/user/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            let option = document.createElement('option');

            option.innerHTML = e.name + ", " + e.cpf;
            option.setAttribute('value', e.id);

            select.appendChild(option);
        });
    })
}

function list_vehicles() {

    form_delete_vehicle.style.display = 'none';


    form_put_vehicle.style.display = 'none';


    form_get_vehicle.style.display = 'flex';

    form_get_vehicle.innerHTML = "";

    fetch('http://localhost:8000/vehicle/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            create_card(e);
        });
    })
}

function create_card(data) {

    const card = document.querySelector('.vehicle').cloneNode(true);

    const buttonAlt = card.querySelectorAll('button')[0];
    const buttonDele = card.querySelectorAll('button')[1];

    card.style.display = 'flex'

    const p = card.querySelectorAll('p');

    card.querySelector('.buttons').style.display = 'flex';

    buttonDele.setAttribute('id', data.id);
    buttonAlt.setAttribute('id', data.id);

    buttonDele.addEventListener('click', (btn) => {
        modal_delete_vehicle(btn.target, btn.target.getAttribute('id'));
    });

    buttonAlt.addEventListener('click', (btn) => {
        modal_put_vehicle(btn.target, btn.target.getAttribute('id'));
    });
  
    p[0].innerHTML = data.vehicle;
    p[1].innerHTML = data.brand;
    p[2].innerHTML = data.model;
    p[3].innerHTML = data.version;

    p[4].innerHTML = data.user_id.name;
    p[5].innerHTML = data.user_id.cpf;

    form_get_vehicle.appendChild(card);
}

function modal_delete_vehicle(button, id) {
    const form_get_vehicle = document.querySelector('.get-vehicle');
    form_get_vehicle.style.display = 'none';
    form_delete_vehicle.style.display = 'flex';
    const area_card_delete = form_delete_vehicle.querySelector('.card-delete');
    area_card_delete.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_delete.appendChild(card);
    form_delete_vehicle.setAttribute('action', 'http://127.0.0.1:8000/maintenance/deletar/' +  id);
}

function modal_put_vehicle(button, id) {
    const form_get_vehicle = document.querySelector('.get-vehicle');
    form_get_vehicle.style.display = 'none';
    form_put_vehicle.style.display = 'flex';
    const area_card_put = form_put_vehicle.querySelector('.card-put');
    area_card_put.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_put.appendChild(card);
    list_users_put()
    form_put_vehicle.setAttribute('action', 'http://127.0.0.1:8000/maintenance/alterar/' +  id);
}

function modal_list_users() {
    form_post_vehicle.style.display = 'none';
    form_put_vehicle.style.display = 'none';

    list_vehicles();
}

list_users();