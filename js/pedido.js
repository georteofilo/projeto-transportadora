//          Cadastrar Pedido

function cadastroPedido() {
    const modal = document.getElementById("pedido-cadastro");
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) =>{
        if(e.target.id == "btn-fechar-form" || e.target.id == "icon-fechar"){
            modal.classList.remove("mostrar");
        }
    });
}

const abrirCadastroPedido = document.getElementById("pedido-abrir-cadastro");

abrirCadastroPedido.addEventListener("click", () => cadastroPedido());
