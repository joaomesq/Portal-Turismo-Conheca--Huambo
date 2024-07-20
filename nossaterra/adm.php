<?php
//includes
require_once './php_action/action_adm.php';
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nossa Terra | Admin</title>

	<link rel="stylesheet" href="./css/custom.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
	<header></header>

	<main class="container-fluid">
		<h1>Gestão dos lugares</h1>
		<article class="sugestões row">
			<?php
			    sugestoes();
			?>
			<?php
			     if(isset($_POST['btn-aprovar'])):
			     	$local = $_POST['id-local'];
			     	$introducao = $_POST['introducao'];

			     	if(!empty($local) || !empty($introducao)):
			     		liberar_local($local, $introducao);
			        else:
			        	echo "Preencha a introdução";
			     	endif;
			     endif;
			?>
		</article>
		<article class="publicacoes"></article>
		<article class="usuarios"></article>
	</main>

	<footer></footer>

</body>
</html>