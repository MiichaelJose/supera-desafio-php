const form_get_maintenance = document.querySelector('.get-maintenance');
const form_put_maintenance = document.querySelector('.put-maintenance');
const form_post_maintenance = document.querySelector('.post-maintenance')
const form_delete_maintenance = document.querySelector('.delete-maintenance');

function list_vehicle() {
    const select = document.querySelector('#select-vehicles');
    fetch('http://localhost:8000/vehicle/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            let option = document.createElement('option');

            option.innerHTML = e.vehicle + ", " + e.user_id.name;
            option.setAttribute('value', e.id);

            select.appendChild(option);
        });
    })
}

function list_vehicle_put() {
    const select = document.querySelector('#select-vehicles-put');
    fetch('http://localhost:8000/vehicle/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            let option = document.createElement('option');

            option.innerHTML = e.vehicle + ", " + e.user_id.name;
            option.setAttribute('value', e.id);

            select.appendChild(option);
        });
    })
}

function list_maintenance() {
    form_delete_maintenance.style.display = 'none';
    form_put_maintenance.style.display = 'none';
    form_get_maintenance.style.display = 'flex';
    form_get_maintenance.innerHTML = "";

    fetch('http://localhost:8000/maintenance/lista')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            create_card(e);
        });
    })
}


function create_card(data) {
    const card = document.querySelector('.maintenance').cloneNode(true);

    const buttonAlt = card.querySelectorAll('button')[0];
    const buttonDele = card.querySelectorAll('button')[1];

    card.style.display = 'flex'

    const p = card.querySelectorAll('p');

    card.querySelector('.buttons').style.display = 'flex';

    buttonDele.setAttribute('id', data.id);
    buttonAlt.setAttribute('id', data.id);

    buttonDele.addEventListener('click', (btn) => {
        modal_delete_maintenance(btn.target, btn.target.getAttribute('id'));
    });

    buttonAlt.addEventListener('click', (btn) => {
        modal_put_maintenance(btn.target, btn.target.getAttribute('id'));
    });
  
    p[0].innerHTML = data.vehicle_id.model;
    p[1].innerHTML = data.vehicle_id.brand;
    p[2].innerHTML = data.vehicle_id.version;

    p[4].innerHTML = "gerada: " + data.registration_date;
    p[5].innerHTML = "analise: " + data.analysis_date;
    p[6].innerHTML = "iniciada: " + data.start_date;
    p[7].innerHTML = "finalizada: " + data.final_date;

    form_get_maintenance.appendChild(card);
}


function modal_list_vehicle() {
    form_post_maintenance.style.display = 'none';
    form_put_maintenance.style.display = 'none';

    list_maintenance();
}

function modal_delete_maintenance(button, id) {
    const form_get_maintenance = document.querySelector('.get-maintenance');
    form_get_maintenance.style.display = 'none';
    form_delete_maintenance.style.display = 'flex';
    const area_card_delete = form_delete_maintenance.querySelector('.card-delete');
    area_card_delete.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_delete.appendChild(card);
    form_delete_maintenance.setAttribute('action', 'http://127.0.0.1:8000/maintenance/deletar/' +  id);
}

function modal_put_maintenance(button, id) {
    const form_get_maintenance = document.querySelector('.get-maintenance');
    form_get_maintenance.style.display = 'none';
    form_put_maintenance.style.display = 'flex';
    const area_card_put = form_put_maintenance.querySelector('.card-put');
    area_card_put.innerHTML = "";
    const card = button.parentNode.parentNode.parentNode;
    card.querySelector('.buttons').style.display = 'none';
    area_card_put.appendChild(card);
    list_vehicle_put();
    form_put_maintenance.setAttribute('action', 'http://127.0.0.1:8000/maintenance/alterar/' +  id);
}

list_vehicle()