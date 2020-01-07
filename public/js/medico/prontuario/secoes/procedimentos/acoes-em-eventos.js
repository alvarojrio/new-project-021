/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    /************************************
     #
     # Aplicando função ao evento click do elemento .btn-modal-favoritos
     # Trata-se do botão que abre modal com lista de favoritos
     # 
    *************************************/ 
    $(document).on('click', '.btn-modal-favoritos', function(event) { 
    
        event.preventDefault();

        // Capto origem através de data-attributte no elemento
        var origem = $(this).data('origem-modal');

        // Guardo valor em input hidden
        $('#hide_origem').val('');
        $('#hide_origem').val(origem);

        // Abre janela modal de favoritos
        $('#modal-favoritos-hipotese-diagnostica').modal('show');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .opcao-favorito
     # Trata-se da ação de jogar um valor da seção de favoritos para uma lista oficial
     # 
    *************************************/ 
    $(document).on('click', '.opcao-favorito', function(event) { 
    
        event.preventDefault();

        // Reseta div de erros do modal
        $('.modal_msg_erro').html('');
        $('.modal_msg_erro').hide();

        // Defino variaveis
        var cod_hipotese = $(this).data('cod-hipotese');
        var origem = $('#hide_origem').val();

        // Checo se a origem foi devidamente passada
        if (origem == '') {

            // Exibe mensagem de erro
            $('.modal_msg_erro').append('<h4>Alerta</h4>');
            $('.modal_msg_erro').append('Não foi possível localizar os dados deste favorito. Atualize a página e tente novamente.');
            $('.modal_msg_erro').show();

            // Retorno
            return false;

        }

        // Executo função
        adicionar_hipotese(origem, cod_hipotese);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .estrela-favorito
     # Trata-se da estrela dentro da tag de hipotese na lista de hipoteses
     # 
    *************************************/ 
    $(document).on('click', '.estrela-favorito', function(event) { 
    
        event.preventDefault();

        // Preparo variaveis
        var tipo_hipotese = $(this).closest('.tag-hipotese').data('tipo-hipotese');
        var estrela = $(this);

        // Checo o tipo da hipotese para utilizar o data-attribute adequado
        if (tipo_hipotese == 'principal') {

            var cod_hipotese = $(this).closest('.tag-hipotese').data('cod-hipotese-principal');

        } else { // tipo secundária

            var cod_hipotese = $(this).closest('.tag-hipotese').data('cod-hipotese-secundaria');

        }
        
        // Verifico se o elemento está com a classe de estrela acesa, ou seja, é atualmente um favorito
        if ($(estrela).hasClass('star-checked')) {

            remover_favorito(tipo_hipotese, cod_hipotese);
           
        } else {

            salvar_favorito(tipo_hipotese, cod_hipotese);

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_incluir_hipotese_principal
     # 
    *************************************/ 
    $(document).on('click', '#btn_incluir_hipotese_principal', function(event) { 
    
        event.preventDefault();

        alert('#btn_incluir_hipotese_principal foi clicado');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_incluir_hipotese_secundaria
     # 
    *************************************/ 
    $(document).on('click', '#btn_incluir_hipotese_secundaria', function(event) { 
    
        event.preventDefault();

        alert('#btn_incluir_hipotese_secundaria foi clicado');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .remover-hipotese
     # Trata-se do X presente dentro da tag de hipotese, que serve para a remoção do mesmo
     # 
    *************************************/ 
    $(document).on('click', '.remover-hipotese', function(event) { 
    
        event.preventDefault();

        // Preparo variaveis
        var cod_hipotese = $(this).closest('.tag-hipotese').data('cod-hipotese');
        var tipo_hipotese = $(this).closest('.tag-hipotese').data('tipo-hipotese');

        // Executo função
        remover_hipotese(tipo_hipotese, cod_hipotese);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_salvar
     # 
    *************************************/ 
    $(document).on('click', '#btn_salvar', function(event) { 
    
        event.preventDefault();

        alert('#btn_salvar foi clicado');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });


}); // Fecha $(document).ready