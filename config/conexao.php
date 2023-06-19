<?php
     define('servidor',      'localhost');
     define('usuario',            'root');
     define('senha',                  '');
     define('bd',    'db_transportadora');

     
    try {
        $pdo =  new PDO('mysql:host='.servidor.';dbname='.bd,usuario,senha);
     } catch (PDOException $e) {
        echo 'Erro! Nâo foi possível conectar o banco. Erro.'. $e -> getMessage();
     }
?>