<?PHP
    session_start();
    include('../config/conexao.php');
    include('../model/funcionario.php');
    include('../model/cliente.php');
    include('../model/fornecedor.php');
    include('../model/agregado.php');
    include('../model/pedido.php');

    $user = new Funcionario();

    if(!$user->ativarSessao()){
        header("location:../");
    }
    if(isset($_GET['sair'])){
        $user->fazerLogout();
        header("location:../");
    }

    $result_funcionario = Funcionario::mostrarQuantidade($pdo);
    $result_fornecedor = Fornecedor::mostrarQuantidade($pdo);
    $result_cliente = Cliente::mostrarQuantidade($pdo);
    $result_agregado = Agregado::mostrarQuantidade($pdo);
    $result_pedido = Pedido::mostrarQuantidade($pdo);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assents/img/favicon.svg" type="image/x-icon">

    <script src="../js/all.js" defer></script>
    
    <title>Dashboard</title>
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
                   <li class="mlv-elemento selecao"><a href="inicio.php">Início</a></li>
                   <li class="mlv-elemento"><a href="funcionarios.php">Funcionários</a></li>
                   <li class="mlv-elemento"><a href="agregados.php">Agregados</a></li>
                   <li class="mlv-elemento"><a href="fornecedores.php">Fornecedores</a></li>
                   <li class="mlv-elemento"><a href="clientes.php">Clientes</a></li>
                   <li class="mlv-elemento"><a href="pedidos.php">Pedidos</a></li>
                </ul>
            </nav>
        </aside>
        <header class="cards-inicial">
            <a href="funcionarios.php" class="card-inicial">
                <h3>Funcionários</h3>
                <div class="card-elementos">
                    <div class="card-imagem">
                        <img src="../assents/img/icon-trabalhador.svg" alt="">
                    </div>
                    <span class="card-valor"><?php echo $result_funcionario?></span>
                </div>
            </a>
            <a href="fornecedores.php" class="card-inicial">
                <h3>Fornecedores</h3>
                <div class="card-elementos">
                    <div class="card-imagem">
                        <img src="../assents/img/icon-fornecedor.svg" alt="">
                    </div>
                    <span class="card-valor"><?php echo $result_fornecedor?></span>
                </div>
            </a>
            <a href="clientes.php" class="card-inicial">
                <h3>Clientes</h3>
                <div class="card-elementos">
                    <div class="card-imagem">
                        <img src="../assents/img/icon-cliente.svg" alt="">
                    </div>
                    <span class="card-valor"><?php echo $result_cliente?></span>
                </div>
            </a>
            <a href="agregados.php" class="card-inicial">
                <h3>Agregados</h3>
                <div class="card-elementos">
                    <div class="card-imagem">
                        <img src="../assents/img/icon-agregado.svg" alt="">
                    </div>
                    <span class="card-valor"><?php echo $result_agregado?></span>
                </div>
            </a>
            <a href="pedidos.php" class="card-inicial">
                <h3>Pedidos</h3>
                <div class="card-elementos">
                    <div class="card-imagem">
                        <img src="../assents/img/icon-pedido.svg" alt="">
                    </div>
                    <span class="card-valor"><?php echo $result_pedido?></span>
                </div>
            </a>
        </header>
    </div>
</body>
</html>