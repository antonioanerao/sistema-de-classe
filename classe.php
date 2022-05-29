<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        exit;
    }
    require_once 'src'. DIRECTORY_SEPARATOR .'Classe.php';
    $classe = new Classe ("db_sistemadeclasse","localhost","root","DB_sistema*classe1");

    include 'header.php'; 
    include 'menu.php'; 
    ?>
        <main>
            <h1>Classe</h1>
            <section class="wrapper-lista">
                <p>Nenhuma classe cadastrada!</p>
            </section>          
        </main>
    <?=include 'footer.php'; ?>