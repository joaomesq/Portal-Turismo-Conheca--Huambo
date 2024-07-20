<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nossa Terra | Login</title>
	<!--<link rel="stylesheet" href="./css/bootstrap.min.css">-->
     <link rel="stylesheet" href="./css/custom.css">
     <link rel="stylesheet" href="./css/login.css">
</head>
<body>
     <header></header>

     <main class="container">
     	<article>
     		<section class="texto">
     			<h1><a href="index.php">Nossa Terra</a></h1>
     			<h2>Faça seu login<br>na plataforma</h2>
     		</section>

     		<section class="card_login">
     			<form action="./php_action/action_usuario_logincadastro.php" method="POST">
     				<p>
                        <label>Nome</label>
     					<input type="text" name="input_nome" placeholder="Usuário" autofocus>
     				</p>
     				<p>
                        <label>Senha</label>
     					<input type="password" name="input_senha" placeholder="Senha">
     				</p>
     				<div class="link">
     					<a href="#">Esqueci a passe</a>
     				</div>
     				<p>
     					<button class="btn_entrar" name="btn_entrar">Entrar</button>
     				</p>
     				<p class="cadastrar">
     					<a href="cadastrarusuario.php">Quero me cadastrar!</a>
     				</p>
     			</form>
     		</section>

               <section class="assinatura">
                    <p>"Chanax: Desenvolvendo ideias, criando soluções."</p>
                    <p>&copy; 2023-Todos Os Direictos Reservados a Chanax Tecnolog</p>
               </section>
     	</article>
     </main>

     <footer></footer>
</body>
</html>