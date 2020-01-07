/*
*
* FUNÇÕES CUSTOMIZADAS 
*
*/

// ::: Função para atualizar opções do combo de cidade :::
function atualizaComboCidade(elemento, cod_estado, cod_cidade_marcada, callback) {

    // Localiza o combobox com classe .cidade mais próximo do elemento informado, usando div.panel-body como elemento-pai
    var combo_cidade = $(elemento).closest('.panel-body').find('.cidade');

    $.ajax({
        cache: false,
        type: 'POST',
        url: UrlListarCidadesEstado,
        data: { 'cod_estado': cod_estado },        
        dataType: 'json',
        beforeSend: function() { 

            // Resetando todos os possiveis Toast
            $.toast().reset('all');

            // Mostra mensagem 'processando...'
            toast_processando = $.toast({
                text: 'Processando...',
                showHideTransition: 'fade',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: false
            });

        },
        complete: function(response) {
            // Oculta mensagem 'processando...'
            toast_processando.reset();
        },
        success: function(result) {

            // Limpo opções atuais do combo
            combo_cidade.empty();

            // Adiciono opção padrão
            combo_cidade.append("<option value=''>Selecione uma opção</option>");

            // Checo informações retornadas
            if (result == 'nada-encontrado') {

                //console.log('Nenhuma cidade encontrada');

            } else if (result == 'cod-estado-vazio') {

                //console.log('Codigo do estado vazio');

            } else {

                // Faço loop pelas opções do vetor
                $(result).each(function (index, value) {

                    combo_cidade.append("<option value='" + value.cod_cidade + "'>" + value.nome_cidade + "</option>");
                    
                    if (cod_cidade_marcada !== null && value.cod_cidade == cod_cidade_marcada) {
                        $(elemento).closest('.panel-body').find('.cidade option[value="' + value.cod_cidade + '"]').prop('selected', true);
                    }

                });

            }

        },
        error: function (xhr, ajaxOptions, thrownError) {
            //console.log(xhr.responseText);
        }
    });

    // Checo se existe necessidade de executar callback
    if (typeof callback === 'function') { 
        callback(); 
    }

}