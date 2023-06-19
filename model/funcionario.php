<?php
    class Funcionario{
        public $nome;
        public $cpf;
        public $email;
        public $senha;
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
                $this->senha = $atrib['senha'];
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

        public function verificarFuncionario($pdo, $email, $senha){
            $sth = $pdo->prepare("SELECT * FROM funcionarios WHERE email=:email AND senha=:senha");
            $sth->BindValue(':email', $email);
            $sth->BindValue(':senha', md5($senha));
            $sth->execute();
            $login = $sth->fetch(PDO::FETCH_ASSOC);
            
            if($login){
                $_SESSION['login'] = true;
                $_SESSION['id'] = $login['idFuncionarios'];
                $_SESSION['nome'] = $login['nome'];
                $_SESSION['fotoNome'] = $login['fotoNome'];
                return true;
            } else {
                return false;
            }
        }

        public function cadastrarFuncionario($pdo, $fotoNome, $fotoTam, $fotoTipo){
            $sth = $pdo->prepare("INSERT INTO funcionarios (nome, email, cpf, dataNasc, senha, telefone, fotoNome, fotoTipo, fotoTam, rua, bairro, numero, cep, cidade, estado, pais) VALUES (:nome,:email,:cpf,:dataNasc,:senha,:telefone,:fotoNome,:fotoTipo,:fotoTam,:rua,:bairro,:num,:cep,:cidade,:estado,:pais)");
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':cpf', $this->cpf);
            $sth->BindValue(':dataNasc', $this->dataNasc);
            $sth->BindValue(':senha', md5($this->senha));
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

        public function mostrarFuncionario($pdo){
            $sth = $pdo->query("SELECT * FROM funcionarios");
            $sth -> execute();
            return $users = $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        static function pesquisarFuncionario($pdo, $id){
            $sth = $pdo->prepare("SELECT * from funcionarios WHERE idFuncionarios=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            $sth->execute();
            return $users = $sth->fetch(PDO::FETCH_ASSOC);
        }

        public function editarFuncionario($pdo,$id){
            $sth = $pdo->prepare("UPDATE funcionarios SET nome=:nome, email=:email, cpf=:cpf, dataNasc=:dataNasc, telefone=:telefone, rua=:rua, bairro=:bairro, numero=:num, cep=:cep, cidade=:cidade, estado=:estado, pais=:pais WHERE idFuncionarios=:id");
            $sth->BindValue(':id', $id);
            $sth->BindValue(':nome', $this->nome);
            $sth->BindValue(':email', $this->email);
            $sth->BindValue(':cpf', $this->cpf);
            $sth->BindValue(':dataNasc', $this->dataNasc);
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

        static function deletarFuncionario($pdo, $id){
            $sth = $pdo->prepare("DELETE from funcionarios WHERE idFuncionarios=:id LIMIT 1");
            $sth->BindValue(':id', $id);
            return $sth->execute();
        }

        public function ativarSessao(){
            return $_SESSION['login'];
        }

        public function fazerLogout(){
            $_SESSION['login'] = false;
            session_destroy();
        }

        static function mostrarQuantidade($pdo){
            $sth = $pdo->prepare("SELECT COUNT(*) AS 'quantidade' FROM funcionarios");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result['quantidade'];
        }
    }


?>