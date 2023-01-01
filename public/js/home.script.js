console.log('user');

function listMaintenance() {
    fetch('http://localhost:8000/maintenance')
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
