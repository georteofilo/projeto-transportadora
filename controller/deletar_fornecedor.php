<?php
    include('../config/conexao.php');
    include('../model/fornecedor.php');

    $id = $_GET['id'];

    if(!empty($id)){
        $user = Fornecedor::deletarFornecedor($pdo, $id);
        echo "
            <script>
                alert('Fornecedor deletado com Sucesso!');
                window.location.href='../view/clientes.php';
            </script>
        ";
    }
?>