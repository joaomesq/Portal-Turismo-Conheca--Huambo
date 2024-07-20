<?php
require_once 'conexao.php';

//Perfil
function exibir_info_perfil($usuario){
	global $conexao;

	$sql = "SELECT *FROM usuarios WHERE user_name = '$usuario'";
	$consulta = requisicao_Bd($conexao, $sql);
	$dados = obter_Dados($consulta);

	echo "
	       <div>
	           <ul>
	               <li>
	                   <span>Nome</span>
	                   <p>".$dados['user_name']."</p>
	               </li>
	               <li>
	                   <span>Ocupação</span>
	                   <p>".$dados['user_ocupacao']."</p>
	               </li>
	               <li>
	                   <span>Cidade de Residência</span>
	                   <p>".$dados['user_cidade_residencia']."</p>
	               </li>
	               <li>
	                   <span>E-mail</span>
	                   <p>".$dados['user_email']."</p>
	               </li>
	               <li>
	                   <span>Telemóvel</span>
	                   <p>".$dados['user_phone']."</p>
	               </li>
	               <li>
	                   <span>Gênero</span>
	                   <p>".$dados['user_genero']."</p>
	               </li>
	           </ul>
	       </div>
	      ";
}

//Publicacoes
function exibir_info_publicacoes($usuario){
     global $conexao;
     
     $sql = "SELECT *FROM locais WHERE local_adicionado_por = '$usuario'";
     $consulta = requisicao_Bd($conexao, $sql);

     if(obter_total_de_linhas_Dados($consulta) == 0):
     	echo "
              <h3>Nenhuma publicacao</h3>
             ";
     else:
     	while($publicacoes = obter_Dados($consulta)):
     		echo "
     	      <div class='place'>
                        <h3>".$publicacoes['local_nome']."</h3>
                        <img src='./img-dos-locais/".$publicacoes['local_foto']."' alt='imagem do local'>
                        <p>".$publicacoes['local_descricao']."</p>
                        <p> <strong>Localizacação:</strong><br>".$publicacoes['local_localizacao']."</p>
                        
                        <div class='clear'></div>
              </div>
     	      ";
     	endwhile;
     endif;
}

//comentarios
function exibir_comentarios($usuario){
	global $conexao;

	$sql = "SELECT *FROM comentarios WHERE comentario_user = '$usuario' ";
	$consulta = requisicao_Bd($conexao, $sql);

	if(obter_total_de_linhas_Dados($consulta) == 0):
		echo "<h3>Nenhum comentário</h3>";
	else:
		echo "<ol>";
		while( $comentarios = obter_Dados($consulta)):
			echo"
			    <li>".$comentarios['comentario']."</li>
			";
		endwhile;
		echo "</ol>";
	endif;
}