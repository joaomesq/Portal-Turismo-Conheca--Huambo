let sidenote = document.getElementById("sidenote");
let modal_menu = document.getElementById("modal");
function pesquisar(){
	sidenote.style.display="none";
	modal_menu.style.display="none";
}
function fechar_pesquisa(){
	sidenote.style.display="unset";
	modal_menu.style.display="unset";
}

function load(){

	document.getElementById("btn_abrir_pesquisar").addEventListener("click", pesquisar);
	document.getElementById("btn_close_pesquisa").addEventListener("click", fechar_pesquisa);
}
window.addEventListener("load", load);