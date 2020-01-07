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
function salvar_favorito(cod_alergia) {

	alert('Estrela de favorito de alergia de código ' + cod_alergia + ' foi clicado. deverá ser aberta uma janela para confirmar ADIÇÃO aos favoritos.');

}



/************************************
 #
 # Remove determinado registro dos favoritos
 # 
*************************************/ 
function remover_favorito(cod_alergia) {

	alert('Estrela de favorito de alergia de código ' + cod_alergia + ' foi clicado. deverá ser aberta uma janela para confirmar REMOÇÃO dos favoritos.');

}



/************************************
 #
 # Adiciona uma nova alergia na lista de alergias
 # 
*************************************/ 
function adicionar_alergia(origem, cod_alergia) {

    // Caso a origem da requisição seja a caixa de medicamentos atual
    if (origem == 'atual') {

    	// Monta HTML
		var linha_alergia = '';
		linha_alergia +=
		'<tr>' +
	    	'<td>' +
	    		'<div class="tag-alergia" data-cod-alergia="' + cod_alergia + '">' +
	    			'<span class="fas fa-star estrela-favorito star-checked"></span> Alergia de código ' + cod_alergia +
	    		'</div>' +
	    	'</td>' +
	    	'<td>Ácido Sulfúrico</td>' +
	    	'<td>Medicamento</td>' + 
	    	'<td>' +
				'<a href="javascript:void(null);" class="btn btn-sm btn-danger btn-remover-alergia" data-tipo-lista="atual" data-cod-alergia="' + cod_alergia + '">' +
	                '<i class="far fa-trash-alt"></i> Remover' +
	            '</a>' +
	    	'</td>' +
	    '</tr>';

    	// Acrescenta novo linha no começo da tabela
		$('.minha_datatable_alergias tbody').prepend(linha_alergia);

    } else if (origem == 'anteriores') {

    	// Soon

    }

	// Fecha janela modal de favoritos
    $('#modal-favoritos-alergias').modal('hide');

}



/************************************
 #
 # Remove uma alergia na lista de alergias
 # 
*************************************/ 
function remover_alergia(tipo_lista, cod_alergia) {

	alert('Foi solicitada a remoção da alergia de código ' + cod_alergia + ' da lista ' + tipo_lista);

}