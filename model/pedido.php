<?php
    class Pedido{
        public $idFornecedor;
        public $idCliente;
        public $valor;
        public $gastos;
        public $produtos;
        public $dataPedido;
        public $entrega;
        public $dataEntrega;
        public $idAgregado;
    

        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->idFornecedor = $atrib['idFornecedor'];
                $this->idCliente = $atrib['idCliente'];
                $this->valor = $atrib['valor'];
                $this->gastos = $atrib['gastos'];
                $this->produtos = $atrib['produtos'];
                $this->dataPedido = $atrib['dataPedido'];
                $this->dataEntrega = $atrib['dataEntrega'];
                $this->entrega = $atrib['entrega'];
                $this->idAgregado = $atrib['idAgregado'];
                
            }
        }

        public function cadastrarPedido($pdo,$idFornecedor, $idCliente){
            $sth = $pdo->prepare("INSERT INTO pedidos (idFornecedor, idCliente, dataPedido, valor, gastos, produtos) VALUES (:idFornecedor, :idCliente, :dataPedido, :valor, :gastos, :produtos)");
            $sth->BindValue(':idFornecedor', $idFornecedor);
            $sth->BindValue(':idCliente', $idCliente);
            $sth->BindValue(':dataPedido', $this->dataPedido);
            $sth->BindValue(':valor', $this->valor);
            $sth->BindValue(':gastos', $this->gastos);
            $sth->BindValue(':produtos', $this->produtos);
            return $sth->execute();
        }

        public function mostrarPedido($pdo){
            $sth = $pdo->query("SELECT * FROM pedidos");
            $sth -> execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        static function pesquisarPedido($pdo, $id){
            $sth = $pdo->prepare("SELECT * from pedidos WHERE idPedido=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }

        static function mostrarQuantidade($pdo){
            $sth = $pdo->prepare("SELECT COUNT(*) AS 'quantidade' FROM pedidos");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result['quantidade'];
        }
    }
?>