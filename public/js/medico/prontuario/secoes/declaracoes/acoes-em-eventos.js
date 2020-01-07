/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    /************************************
     #
     # Aplicando função ao evento click do elemento #tipo-declaracao
     # 
    *************************************/
    $(document).on('change', '#tipo-declaracao', function(event) { 

        // Defino variaveis
        var tipo_declaracao = $('#tipo-declaracao option:selected').val();

        // Verifico o tipo de declaração
        if (tipo_declaracao == 'atestado') {

            // Oculta todos os campos extras
            $('.linha_campos_extras').hide();

            // Mostra campos extras para preenchimento
            $('.linha_atestado').show();

        } else if (tipo_declaracao == 'orientacao') {
            
            // Oculta todos os campos extras
            $('.linha_campos_extras').hide();
            
            // Mostra campos extras para preenchimento
            $('.linha_orientacoes').show();

        }

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