<!-- Quando a gente colocar require_once no arquivo a gente consegue estanciar essa as classes de desse arquivo com isso ultilizar seus metodos!-->
<?php
    require_once'src\Usuario.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo_telalogin.css">
    </head>
    <body>
         <header class="top">
            <p>LOGO</p>
        </header> 
        <main>
            <aside>
                <picture>
                        <source media="(max-width: 670px)" srcset="imagem/backgroud-300.jpg">
                        <img src="imagem/backgroud-600.jpg" alt="Tela de fundo!">
                </picture>
            </aside>
            <article class="conteiner">
                <h1>Acesse sua conta</h1>
                <form method="POST">
                    <input type="email" name="email" placeholder="E-mail">
                    <input  type="password" name="senha" placeholder="Senha">
                    <button type="submit" class="btn" >Acessar</button>
                    <a href="cadastro.php" class="btn-linkado">Criar conta</a>
                    <a href="recuperarConta.php">Esqueceu a senha? </a>
                </form>
                <?php
                    // verificar se clicou no botão
                    if(isset($_POST['email']))
                    {
                        // addlashes é uma segurança nos campos do usuario no formulário contra Hackers
                        $email = addslashes( $_POST['email']);
                        $senha = addslashes( $_POST['senha']);
                
                        // verificando se  os campos estão preenchidos
                        if(!empty($email) && !empty($senha)){
                            //conectar com o banco
                        $u->conectar("db_sistemadeclasse","localhost","root","");
                        if($u->msgErro == ""){
                            // chamando o método logar e passando os parametros email e senha
                                if($u->logar($email, $senha)){
                                //Fazendo login na area privada!
                                    header("location: home.php");
                                }else{
                                //mensagem por não encontrar usuario e senha no banco de dados!
                                ?>
                                <div class="resp-erro"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                    Email ou senha invalidos!
                                </div>
                                <?php
                                }
                            }else{
                                // mensagem de erro referente a conecção com o banco de dados!
                                ?>
                                <div class="resp-erro"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                <?php echo "Erro".$u->msgErro; ?>
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="resp-erro"><i class="fa fa-times-circle" aria-hidden="true"></i>
                                Preencha todos os campos!
                            </div>
                            <?php
                        }
                    }
                ?>
            </article>
        </main>
    </body>
   <!-- <footer> <p>© Thais Rocha | Projeto de conclusão de curso.</p></footer> -->
</html>