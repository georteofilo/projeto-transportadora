<?PHP
    session_start();
    include('../config/conexao.php');
    include('../model/funcionario.php');
    include('../model/agregado.php');

    $user = new Funcionario();

    if(!$user->ativarSessao()){
        header("location:../");
    }
    if(isset($_GET['sair'])){
        $user->fazerLogout();
        header("location:../");
    }

    $agregado = new Agregado();
    $mostrar = $agregado->mostrarAgregado($pdo);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assents/img/favicon.svg" type="image/x-icon">
    
    <script src="../js/all.js" defer></script>
    <title>Agregados</title>
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
                   <li class="mlv-elemento selecao"><a href="agregados.php">Agregados</a></li>
                   <li class="mlv-elemento"><a href="fornecedores.php">Fornecedores</a></li>
                   <li class="mlv-elemento"><a href="clientes.php">Clientes</a></li>
                   <li class="mlv-elemento"><a href="pedidos.php">Pedidos</a></li>
                </ul>
            </nav>
        </aside>
        <main class="principal-agregados">
            <header class="header-agregados">
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
                    <span>Agregados</span>
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
                <div class="agregado-btn-cadastrar" id="agregado-abrir-cadastro">
                    <img src="../assents/img/icon-add-agregados.svg">
                    <span>Cadastrar</span>
                </div>
                <div id="agregados-cadastro" class="agregados-cadastro">
                    <div class="box-cadastro">
                        <button class="btn-fechar-form" id="btn-fechar-form">
                            <img id="icon-fechar" src="../assents/img/icon-fechar.svg">
                        </button>
                        <h2 class="cadastro-header">Agregados Funcionário</h2>
                        <form method="post" class="form-cadastro"  enctype="multipart/form-data">
                            <div class="form-header">
                                <h3>Pessoal</h3>
                                <h3>Endereço</h3>
                            </div>
                            <div class="form-body">
                                <div class="form-pessoal">
                                    <div class="form-nome">
                                        <label for="nome">Nome:</label>
                                        <input type="text" name="nome" required>
                                    </div>
                                    <div class="form-email">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" required>
                                    </div>
                                    <div class="form-senha">
                                        <label for="senha">Senha:</label>
                                        <input type="password" name="senha" required>
                                    </div>
                                    <div class="form-cpf">
                                        <label for="cpf">CPF:</label>
                                        <input type="text" name="cpf" id="cpf" required>
                                    </div>
                                    <div class="form-dataNasc">
                                        <label for="dataNasc">Data de Nascimento:</label>
                                        <input type="date" name="dataNasc">
                                    </div>
                                    <div class="form-tel">
                                        <label for="telefone">Telefone:</label>
                                        <input type="text" name="telefone" required>
                                    </div>
                                    <div class="form-foto">
                                        <span>Foto:</span>
                                        <label for="foto">
                                            <span>Procurar</span>
                                            <span class="text-foto">Selecionar foto...</span>
                                        </label>
                                        <input type="file" name="foto" id="foto">
                                    </div>
                                </div>
                            <div class="cadastro-separador"></div>
                                <div class="form-endereco">
                                    <div class="form-rua">
                                        <label for="rua">Rua:</label>
                                        <input type="text" name="rua">
                                    </div>
                                    <div class="form-bairro">
                                        <label for="bairro">Bairro:</label>
                                        <input type="text" name="bairro">
                                    </div>
                                    <div class="form-num">
                                        <label for="num">Nº:</label>
                                        <input type="text" name="num">
                                    </div>
                                    <div class="form-cep">
                                        <label for="cep">CEP:</label>
                                        <input type="text" name="cep">
                                    </div>
                                    <div class="form-cidade">
                                        <label for="cidade">Cidade:</label>
                                        <input type="text" name="cidade">
                                    </div>
                                    <div class="form-estado">
                                        <label for="estado">Estado:</label>
                                        <input type="text" name="estado">
                                    </div>
                                    <div class="form-pais">
                                        <label for="pais">País:</label>
                                        <input type="text" name="pais">
                                    </div>
                                </div>
                            </div>
                            <div class="cadastro-footer">
                                <input id="btn-cadastrar" class="btn-cadastrar" type="submit" value="Cadastrar" name="cadastrarFuncionario">
                                <input class="btn-limpar" type="reset" value="Limpar">
                            </div>
                        </form>
                    </div>
                </div>
            </header>
            <section class="tabela-agregados">
                <h2>Agregados Cadastrados</h2>
                <table class="tabela">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>CPF</td>
                            <td>Data de Nasc.</td>
                            <td>Telefone</td>
                            <td>Foto</td>
                            <td>Editar</td>
                            <td>Deletar</td>
                        </tr>
                    </thead>
                    <tbody id="tabela-corpo">
                        <?php
                            foreach($mostrar as $linha){
                                echo "
                                    <tr>
                                        <td>".$linha['idAgregado']."</td>
                                        <td>".$linha['nome']."</td>
                                        <td>".$linha['email']."</td>
                                        <td>".$linha['cpf']."</td>
                                        <td>".$linha['dataNasc']."</td>
                                        <td>".$linha['telefone']."</td>
                                        <td><img src='../assents/fotos/agregados/".$linha['fotoNome']."'></td>
                                        <td>
                                            <div class='btn-editar-agregados'>
                                                <a href='#".$linha['idAgregado']."')\">
                                                    <img src='../assents/img/icon-editar.svg'>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='btn-deletar-agregados'>
                                                <a href='#'onClick=\"return confirm('Tem certeza que deseja excluir o agregado ".$linha['nome']."?')\">
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
    </div>
</body>
</html>