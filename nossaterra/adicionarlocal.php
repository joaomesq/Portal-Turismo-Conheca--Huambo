 <?php
require_once './php_action/validar.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nossa terra | Novo local</title>
	<!--<link rel="stylesheet" href="./css/bootstrap.min.css">-->
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./css/adicionarlocal.css">
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
                <li><a href="userarea.php">User</a></li>
            </ul>
        </nav>
            </section>
        </article>
     </header>


        <main class="main">
        	<article>
        		<h2>Novo Local</h2>

        		<section class="card_adicionar_local">
        			<form action="./php_action/action_adicionarlocal.php"; method="POST" enctype="multipart/form-data">

     			    <fieldset>
     				<legend>Sugira o seu local</legend>
     				<p>
     					<label><strong>Nome</strong></label>
     					<input type="text" name="input_nome" placeholder="Insira o nome do local" autofocus>
     				</p>
     				<p>
     					        <label><strong>Municipio</strong></label>
     							<select name="select_municipio">
     								<option value="Huambo">Huambo</option>
     								<option value="Caála">Caála</option>
     								<option value="Bailundo">Bailundo</option>
     								<option value="Katchiungo">Katchiungo</option>
     								<option value="Ekunha">Ekunha</option>
     								<option value="Mungo">Mungo</option>
                                    <option value="Tchingenji">Tchingenji</option>
                                    <option value="Ukuma">Ukuma</option>
                                    <option value="Longonjo">Longonjo</option>
                                    <option value="Londimbali">Ekunha</option>
                                    <option value="Tchila-tcholoanga">Ticha-Tcholoanga</option>
     							</select>
     				</p>
                    <p>
                    	<label><strong>Endereço</strong></label>
                        <textarea name="textarea_localizacao" placeholder="Fale da localização" id="textarea_localizacao"></textarea>
                    </p>
                    <p>
                    	<label><strong>Descrição</strong></label>
                    	<textarea name="textarea_descricao" placeholder="Descrição do local"></textarea>
                    </p>
                    <p>
                    	<label><strong>Fotografia</strong></label>
                    	<input type="file" name="input_foto">
                    </p>
                    <p>
                    	<button name="btn_adicionar" id="adicionar">Adicionar</button>
     					<button type="reset" name="btn_limpar" id="limpar">Limpar</button>
                    </p>     						
     			</fieldset>

     	        </form>
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