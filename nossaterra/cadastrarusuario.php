<!DOCTYPE html>
<html lang="pt-ao">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nossa Terra | Cadastro</title>
	<link rel="stylesheet" href="./css/custom.css">
	<!--<link rel="stylesheet" href="./css/bootstrap.min.css">-->
     <link rel="stylesheet" href="./css/cadastrarusuario.css">
</head>
<body>
	 <header></header>

     <main class="container">
     	<article>
     		<section class="texto">
     			<h1><a href="index.php">Nossa terra</a></h1>
     			<h2>Faça seu cadastro<br>na plataforma</h2>
     		</section>

     		<section class="card_login">
     			<form action="./php_action/action_usuario_logincadastro.php" method="POST">
     				<p>
                        <label>Nome</label>
     					<input type="text" name="input_nome" placeholder="Usuário" autofocus>
     				</p>
                         <p>
                        <label>Ocupação</label>
                              <input type="text" name="input_ocupacao" placeholder="Ocupação" autofocus>
                         </p>
                         <p>
                              <label>Cidade de Residência</label>
                              <input type="text" name="input_endereco" placeholder="Cidade de residencia">
                         </p>
                         <p>
                        <label>Gênero</label>
                              <input type="text" name="input_genero" placeholder="Gênero" autofocus>
                         </p>
     				<p>
                        <label>Email</label>
     					<input type="email" name="input_email" placeholder="Email">
     				</p>
                         <p>
                              <label>Telemovél</label>
                              <input type="number" name="input_phone" placeholder="Número de celular" length="9">
                         </p>
     				<p>
                        <label>Senha</label>
     					<input type="password" name="input_senha" placeholder="Senha">
     				</p>
     				<p>
                        <label>Confirmar a senha</label>
     					<input type="password" name="input_senha1" placeholder="Confirmar Senha">
     				</p>
     				
     				<p>
     					<button class="btn_entrar" name="btn_cadastrar">Cadastrar</button>
     				</p>
     				<p class="">
     					<a  class="btn bg-primary" href="login.php">Entrar</a>
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