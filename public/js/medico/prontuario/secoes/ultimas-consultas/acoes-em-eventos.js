/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

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



	// Ativação de plugin datepicker em campos
    $('#data_inicio_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });

    $('#data_fim_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_filtrar_consultas
     # 
    *************************************/ 
    $(document).on('click', '#btn_filtrar_consultas', function(event) { 
    
        event.preventDefault();

        alert('#btn_filtrar_consultas foi clicado');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });


}); // Fecha $(document).ready
