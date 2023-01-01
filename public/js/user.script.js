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
    // const buttonAlt = card.querySelectorAll('button')[0];
    // const buttonDele = card.querySelectorAll('button')[1];

    card.style.display = 'flex'

    const p = card.querySelectorAll('p');

    // card.querySelector('.buttons').style.display = 'flex';

    // buttonDele.setAttribute('id', data.id);
    // buttonAlt.setAttribute('id', data.id);

    // buttonDele.addEventListener('click', (btn) => {
    //     modal_delete_maintenance(btn.target, btn.target.getAttribute('id'));
    // });

    // buttonAlt.addEventListener('click', (btn) => {
    //     modalPutMaintenance(btn.target, btn.target.getAttribute('id'));
    // })
  
    p[0].innerHTML = data.name;
    p[1].innerHTML = data.cpf;
    // p[2].innerHTML = data.vehicle_id.version;

    // p[4].innerHTML = "gerada: " + data.registration_date;
    // p[5].innerHTML = "analise: " + data.analysis_date;
    // p[6].innerHTML = "iniciada: " + data.start_date;
    // p[7].innerHTML = "finalizada: " + data.final_date;

    form_get_user.appendChild(card);
}