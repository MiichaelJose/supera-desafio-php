const content = document.querySelector('.content__boxs');

function list_maintenance() {
    content.innerHTML = "";

    fetch('http://localhost:8000/maintenance/data')
    .then(resp => resp.json())
    .then(content => {
        content.data.forEach(e => {
            create_card(e);
        });
    })
}

function create_card(data) {
    const card = document.querySelector('.maintenance').cloneNode(true);

    card.style.display = 'flex'

    const p = card.querySelectorAll('p');
  
    p[0].innerHTML = data.vehicle_id.model;
    p[1].innerHTML = data.vehicle_id.brand;
    p[2].innerHTML = data.vehicle_id.version;

    p[4].innerHTML = "gerada: " + data.registration_date;
    p[5].innerHTML = "analise: " + data.analysis_date;
    p[6].innerHTML = "iniciada: " + data.start_date;
    p[7].innerHTML = "finalizada: " + data.final_date;

    content.appendChild(card);
}

list_maintenance()