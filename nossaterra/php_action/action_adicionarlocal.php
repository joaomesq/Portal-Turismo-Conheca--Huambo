<?php
//Conexao
require_once 'conexao.php';
//Sessao
session_start();

function adiconar_local(){
	global $conexao;

	$nome_local = clear($_POST['input_nome']);
	$localizacao = clear($_POST['textarea_localizacao']);
	$descricao = clear($_POST['textarea_descricao']);
	$municipio = clear($_POST['select_municipio']);

	//Validando
	if(empty($nome_local) || empty($localizacao) || empty($descricao))
		die('Preencha todos os campos');

	if($_FILES['input_foto']['size'] == 0)
		die('Arquivo inexistente');

	//Trabalhando o arquivo
	if(isset($_FILES['input_foto'])):
		$foto = $_FILES['input_foto'];
		$nome_foto = $foto['name'];
		$pasta = '../img-dos-locais/';
        $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));
		$caminho = $pasta.$nome_foto;

		if($foto['error'])
			die('Falha ao carregar o arquivo');

		if($extensao!= 'jpg' && $extensao!= 'jpeg' && $extensao!= 'png')
			die('Tipo de arquivo não aceito');

       
       //Checando o local
		$sql = "SELECT  local_nome FROM locais WHERE local_nome = '$nome_local'";
		$consulta = requisicao_Bd($conexao, $sql);

		if(obter_total_de_linhas_Dados($consulta) > 0)
			die('O local já está cadastrado');

		$sucesso = move_uploaded_file($foto['tmp_name'], $caminho);

		//Insert in database
		if($sucesso):
			$usuario = $_SESSION['nome_usuario'];
			$sql = "INSERT INTO locais (local_nome, local_descricao, local_municipio, local_localizacao, local_adicionado_por, local_foto) VALUES ('$nome_local', '$descricao', '$municipio', '$localizacao', '$usuario', '$nome_foto')";
			$consulta = requisicao_Bd($conexao, $sql);

			if($consulta):
				$mensagem = "Obrigado pela sua sugestão. Enquanto analisamos o seu local aproveite e explore aqueles que podem ser o seu próximo destino. Avisaremos assim que o local for aprovado";
				header("Location: /nossaterra/index.php?mensagem=$mensagem");
			else:
				header('Location: /nossaterra/adicionarlocal.php?Erro');
			endif;
		else:
			return "Erro ao enviar";
		endif;
	endif;
}

//Chamndo a funcao
if(isset($_POST['btn_adicionar'])):
	$resultado = adiconar_local();
	echo $resultado;
endif;