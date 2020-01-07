/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

	// Ativação de plugin datepicker em campos
    $('.data').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        //endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });

    // Informo ao plugin DataTable que as datas devem ser formatadas em um determinado padrão com MOMENT-JS. 
    // Isso permite que a DataTable faça corretamente ordenação de colunas que contenham valores do tipo data
    $.fn.dataTable.moment('DD/MM/YYYY');




    /************************************
     #
     # Aplicando função no evento esconder das janelas modais do Bootstrap
     # Um bug do Bootstrap Modal faz com que a classe 'modal-open' desapareça do elemento <body> quando janelas modais são abertas em sequência
     # Este workaround verifica se ainda existem janelas modais abertas e, em caso de verdade, garante que o elemento body tenha a classe adequada
     # 
    *************************************/ 
	$('body').on('hidden.bs.modal', function() {

		// Remove atributo 'style' da tag <body>
		$('body').removeAttr('style');

		// Procura divs que tenham as classes 'modal' e 'in' juntas, ou seja, janelas modais que estejam abertas
		if ($('.modal.in').length > 0) {

			// Verifico se o elemento <body> já possui a classe 'modal-open'. Se não possuir, efetua ação
			if ( !$('body').hasClass('modal-open') ) {

				// Adiciona a classe 'modal-open' ao elemento <body> para que o navegador interprete corretamente que ainda existe um modal aberto
			    $('body').addClass('modal-open');

			}

		}

	});




    /************************************
     #
     # Aplicando função no botão #BTN_RESETAR_BUSCA_AGENDA
     # Zera filtros de busca e as agendas exibidas, permitindo começar a busca do zero
     # 
    *************************************/
    $(document).on('click', '#btn_resetar_busca_agenda', function(event) {

        event.preventDefault();

		// Limpa valor da div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').html('');

        // Oculta div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').hide();

        // Oculto div .box_erro_carregamento_agenda
		$('.box_erro_carregamento_agenda').hide();

		// Oculto div .box_erro_agenda_vazia
		$('.box_erro_agenda_vazia').hide();

		// Limpa/reseta desenho da agenda atual
    	limpar_agenda();

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_BUSCAR_AGENDA
     # Busca agenda através dos parametros informados e exibe resultado em um ou vários FullCalendar gerados dinamicamente
     # 
    *************************************/ 
    $(document).on('click', '#btn_buscar_agenda', function(event) {

    	// Limpa valor da div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').html('');

        // Oculta div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').hide();

        // Oculto div .box_erro_carregamento_agenda
		$('.box_erro_carregamento_agenda').hide();

		// Oculto div .box_erro_agenda_vazia
		$('.box_erro_agenda_vazia').hide();

    	// Oculto div .panel_agendas
        $('.panel_agendas').hide();

    	// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo)
    	$('.panel_agendas .panel-body').empty();

		// Reuno dados do formulário de busca
    	var filtro_data_desejada = $('#data_desejada').val();
    	var filtro_cod_unidade = $('#cod_unidade option:selected').val();
    	var filtro_cod_medico = $('#cod_medico option:selected').val();
    	
    	/*
         ###########################################
         # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */
        if (filtro_data_desejada == '') {

        	// Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro_validacao_filtros').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_validacao_filtros').append('O campo DATA não foi preenchido corretamente.');
            $('.msg_erro_validacao_filtros').show();

            // Não executa nenhuma ação
            return false;

        }

        if (filtro_cod_unidade == '' && filtro_cod_medico == '') {

        	// Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro_validacao_filtros').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_validacao_filtros').append('Você deve selecionar uma opção ou no campo UNIDADE ou no campo MÉDICO.');
            $('.msg_erro_validacao_filtros').show();

            // Não executa nenhuma ação
            return false;

        }
        /*
         ###########################################
         # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */

        // Revela div #msg_processando
        $('#msg_processando').show();

        // Aguarda conclusão da função carregar_agenda() e, quando a mesma estiver concluída, executa ação dentro do bloco done()
        // Todas as outras possiveis funções de carregamento de dados para agenda serão chamadas em cadeia pela função carregar_agenda()
        $.when( carregar_agenda(filtro_data_desejada, filtro_cod_unidade, filtro_cod_medico) ).done(function() {

        	// Executa função que desenha a agenda
			executar_desenho_agenda();

        }).fail(function(err) { // Caso algum erro tenha sido retornado

			mensagem_agenda_vazia();

			return false;

		}); // Fecha $.when()

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_CANCELAR_AGENDA_MEDICO_PERIODO
     # Cancela agendamentos do periodo da unidade/médico
     # 
    *************************************/ 
    $(document).on('click', '#btn_cancelar_agenda_medico_periodo', function(event) {

    	// Recolho informações pertinentes
    	var data_desejada = $('.cxa_data_desejada').text(); // pego valor presente dentro da tag <span>
    	var codigo_unidade = $(this).closest('.panel_de_medico').find('#cod_unidade').val();
    	var codigo_medico = $(this).closest('.panel_de_medico').find('#cod_medico').val();
    	var codigo_especialidade = $(this).closest('.panel_de_medico').find('#cod_especialidade').val();

    	// Capto o nome da classe de periodo (medico-periodo-manha ou medico-periodo-tarde) deste elemento utilizando o comando attr() seguido do comando split() e pegando a posição [3] do vetor gerado
    	var classe_periodo = $(this).closest('.panel_de_periodo_de_medico').attr('class').split(' ')[3];

    	// Defino qual o periodo está sendo trabalhado
    	if (classe_periodo == 'medico-periodo-manha') { 

    		var periodo = 1; // equivale a manhã
            var codigo_horario_agenda = $(this).closest('.medico-periodo-manha').find('#cod_horario_agenda').val();

    	} else if (classe_periodo == 'medico-periodo-tarde') { 

    		var periodo = 2; // equivale a tarde
            var codigo_horario_agenda = $(this).closest('.medico-periodo-tarde').find('#cod_horario_agenda').val();

    	}

    	// Requisição ajax
	    $.ajax({
	        cache: false,
	        type: "POST",
	        url: UrlCancelarAgendamentosDiaUnidadeMedico, // a URL da requisição é passada pela view
	        data: {
	        	"acao": "cancelar_periodo", // sinaliza que deverá cancelado apenas o periodo
	        	"data_desejada": data_desejada,
	        	"codigo_unidade": codigo_unidade,
	        	"codigo_medico": codigo_medico,
	        	"codigo_especialidade": codigo_especialidade,
	        	"codigo_horario_agenda": codigo_horario_agenda,
	            "periodo": periodo // manhã (1) ou tarde (2)
	        },
	        beforeSend: function() { 
	            
	            // Revela div #msg_processando
	        	$('#msg_processando').show();

	        },
	        success: function(response) {

	        	// Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                	// Oculta mensagem 'processando...
		            $('#msg_processando').hide();

		            // Mostra mensagem de erro
	                $.toast({
	                    heading: 'Erro',
	                    text: 'Falha no cancelamento dos agendamentos. Atualize a página e tente novamente.',
	                    showHideTransition: 'fade',
	                    icon: 'error',
	                    position: 'top-right',
	                    hideAfter: 2000, // em milisegundos
	                    allowToastClose: true
	                }); 

	                return false;  

                } else if (response.status == 'sucesso') {

                	// Mostra mensagem de sucesso
					$.toast({
						heading: 'Agendamentos cancelados com sucesso!',
						text: response.sucesso,
						showHideTransition: 'fade',
						icon: 'success',
						position: 'top-right',
						hideAfter: 2200, // em milisegundos
						allowToastClose: true,
						afterHidden: function() {
							
							// Simulo o evento 'click' no botão 'buscar agenda' para que a agenda seja redesenhada com dados atualizados
							$('#btn_buscar_agenda').trigger('click');

							// Oculta mensagem 'processando...
			        		$('#msg_processando').hide();

						}   
					});

                }

	        },
	        complete: function(response) {
	            // Nothing here
	        },
	        error: function(response, thrownError) {
	        	
	        	// Oculta mensagem 'processando...
	            $('#msg_processando').hide();

	            // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Falha na requisição. Atualize a página e tente novamente.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 2000, // em milisegundos
                    allowToastClose: true
                }); 

                return false;   

	        }
	    });

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_CANCELAR_AGENDA_MEDICO_DIA
     # Cancela agendamentos do dia da unidade/médico
     # 
    *************************************/ 
    $(document).on('click', '#btn_cancelar_agenda_medico_dia', function(event) {

    	// Recolho informações pertinentes
    	var data_desejada = $('.cxa_data_desejada').text(); // pego valor presente dentro da tag <span>
    	var codigo_unidade = $(this).closest('.panel_de_medico').find('#cod_unidade').val();
    	var codigo_medico = $(this).closest('.panel_de_medico').find('#cod_medico').val();
    	var codigo_especialidade = $(this).closest('.panel_de_medico').find('#cod_especialidade').val();
    	var codigo_horario_agenda = $(this).closest('.panel_de_medico').find('#cod_horario_agenda').val();

    	// Requisição ajax
	    $.ajax({
	        cache: false,
	        type: "POST",
	        url: UrlCancelarAgendamentosDiaUnidadeMedico, // a URL da requisição é passada pela view
	        data: {
	        	"acao": "cancelar_dia", // sinaliza que deverá cancelado apenas o dia
	        	"data_desejada": data_desejada,
	        	"codigo_unidade": codigo_unidade,
	        	"codigo_medico": codigo_medico,
	        	"codigo_especialidade": codigo_especialidade,
	        	"codigo_horario_agenda": codigo_horario_agenda
	        },
	        beforeSend: function() { 
	            
	            // Revela div #msg_processando
	        	$('#msg_processando').show();

	        },
	        success: function(response) {

	        	// Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                	// Oculta mensagem 'processando...
		            $('#msg_processando').hide();

		            // Mostra mensagem de erro
	                $.toast({
	                    heading: 'Erro',
	                    text: 'Falha no cancelamento dos agendamentos. Atualize a página e tente novamente.',
	                    showHideTransition: 'fade',
	                    icon: 'error',
	                    position: 'top-right',
	                    hideAfter: 2000, // em milisegundos
	                    allowToastClose: true
	                }); 

	                return false;  

                } else if (response.status == 'sucesso') {

                	// Mostra mensagem de sucesso
					$.toast({
						heading: 'Agendamentos cancelados com sucesso!',
						text: response.sucesso,
						showHideTransition: 'fade',
						icon: 'success',
						position: 'top-right',
						hideAfter: 2200, // em milisegundos
						allowToastClose: true,
						afterHidden: function() {
							
							// Simulo o evento 'click' no botão 'buscar agenda' para que a agenda seja redesenhada com dados atualizados
							$('#btn_buscar_agenda').trigger('click');

							// Oculta mensagem 'processando...
			        		$('#msg_processando').hide();

						}   
					});

                }

	        },
	        complete: function(response) {
	            // Nothing here
	        },
	        error: function(response, thrownError) {
	        	
	        	// Oculta mensagem 'processando...
	            $('#msg_processando').hide();

	            // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Falha na requisição. Atualize a página e tente novamente.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 2000, // em milisegundos
                    allowToastClose: true
                }); 

                return false;   

	        }
	    });

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_IMPRIMIR_AGENDA_UNIDADE_MEDICO
     # Imprime agendamentos do periodo da unidade/médico pesquisados
     # 
    *************************************/ 
    $(document).on('click', '#btn_imprimir_agenda_unidade_medico', function(event) {

        // Reuno dados do formulário de busca
        var filtro_data_desejada = $('#data_desejada').val();
        var filtro_cod_unidade = $('#cod_unidade option:selected').val();
        var filtro_cod_medico = $('#cod_medico option:selected').val();

        // Crio e preencho objeto javascript
        var obj_parametros_para_impressao = {};
        obj_parametros_para_impressao['data_desejada'] = filtro_data_desejada;
        obj_parametros_para_impressao['cod_unidade'] = filtro_cod_unidade;
        obj_parametros_para_impressao['cod_medico'] = filtro_cod_medico;

        // Serializo objeto para formato JSON
        var parametros_para_impressao = JSON.stringify(obj_parametros_para_impressao);

        // Efetuo a codificação do objeto com a função BTOA que equivale ao base64_encode() do PHP. Isso permite que os dados ficam obfuscados na URL e que você possa descodificar no php com um simples base64_decode(). A função ATOB() faz o contrário
        var codificado = btoa(parametros_para_impressao);

    	// Abre versão para impressão em nova janela
        window.open(UrlImpressaoAgendaDiaUnidadeMedico + "/" + codificado);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });


});
