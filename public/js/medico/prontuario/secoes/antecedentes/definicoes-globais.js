/*
*
* DEFINICOES GLOBAIS
*
*/

// Desativa cache do ajax
$.ajaxSetup ({cache: false});

/*
ESTE É UM EXEMPLO DE CÓDIGO DO SELECT2 COM AJAX. ELE ACABOU NÃO SENDO UTILIZADO NESTA SEÇÃO
$('.doenca_pessoa, .doenca_avo, .doenca_avoo, .doenca_pai, .doenca_mae').select2({
    placeholder: 'Digite nome da doença',
	minimumInputLength: 3,
	multiple: true,
	width: 400,
	minimumInputLength: 3,
    ajax: {
        dataType: 'json',
        url: '<?php echo url('medico/painel/prontuarios/antecedentes-json'); ?>',
        delay: 400,
        data: function(params) {
            return {
                term: params.term
            }
        },
        processResults: function (data, page) {
			return {
				results: data.results
			};
        },
    }
});
*/
