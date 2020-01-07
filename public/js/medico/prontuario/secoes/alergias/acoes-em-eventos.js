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
        $('#modal-favoritos-alergias').modal('show');

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

        // Defino variaveis
        var cod_alergia = $(this).data('cod-alergia');
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
        adicionar_alergia(origem, cod_alergia);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .estrela-favorito
     # Trata-se da estrela ao lado do nome na lista de alergias
     # 
    *************************************/ 
    $(document).on('click', '.estrela-favorito', function(event) { 
    
        event.preventDefault();

        // Defino variaveis
        var cod_alergia = $(this).closest('.tag-alergia').data('cod-alergia');
        var estrela = $(this);

        // Verifico se o elemento está com a classe de estrela acesa, ou seja, é atualmente um favorito
        if ($(estrela).hasClass('star-checked')) {

            alert('estrela de favorito da alergia de código ' + cod_alergia + ' foi clicado. deverá ser aberta uma janela para confirmar REMOÇÃO dos favoritos.');

        } else {

            alert('estrela de favorito da alergia de código ' + cod_alergia + ' foi clicado. deverá ser aberta uma janela para confirmar ADIÇÃO aos favoritos.');

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_incluir_alergia
     # 
    *************************************/ 
    $(document).on('click', '#btn_incluir_alergia', function(event) { 
    
        event.preventDefault();

        alert('#btn_incluir_alergia foi clicado');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



    /************************************
     #
     # Aplicando função ao evento click do botão .btn-remover-alergia
     # 
    *************************************/ 
    $(document).on('click', '.btn-remover-alergia', function(event) { 
    
        event.preventDefault();

        // Defino variaveis
        var cod_alergia = $(this).data('cod-alergia');
        var tipo_lista = $(this).data('tipo-lista');

        // Executo função
        remover_alergia(tipo_lista, cod_alergia);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });
    


}); // Fecha $(document).ready