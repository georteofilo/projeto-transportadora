<?php
    include('../config/conexao.php');
    include('../model/funcionario.php');

    $id = $_GET['id'];

    if(!empty($id)){
        $user = Funcionario::deletarFuncionario($pdo, $id);
        echo "
            <script>
                alert('Funcionário deletado com Sucesso!');
                window.location.href='../view/funcionarios.php';
            </script>
        ";
    }
?>