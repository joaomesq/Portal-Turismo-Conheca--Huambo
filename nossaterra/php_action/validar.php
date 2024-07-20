<?php
session_start();

//logout
if (isset($_GET['sair'])) {
		// code...
		session_unset();
		$_SESSION['logado'] = false;
		
}	

if( !$_SESSION['logado']):
	header("Location: /nossaterra/login.php");
else:
	$usuario = $_SESSION['nome_usuario'];
endif;

