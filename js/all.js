const opcoesUsuario = document.querySelector(".menu-lateral-usuario"),
boxUsuario = document.querySelector(".ml-box-usuario");

opcoesUsuario.addEventListener("click", () => {
    boxUsuario.classList.toggle("ativo");
});

const inputBusca = document.getElementById("busca");
const corpoTabela = document.getElementById("tabela-corpo");

inputBusca.addEventListener("keyup", () => {
    var textoBusca = inputBusca.value.toLowerCase();
    var linhas = corpoTabela.getElementsByTagName("tr");

    for(let posicao in linhas){
        if( true === isNaN(posicao)){
            continue;
        }

        var conteudoLinha = linhas[posicao].innerHTML.toLowerCase();

        if(true === conteudoLinha.includes(textoBusca)){
            linhas[posicao].style.display = '';
        } else {
            linhas[posicao].style.display = 'none';
        }
    }
});

//              Mostrar elementos na tabela

const seletorElementos = document.querySelector(".seletor-elementos"),
boxElementos = document.querySelector(".box-elementos"),
elementosOpcao = document.querySelector(".elementos-opcoes");

const elementos = ["5","10","15","20"];

function addElementos(selectedElemento){
    seletorElementos.firstElementChild.innerText = elementos[0];
        elementosOpcao.innerHTML = "";
    elementos.forEach(elemento => {
        let selecionado = elemento == selectedElemento ? "selecionado" : "";
        let li = `<li onclick="updateElemento(this)" class="${selecionado}">${elemento}</li>`
        elementosOpcao.insertAdjacentHTML("beforeend", li);
    });
}
addElementos("5");

function updateElemento(selectedLi){
    addElementos(selectedLi.innerText);
    boxElementos.classList.remove("ativo");
    seletorElementos.firstElementChild.innerText = selectedLi.innerText;
}

seletorElementos.addEventListener("click", () => {
    boxElementos.classList.toggle("ativo");
});
