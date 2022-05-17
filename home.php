<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        exit;
    }
?>
<?php
    require_once 'src/Escola.php';
    $escola = new Escola ("db_sistemadeclasse","localhost","root","DB_sistema*classe1");
?>
<?php
    require_once 'src/Classe.php';
    $classe = new Classe ("db_sistemadeclasse","localhost","root","DB_sistema*classe1");
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/estilo_principal.css">
        <title>Inicio</title>
    </head>
    <div id="conteudo" style="display: inline">
        <body> 
            <header class="container">
                <span>LOGO</span>
                <div class="usuario">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </header>  
            <div class="respansivo-menu">
                <input type="checkbox" id="check">
                <div class="btn-one">
                    <label for="check">
                        <i class="fas fa-bars"></i>
                    </label>
                </div> 
                <nav> 
                    <div class="btn-two">
                        <label for="check">
                            <i class="fas fa-times"></i>
                        </label>
                    </div>
                    <ul class="menu">
                        <li class="menu-icone"><a href="home.php" class="menu-icone-link" ><i class="fas fa-home"></i></a><a href="home.php" class="menu-link">Inicio</a></li>
                        <li class="menu-icone"><a href="escola.php?dir=conteudo&file=conteudo-escola" class="menu-icone-link"><i class="fas fa-school"></i></a><a href="escola.php?dir=conteudo&file=conteudo-escola" class="menu-link">Escola</a></li>
                        <li class="menu-icone"><a href="classe.php" class="menu-icone-link"><i class="fas fa-chalkboard-teacher"></i></a><a href="classe.php" class="menu-link">Classe</a></li>
                        <li class="menu-icone"><a href="aluno.php" class="menu-icone-link"><i class="fa fa-users" aria-hidden="true"></i></a><a href="aluno.php" class="menu-link">Alunos</a></li>
                        <li class="menu-icone"><a href="relatorios.php" class="menu-icone-link"><i class="far fa-folder-open"></i></a><a href="relatorios.php" class="menu-link">Relatórios</a></li>
                        <li class="menu-icone"><a href="configuracoes.php" class="menu-icone-link"><i class="fas fa-cogs"></i></a><a href="configuracoes.php" class="menu-link">Configurações</a></li>
                        <li class="menu-icone"><a href="sair.php" class="menu-icone-link"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="sair.php" class="menu-link">Sair</a></li>
                    </ul>
                </nav> 
            </div>  
            <main>
                <section class="wrapper-lista">
                    <a href="escola.php" class="fill-div">
                        <article id="escola">
                            <?php
                                $resp_escolas = $escola->qtdade_escolas();                       
                            ?>
                            <div  class="resp_qtde">
                                <?php echo "$resp_escolas" ?>
                            </div>
                            <h2>Escolas</h2>
                        </article>
                    </a>
                    <a href="classe.php" class="fill-div">
                        <article id="classe">
                            <div class="resp_qtde">0</div>
                            <h2>Classes</h2>
                        </article>
                    </a>
                    <a href="aluno.php" class="fill-div">
                        <article id="aluno">
                            <div class="resp_qtde">0</div>
                            <h2>Alunos</h2>
                        </article>
                    </a>
                    <a href="relatorios.php" class="fill-div">
                        <article id="relatorio">
                            <div class="resp_qtde">0</div>
                            <h2>Relatórios</h2>             
                        </article>
                    </a>
                </section>
            </main>
        </body>
        <!--<footer> <p>@copy Desenvolvido Thais Rocha</p></footer>-->
    </div>
</html>