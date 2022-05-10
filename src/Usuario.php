<?php
    class Usuario{

    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }catch(PDOException $e){
            $msgErro = $e -> getMessage();
        }        
    }
    public function cadastrar($nome, $email, $senha){
        global $pdo;
        //verificar se já existe o email cadastrado
        $sql = $pdo-> prepare ("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql -> bindValue(":e",$email);
        $sql -> execute();
        if($sql -> rowCount() > 0){
            return false; // já está cadastrada
        }else{  // caso não exista, cadastrar
        $sql = $pdo -> prepare ("INSERT INTO usuarios (
            nome, email, senha) VALUES (:n, :e, :s)"); 
            $sql -> bindValue(":n",$nome);
            $sql -> bindValue(":e",$email);
            $sql -> bindValue(":s",md5($senha));
            $sql -> execute();
            return true;
        }
    }  
    public function logar($email, $senha){
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim entrar no sistema(sessaõ)
        $sql = $pdo -> prepare ("SELECT id_usuario from usuarios where email = :e AND senha = :s");
        $sql -> bindValue(":e",$email); // substitue o email por :e e s:senha
        $sql -> bindValue(":s",md5($senha));
        $sql -> execute();
        if($sql -> rowCount() > 0){
            //entrar no sistema(sessão)
            //transfomrar o que veio do banco em array por fetch
            $dado = $sql->fetch(); 
            //iniciar sessão
            session_start();
            //estartar a sessão       
            $_SESSION['id_usuario'] = $dado ['id_usuario'];
            return true;  // logado com sucesso
        }else{
            return false; // não conseguio logar
        }
    }
}
?>