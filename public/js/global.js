function info() {
    const profile =  document.querySelector('.profile')
    const name = profile.querySelectorAll('p')[1];
    const admin_users = document.querySelector('.admin-users')
    const admin_maintenance = document.querySelector('.admin-maintenance')

    if(localStorage.name == undefined) {
        localStorage.setItem('name', name.innerText);
    }

    const li =  document.createElement('li');
    const a_clientes = document.createElement('a');

    const a_maintenance = document.createElement('a')
    
    a_clientes.innerHTML = 'clientes';
    a_maintenance.innerHTML = 'cadastrar manutenções';
    a_maintenance.href = 'maintenance-view'

    li.appendChild(a_clientes);
    
    if(window.location.href.toString().includes('home')) {
        if(admin_users.innerText != '') {
            localStorage.setItem('role', 'admin');
        }else {
            if(localStorage.getItem('role') == 'admin') {
                admin_users.appendChild(li);
                admin_maintenance.appendChild(a_maintenance);
            }else {
                localStorage.setItem('role', 'user');
            }
        }
    }else {
        console.log('maintencance');
    }
        
    name.innerHTML = localStorage.name;
}
