<?php
//Incuindo persistencia
require_once 'persistencia.php';
$conexao = conectar_Bd('127.0.0.1', 'root', '', 'nossa_terra');

//Segurança
function clear($input){
	global $conexao;
	$var = mysqli_escape_string($conexao, $input);
	$var = htmlspecialchars($var);
	return $var;
}