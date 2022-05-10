<?php
    //estanciando a classe 
    require_once 'src/Usuario.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo_telalogin.css">
        <title>Cadastro</title>
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
                <h1>Crie sua conta</h1>
                <form method="POST" >
                    <input type="text" name="nome" placeholder="Nome completo" maxlenght="30">
                    <input type="email" name="email" placeholder="E-mail" maxlength="40">
                    <input type="password" name="senha" placeholder="Senha" maxlength="15">
                    <input type="password" name="confSenha" placeholder="Confirmar a senha" maxlength="15">
                    <button type="submit" class="btn" >Cadastrar</button>
                    <a href="index.php" class="btn-linkado" >Cancelar</a>     
                </form> 
        <?php
            // verificar se clicou no botão
            if(isset($_POST['nome']))
            {
                // addlashes é uma segurança nos campos do usuario no formulário contra rackers
                $nome = addslashes($_POST ['nome']);
                $email = addslashes( $_POST['email']);
                $senha = addslashes( $_POST['senha']);
                $confirmarSenha = addslashes( $_POST['confSenha']);        
                // verificando se  os campos estão preenchidos
                if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
                    //conectando com o banco
                    $u -> conectar("db_sistemadeclasse", "localhost","root", "");
                    if($u->msgErro == "") //está tudo ok
                    {
                        if($senha == $confirmarSenha){
                            if($u -> cadastrar($nome, $email, $senha)){                                                       
                            ?>
                            <div id="resp-sucesso">
                                    Cadastrado com sucesso!
                            </div>
                            <?php
                            }else{
                            ?>
                                <div class="resp-erro">
                                    E-mail já cadastrado!
                                </div>
                                <?php            
                            }
                        }
                        else{
                            ?>
                        <div class="resp-erro">
                            Senha não correspondem
                        </div>
                        <?php 
                        }
                    }else
                    {
                    ?>
                        <div class="resp-erro">
                            <?php echo`Erro` .$u->msgErro; ?>
                        </div>
                    <?php
                    }
                }else{
                    ?>
                <div class="resp-erro">
                    Preencha todos os campos!
                </div>
                <?php 
                }
            }
        ?>
            </article>
        </main>
    </body>
    <!--<footer> <p>© Thais Rocha | Projeto de conclusão de curso.</p></footer> -->
</html>