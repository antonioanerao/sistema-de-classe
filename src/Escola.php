<?php
    class Escola{

        private $pdo;
        // 6 funções
        // ponto de partida do codigo
        public function __construct($dbname, $host, $user, $senha)
        {
            try{
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
            }
            catch(PDOException $e){
                echo "Erro com banco de dados:".$e->getMessage();
                exit();
            }
            catch(Exception $e){
                echo "Erro generico:".$e->getMessage();
            }
        }
        //-----------------------------------------------------------------------------------------------------------------------
        // função para buscar o dados e colocar no canto direiro da tela.
        public function buscarDados(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM tbl_escola ORDER BY nome");
            //recebendo o arreio em cmd e convertendo e mandando para variavel res.
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        //-----------------------------------------------------------------------------------------------------------------------
        //Função de cadastrar Escola no banco de dados
        public function cadastrarEscola($nome, $email){
            //Antes de cadastrar temos que verificar se já existe o cadastro do email
            $cmd = $this->pdo->prepare("SELECT id FROM tbl_escola WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            if($cmd->rowCount() > 0) //email já existente.
            {
                return false;
            }else{ // email não cadastrado
                $cmd = $this->pdo->prepare("INSERT INTO tbl_escola (nome, email) VALUES (:n, :e)");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->execute();
                return true;
            }
        }
        //-----------------------------------------------------------------------------------------------------------------------
        public function excluirEscola($id){
            $cmd = $this->pdo->prepare("DELETE FROM tbl_escola WHERE id=:id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

        public function buscardadosEscola($id){
            // tranformando a variavel $res em um array, pois caso o banco não retorne nenhum dados poderia dar erro!
            $res = array();
            $cmd = $this->pdo->prepare("SELECT * FROM tbl_escola WHERE id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
        public function atualizarDadosEscola($id, $nome,$email){
            
            $cmd = $this->pdo->prepare("UPDATE tbl_escola SET nome = :n, email = :e WHERE id= :id;");
            $cmd ->bindValue(":n", $nome);
            $cmd ->bindValue(":e", $email);
            $cmd ->bindValue(":id", $id);
            $cmd->execute();    
        }  
        public function qtdade_escolas(){
            $cmd = $this->pdo->query("SELECT COUNT(*) FROM tbl_escola");
            $res = $cmd->fetchColumn();
            return $res;
        }
    }
?>