<?PHP
    session_start();
    include('../config/conexao.php');
    include('../model/funcionario.php');
    include('../model/cliente.php');

    $userLogin = new Funcionario();
    
    if(!$userLogin->ativarSessao()){
        header("location:../");
    }
    if(isset($_GET['sair'])){
        $userLogin->fazerLogout();
        header("location:../");
    }

    $id = $_GET['id'];
    if(!empty($id)){
        $user = Cliente::pesquisarCliente($pdo, $id);
    }

    if (isset($_POST['editarCliente']) && isset($_REQUEST['editarCliente'])){

        $cliente = new Cliente($_POST);
        $cliente->editarCliente($pdo, $id);


        if($cliente){
            echo "
            <script>
                alert('Cliente editado com sucesso!');
                window.location.href = 'clientes.php';
            </script>
            ";
        }
    }

    $userTabela = new Cliente();
    $mostrar = $userTabela->mostrarCliente($pdo);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assents/img/favicon.svg" type="image/x-icon">

    <script src="../js/funcionario.js" defer></script>
    <script src="../js/all.js" defer></script>

    <title>Clientes</title>
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
                    <a class="perfil" href="#">
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
                    <li class="mlv-elemento selecao"><a href="clientes.php">Clientes</a></li>
                    <li class="mlv-elemento"><a href="pedidos.php">Pedidos</a></li>
                </ul>
            </nav>
        </aside>
        <main class="principal-funcionarios">
            <header class="header-funcionarios">
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
                    <span>Funcionários</span>
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
                <div class="funcionario-btn-cadastrar" id="funcionario-abrir-cadastro">
                    <img src="../assents/img/icon-add-funcionario.svg" alt="">
                    <span>Cadastrar</span>
                </div>
            </header>
            <section class="tabela-funcionarios">
                <h2>Funcionários Cadastrados</h2>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Data de Nasc.</th>
                            <th>Telefone</th>
                            <th>Foto</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($mostrar as $linha){
                                echo "
                                    <tr>
                                        <td>".$linha['idFuncionarios']."</td>
                                        <td>".$linha['nome']."</td>
                                        <td>".$linha['email']."</td>
                                        <td>".$linha['cpf']."</td>
                                        <td>".$linha['dataNasc']."</td>
                                        <td>".$linha['telefone']."</td>
                                        <td><img src='../assents/fotos/funcionarios/".$linha['fotoNome']."'></td>
                                        <td>
                                            <div class='btn-abrir-editar' id='funcionario-abrir-editar'>
                                                <form method='post'>
                                                    <button type='submit' name='editarFuncionario'>
                                                        <img src='../assents/img/icon-editar.svg'>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='btn-deletar' id='funcionario-deletar'>
                                                <form method='post'>
                                                    <button type='submit' name='deletarFuncionario'>
                                                        <img src='../assents/img/icon-deletar.svg'>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
            <div id="cliente-editar" class="cliente-editar">
                    <div class="box-editar">
                        <a class="btn-fechar-form" href="clientes.php">
                            <img id="icon-fechar" src="../assents/img/icon-fechar.svg">
                        </a>
                        <h2 class="editar-header">Editar Cliente</h2>
                        <form method="post" class="form-editar"  enctype="multipart/form-data">
                            <div class="form-header">
                                <h3>Cliente</h3>
                                <h3>Endereço</h3>
                            </div>
                            <div class="form-body">
                                <div class="form-pessoal">
                                    <div class="form-nome">
                                        <label for="nome">Nome:</label>
                                        <input type="text" name="nome" value="<?php echo $user['nome']?>" required>
                                    </div>
                                    <div class="form-email">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" value="<?php echo $user['email']?>" required>
                                    </div>
                                    <div class="form-cnpj">
                                        <label for="cnpj">CNPJ:</label>
                                        <input type="text" name="cnpj" id="cnpj" value="<?php echo $user['cnpj']?>" required>
                                    </div>
                                    <div class="form-tel">
                                        <label for="telefone">Telefone:</label>
                                        <input type="text" name="telefone" value="<?php echo $user['telefone']?>" required>
                                    </div>
                                </div>
                            <div class="editar-separador"></div>
                                <div class="form-endereco">
                                    <div class="form-rua">
                                        <label for="rua">Rua:</label>
                                        <input type="text" name="rua" value="<?php echo $user['rua']?>" >
                                    </div>
                                    <div class="form-bairro">
                                        <label for="bairro">Bairro:</label>
                                        <input type="text" name="bairro" value="<?php echo $user['bairro']?>" >
                                    </div>
                                    <div class="form-num">
                                        <label for="num">Nº:</label>
                                        <input type="text" name="num" value="<?php echo $user['numero']?>" >
                                    </div>
                                    <div class="form-cep">
                                        <label for="cep">CEP:</label>
                                        <input type="text" name="cep" value="<?php echo $user['cep']?>" >
                                    </div>
                                    <div class="form-cidade">
                                        <label for="cidade">Cidade:</label>
                                        <input type="text" name="cidade" value="<?php echo $user['cidade']?>" >
                                    </div>
                                    <div class="form-estado">
                                        <label for="estado">Estado:</label>
                                        <input type="text" name="estado" value="<?php echo $user['estado']?>" >
                                    </div>
                                    <div class="form-pais">
                                        <label for="pais">País:</label>
                                        <input type="text" name="pais" value="<?php echo $user['pais']?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="editar-footer">
                                <input id="btn-editar" class="btn-editar" type="submit" value="Editar" name="editarCliente">
                                <a class="btn-voltar" href="clientes.php">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>