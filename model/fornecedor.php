<?php
    class Fornecedor{
        public $nome;
        public $email;
        public $cnpj;
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
                $this->email = $atrib['email'];
                $this->cnpj = $atrib['cnpj'];
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

        public function cadastrarFornecedor($pdo){
            $sth = $pdo->prepare("INSERT INTO fornecedores (nome, email, cnpj, telefone, rua, bairro, numero, cep, cidade, estado, pais) VALUES (:nome,:email,:cnpj,:telefone,:rua,:bairro,:num,:cep,:cidade,:estado,:pais)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':cnpj', $this->cnpj);
            $sth->BindValue(':telefone', $this->telefone);
            $sth->BindValue(':rua', $this->rua);
            $sth->BindValue(':num', $this->num);
            $sth->BindValue(':bairro', $this->bairro);
            $sth->BindValue(':cep', $this->cep);
            $sth->BindValue(':cidade', $this->cidade);
            $sth->BindValue(':estado', $this->estado);
            $sth->BindValue(':pais', $this->pais);
            return $sth->execute();
        }

        public function mostrarFornecedor($pdo){
            $sth = $pdo->query("SELECT * FROM fornecedores");
            $sth -> execute();
            return $users = $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        static function pesquisarFornecedor($pdo, $id){
            $sth = $pdo->prepare("SELECT * from fornecedores WHERE idFornecedor=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            $sth->execute();
            return $users = $sth->fetch(PDO::FETCH_ASSOC);
        }

        public function editarFornecedor($pdo,$id){
            $sth = $pdo->prepare("UPDATE fornecedores SET nome=:nome, email=:email, cnpj=:cnpj,  telefone=:telefone, rua=:rua, bairro=:bairro, numero=:num, cep=:cep, cidade=:cidade, estado=:estado, pais=:pais WHERE idFornecedor=:id");
            $sth->BindValue(':id', $id);
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':cnpj', $this->cnpj);
            $sth->BindValue(':telefone', $this->telefone);
            $sth->BindValue(':rua', $this->rua);
            $sth->BindValue(':num', $this->num);
            $sth->BindValue(':bairro', $this->bairro);
            $sth->BindValue(':cep', $this->cep);
            $sth->BindValue(':cidade', $this->cidade);
            $sth->BindValue(':estado', $this->estado);
            $sth->BindValue(':pais', $this->pais);
            return $sth->execute();
        }

        static function deletarFornecedor($pdo, $id){
            $sth = $pdo->prepare("DELETE from fornecedores WHERE idFornecedor=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }

        static function mostrarQuantidade($pdo){
            $sth = $pdo->prepare("SELECT COUNT(*) AS 'quantidade' FROM fornecedores");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result['quantidade'];
        }
    }

?>