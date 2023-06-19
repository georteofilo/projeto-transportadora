<?php
    session_start();
    include_once('config/conexao.php');
    include_once('model/funcionario.php');

    if(isset($_REQUEST['Entrar'])){
        extract(($_REQUEST));
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $_SESSION['senha'] = $senha;

        $user = new Funcionario();
        $login = $user->verificarFuncionario($pdo,$email, $senha);

        if($login){
            header("location:view/inicio.php");
            // $_SESSION['usuario'] = $user;
        } else {
            ?>
            <script>
                alert("Senha ou Usuário Incorretos");
            </script>
            <?php
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assents/img/favicon.svg" type="image/x-icon">

    <title>Login</title>
</head>
<body>
    <div class="container-login">
        <div class="login-box">
            <div class="logo">
                <img src="./assents/img/logo.jpg" alt="">
            </div>
            <h2>Login</h2>
            <form method="post">
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label for="email">E-mail</label>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" required>
                    <label for="senha">Senha</label>
                </div>
                <input class="btn-entrar" type="submit" value="Entrar" name="Entrar">
            </form>
        </div>
    </div>
</body>
</html>