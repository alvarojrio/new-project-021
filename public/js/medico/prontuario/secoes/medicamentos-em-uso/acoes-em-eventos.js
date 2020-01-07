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
    $(document).on('click', '.btn-modal-favoritos-medicamentos', function(event) { 
    
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


}); // Fecha $(document).ready