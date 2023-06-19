<?php
    class Agregado{
        public $nome;
        public $cpf;
        public $email;
        public $dataNasc;
        public $telefone;
        public $rua;
        public $num;
        public $bairro;
        public $cidade;
        public $cep;
        public $estado;
        public $pais;


        function __construct($atrib = array()){
            if(!empty($atrib)){
                $this->nome = $atrib['nome'];
                $this->cpf = $atrib['cpf'];
                $this->email = $atrib['email'];
                $this->dataNasc = $atrib['dataNasc'];
                $this->telefone = $atrib['telefone'];
                $this->rua = $atrib['rua'];
                $this->num = $atrib['num'];
                $this->bairro = $atrib['bairro'];
                $this->cidade = $atrib['cidade'];
                $this->cep = $atrib['cep'];
                $this->estado = $atrib['estado'];
                $this->pais = $atrib['pais'];
            }
        }
        public function cadastrarAgregado($pdo, $fotoNome, $fotoTam, $fotoTipo){
            $sth = $pdo->prepare("INSERT INTO agregados (nome, email, cpf, dataNasc, telefone, fotoNome, fotoTipo, fotoTam, rua, bairro, numero, cep, cidade, estado, pais) VALUES (:nome,:email,:cpf,:dataNasc,:telefone,:fotoNome,:fotoTipo,:fotoTam,:rua,:bairro,:num,:cep,:cidade,:estado,:pais)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':cpf', $this->cpf);
            $sth->BindValue(':dataNasc', $this->dataNasc);
            $sth->BindValue(':telefone', $this->telefone);
            $sth->BindValue(':fotoNome', $fotoNome);
            $sth->BindValue(':fotoTipo', $fotoTipo);
            $sth->BindValue(':fotoTam', $fotoTam);
            $sth->BindValue(':rua', $this->rua);
            $sth->BindValue(':num', $this->num);
            $sth->BindValue(':bairro', $this->bairro);
            $sth->BindValue(':cep', $this->cep);
            $sth->BindValue(':cidade', $this->cidade);
            $sth->BindValue(':estado', $this->estado);
            $sth->BindValue(':pais', $this->pais);
            return $sth->execute();
        }

        public function mostrarAgregado($pdo){
            $sth = $pdo->query("SELECT * FROM agregados");
            $sth -> execute();
            return $users = $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        static function pesquisarAgregado($pdo, $id){
            $sth = $pdo->prepare("SELECT * from agregados WHERE idAgregado=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            $sth->execute();
            return $users = $sth->fetch(PDO::FETCH_ASSOC);
        }
       
        static function mostrarQuantidade($pdo){
            $sth = $pdo->prepare("SELECT COUNT(*) AS 'quantidade' FROM agregados");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result['quantidade'];
        }

    }

?>