<?php
require_once './php_action/validar.php';
require_once './php_action/action_userarea.php';

if(isset($_GET['user'])):
    $usuario = clear($_GET['user']);
else:
    $usuario = $_SESSION['nome_usuario'];
endif;
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="João Baptista Mesquita">

	<title>Nossa Terra | <?php echo $usuario; ?></title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/userarea.css">
</head>
<body>
	<header class="cabecalho">
        <button class="btn_Open"><img src="./img/menu.png"></button>
        <h1><a href="index.php">ANGOLA</a></h1>
        
        <article class="modal">

            <section>
                <button class="btn_Close ">x</button>
                <nav class="menu">
            <ul>
            	<li><a href="index.php">Home</a></li>
                <li><a href="adicionarlocal.php">Novo Local</a></li>
            </ul>
        </nav>
            </section>
        </article>
     </header>

     <main class="container">
     	   <article class="area-de-selecao">
     	   	        
     	   	        <img src="./img/i.jpg"><h2><strong><?php echo $usuario; ?></strong></h2>
     	   	        <ul>
     	   	        	<li><button id="btn_perfil" class="btn">Detalhes Pessoais</button></li>
     	   	        	<li><button id="btn_publicacoes" class="btn">Publicações</button></li>
                        <li><button id="btn_comentarios" class="btn">Comentários</button></li>
     	   	        </ul>
     	   </article>
     	   <article class="informacao">
     	   	        <section class="info-perfil" id="perfil">
     	   	        	<?php
     	   	        	     exibir_info_perfil($usuario);
     	   	        	?>
     	   	        </section>
     	   	        <section class="info-publicacoes" id="publicacoes">
     	   	        	<?php
     	   	        	    exibir_info_publicacoes($usuario);
     	   	        	?>
     	   	        </section>
                    <section class="info-comentarios" id="comentarios">
                        <?php
                             exibir_comentarios($usuario);
                        ?>
                    </section>
     	   </article>
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
        <script src="./js/userarea.js"></script>
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