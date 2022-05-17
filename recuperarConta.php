<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela de login</title>
        <link rel="stylesheet" href="css/estilo_telalogin.css">
    </head>
    <body>
        <header class="top"> 
            <span>LOGO</span>
        </header>
        <main>
            <aside>
                <picture>
                    <source media="(max-width: 670px)" srcset="imagem/backgroud-300.jpg">
                    <img src="imagem/backgroud-600.jpg" alt="Tela de fundo!">
                </picture>
            </aside>
            <article class="conteiner">
                <h1>Recuperar sua conta</h1>
                <p> Insera seu e-mail para que o sistema te enviar um  código de acesso.</p>
                <form method="POST">
                    <input type="email" name="email" placeholder="E-mail">          
                    <button type="submit" class="btn" >Continuar</button> 
                    <a href="index.php" class="btn-linkado" >Cancelar</a>                       
                </form>
                <?php
                    if(isset($_POST['email'])){  // verificar se clicou no botão                       
                        $email = addslashes( $_POST['email']); // addlashes é uma segurança nos campos do usuario no formulário contra Hackers                       
                        if(!empty($email)){ // verificando se  os campos estão preenchidos                              
                            $u->conectar("db_sistemadeclasse","localhost","root","DB_sistema*classe1"); //conectar com o banco
                            if($u->msgErro == ""){
                                // chamando o metodo recuperarSenha e passando os parametros email
                                if($u->recuperarSenha($email)){
                                //Fazendo login na area privada!
                                    header("location: home.php");
                                }else{
                                //mensagem por não encontrar usuario e senha no banco de dados!
                                ?>
                                    <div class="resp-erro">
                                        <p>Email ou senha invalidos!</p>
                                    </div>
                                <?php
                                }
                            }else{
                                // mensagem de erro referente a conecção com o banco de dados!
                                ?>
                                    <div class="resp-erro">
                                        <?php echo "Erro".$u->msgErro; ?>
                                    </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div class="resp-erro">
                                    <p>Email ou senha invalidos!</p>
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="resp-erro">
                                <p>Email ou senha invalidos!</p>
                            </div>
                        <?php
                    }
                ?>
            </article>
        </main>
    </body>
    <!-- <footer> <p>© Thais Rocha | Projeto de conclusão de curso.</p></footer> -->
</html>