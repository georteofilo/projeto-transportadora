function cadastroCliente() {
    const modal = document.getElementById("cliente-cadastro");
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) =>{
        if(e.target.id == "btn-fechar-form" || e.target.id == "icon-fechar"){
            modal.classList.remove("mostrar");
        }
    });
}

const abrirCadastroCliente = document.getElementById("clientes-abrir-cadastro");

abrirCadastroCliente.addEventListener("click", () => cadastroCliente());