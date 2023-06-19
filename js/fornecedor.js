function cadastroFornecedor() {
    const modal = document.getElementById("fornecedor-cadastro");
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) =>{
        if(e.target.id == "btn-fechar-form" || e.target.id == "icon-fechar"){
            modal.classList.remove("mostrar");
        }
    });
}

const abrirCadastroFornecedor = document.getElementById("fornecedor-abrir-cadastro");

abrirCadastroFornecedor.addEventListener("click", () => cadastroFornecedor());
