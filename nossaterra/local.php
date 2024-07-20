<?php
//includes
require_once './php_action/action_local.php';

//Chamando as funções
if(isset($_POST['btn_comentar'])):
    comentar();
endif;
if(isset($_POST['btn_like'])):
    adicionar_like();
endif;

//rederecionnado para pesquisar
if(isset($_GET['buscar'])):
    $valor_pesquisar = clear($_GET['buscar']);
    header("Location: index.php?buscar=$valor_pesquisar");
endif;
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Nossa Terra | User</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./css/comentario.css">
</head>
<body>
	<header class="cabecalho">
        <button class="btn_Open"><img src="./img/menu.png"></button>
        <h1><a href="index.php">ANGOLA</a></h1>
        
        <article class="modal" id="modal">

            <section>
                <button class="btn_Close ">x</button>
                <nav class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="userarea.php">User</a></li>
                <li><a href="adicionarlocal.php">Novo local</a></li>
                <li class="btn_abrir_pesquisar" id="btn_abrir_pesquisar"><a href="#">Pesquisar</a></li>
            </ul>
        </nav>
            </section>
        </article>

        
        <div class="div_pesquisar">
            <button class="btn_Close_pesquisa" id="btn_close_pesquisa">x</button>
        <form class="pesquisar" method="GET">
                            <input type="search" name="buscar" placeholder="Buscar">
                            <button name="btn_buscar">Buscar</button>
           </form>
           </div>
     </header>
     
     <main class="container">
        <article class="identificacao">
            <?php
             identificacao_local($_GET['local']);
             ?>
        </article>
        <article class="info_local">
            <?php 
                exibir_comentarios();
            ?>
        </article>
        <section id="sidenote"></section>
     </main>

     <footer class="rodape clear">
        <article>
            <section class="ajuda">
                <h4>Ajuda</h4>
                <p>
                    <ol>
                        <li>Faça o seu o seu login/cadastro.</li>
                        <li>Adicione um local.</li>
                        <li>Conheça outros locais.</li>
                    </ol>
                </p>
            </section>

            <section class="contato">
                <h4>Contato</h4>
                <ul>
                    <li>+244 923 943 421</li>
                    <li>Chanax.com</li>
                    <li>joaobmesquita1@gmail.com</li>
                </ul>           
            </section>

            <section class="sobre">
                <h4>Sobre</h4>
                <p>Nossa Terra é uma plataforma desenvolvida a pensar naqueles que gostam de conhecer lugares novos e partilhar com o mundo seus lugares favoritos. Junte-se a nós para que possas juntamente connosco explorar e mostrar ao mundo os lugares incriveís da cidade do Huambo!</p>
            </section>
        </article>
          <p>"Chanax: Desenvolvendo ideias, criando soluções."</p>
          <p>&copy; 2023-Todos Os Direictos Reservados a Chanax Tecnolog</p>
        </footer>
        
        <script src="./js/custom.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
     

        <script>
        $(".btn_Open").click(function () {
            $(".modal").show();
        })
        $(".btn_Close").click(function () {
            $(".modal").hide();
        });

        $(".btn_abrir_pesquisar").click(function () {
            $(".div_pesquisar").show();
        })
        $(".btn_Close_pesquisa").click(function () {
            $(".div_pesquisar").hide();
        });
        </script>                       
</body>
</html>