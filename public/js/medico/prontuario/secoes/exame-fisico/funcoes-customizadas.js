/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/

/************************************
 #
 # Função
 # 
*************************************/ 
function ratingEnable(elemento) {

	$(elemento).barrating('show', {
		theme: 'bars-1to10',
		showValues: false,
		reverse: false,
		readonly: false,
		fastClicks: true
	});

}


/************************************
 #
 # Função
 # 
*************************************/ 
function ratingDisable(elemento) {
	
	$(elemento).barrating('destroy');

}