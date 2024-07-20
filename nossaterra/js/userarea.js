let perfil = document.getElementById("perfil");
let publicacoes = document.getElementById("publicacoes");
let comentarios = document.getElementById("comentarios");

//dados
function exibir_dados(){
	perfil.style.display="block";
	publicacoes.style.display="none"
	comentarios.style.display="none";

	document.getElementById("btn_perfil").style.border="solid 2px #fff";
	document.getElementById("btn_perfil").style.borderBottom="0";

	document.getElementById("btn_publicacoes").style.border="none";
	document.getElementById("btn_comentarios").style.border="none";
}

//publicações
function exibir_publicacoes(){
	perfil.style.display="none";
	publicacoes.style.display="block";
	comentarios.style.display="none";

	document.getElementById("btn_publicacoes").style.border="solid 2px #fff";
	document.getElementById("btn_publicacoes").style.borderBottom="0";

	document.getElementById("btn_perfil").style.border="none";
	document.getElementById("btn_comentarios").style.border="none";	
}

//Comentarios
function exibir_comentarios(){
	perfil.style.display="none";
	publicacoes.style.display="none";
	comentarios.style.display="block";

	document.getElementById("btn_comentarios").style.border="solid 2px #fff";
	document.getElementById("btn_comentarios").style.borderBottom="0";

	document.getElementById("btn_perfil").style.border="none";
	document.getElementById("btn_publicacoes").style.border="none";	
}

function load(){
	document.getElementById("btn_perfil").addEventListener("click", exibir_dados);
	document.getElementById("btn_publicacoes").addEventListener("click", exibir_publicacoes);
	document.getElementById("btn_comentarios").addEventListener("click", exibir_comentarios);
}

window.addEventListener("load", load);