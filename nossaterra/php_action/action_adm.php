<?php
//includes
 require_once 'persistencia.php';
 require_once 'conexao.php';

//Pegando as sugestões
function sugestoes(){
 	global $conexao;

 	$sql = "SELECT *FROM locais WHERE local_estado != 'Aprovado' ";
 	$consulta = requisicao_Bd($conexao, $sql);

    if(obter_total_de_linhas_Dados($consulta) != 0):
    	while( $sugestoes = obter_Dados($consulta) ):
    		echo "
    		      <div class='local_sugerido col-6 p-2'>
	                   <h3>".$sugestoes['local_nome']."</h3>
                   	   <p>
	                      <a href='./img-dos-locais/".$sugestoes['local_foto']."' target='_balank'>
	                      <img src='./img-dos-locais/".$sugestoes['local_foto']."'>
	                      </a>
                       </p>
                       <p>".$sugestoes['local_descricao']."</p>
                       
                       <form class='form' method='POST'>
                             <input type='hidden' name='id-local' value='". $sugestoes['id_local']."'>
                             <textarea name='introducao' placeholder='Introdução'></textarea>
                             <button class='btn bg-info' name='btn-aprovar'>Aprovar</button>
                             <button class='btn bg-danger' name='btn-recusar'>Recusar</button>
                       </form>
                  </div>
    		     ";
    	endwhile;
    else:
    	echo "
    	      <div class='local_sugerido'>
    	           <h3>Sem sugestões de momento</h3>
    	      </div>
    	     ";
    endif;
}

function liberar_local($valor_id, $introducao){
	global $conexao;
	$sql = "UPDATE locais
            SET local_introducao = '$introducao', local_estado = 'Aprovado'
            WHERE id_local = '$valor_id'
	        ";
	$consulta = requisicao_Bd($conexao, $sql);
}
