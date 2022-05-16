<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("location:index.php");
    exit;
}
?>
<?php
    require_once 'src\Escola.php';
    $escola = new Escola ("db_sistemadeclasse","localhost","root","");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_principal.css">
    <title>Escola</title>
</head>

<body>
<?php
        if(isset($_POST['nome'])){ // clicou no botão para cadastrar ou editar
            
            //------------------------EDITAR ------------------------------
            if(isset($_GET['id_up']) && !empty($_GET['id_up'])){

                $id_update = addslashes($_GET['id_up']);
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                
                if(!empty($nome) && !empty($email))
                {
                    $escola->atualizarDadosEscola($id_update, $nome, $email);
                    header("location:escola.php");
                }
            //---------------------------CADASTRAR----------------------------
            }else{

                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                
                if(!empty($nome) && !empty($email)){
                    if(!$escola->cadastrarEscola($nome, $email)){                             
                        echo "<script language='javascript'>window.alert('Escola já cadastrada com este email!');</script>";        
                    }                
                }else{
                    echo "Preencha todos os campos!";
                    echo "<script language='javascript'>window.alert('Preencha todos os campos!');</script>"; 
                }
            }
        }
    ?>
    <?php
         if(isset($_GET['id_up'])){
            $id_update = addslashes($_GET['id_up']);
            $res = $escola->buscardadosEscola($id_update);
         }
    ?>
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
        <h1>Escolas</h1>
        <section class="wrapper-lista">
            <!--Chamando o conteudo-escola-->
            <div class="container-main">
                <section id="container-cadastroEscola">
                    <form method="POST">   

                        <div class="conteudo-container-cadastroEscola">               
                            <label for="nome">Nome</label>
                            <input 
                            type="text" 
                            name="nome" 
                            id="nome" 
                            value=" <?php 
                                        if (isset($res)) {
                                            echo $res['nome'];
                                        } 
                                    ?>
                            ">
                        </div>
                        <div class="conteudo-container-cadastroEscola">       
                            <label for="email">Email</label>
                            <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="
                                <?php 
                                    if (isset($res)) {
                                        echo $res['email'];
                                    } 
                                ?> 
                            ">
                        </div>
                        <div class="conteudo-container-cadastroEscola">       
                            <input class="btn-linkado" type="submit" value="<?php if (isset($res)) {
                                                            echo "Atualizar";
                                                        } else {
                                                            echo "Cadastrar";
                                                        } ?>">
                        </div>
                    </form>
                </section>
                <section id="container-listagemEscola">                                      
                        <?php
                            $dados = $escola->buscarDados();
                            if (count($dados) > 0) { // verifica se tem pessoa cadastrada no banco
                            ?>  
                                <table id="tabela-listagemEscola">    
                                <tr id="titulo">
                                    <td>Nome</td>
                                    <!-- Fazer o campo email ocupar duas colunas!-->
                                    <td colspan="2">Email</td>
                                </tr>
                            <?php
                                for ($i = 0; $i < count($dados); $i++) {
                                    echo "<tr>";
                                    foreach ($dados[$i] as $k => $v) {
                                        if ($k != "id") {
                                            echo "<td>" . $v . "</td>";
                                        }
                                    } //fim do foreach
                        ?>
                                <!-- Botões de editar e excluir por linha -->
                                <td>
                                    <a class="link-tabela-listagemEscola" id="editar" href="escola.php?id_up=<?php echo $dados[$i]['id'];?>">Editar</a>                                    <a class="link-tabela-listagemEscola" id="excluir" href="escola.php?id=<?php echo $dados[$i]['id'];?>">Excluir</a>
                                </td>
                        <?php
                                echo "</tr>";
                            } //fim do for
                        } else {
                            echo "<p>Nenhuma Escola cadastrada!</p>";
                        }
                        ?>
                    </table>
                </section>
            </div>
        </section>      
    </main>


<?php

    if(isset($_GET['id'])){
        $id_escola = addslashes($_GET['id']);
        echo "<script language='javascript'>window.location.href='escola.php';</script>";
        $escola->excluirEscola($id_escola);
       
    }
?>
</body>

</html>