/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    //ratingEnable();

    /*********************************************
     #
     # Modifica o icone dos paineis .muda-collapse de acordo com o status atual deles
     # 
    **********************************************/ 
    $('.muda-collapse').on('show.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    $('.muda-collapse').on('hide.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .estado-exame
     # Esta classe está aplicada a todos os radio-buttons
     # 
    *************************************/
    $(document).on('change', '.estado-exame', function(event) { 

        // Defino variaveis
        var rating_grau = $(this).closest('.espaco-exame .row').find('.especial-rating');

        // Executo função
        ratingEnable(rating_grau);

        // Caso não haja alteração
        if ($(this).val() == 0) {

            $(this).closest('.espaco-exame .row').find('.complemento-alterado').css('display', 'none');

        } else if ($(this).val() == 1) { // caso haja alteração

            $(this).closest('.espaco-exame .row').find('.complemento-alterado').css('display', 'block');

        } 

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .rating-enable
     # 
    *************************************/
    $(document).on('click', '.rating-enable', function(event) { 

        event.preventDefault();

        $(this).addClass('deactivated');
        $('.rating-disable').removeClass('deactivated');

    });



    /************************************
     #
     # Aplicando função ao evento click do elemento .rating-disable
     # 
    *************************************/
    $(document).on('click', '.rating-disable', function(event) { 

        event.preventDefault();

        // Defino variaveis
        var rating_grau = $(this).closest('.espaco-exame .row').find('.especial-rating');

        // Executo função
        ratingDisable(rating_grau);

        $(this).addClass('deactivated');
        $('.rating-enable').removeClass('deactivated');

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