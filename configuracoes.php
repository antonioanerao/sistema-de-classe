<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        exit;
    }

    include 'header.php'; 
    include 'menu.php'; 
    ?>
        <main>
            <h1>Configurações</h1>
            <section class="wrapper-lista">
                <p>Fazer as opções de confirações!</p>
            </section>
        </main>
    <?= include 'footer.php'; ?>