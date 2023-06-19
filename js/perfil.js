//          Mostrando senha
const senha = document.getElementById('senha');
const iconSenha = document.querySelector('.icon-senha');

function mostrarSenha(){
    if(senha.type === 'password'){
        senha.setAttribute('type', 'text');
        iconSenha.classList.add('hide');
    }else{
        senha.setAttribute('type', 'password');
        iconSenha.classList.remove('hide');
    }
}

