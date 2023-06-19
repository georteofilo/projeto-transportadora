<?PHP
    session_start();
    include('../config/conexao.php');
    include('../model/funcionario.php');
    include('../model/cliente.php');
    include('../model/fornecedor.php');
    include('../model/pedido.php');
    include('../model/agregado.php');

    $user = new Funcionario();

    if(!$user->ativarSessao()){
        header("location:../");
    }
    if(isset($_GET['sair'])){
        $user->fazerLogout();
        header("location:../");
    }

    $clientes = new Cliente();
    $mostrar_clientes = $clientes->mostrarCliente($pdo);
    $clienteEscolhido = new Cliente();

    $fornecedores = new Fornecedor();
    $mostrar_fornecedores = $fornecedores->mostrarFornecedor($pdo);
    $fornecedorEscolhido = new Fornecedor();

    $pedidos = new Pedido();
    $mostrar_pedidos = $pedidos->mostrarPedido($pdo);

    if(!empty($_REQUEST['cadastrarPedido'])){
        extract($_REQUEST);

        $idCliente = $_POST['lista-cliente'];
        $idFornecedor = $_POST['lista-fornecedor'];


        $user = new Pedido($_POST);
        $user->cadastrarPedido($pdo, $idFornecedor, $idCliente);

        if($user){
            echo "
            <script>
                alert('Pedido cadastrado com sucesso!');
                window.location.href = 'pedidos.php';
            </script>
            ";
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assents/img/favicon.svg" type="image/x-icon">

    <script src="../js/pedido.js" defer></script>
    <script src="../js/all.js" defer></script>

    <title>Pedidos</title>
</head>
<body>
    <div class="container-inicial">
        <aside class="menu-lateral">
           <div class="menu-lateral-logo">
                <img src="../assents/img/logo.jpg" alt="logo da empresa">
           </div>
            <div class="menu-lateral-usuario">
                <span class="ml-usuario-nome">
                    <?php
                        echo $_SESSION['nome'];
                    ?>
                </span>
                <div class="ml-usuario-foto">
                    <?php echo "<img src='../assents/fotos/funcionarios/".$_SESSION['fotoNome']."'>"?> 
                </div>
                <div class="ml-box-usuario">
                    <a class="perfil" href="perfil.php">
                        <img src="../assents/img/icon-perfil.svg">
                        <span>Perfil</span>
                    </a>
                    <a class="logout" href="funcionarios.php?sair">
                        <img src="../assents/img/icon-logout.svg">
                        <span>Sair</span>
                    </a>
                </div>
            </div>
            <nav class="menu-lateral-nav">
                <ul>
                   <li class="mlv-elemento"><a href="inicio.php">Início</a></li>
                   <li class="mlv-elemento"><a href="funcionarios.php">Funcionários</a></li>
                   <li class="mlv-elemento"><a href="agregados.php">Agregados</a></li>
                   <li class="mlv-elemento"><a href="fornecedores.php">Fornecedores</a></li>
                   <li class="mlv-elemento"><a href="clientes.php">Clientes</a></li>
                   <li class="mlv-elemento selecao"><a href="pedidos.php">Pedidos</a></li>
                </ul>
            </nav>
        </aside>
    </div>
    <main class="principal-pedidos">
        <header class="header-pedidos">
            <div class="mostrador-elementos">
                <span>Mostrar</span>
                <div class="seletor-elementos">
                    <span></span>
                    <img src="../assents/img/setas.svg">
                </div>
                <div class="box-elementos">
                        <ul class="elementos-opcoes">
                        </ul>
                    </div>
                <span>Pedidos</span>
            </div>
            <div class="buscador">
                <label for="busca">Buscar</label>
                <div class="barra-buscar">
                    <input type="search" name="busca" id="busca">
                    <div class="btn-buscar">
                        <img  src="../assents/img/icon-buscar.svg">
                    </div>
                </div>
            </div>
            <div class="pedido-btn-cadastrar" id="pedido-abrir-cadastro">
                <img src="../assents/img/icon-add-pedidos.svg" alt="">
                <span>Cadastrar</span>
            </div>
            <div id="pedido-cadastro" class="pedido-cadastro">
                <div class="box-cadastro-pedido">
                    <button class="btn-fechar-form" id="btn-fechar-form">
                        <img id="icon-fechar" src="../assents/img/icon-fechar.svg" alt="">
                    </button>
                    <h2 class="cadastro-header">Cadastrar Pedido</h2>
                    <form method="post" class="form-pedido"  enctype="multipart/form-data">
                        <h3>Pedido</h3>
                        <div class="campos">
                            <div class="form-valor">
                                <label for="valor">Valor:</label>
                                <input type="text" name="valor">
                            </div>
                            <div class="form-gasto">
                                <label for="gastos">Gastos:</label>
                                <input type="text" name="gastos">
                            </div>
                            <div class="form-produtos">
                                <label for="Produtos">Produtos:</label>
                                <textarea name="produtos"></textarea>
                            </div>
                            <div class="form-cliente">
                                <label for="cliente">Cliente:</label>
                                <select id="cliente" name="lista-cliente">
                                    <?php
                                        foreach($mostrar_clientes as $cliente){
                                            echo "
                                                <option value='".$cliente['idCliente']."'>".$cliente['nome']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-fornecedor">
                                <label for="fornecedor">Fornecedor:</label>
                                <select id="fornecedor" name="lista-fornecedor">
                                    <?php
                                        foreach($mostrar_fornecedores as $fornecedor){
                                            echo "
                                                <option value='".$fornecedor['idFornecedor']."'>".$fornecedor['nome']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class='btns-form-pedidos'>
                                <input id="btn-cadastrar" class="btn-cadastrar-pedidos" type="submit" value="Cadastrar" name="cadastrarPedido">
                                <input class="btn-limpar-pedidos" type="reset" value="Limpar">
                            </div>       
                        </div>   
                    </form>
                </div>
            </div>
        </header>
        <section class="tabela-pedidos">
                <h2>Pedidos Cadastrados</h2>
                <table class="tabela">
                    <thead>
                        <tr>
                            <td>Pedido</td>
                            <td>Fornecedor</td>
                            <td>Cliente</td>
                            <td>Data Pedido</td>
                            <td>Valor</td>
                            <td>Gastos</td>
                            <td>Produtos</td>
                            <td>Data  de Entrega</td>
                            <td>Agregado</td>
                            <td>Entrega</td>
                            <td>Editar</td>
                            <td>Deletar</td>            
                        </tr>
                    </thead>
                    <tbody id="tabela-corpo">
                        <?php
                            foreach($mostrar_pedidos as $linha){

                                $clientePesquisado = Cliente::pesquisarCliente($pdo, $linha['idCliente']);

                                $fornecedorPesquisado = Fornecedor::pesquisarFornecedor($pdo, $linha['idFornecedor']);


                                echo "
                                    <tr>
                                        <td>".$linha['idPedido']."</td>
                                        <td>".$fornecedorPesquisado['nome']."</td>
                                        <td>".$clientePesquisado['nome']."</td>
                                        <td>".$linha['dataPedido']."</td>
                                        <td>".$linha['valor']."</td>
                                        <td>".$linha['gastos']."</td>
                                        <td>".$linha['produtos']."</td>
                                        <td>".$linha['dataEntrega']."</td>
                                    ";
                                if($linha['idAgregado'] != NULL){
                                    $agregadoPesquisado = Agregado::pesquisarAgregado($pdo,$linha['idAgregado']);
                                    echo "<td>".$agregadoPesquisado['nome']."</td>";
                                }else{
                                    echo "<td></td>";
                                };     
                                if($linha['entrega'] == 0){
                                    echo "
                                        <td><div class='entrega false'></div>
                                            <span>Não Entregue</span>
                                        </td>
                                    ";
                                }else{
                                    echo "
                                        <td><div class='entrega true'></div>
                                            <span>Entregue</span>
                                        </td>
                                    ";
                                }


                                echo
                                    "<td>
                                            <div class='btn-editar-pedidos'>
                                                <a href='#')>
                                                    <img src='../assents/img/icon-editar.svg'>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='btn-deletar-pedidos'>
                                                <a href='#')\">
                                                    <img src='../assents/img/icon-deletar.svg'>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
    </main>        
</body>
</html>