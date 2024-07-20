<?php
require_once 'conexao.php';

function exibir_local($valor_pesquisar){
	global $conexao;
    
    if(empty($valor_pesquisar)):
    	$sql = "SELECT *FROM locais WHERE local_estado != 'Espera' ORDER BY local_likes DESC";
    else:
    	$sql = "SELECT *FROM locais WHERE local_nome LIKE '$valor_pesquisar%' OR local_descricao LIKE '%$valor_pesquisar%' OR local_adicionado_por LIKE '$valor_pesquisar%' ORDER BY local_likes DESC";
    endif;

	$consulta = requisicao_Bd($conexao, $sql);
    
	if(obter_total_de_linhas_Dados($consulta) != 0):
		while($local = obter_Dados($consulta)):
			
			//Chamando contar likes
      $total_comentarios = count_comentarios($local['id_local']);

      //Escrevendo
			echo "
		            <div class='place'>
                        <h3><strong><a href='local.php?local=".$local['id_local']."'>".$local['local_nome']."</a></strong></h3>
                        <p><a href='./img-dos-locais/".$local['local_foto']."' 
                        target='_blank'><img src='./img-dos-locais/".$local['local_foto']."' alt='imagem do local'></a></p>
                        <p>".$local['local_introducao']."<span><a href='local.php?local=".$local['id_local']."'>Ver mais</a></span></p>
                        <span>Adiconado por <a href='userarea.php?user=".$local['local_adicionado_por']."'>@".$local['local_adicionado_por']."</a></span>
                        <form action='' method='POST'>
                              <ul>
                                  <li><input type='hidden' name='input_id_local' value='".$local['id_local']."'></li>
                                  <li><button name='btn_like' id='btn-like' class='btn'>Like<br>".$local['local_likes']."</button></li>
                                  <li><button name='btn_comentario' id='btn_comentario' class='btn'>Comentários<br>".$total_comentarios."</button></li>
                              </ul>
                        </form>
                        <div class='clear'></div>
                    </div>

		      ";
		endwhile;
	else:
		echo "
		      <div class='place'>
                        <h3>Local não encontrado</h3>
             
               </div>

		     ";
	endif;
}

function montar_sidenote(){
	global $conexao;

	$sql = "SELECT local_nome,id_local FROM locais WHERE local_estado != 'Espera' ORDER BY local_likes asc";
	$consulta = requisicao_Bd($conexao, $sql);
   
  if(obter_total_de_linhas_Dados($consulta) != 0):
    //Ajuste do número dos locais recomendados
    if(obter_total_de_linhas_Dados($consulta) >= 5):
    	$numero_locais = 5;
    else:
    	$numero_locais = 3;
    endif;
  		for ($cont=0; $cont < $numero_locais; $cont++) { 
  			$dados = obter_Dados($consulta);
  			echo "
		          <li><a href='local.php?local=".$dados['id_local']."'>".$dados['local_nome']."</a></li>
		         ";
	}
  endif;
}

//Pegar total de comentarios
function count_comentarios($valor){
	global $conexao;
	$total = 0;

	$sql = "SELECT comentario FROM comentarios WHERE comentario_id_local = '$valor'";
	$consulta = requisicao_Bd($conexao, $sql);
  if(obter_total_de_linhas_Dados($consulta) != 0):
  	while(obter_Dados($consulta)):
  		$total += 1;
  	endwhile;
  	return $total;
  else:
  	return $total;
  endif;
}

//Agradecimento
function mensagem_agradecimento($mensagem){
	echo "
	      <script>
	             alert('".$mensagem."')
	      </script>
	      ";
}