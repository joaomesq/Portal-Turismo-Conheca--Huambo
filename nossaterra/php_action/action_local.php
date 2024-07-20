<?php
//includes
require_once 'conexao.php';

//Identificação do local
function identificacao_local($valor){
	global $conexao;
	clear($valor);

	$sql = "SELECT local_nome, local_municipio FROM locais WHERE id_local = $valor";
	$consulta = requisicao_Bd($conexao, $sql);

	if($consulta):
		$local = obter_Dados($consulta);
		echo "<h2><strong>".$local['local_municipio']." | ".$local['local_nome']."</strong></h2>";
	endif;
}
//Like
function adicionar_like(){
    global $conexao;
    if(isset($_GET['input_id_local'])):
		$id_local = clear($_GET['input_id_local']);
	endif;
    if(isset($_POST['input_id_local'])):
		$id_local = clear($_POST['input_id_local']);
	endif;

    $sql = "UPDATE locais SET local_likes = local_likes + 1 WHERE id_local = '$id_local' ";
    $consulta = requisicao_Bd($conexao, $sql);
}

//Abrir comentario
function abrir_comentario(){
	$id_local = clear($_POST['input_id_local']);
	header("Location: /nossaterra/local.php?local=$id_local");
}

//Exibir comentarios
function exibir_comentarios(){
	global $conexao;
	if(isset($_GET['local'])):
		$id_local = clear($_GET['local']);
	endif;
	if(isset($_POST['input_id_local'])):
		$id_local = clear($_POST['input_id_local']);
	endif;
	

	//Pegando o local
	$sql = "SELECT local_nome, local_descricao, local_adicionado_por, local_localizacao, local_foto FROM locais WHERE id_local = '$id_local'";
	$consulta = requisicao_Bd($conexao, $sql);
	$local = obter_Dados($consulta);
	echo "
	      <section class='local'>
	               
	               <div class='grid'>
	               <div class='foto'>
	                    <figure>
	                           <img src='./img-dos-locais/".$local['local_foto']."' alt='fotografia do  ".$local['local_nome']."' >
	                           <figcaption><strong>".$local['local_nome']."</strong></figcaption>
	                    </figure>
	               </div>
                   <div>
                       <p>".$local['local_descricao']."</p>
                   </div>
	               </div>
	               
	               <p id='localizacao'>
	                     <strong>Localizacação</strong>
	                     <br>
	                     ".$local['local_localizacao']."
	                </p>

	               <form action='' method='POST'>
                              <ul>
                                  <li><input type='hidden' name='input_id_local' value='".$id_local."'></li>
                                  <li><button name='btn_like' id='btn-like' class='btn'>Like</button></li>
                                  <li><button name='btn_comentar' id='btn_comentar' class='btn'>Comentar</button></li>
                              </ul>
                              <div class='comentar' id='comentar'>
                                   <textarea name='textarea_comentario'></textarea>
                                   <button name='btn_comentar' class='btn'>Send</button>
                              </div>
                        </form>
	      </section>
	     ";

	//Pegando os comentarios
	$sql = "SELECT comentario_id_local, comentario, comentario_user FROM comentarios WHERE comentario_id_local = '$id_local'";
	$consulta = requisicao_Bd($conexao, $sql);

	if(obter_total_de_linhas_Dados($consulta) != 0):
		echo "
			      <section class='comentarios my-3'>
			       <ul>
			      ";
		while($comentarios = obter_Dados($consulta)):
			echo "
			      <li>
			            <span><strong><a href='userarea.php?user=".$comentarios['comentario_user']."'>".$comentarios['comentario_user']."</a></strong></span>
			            <p>".$comentarios['comentario']."</p>
			      </li>
			     ";
		endwhile;
		echo "</ul>
			       </section>";
	else:
		echo "<p>Sem comentarios</p>";
	endif;
}

//Comentar
function comentar(){
	//Verificando se o usuario está logado
	require_once 'validar.php';
    
    global $conexao;
	$id_local = clear($_POST['input_id_local']);
	$comentario = clear($_POST['textarea_comentario']);
	
	if(!empty($comentario) AND !empty($usuario)):
		$sql = "INSERT INTO comentarios (comentario_id_local, comentario, comentario_user) VALUES('$id_local', '$comentario', '$usuario')";
	    $consulta = requisicao_Bd($conexao, $sql);
	endif;
	/*
	echo "
	      <script>
	             alert('".$usuario."')
	      </script>
	      ";
	*/
}