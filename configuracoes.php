<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location:index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_principal.css">
    <title>Configurações</title>
</head>
    <body>
    <header class="container">
            <p>LOGO</p>
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
                <li class="menu-icone"><a href="home.php" class="menu-icone-link"><i class="fas fa-home"></i></a><a href="home.php" class="menu-link">Inicio</a></li>
                <li class="menu-icone"><a href="escola.php" class="menu-icone-link"><i class="fas fa-school"></i></a><a href="escola.php" class="menu-link">Escola</a></li>
                <li class="menu-icone"><a href="classe.php" class="menu-icone-link"><i class="fas fa-chalkboard-teacher"></i></a><a href="classe.php" class="menu-link">Classe</a></li>
                <li class="menu-icone"><a href="aluno.php" class="menu-icone-link"><i class="fa fa-users" aria-hidden="true"></i></a><a href="aluno.php" class="menu-link">Alunos</a></li>
                <li class="menu-icone"><a href="relatorios.php" class="menu-icone-link"><i class="far fa-folder-open"></i></a><a href="relatorios.php" class="menu-link">Relatórios</a></li>
                <li class="menu-icone"><a href="configuracoes.php" class="menu-icone-link"><i class="fas fa-cogs"></i></a><a href="configuracoes.php" class="menu-link">Configurações</a></li>
                <li class="menu-icone"><a href="sair.php" class="menu-icone-link"><i class="fa fa-reply" aria-hidden="true"></i></a><a href="sair.php" class="menu-link">Sair</a></li>
            </ul>
            </nav> 
        </div>  
        <main>
            <h1>Configurações</h1>
            <section class="wrapper-lista">
                <p>Fazer as opções de confirações!</p>
            </section>
        </main>
        <script src="script.js"></script>
    </body>
</html>