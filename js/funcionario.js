//          Cadastrar Funcionário
function cadastroFuncionario() {
    const modal = document.getElementById("funcionario-cadastro");
    modal.classList.add("mostrar");
    modal.addEventListener("click", (e) =>{
        if(e.target.id == "btn-fechar-form" || e.target.id == "icon-fechar"){
            modal.classList.remove("mostrar");
        }
    });
}

const abrirCadastroFuncionario = document.getElementById("funcionario-abrir-cadastro");

abrirCadastroFuncionario.addEventListener("click", () => cadastroFuncionario());


//              Selecao de fotos
function fotoSelecionada(){
    const adicionarfoto = document.querySelector(".text-foto");
    adicionarfoto.classList.add("foto-selecionada");
}


document.querySelector("#foto").addEventListener("change", function (){
    document.querySelector(".text-foto").textContent = this.files[0].name;
    fotoSelecionada();
});