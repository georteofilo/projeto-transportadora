<?PHP
    session_start();
    include('../config/conexao.php');
    include('../model/funcionario.php');

    $userLogin = new Funcionario();

    if(!$userLogin->ativarSessao()){
        header("location:../");
    }
    if(isset($_GET['sair'])){
        $userLogin->fazerLogout();
        header("location:../");
    }

    $user = new Funcionario();
    $mostrar = $user->pesquisarFuncionario($pdo, $_SESSION['id']);

    if (isset($_POST['editarPerfil']) && isset($_REQUEST['editarPerfil'])){

        $funcionario = new Funcionario($_POST);
        $funcionario->editarFuncionario($pdo, $_SESSION['id']);

        if($funcionario){
            echo "
            <script>
                alert('Seu Perfil foi editado com sucesso!');
                window.location.href = 'perfil.php';
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
    <link rel="shortcut icon" href="../assents/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/all.js" defer></script>
    <script src="../js/perfil.js" defer></script>

    <title>Perfil</title>
</head>
<body>
    <div class="container-perfil">
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
                   <li class="mlv-elemento"><a href="pedidos.php">Pedidos</a></li>
                </ul>
            </nav>
        </aside>
        <main class="principal-perfil">
            <header class="perfil-cabecalho">
                <div class="perfil-foto">
                    <?php echo "<img src='../assents/fotos/funcionarios/".$_SESSION['fotoNome']."'>"?>
                </div>>
                <p>
                    <?php echo $_SESSION['nome'];?>
                </p>
                <a class="btn-editar-perfil" href="editar_perfil.php">
                    <img src="../assents/img/icon-edit.svg">
                    <span>Editar Perfil</span>
                </a>
                <div class="perfil-editar">
                    <div class="box-editar-perfil">
                        <a class="btn-fechar-form" href="perfil.php">
                            <img id="icon-fechar" src="../assents/img/icon-fechar.svg">
                        </a>
                        <h2 class="editar-header">Editar foto</h2>
                        <div class="box-foto-perfil">
                            <div class='editar-foto-perfil'>
                                <?php echo "<img src='../assents/fotos/funcionarios/".$_SESSION['fotoNome']."'>"?>
                            </div>
                        </div>
                        <form  class="form-botoes" method="post">
                            <label for="alterarFoto" class="input-foto">
                                <img src="../assents/img/icon-download.svg">
                                <span>Selecionar Foto</span>
                            </label>
                            <input type="file" name="alterarFoto" id="alterarFoto">
                            <input id="btn-salvar" class="btn-salvar" type="submit" value="Salvar" name="salvarFoto">
                        </form>
                    </div>
                </div>
            </header>
            <section class="perfil-dados">
                <div class="dado">
                    <span>Email:</span>
                    <input type="text" value="<?php echo $mostrar['email'];?>">
                </div>
                <div class="dado-senha">
                    <span>Senha:</span>
                    <input type="password" id="senha" value="<?php echo $mostrar['senha'];?>">
                    <span class="icon-senha" onclick="mostrarSenha()"></span>
                </div>
                <div class="dado">
                    <span>CPF:</span>
                    <input type="text" value="<?php echo $mostrar['cpf'];?>">
                </div>
                <div class="dado">
                    <span>Nascimento:</span>
                    <input type="text" value="<?php echo $mostrar['dataNasc'];?>">
                </div>
                <div class="dado">
                    <span>Telefone:</span>
                    <input type="text" value="<?php echo $mostrar['telefone'];?>">
                </div>
                <h3>Endereço</h3>
                <div class="dado">
                    <span>Rua:</span>
                    <input type="text" value="<?php echo $mostrar['rua'];?>">
                </div>
                <div class="dado">
                    <div class="dado-bairro">
                        <span>Bairro:</span>
                        <input type="text" value="<?php echo $mostrar['bairro'];?>">
                    </div>
                    <div class="dado-num">
                        <span>Nº:</span>
                        <input type="text" value="<?php echo $mostrar['numero'];?>">
                    </div>
                </div>
                <div class="dado">
                    <span>CEP:</span>
                    <input type="text" value="<?php echo $mostrar['cep'];?>">
                </div>
                <div class="dado">
                    <span>Cidade:</span>
                    <input type="text" value="<?php echo $mostrar['cidade'];?>">
                </div>
                <div class="dado">
                    <span>Estado:</span>
                    <input type="text" value="<?php echo $mostrar['estado'];?>">
                </div>
                <div class="dado">
                    <span>País:</span>
                    <input type="text" value="<?php echo $mostrar['pais'];?>">
                </div>
            </section>
        </main>
    </div>
</body>