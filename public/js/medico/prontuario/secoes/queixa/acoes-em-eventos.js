/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    /************************************
     #
     # Aplicando função ao evento click do elemento #btn-modal-favoritos
     # Trata-se do botão que abre modal com lista de favoritos
     # 
    *************************************/ 
    $(document).on('click', '.btn-modal-favoritos-sintomas', function(event) { 
    
        event.preventDefault();

        // Capto origem através de data-attributte no elemento
        var origem = $(this).data('origem-modal');

        // Guardo valor em input hidden
        $('#hide_origem').val('');
        $('#hide_origem').val(origem);

        // Abre janela modal de favoritos
        $('#modal-favoritos-teste').modal('show');

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