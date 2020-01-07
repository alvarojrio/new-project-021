/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/


/************************************
 #
 # Função que inicia o carregamento de dados para a agenda levando em conta as opções selecionados em filtros
 # OBS 1: Esta função automaticamente chama as outras funções necessárias para coleta de dados para a agenda
 # OBS 2: Por haver múltiplas requisições ajax (assíncronas), foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function carregar_agenda(data_desejada, cod_unidade = '', cod_medico = '') {

	// Garanto que variaveis estão vazias
	vetor_unidades = '';
	vetor_medicos = '';
	vetor_pacientes_manha = '';
	vetor_pacientes_tarde = '';
	html_botao_imprimir = '';
	html_unidades = '';
	html_medicos = '';
	html_pacientes_manha = '';
	html_pacientes_tarde = '';

	// Inicializo um objeto deferred
    var def = $.Deferred();

    // Efetua requisição ajax para buscar unidades para desenhar a agenda
    $.ajax({
		cache: false,
		type: "POST",
		url: UrlBuscarAgendasDiaUnidadeMedico, // a URL da requisição é passada pela view
		data: { 
			"data_desejada": data_desejada,
			"cod_unidade": cod_unidade,
			"cod_medico": cod_medico
		}
	})
    .done(function(response) {

    	// Variaveis de controle
		var response = JSON.parse(response); // Convertendo resposta para objeto javascript

        // Verifico se o status do retorno é igual a 'sucesso'
		if (response.status == 'sucesso') {

			// Coloco data pesquisada dentro de espaço marcado
			$('.cxa_data_desejada').html(response.data_pesquisada);

			// Guardo dados em variaveis globais
			vetor_unidades = response.unidades;
			vetor_medicos = response.medicos;
			vetor_pacientes_manha = response.pacientes_manha;
			vetor_pacientes_tarde = response.pacientes_tarde;

			// Resolve o objeto deferred
			def.resolve();

    	} else {

    		// Marca o objeto deferred como rejeitado
	        def.reject('Não foi possivel localizar dados com os parametros informados.');

    	}

    }).fail(function(err) { // Caso algum erro tenha sido retornado

    	// Marca o objeto deferred como rejeitado e passo a mensagem de rejeição recebida como parametro
    	def.reject(err);

    });

    // Retorno a promise
    return def.promise();

}


/************************************
 #
 # Função que desenha as caixas de unidades / médicos / listas dentro da div '.panel_agendas'
 # OBS 1: Para seguir a cadeia das outras funções relacionadas ao desenho da agenda, foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function executar_desenho_agenda() {

	html_botao_imprimir +=
	'<!-- Inicio linha do botão -->' +
    '<div align="right" class="row">' +
        '<a class="btn btn-md btn-info" id="btn_imprimir_agenda_unidade_medico" href="javascript:void(null);">' +
        '<i class="fa fa-print"></i> Imprimir esta agenda' +
        '</a>' +
    '</div>' +
    '<!-- Fim linha do botão -->';

    // Insiro HTML dentro de div
	$(html_botao_imprimir).appendTo('.panel_agendas .panel-body');

	// Faço loop pelo vetor de unidades
	$.each(vetor_unidades, function(index, value) {
		
		// Preencho variavel
		html_unidades +=
		'<!-- INICIO DIV .PANEL_UNIDADE -->' +
		'<div class="panel_unidade_' + value['codigo_unidade'] + '">' +

			'<!-- Input oculto para guardar código da unidade -->' +
			'<input type="hidden" id="cod_unidade" name="cod_unidade" value="' + value['codigo_unidade'] + '" />' +

			'<!-- Titulo da unidade -->' +
			'<h3 class="agenda_titulo_unidade letra-azul-claro">Unidade: ' + value['nome_unidade'] + '</h3>' +

			'<!-- INICIO DIV .ESPACO_CAIXAS_MEDICOS -->' +
            '<div class="espaco_caixas_medicos">' +

            '</div>' +
            '<!-- FIM DIV .ESPACO_CAIXAS_MEDICOS -->' +

		'</div>' +
		'<!-- FIM DIV .PANEL_UNIDADE -->';

	});

	// Insiro HTML dentro de div
	$(html_unidades).appendTo('.panel_agendas .panel-body');

	// Faço loop pelo vetor de medicos
	$.each(vetor_medicos, function(index, value) {
		
		// Preencho variavel
		html_medicos +=
		'<!-- INICIO PANEL .PANEL_MEDICO -->' +
		'<div class="panel panel-default panel_de_medico panel_m_' + value['codigo_medico'] + '_e_' + value['codigo_especialidade'] + '">' +

			'<!-- Input oculto para guardar códigos -->' +
			'<input type="hidden" id="cod_unidade" name="cod_unidade" value="' + value['codigo_unidade'] + '" />' +
			'<input type="hidden" id="cod_medico" name="cod_medico" value="' + value['codigo_medico'] + '" />' +
			'<input type="hidden" id="cod_especialidade" name="cod_especialidade" value="' + value['codigo_especialidade'] + '" />' +

			'<div class="panel-heading">' +
                'Médico(a): <span class="letra-azul-claro letra-maiuscula">' + value['nome_medico'] + '</span> <br />' +
                'Especialidade: <span class="letra-azul-claro letra-maiuscula">' + value['nome_especialidade'] + '</span>' +
            '</div>' +

            '<!-- Inicio panel-body -->' +
            '<div class="panel-body panel-body-medico">' +

            	'<!-- ### INICIO PERIODO MANHA ##### -->' +

	            '<!-- Inicio linha do periodo manhã -->' +
				'<div class="row row-com-margin-bottom panel_de_periodo_de_medico medico-periodo-manha">' +

					'<!-- Input oculto para guardar códigos -->' +
					'<input type="hidden" id="cod_horario_agenda" name="cod_horario_agenda" value="" />' +

					'<div class="col-md-12 col-xs-12">' +

						'<div class="col-md-12 col-xs-12" style="border: #d9edf7 solid 1px !important;">' +

							'<!-- Inicio linha -->' +
		                    '<div class="row">' +

		                        '<div class="col-md-6 col-xs-6 text-left">' +
		                            '<h2>Período: Manhã</h2>' +
		                        '</div>' +

		                        '<div class="col-md-6 col-xs-6 text-right">' +
		                            '<h4>Total de agendamentos: <span class="cxa_total_agendamento_periodo">0</span></h4>' +
		                        '</div>' +

		                    '</div>' +
		                    '<!-- Fim linha -->' +

		                    '<!-- Inicio lista de dados -->' +
		                    '<div class="espaco-lista-pacientes">' +

		                    	'<div class="row linha-lista-pacientes">' +
		                    	'</div>' +

		                    '</div>' +
		                    '<!-- Fim lista de dados -->' +

		                    '<br />' +
		                                                        
		                    '<!-- Inicio linha do botão -->' +
		                    '<div align="center" class="row">' +
		                        '<a class="btn btn-sm btn-warning" id="btn_cancelar_agenda_medico_periodo" href="javascript:void(null);">' +
		                        '<i class="fa fa-times"></i> Cancelar agenda do médico para este período' +
		                        '</a>' +
		                    '</div>' +
		                    '<!-- Fim linha do botão -->' +

		                '</div>' +

		            '</div>' +

		        '</div>' +
		        '<!-- Fim linha do periodo manhã -->' +

            	'<!-- ### FIM PERIODO MANHA ##### -->' +

            	'<!-- ### INICIO PERIODO TARDE ##### -->' +

	            '<!-- Inicio linha do periodo tarde -->' +
				'<div class="row row-com-margin-bottom panel_de_periodo_de_medico medico-periodo-tarde">' +

					'<!-- Input oculto para guardar códigos -->' +
					'<input type="hidden" id="cod_horario_agenda" name="cod_horario_agenda" value="" />' +

					'<div class="col-md-12 col-xs-12">' +

						'<div class="col-md-12 col-xs-12" style="border: #d9edf7 solid 1px !important;">' +

							'<!-- Inicio linha -->' +
		                    '<div class="row">' +

		                        '<div class="col-md-6 col-xs-6 text-left">' +
		                            '<h2>Período: Tarde</h2>' +
		                        '</div>' +

		                        '<div class="col-md-6 col-xs-6 text-right">' +
		                            '<h4>Total de agendamentos: <span class="cxa_total_agendamento_periodo">0</span></h4>' +
		                        '</div>' +

		                    '</div>' +
		                    '<!-- Fim linha -->' +

		                    '<!-- Inicio lista de dados -->' +
		                    '<div class="espaco-lista-pacientes">' +

		                    	'<div class="row linha-lista-pacientes">' +
		                    	'</div>' +

		                    '</div>' +
		                    '<!-- Fim lista de dados -->' +

		                    '<br />' +
		                                                        
		                    '<!-- Inicio linha do botão -->' +
		                    '<div align="center" class="row">' +
		                        '<a class="btn btn-sm btn-warning" id="btn_cancelar_agenda_medico_periodo" href="javascript:void(null);">' +
		                        '<i class="fa fa-times"></i> Cancelar agenda do médico para este período' +
		                        '</a>' +
		                    '</div>' +
		                    '<!-- Fim linha do botão -->' +

		                '</div>' +

		            '</div>' +

		        '</div>' +
		        '<!-- Fim linha do periodo tarde -->' +

            	'<!-- ### FIM PERIODO TARDE ##### -->' +

            	'<!-- Inicio linha do botão -->' +
            	'<div align="right" class="row">' +
                    '<a class="btn btn-md btn-danger" id="btn_cancelar_agenda_medico_dia" href="javascript:void(null);">' +
                    '<i class="fa fa-times"></i> Cancelar agenda do médico para este dia' +
                    '</a>' +
                '</div>' +
                '<!-- Fim linha do botão -->' +

            '</div>' +
            '<!-- Fim panel-body -->' +

		'</div>' +
		'<!-- FIM DIV .PANEL_MEDICO -->';

		// Insiro HTML dentro de div
		$('.panel_unidade_' + value['codigo_unidade']).find('.espaco_caixas_medicos').append(html_medicos);

		// Reseto valor de variavel
		html_medicos = '';

	});
	
	// Defino contador customizado
	var count_pm = 0;

	// Faço loop pelo vetor de PACIENTES DA MANHÃ
	$.each(vetor_pacientes_manha, function(index, value) {

		// Verifico se o valor atual do contador é par ou impar
		if ((count_pm % 2) == 0) {

			var class_odd_even = 'paciente-odd';

		} else {

			var class_odd_even = 'paciente-even';

		}

		// Preencho variavel
		html_pacientes_manha +=
        '<div class="col-md-4 col-xs-12 caixa_paciente">' +
            '<div class="col-md-12 col-xs-12 text-center ' + class_odd_even + '">' +
                value['nome_cliente'] +
            '</div>' +
            '<br /><br />' +
        '</div>';

        // Insiro HTML dentro de div
		$('.panel_m_' + value['codigo_medico'] + '_e_' + value['codigo_especialidade'] + ' .medico-periodo-manha').find('.linha-lista-pacientes').append(html_pacientes_manha);

		// Guardo valor do cod_horario_agenda em input oculto
		$('.panel_m_' + value['codigo_medico'] + '_e_' + value['codigo_especialidade'] + ' .medico-periodo-manha').find('#cod_horario_agenda').val(value['codigo_horario_agenda']);

		// Reseto valor de variavel
		html_pacientes_manha = '';

		// Incremento contador
		count_pm++;

	});

	// Defino contador customizado
	var count_pt = 0;

	// Faço loop pelo vetor de PACIENTES DA TARDE
	$.each(vetor_pacientes_tarde, function(index, value) {

		// Verifico se o valor atual do contador é par ou impar
		if ((count_pt % 2) == 0) {

			var class_odd_even = 'paciente-odd';

		} else {

			var class_odd_even = 'paciente-even';

		}

		// Preencho variavel
		html_pacientes_tarde +=
        '<div class="col-md-4 col-xs-12 caixa_paciente">' +
            '<div class="col-md-12 col-xs-12 text-center ' + class_odd_even + '">' +
                value['nome_cliente'] +
            '</div>' +
            '<br /><br />' +
        '</div>';

        // Insiro HTML dentro de div
		$('.panel_m_' + value['codigo_medico'] + '_e_' + value['codigo_especialidade'] + ' .medico-periodo-tarde').find('.linha-lista-pacientes').append(html_pacientes_tarde);

		// Guardo valor do cod_horario_agenda em input oculto
		$('.panel_m_' + value['codigo_medico'] + '_e_' + value['codigo_especialidade'] + ' .medico-periodo-tarde').find('#cod_horario_agenda').val(value['codigo_horario_agenda']);

		// Reseto valor de variavel
		html_pacientes_tarde = '';

		// Incremento contador
		count_pt++;

	});
	
	// Faço loop por cada painel de médico desenhado na página
	$('.panel_de_medico').each(function() {

	    // Faço loop pelos periodos (manhã|tarde) do médico
		$('.panel_de_periodo_de_medico', this).each(function() { // O segundo parametro (this) no identificador do elemento define que deverão ser buscados com o $each apenas itens relacionados ao elemento-pai atual da iteração

			// Caso NÃO existam divs com a classe .caixa_paciente dentro do elemento que representa periodo...
			if ($(this).find('.caixa_paciente').length < 1) {

				// Removo elemento periodo
				$(this).remove();

			}

			// Coloco total de agendamentos do periodo dentro de espaço marcado
			$('.cxa_total_agendamento_periodo', this).html($(this).find('.caixa_paciente').length);

		});

	});

	// Sinalizo sucesso do procedimento
	sucesso_desenhar_agenda();

}


/************************************
 #
 # Sinaliza que houve SUCESSO ao desenhar a agenda, exibindo caixa com mensagem de erro
 # 
*************************************/
function sucesso_desenhar_agenda() {

	// Exibo div .panel_agendas
	$('.panel_agendas').show();

	// Rola a página até a primeira caixa de unidade
    $('html, body').animate({
        scrollTop: $('.panel_agendas .panel-heading').offset().top
    }, 50);

	// Oculta DIV
    $('#msg_processando').hide();

}


/************************************
 #
 # Sinaliza que houve FALHA ao desenhar a agenda, exibindo caixa com mensagem de erro
 # 
*************************************/
function falha_desenhar_agenda() {

	// Oculto div .panel_agendas
    $('.panel_agendas').hide();

	// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo)
	$('.panel_agendas .panel-body').empty();

	// Oculta DIV
    $('#msg_processando').hide();

	// Exibo div .box_erro_carregamento_agenda
	$('.box_erro_carregamento_agenda').show();

}


/************************************
 #
 # Sinaliza que a agenda está SEM DADOS, ou seja, a busca NÃO RETORNOU informações. Então exibo caixa com mensagem de erro
 # 
*************************************/
function mensagem_agenda_vazia() {

	// Oculto div .panel_agendas
    $('.panel_agendas').hide();

	// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo)
	$('.panel_agendas .panel-body').empty();

	// Oculta DIV
    $('#msg_processando').hide();

	// Exibo div .box_erro_agenda_vazia
	$('.box_erro_agenda_vazia').show();

}


/************************************
 #
 # Limpa agenda desenhada atualmente, deixando a div pronta para receber novos dados
 # 
*************************************/
function limpar_agenda() {

	// Oculto div .panel_agendas
    $('.panel_agendas').hide();

	// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo)
	$('.panel_agendas .panel-body').empty();

	// Reseto valores dos inputs de filtros
	$('#data_desejada').val('');
	$('#cod_unidade').prop('selectedIndex', 0); // Reseto combobox, devolvendo-o para a opção padrão
	$('#cod_medico').prop('selectedIndex', 0); // Reseto combobox, devolvendo-o para a opção padrão

}
