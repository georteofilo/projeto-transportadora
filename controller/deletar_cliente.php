<?php
    include('../config/conexao.php');
    include('../model/cliente.php');

    $id = $_GET['id'];

    if(!empty($id)){
        $user = Cliente::deletarCliente($pdo, $id);
        echo "
            <script>
                alert('Cliente deletado com Sucesso!');
                window.location.href='../view/clientes.php';
            </script>
        ";
    }
?>