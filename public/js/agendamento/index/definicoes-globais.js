/*
*
* DEFINICOES GLOBAIS
*
*/

// Desativa cache do ajax
$.ajaxSetup ({cache: false});

// Desativa mensagens 'warning' do MomentJs
moment.suppressDeprecationWarnings = true;

/************************************
 #
 # Definição de variaveis GLOBAIS
 # 
*************************************/ 
// Variaveis para desenhar a agenda
var caixas_unidades_pai = new Array; // Crio um array
var caixas_medicos_pai = new Array; // Crio um array
var caixas_medicos_filho = {}; // Crio um objeto
var lista_eventos_pai = new Array; // Crio um array
var lista_eventos_filho = {}; // Crio um objeto

// Variaveis referentes a transferência
var transferencia_de_consulta = 'inativa'; // Sinaliza se existe uma transferência de consulta sendo feita na página no momento. Valores possiveis: ativa e inativa

/************************************
 #
 # Definição de opções globais do FullCalendar (usadas em todos os FullCalendar da página)
 # 
*************************************/ 
// Capto datas
var data_hoje = new Date(); // data de hoje que não sofrerá alterações
var data_soma = new Date(); // data de hoje que será modificada

// Adiciono 2 meses a data de hoje
data_soma.setMonth(data_soma.getMonth() + 2);

// Defino variavel para guardar opções
var opcoes_calendario = {
    header:{ // define botões do cabeçalho
        left: 'prev, next, today',
        center: 'manhã',
        right: 'title'                          
    },
    views: { // define formatação do texto mês / ano
        agenda: {
            titleFormat: "MMMM YYYY"
        }
    },
    contentHeight: 600, // altura do espaço do calendário
    validRange: {
    	// A função getMonth() retorna o mês no formato de 0 a 11, onde 0 = janeiro, 1 = fevereiro, etc. Para pegarmos o número do mês de acordo com o calendário, devemos somar mais 1 ao resultado de getMonth()
    	start: data_hoje.getFullYear() + '-' + ('0' + (data_hoje.getMonth() + 1)).slice(-2) + '-' + data_hoje.getDate(),
    	end: data_soma.getFullYear() + '-' + ('0' + (data_soma.getMonth() + 1)).slice(-2) + '-01' // Utilizo o dia 01 pois o FullCalendar sempre finaliza a exibição 1 dia antes da data informada, logo ele vai parar no último dia do mês anterior.
    },
    eventOrder: "title", // Determino a ordem vertical de eventos no mesmo dia, colocando-os em ordem descendente (- na frente do nome do campo title)
    eventRender: function (event, element) {
    	// Habilito o uso de HTML dentro do 'title' dos eventos (isso permite usar icons no title)
	    element.find('span.fc-title').html(element.find('span.fc-title').text());
	},
	eventClick: function(event, jsEvent, view) { // Ação executada ao clicar em qualquer das caixas de evento
		
		/*
		EXIBIMOS O MODAL ADEQUADO DE ACORDO COM O VALOR DE 'event.id' (TIPO DE EVENTO)
		*/

		// Caso o tipo de evento seja VAGAS
		if (event.id == 1) {

			// Só exibir modal se houverem VAGAS disponiveis
			if (event.total_numerico_vagas > 0) {

				// Limpo div e a oculto
				$('.mav_msg_erro').html('');
				$('.mav_msg_erro').hide();
				$('.mav_msg_forcar_agendamento').html('');
				$('.mav_msg_forcar_agendamento').hide();

				// Ativo função de carregamento de opções no combobox #tipo_consulta
		        carregar_combo_tipo_consulta( $('#tipo_consulta_liberado').val(), $('#tipo_contrato').val() );

		        // Adiciono valores aos elementos do modal
		        $('.mav_nome').html( $('.cxp_nome').text() );
		        $('.mav_data').html( event.data_evento );
		        $('.mav_periodo').html( event.periodo );
		        $('#mav_hide_cod_medico').val(event.codigo_medico); // input hidden
		        $('#mav_hide_cod_unidade').val(event.codigo_unidade); // input hidden
		        $('#mav_hide_cod_horario_agenda').val(event.codigo_horario_agenda); // input hidden
		        $('#mav_hide_periodo').val(event.periodo); // input hidden

				// Exibe modal
				$('#modal-agendar-vagas').modal();

			}

		} else if (event.id == 2) { // Caso o tipo de evento seja ENCAIXES

			// Só exibir modal de ENCAIXES caso NÃO existam VAGAS disponiveis
			if (typeof event.total_numerico_vagas == 'undefined') {

				// Só exibir modal se houverem ENCAIXES disponiveis
				if (typeof event.total_numerico_encaixes !== 'undefined' && event.total_numerico_encaixes > 0) {

					// Limpo div e a oculto
					$('.mae_msg_erro').html('');
					$('.mae_msg_erro').hide();
					$('.mae_msg_forcar_agendamento').html('');
					$('.mae_msg_forcar_agendamento').hide();

					// Ativo função de carregamento de opções no combobox #tipo_consulta
			        carregar_combo_tipo_consulta( $('#tipo_consulta_liberado').val(), $('#tipo_contrato').val() );

			        // Adiciono valores aos elementos do modal
			        $('.mae_nome').html( $('.cxp_nome').text() );
			        $('.mae_data').html( event.data_evento );
			        $('.mae_periodo').html( event.periodo );
			        $('#mae_hide_cod_medico').val(event.codigo_medico); // input hidden
			        $('#mae_hide_cod_unidade').val(event.codigo_unidade); // input hidden
			        $('#mae_hide_cod_horario_agenda').val(event.codigo_horario_agenda); // input hidden
			        $('#mae_hide_periodo').val(event.periodo); // input hidden

					// Exibe modal
					$('#modal-agendar-encaixes').modal();

				}

			}

		} else if (event.id == 3) { // Caso o tipo de evento seja BLOQUEIO
			
			// Adiciono valores aos elementos do modal
			$('.mab_motivo_bloqueio').html(event.motivo_bloqueio);

			// Exibe modal
			$('#modal-agendar-bloqueios').modal();

		} else if (event.id == 4) { // Caso o tipo de evento seja FERIADO

			// Adiciono valores aos elementos do modal
			$('.maf_motivo_feriado').html(event.motivo_feriado);

			// Exibe modal
			$('#modal-agendar-feriados').modal();

		} else if (event.id == 0) { // Caso o tipo de evento seja VAGAS/ENCAIXES LOTADOS

			// Limpo div de erros e a oculto
			$('.mal_msg_erro').html('');
			$('.mal_msg_erro').hide();  

			// Ativo função de carregamento de opções no combobox #tipo_consulta
	        carregar_combo_tipo_consulta( $('#tipo_consulta_liberado').val(), $('#tipo_contrato').val() );

	        // Adiciono valores aos elementos do modal
	        $('.mal_nome').html( $('.cxp_nome').text() );
	        $('.mal_data').html( event.data_evento );
	        $('.mal_periodo').html( event.periodo );
	        $('#mal_hide_cod_medico').val(event.codigo_medico); // input hidden
	        $('#mal_hide_cod_unidade').val(event.codigo_unidade); // input hidden
	        $('#mal_hide_cod_horario_agenda').val(event.codigo_horario_agenda); // input hidden
	        $('#mal_hide_periodo').val(event.periodo); // input hidden

	        // Limpo campos de usuario e senha
	        $('#mal_usuario_gerente').val('');
	        $('#mal_senha_gerente').val('');

			// Exibe modal
			$('#modal-agendar-lotado').modal();

		}

    }
};