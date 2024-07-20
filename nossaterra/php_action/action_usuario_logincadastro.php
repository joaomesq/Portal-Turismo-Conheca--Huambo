<?php
//Conexao
require_once 'conexao.php';

//Login
function logar(){
	global $conexao;

	$user_name = clear($_POST['input_nome']);
	$user_password = clear($_POST['input_senha']);
    $mensagem ='';

    //Validando
    if(empty($user_name) OR empty($user_password)):
    	$mensagem = 'Preencha todos os campos';
    else:
    	//Checando o usuario
    	$sql = "SELECT user_name FROM usuarios WHERE user_name = '$user_name'";
    	$consulta = requisicao_Bd($conexao, $sql);

        if(obter_total_de_linhas_Dados($consulta) == 0):
        	$mensagem = 'Credencias incorretas';
        else:
        	//Autenticar usuario
        	$sql = "SELECT user_name FROM usuarios WHERE user_name = '$user_name' AND user_senha = '$user_password'";
        	$consulta = requisicao_Bd($conexao, $sql);

        	if(obter_total_de_linhas_Dados($consulta) == 1):
        		$dados_usuario = obter_Dados($consulta);

        		//iniciar sessao
        		session_start();
        		$_SESSION['logado'] = true;
        		$_SESSION['nome_usuario'] = $dados_usuario['user_name'];
        		$_SESSION['id'] = $dados_usuario['id_user'];
        	else:
        		$mensagem = 'Credencias incorretas';
        	endif;
        endif;
    endif;

    //Redirecionando
    if(empty($mensagem)):
    	header("Location: /nossaterra/index.php?saudacao=Bem Vindo $user_name");
    else:
    	header("Location: /nossaterra/login.php?mensagem=$mensagem");
    endif;
}

//Cadastro
function cadastrar(){
	global $conexao;

	$nome = clear($_POST['input_nome']);
    $ocupacao = clear($_POST['input_ocupacao']);
	$local_residencia = clear($_POST['input_endereco']);
    $email = clear($_POST['input_email']);
    $phone = clear($_POST['input_phone']);
    $genero = clear($_POST['input_genero']);
	$senha = clear($_POST['input_senha']);
	$senha1 = clear($_POST['input_senha1']);
    $mensagem = '';

	//Validadno
	if(empty($nome) OR empty($email) OR empty($local_residencia) OR empty($senha)):
		$mensagem = 'Preencha todos os campos';
    endif;

    if($senha != $senha1):
    	$mensagem = 'As senhas não conferem';
    endif;

    //Checkando usuario
    $sql = "SELECT user_name FROM usuarios WHERE user_name = '$nome' ";
    $consulta = requisicao_Bd($conexao, $sql);
    if(obter_total_de_linhas_Dados($consulta) != 0):
    	$mensagem = 'O usuário já existe';
    endif;

    //Inserindo usuario
    if(empty($mensagem)):
    	$sql = "INSERT INTO usuarios (user_name, user_senha, user_email, user_cidade_residencia, user_ocupacao, user_genero, user_phone, user_data_nascimento) VALUES('$nome', '$senha', '$email', '$local_residencia', '$ocupacao', '$genero', '$phone', default)";
    	$consulta = requisicao_Bd($conexao, $sql);
        header("Location: /nossaterra/login.php?Sucesso");
    else:
    	header("Location: /nossaterra/cadastrarusuario.php?mensagem=$mensagem");
    endif;
}

//Logando
if(isset($_POST['btn_entrar'])):
	logar();
endif;

//Cadastrando
if(isset($_POST['btn_cadastrar'])):
	cadastrar();
endif;