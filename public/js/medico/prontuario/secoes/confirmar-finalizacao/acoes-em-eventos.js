/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    // Ativação de plugin datepicker em campos
    $('#data_retorno').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '0d',
        todayHighlight: true,
        autoclose: true
    });



    /************************************
     #
     # Aplicando função ao evento click do botão #btn_confirmar_finalizacao
     # 
    *************************************/ 
    $(document).on('click', '#btn_confirmar_finalizacao', function(event) { 
    
        event.preventDefault();

        // Limpa e oculta divs de erros
        $('.erro_prontuario_geral').html('');
        $('.erro_prontuario_geral').hide();
        $('.erro_prontuario_secao').html('');
        $('.erro_prontuario_secao').hide();

        // Finaliza contagem de tempo
        parar_relogio();

        // Guardo informações da contagem de tempo em variaveis
        var tempo_atual_atendimento = tempo_atual_relogio();
        var tempo_atual_atendimento_formatado = tempo_atual_atendimento.displayedMode.formatted;
        var tempo_atual_atendimento_horas = tempo_atual_atendimento.displayedMode.unformatted.hours;
        var tempo_atual_atendimento_minutos = tempo_atual_atendimento.displayedMode.unformatted.minutes;
        var tempo_atual_atendimento_segundos = tempo_atual_atendimento.displayedMode.unformatted.seconds;

        // Caso NÃO TENHA sido possivel pegar a contagem de tempo do relógio
        if (tempo_atual_atendimento_formatado == '') {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.erro_prontuario_geral').append('<h4>Falha</h4>');
            $('.erro_prontuario_geral').append('Não foi possível obter a contagem de tempo, o que impossibilita a finalização correta do atendimento. Atualize a página e tente novamente.');
            $('.erro_prontuario_geral').show();    

            // Finaliza função
            return false;

        }

        alert( tempo_atual_atendimento_formatado );

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });



}); // Fecha $(document).ready