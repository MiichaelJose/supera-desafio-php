console.log('user');

function list_maintenance() {
    fetch('http://localhost:8000/maintenance/lista')
    .then(resp => resp.json())
    .then(data => {
        console.log(data);
    })
}

// function listUsers() {
//     fetch('http://localhost:8000/users')
//     .then(resp => resp.json())
//     .then(data => {
//         console.log(data);
//     })
// }
