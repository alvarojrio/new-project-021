/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/

/************************************
 #
 # Adiciona determinado registro aos favoritos
 # 
*************************************/ 
function salvar_favorito(tipo_hipotese, cod_hipotese) {

	alert('estrela de favorito de hipotese ' + tipo_hipotese + ' de código ' + cod_hipotese + ' foi clicado. deverá ser aberta uma janela para confirmar ADIÇÃO aos favoritos.');

}



/************************************
 #
 # Remove determinado registro dos favoritos
 # 
*************************************/ 
function remover_favorito(tipo_hipotese, cod_hipotese) {

	alert('estrela de favorito de hipotese ' + tipo_hipotese + ' de código ' + cod_hipotese + ' foi clicado. deverá ser aberta uma janela para confirmar REMOÇÃO dos favoritos.');

}



/************************************
 #
 # Adiciona uma nova hipotese na lista de hipóteses (principal/secundária)
 # 
*************************************/ 
function adicionar_hipotese(origem, cod_hipotese) {

	// Caso a origem da requisição seja a caixa de hipótese principal
    if (origem == 'principal') {

		// Conto total de tags já existente dentro da div
		var total_hipoteses_principais = $('.caixa-tags-hipoteses-principais .row .form-group .tag-hipotese').size();

		// Verifico se existe um elemento dentro da div
		if (total_hipoteses_principais > 0) {

			// Exibe mensagem de erro
	        $('.modal_msg_erro').append('<h4>Alerta</h4>');
	        $('.modal_msg_erro').append('Já existe uma HIPÓTESE PRINCIPAL definida.');
	        $('.modal_msg_erro').show();

	        // Retorno
			return false;

		}

		// Monta HTML
		var tag_hipotese = '';
		tag_hipotese += 
		'<div class="chip chip-verde tag-hipotese" data-tipo-hipotese="principal" data-cod-hipotese-principal="' + cod_hipotese + '">' +
		'<span class="fas fa-star estrela-favorito star-checked"></span>' +
		' hipotese de codigo ' + cod_hipotese +
		'<i class="chip-fechar fas fa-times remover-hipotese-principal"></i>' +								
		'</div>';

		// Acrescenta novo elemento na div adequada
		$('.caixa-tags-hipoteses-principais .row .form-group').append(tag_hipotese);

		// Fecha janela modal de favoritos
	    $('#modal-favoritos-hipotese-diagnostica').modal('hide');

	} else if (origem == 'secundaria') {

		// Monta HTML
		var tag_hipotese = '';
		tag_hipotese += 
		'<div class="chip chip-verde tag-hipotese" data-tipo-hipotese="secundaria" data-cod-hipotese-secundaria="' + cod_hipotese + '">' +
		'<span class="fas fa-star estrela-favorito star-checked"></span>' +
		' hipotese de codigo ' + cod_hipotese +
		'<i class="chip-fechar fas fa-times remover-hipotese-secundaria"></i>' +								
		'</div>';

		// Acrescenta novo elemento na div adequada
		$('.caixa-tags-hipoteses-secundarias .row .form-group').append(tag_hipotese);

		// Fecha janela modal de favoritos
	    $('#modal-favoritos-hipotese-diagnostica').modal('hide');

	}

}



/************************************
 #
 # Remove uma hipotese na lista de hipóteses (principal/secundária)
 # 
*************************************/ 
function remover_hipotese(tipo_hipotese, cod_hipotese) {

	alert('Solicitada REMOÇÃO da hipotese ' + tipo_hipotese + ' de código ' + cod_hipotese + '.');

}