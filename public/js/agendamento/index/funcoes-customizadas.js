/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/

/************************************
 #
 # Carrega opções dentro do combobox #cod_especialidade
 # 
*************************************/ 
function carregar_combo_especialidades(sexo = '', unidade = '', medico = '', idade = '', data_nascimento = '') {

	// Busca ESPECIALIDADES para preencher combobox (requisição ajax)
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlListaEspecialidadesPorFiltros,
        data: { 
            "idade_pesquisada": idade,
            "sexo_pesquisado": sexo,
            "unidade_pesquisada": unidade,
            "medico_pesquisado": medico,
            "data_nascimento_pesquisada": data_nascimento
        },
        beforeSend: function() { 
            // Soon 
        },
        success: function(response) {

        	// Limpo opções atuais do combobox
            $('#cod_especialidade').empty();

            // Adiciono opção padrão
            $('#cod_especialidade').append("<option value=''>Selecione uma especialidade</option>");

        	// Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo informações retornadas
            if (response == 'nada-encontrado') {

            	//console.log('Nenhum registro encontrado');

            } else if (response == 'sem-filtros') {

            	//console.log('Não foram passados adequadamente filtros para a busca');

            } else {

            	// Conto total de linhas retornadas
            	var qtd_options_especialidades = response.length;

            	if (medico != '' && qtd_options_especialidades == 1) {

	                // Faço loop pelo vetor
	        		$(response).each(function (index, value) {

	                    $('#cod_especialidade').append("<option value='" + value.cod_especialidade + "' selected='selected'>" + value.nome_especialidade + "</option>");
	                    
	                });

                    // Desabilita campo
                    $('#cod_especialidade').prop('disabled', true);

        		} else {

        			// Faço loop pelo vetor
	        		$(response).each(function (index, value) {

	                    $('#cod_especialidade').append("<option value='" + value.cod_especialidade + "'>" + value.nome_especialidade + "</option>");
	                    
	                });

        		}

        	} 

        },
        complete: function(response) {
            // Soon
        },
        error: function(response, thrownError) {
            // Soon
        }
    });

}


/************************************
 #
 # Carrega opções dentro do combobox #cod_medico
 # 
*************************************/ 
function carregar_combo_medicos(idade = '', especialidade = '', unidade = '', ultimo_medico_marcado = '') {

	// Busca MÉDICOS para preencher combobox (requisição ajax)
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlListaMedicosPorFiltros,
        data: { 
            "idade_pesquisada": idade,
            "especialidade_pesquisada": especialidade,
            "unidade_pesquisada": unidade
        },
        beforeSend: function() { 
            // Soon 
        },
        success: function(response) {

        	// Limpo opções atuais do combobox
            $('#cod_medico').empty();

            // Adiciono opção padrão
            $('#cod_medico').append("<option value=''>Selecione um médico</option>");

        	// Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo informações retornadas
            if (response == 'nada-encontrado') {

            	//console.log('Nenhum registro encontrado');

            } else if (response == 'sem-filtros') {

            	//console.log('Não foram passados adequadamente filtros para a busca');

            } else {

                // Faço loop pelo vetor
        		$(response).each(function (index, value) {

                    $('#cod_medico').append("<option value='" + value.cod_medico + "'>" + value.nome + "</option>");
                    
                });

                // Caso tenha sido definido um médico para manter marcado
                if (ultimo_medico_marcado != '') {

                    // Deixo marcado uma opção
                    $('#cod_medico').val(ultimo_medico_marcado);

                }

        	} 

        },
        complete: function(response) {
            // Soon
        },
        error: function(response, thrownError) {
            // Soon
        }
    });

}


/************************************
 #
 # Carrega opções dentro do combobox #tipo_consulta
 # 
*************************************/ 
function carregar_combo_tipo_consulta(tipo_liberacao, tipo_contrato) {

	// Limpo opções atuais do combobox #tipo_consulta e reinsiro as opções disponíveis
    $('.tipo-consulta').empty();
    $('.tipo-consulta').append("<option value=''>Selecione o tipo da consulta</option>");

    // Caso todas as opções de tipo estejam liberadas
    if (tipo_liberacao == 'todos') {

    	// Anexo novas opções ao combobox. Se o paciente tiver um contrato, a opção 'contrato/cartão fidelidade' deve vir marcada como padrão
    	if (tipo_contrato == 'pf' || tipo_contrato == 'pj') {

    		$('.tipo-consulta').append("<option value='1' selected='true'>Contrato</option>"); 

    	} else { 

    		$('.tipo-consulta').append("<option value='1'>Contrato</option>"); 

    	}

    	$('.tipo-consulta').append("<option value='2'>Particular</option>");

    } else { // Caso apenas a opção 'particular' esteja liberada

    	// Anexo novas opções ao combobox
    	$('.tipo-consulta').append("<option value='2' selected='true'>Particular</option>");

    }

}


/************************************
 #
 # Carrega botões pertinentes dentro da div #caixa_paciente
 # 
*************************************/ 
function carregar_botoes_caixa_paciente(tipo_contrato, codigo_pessoa_criptografado, codigo_contrato_criptografado = '') {

	// Atualizo url de destino do botão 'visualizar perfil da pessoa'
	$('#btn_ver_pessoa').attr("href", UrlVisualizarPessoaFisica + "/" + codigo_pessoa_criptografado);

	// Verifica se foi encontrado algum contrato e se ele é do tipo PF
	if (tipo_contrato == 'pf') {

		// Limpa div onde fica o botão
		$('.cxp_btn1').html('');

		// Preenchendo variável de conteúdo dinâmico
		var html_btn_ver_contrato = '';
		html_btn_ver_contrato += '<!-- BOTÃO VER CONTRATO -->';
		html_btn_ver_contrato += '<a class="btn btn-block btn-terciary" id="btn_ver_contrato_pessoa" href="' + UrlVisualizarContratoPf + '/' + codigo_contrato_criptografado + '" target="_blank">';
		html_btn_ver_contrato += '<i class="fa fa-search"></i> Visualizar contrato';
		html_btn_ver_contrato += '</a>';

		// Adiciona botão na div
		$(html_btn_ver_contrato).appendTo('.cxp_btn1');

	} else if (tipo_contrato == 'pj') { // Caso exista contrato e ele seja do tipo PJ

		// Limpa div onde fica o botão
		$('.cxp_btn1').html('');

		// Preenchendo variável de conteúdo dinâmico
		var html_btn_ver_contrato = '';
		html_btn_ver_contrato += '<!-- BOTÃO VER CONTRATO -->';
		html_btn_ver_contrato += '<a class="btn btn-block btn-terciary" id="btn_ver_contrato_pessoa" href="' + UrlVisualizarContratoPj + '/' + codigo_contrato_criptografado + '" target="_blank">';
		html_btn_ver_contrato += '<i class="fa fa-search"></i> Visualizar contrato';
		html_btn_ver_contrato += '</a>';

		// Adiciona botão na div
		$(html_btn_ver_contrato).appendTo('.cxp_btn1');

	} else { // Caso não exista contrato

		// Limpa div onde fica o botão
		$('.cxp_btn1').html('');

		// Preenchendo variável de conteúdo dinâmico
		var html_btn_ver_contrato = '';
		html_btn_ver_contrato += '<!-- BOTÃO CADASTRAR CONTRATO -->';
		html_btn_ver_contrato += '<a class="btn btn-block btn-primary-darker" id="btn_cadastrar_contrato_pessoa" href="' + UrlCadastrarContratoPf + '" target="_blank">';
		html_btn_ver_contrato += '<i class="far fa-handshake"></i> Cadastrar contrato';
		html_btn_ver_contrato += '</a>';

		// Adiciona botão na div
		$(html_btn_ver_contrato).appendTo('.cxp_btn1');      		

	}

}


/************************************
 #
 # Coloca informações / dados do paciente em posições especificas dentro da div #caixa_paciente
 # 
*************************************/ 
function carregar_caixa_paciente(codigo_pessoa) {

	// Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlBuscarPessoaParaAgendamento,
        data: { 
            "cod_pessoa": codigo_pessoa
        },
        beforeSend: function() { 

            // Oculta DIV
            $('.box_alerta_erro').hide();
            $('.box_pendencias_cliente_agendamento').hide();

        },
        success: function(response) {
			
        	// Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Garanto que a CAIXA DE AVISOS relacionados ao paciente esteja vazia
			$('.box_pendencias_cliente_agendamento').html('');

            // Checo se a busca foi um sucesso
            if (response.status_busca == 'sucesso') {

            	// Guardo código da pessoa no input hidden
            	$('#cod_pessoa_crypt').val(response.cod_pessoa_crypt);

            	// Guardo tipo de consulta, tipo de contrato e codigo do contrato em inputs hidden
            	$('#tipo_consulta_liberado').val(response.tipo_consulta_liberado);
            	$('#tipo_contrato').val(response.tipo_contrato);
            	$('#cod_contrato_crypt').val(response.cod_contrato_crypt);

            	// Checo o sexo do paciente trocando número por string
            	if (response.sexo_pessoa == 1) {
            		var string_sexo = 'Masculino';
            	} else if (response.sexo_pessoa == 2) {
            		var string_sexo = 'Feminino';
            	} else {
            		var string_sexo = '-';  
            	}

	        	// Preencho espaços / marcações com valores retornados da requisição
	        	if (response.status_financeiro == 'em_dia') { 
	        		$('.cxp_status_financeiro').html('<span class="label label-success">EM DIA</span>'); 
	        	} else if (response.status_financeiro == 'inadimplente') { 
	        		$('.cxp_status_financeiro').html('<span class="label label-danger">INADIMPLENTE</span>'); 
	        	} else if (response.status_financeiro == 'sem_contrato') { 
	        		$('.cxp_status_financeiro').html('<span class="label label-default">SEM CONTRATO</span>'); 
	        	}
	        	$('.cxp_nome').html(response.nome_pessoa);
	        	$('.cxp_sexo').html(string_sexo).data('codigosexo', response.sexo_pessoa); // Insiro conteudo html e adicionalmente insiro um atributo data-codigosexo
	        	$('.cxp_idade').html(response.idade_pessoa);
                $('.cxp_idade_complemento').html(response.idade_pessoa_complemento);
	        	$('.cxp_data_nascimento').html(response.data_nascimento_pessoa);

	        	// Ativo função de carregamento de botões de visualização no final da div #caixa_paciente
	        	carregar_botoes_caixa_paciente(response.tipo_contrato, response.cod_pessoa_crypt, response.cod_contrato_crypt);

	        	// Caso exista uma mensagem de aviso de pendencias
	        	if (response.msg_aviso_pendencias != '') {

		        	// Preenchendo a CAIXA DE AVISOS relacionados ao paciente selecionado
		        	$('.box_pendencias_cliente_agendamento').append("<h2 class='pt-0 mt-0'>Avisos</h2>");

		        	// Faço loop pelas mensagens de aviso de pendências retornadas
	                $.each(response.msg_aviso_pendencias, function(index, value) {

	                	// Insiro mensagem dentro da div adequada
	                	$('.box_pendencias_cliente_agendamento').append('- ' + value + '<br />');

	                }); // Fecha $.each

	                // Exibo div
	                $('.box_pendencias_cliente_agendamento').show();

            	} 

	        	// Ativa função de exibição de div
				exibir_caixa_paciente();

				// Limpa input de pesquisa
				$('#termo').val('');

				// Exibo a aba #tab_buscar_agendamento
    			$("#tab_buscar_agendamento").show();

        	} else { // Caso a pessoa não seja localizada

        		// Revela DIV
                $('.box_alerta_erro').show();

        	}

        },
        complete: function(response) {
            // Soon
        },
        error: function(response, thrownError) {
            // Soon
        }
    });

}


/************************************
 #
 # Limpa informações presentes dentro da div #caixa_paciente
 # 
*************************************/ 
function limpar_caixa_paciente() {

	// Ativa função de ocultação de div
	ocultar_caixa_paciente();

	// Removo dados de inputs hidden
    $('#cod_pessoa_crypt').val('');
    $('#tipo_consulta_liberado').val('');
    $('#tipo_contrato').val('');

	// Deixo todos os espaços / marcações sem valores
	$('.cxp_status_financeiro').html('');
	$('.cxp_nome').html('');
	$('.cxp_sexo').html('');
	$('.cxp_idade').html('');
    $('.cxp_idade_complemento').html('');
	$('.cxp_data_nascimento').html('');

	// Remove classe 'botao_desativado' do botão 'visualizar perfil da pessoa' e deixa o HREF vazio
	$('#btn_ver_pessoa').removeClass("botao_desativado");
	$('#btn_ver_pessoa').attr("href", "javascript:void(null);");

	// Remove classe 'botao_desativado' do botão 'visualizar contrato da pessoa' e deixa o HREF vazio
	$('#btn_ver_contrato_pessoa').removeClass("botao_desativado");
	$('#btn_ver_contrato_pessoa').attr("href", "javascript:void(null);");

}


/************************************
 #
 # Exibe div #caixa_paciente com efeito de slide
 # 
*************************************/ 
function exibir_caixa_paciente() {

	// Exibe DIV #caixa_paciente com efeito de slide para baixo
    $('#caixa_paciente').css('opacity', 1).slideDown(600, "swing");

    // Ativa campos de busca de agenda
	ativar_campos_busca_agenda();

}


/************************************
 #
 # Oculta div #caixa_paciente com efeito de slide
 # 
*************************************/ 
function ocultar_caixa_paciente() {

	// Marca <li> da aba como ativo com adição de classes
	$("#tab_novo_agendamento").closest('li').addClass('active');

	// Marca conteúdo da aba como ativo com adição de classes
	$("#aba_novo_agendamento").addClass('active').addClass('in');

	// Marca <li> da aba como inativo com remoção de classes
	$("#tab_buscar_agendamento").closest('li').removeClass('active');

	// Marca conteúdo da aba como inativo com remoção de classes
	$("#aba_buscar_agendamento").removeClass('active').removeClass('in');

    // Oculto o <li> da aba #tab_buscar_agendamento
    $("#tab_buscar_agendamento").hide();

	// Oculta DIV #caixa_paciente com efeito de slide para cima
	$('#caixa_paciente').css('opacity', 0).slideUp(300);

	// Desativa campos de busca de agenda
	desativar_campos_busca_agenda();

}


/************************************
 #
 # Ativa os campos e botões presentes dentro da div #caixa_busca_agenda
 # 
*************************************/ 
function ativar_campos_busca_agenda() {

	// Checo se existe uma TRANSFERÊNCIA DE CONSULTA ativa no momento. Caso exista, o combobox #cod_especialidade não deverá ser modificado
	if (transferencia_de_consulta == 'ativa') {

	    // [Carregamento padrão] Carrega dados em combobox, filtrando por idade e especialidade
	   	carregar_combo_medicos( $('.cxp_idade').html(), $('#cod_especialidade').find(':selected').val() );

		// Desativa propriedade 'disabled' dos campos
		$('#cod_unidade').prop('disabled', false);
		$('#cod_medico').prop('disabled', false);
		$('.tipo-consulta').prop('disabled', false);

		// Remove classe 'botao_desativado' do botão 'btn_buscar_agenda'
		$('#btn_buscar_agenda').removeClass('botao_desativado');

		// Remove classe 'botao_desativado' do botão 'btn_resetar_busca_agenda'
		$('#btn_resetar_busca_agenda').removeClass('botao_desativado');
		
		// Oculta div de dica
		$('.box_alerta_amarelo').hide();

	} else { // NÃO existe transferência ativa, executo procedimento normal

		// [Carregamento padrão] Carrega dados em combobox, filtrando apenas por sexo
	    carregar_combo_especialidades( $('.cxp_sexo').data('codigosexo'), '', '', $('.cxp_idade').html(), $('.cxp_data_nascimento').html() ); // Recupera o código do sexo através de um data-attribute e coloca na função

	    // [Carregamento padrão] Carrega dados em combobox, filtrando apenas por idade
	   	carregar_combo_medicos( $('.cxp_idade').html());

		// Desativa propriedade 'disabled' dos campos
		$('#cod_unidade').prop('disabled', false);
		$('#cod_especialidade').prop('disabled', false); //
		$('#cod_medico').prop('disabled', false);
		$('.tipo-consulta').prop('disabled', false);

		// Remove classe 'botao_desativado' do botão 'btn_buscar_agenda'
		$('#btn_buscar_agenda').removeClass('botao_desativado');

		// Remove classe 'botao_desativado' do botão 'btn_resetar_busca_agenda'
		$('#btn_resetar_busca_agenda').removeClass('botao_desativado');
		
		// Oculta div de dica
		$('.box_alerta_amarelo').hide();

	}

}


/************************************
 #
 # Desativa os campos e botões presentes dentro da div #caixa_busca_agenda
 # 
*************************************/ 
function desativar_campos_busca_agenda() {

	// Checo se existe uma TRANSFERÊNCIA DE CONSULTA ativa no momento. Caso exista, o combobox #cod_especialidade não deverá ser modificado
	if (transferencia_de_consulta == 'ativa') {

		// Ativa propriedade 'disabled' dos campos
		$('#cod_unidade').prop('disabled', true);
		$('#cod_medico').prop('disabled', true);
		$('.tipo-consulta').prop('disabled', true);

		// Limpo opções atuais dos comboboxes dinâmicos e adiciono opções padrão
	    $('#cod_medico').empty();
	    $('#cod_medico').append("<option value=''>Selecione um médico</option>");

	    // Reseta comboboxes, devolvendo-os para a opção padrão
		$('#cod_unidade').prop('selectedIndex', 0);
		$('#cod_medico').prop('selectedIndex', 0);
		$('.tipo-consulta').prop('selectedIndex', 0);

		// Adiciona classe 'botao_desativado' do botão 'btn_buscar_agenda'
		$('#btn_buscar_agenda').addClass('botao_desativado');

		// Adiciona classe 'botao_desativado' do botão 'btn_resetar_busca_agenda'
		$('#btn_resetar_busca_agenda').addClass('botao_desativado');

		// Limpa valor da div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').html('');

        // Oculta div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').hide();
	        
		// Exibe div de dica
		$('.box_alerta_amarelo').show();

		// Oculto div .box_erro_agenda_vazia
		$('.box_erro_agenda_vazia').hide();

		// Oculto div .panel_agendas
	    $('.panel_agendas').hide();

		// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo da agenda)
		$('.panel_agendas .panel-body').empty();

	} else { // NÃO existe transferência ativa, executo procedimento normal

		// Ativa propriedade 'disabled' dos campos
		$('#cod_unidade').prop('disabled', true);
		$('#cod_especialidade').prop('disabled', true); //
		$('#cod_medico').prop('disabled', true);
		$('.tipo-consulta').prop('disabled', true);

		// Limpo opções atuais dos comboboxes dinâmicos e adiciono opções padrão
	    $('#cod_especialidade').empty(); //
	    $('#cod_especialidade').append("<option value=''>Selecione uma especialidade</option>"); //
	    $('#cod_medico').empty();
	    $('#cod_medico').append("<option value=''>Selecione um médico</option>");

	    // Reseta comboboxes, devolvendo-os para a opção padrão
		$('#cod_unidade').prop('selectedIndex', 0);
		$('#cod_especialidade').prop('selectedIndex', 0); //
		$('#cod_medico').prop('selectedIndex', 0);
		$('.tipo-consulta').prop('selectedIndex', 0);

		// Adiciona classe 'botao_desativado' do botão 'btn_buscar_agenda'
		$('#btn_buscar_agenda').addClass('botao_desativado');

		// Adiciona classe 'botao_desativado' do botão 'btn_resetar_busca_agenda'
		$('#btn_resetar_busca_agenda').addClass('botao_desativado');

		// Limpa valor da div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').html('');

        // Oculta div .msg_erro_validacao_filtros
        $('.msg_erro_validacao_filtros').hide();

		// Exibe div de dica
		$('.box_alerta_amarelo').show();

		// Oculto div .box_erro_agenda_vazia
		$('.box_erro_agenda_vazia').hide();

		// Oculto div .panel_agendas
	    $('.panel_agendas').hide();

		// Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo da agenda)
		$('.panel_agendas .panel-body').empty();

	}

}


/************************************
 #
 # Verificar se os comboboxes de especialidade e médico tem opções disponiveis. Caso não tenham tenham, TRAVA botão 'Buscar Agenda'
 # 
*************************************/ 
function checar_existencia_opcoes_combos_filtros() {

	var retorno = {}; // Crio um objeto
	var total_opcoes_combo_especialidade = $('#cod_especialidade option').length;
	var total_opcoes_combo_medico = $('#cod_medico option').length;

	// Verifico se existem opções dentro do combo de especialidade. Por padrão, existirá ao menos uma opção. Se não tiverem mais do que isso, retorna erro
	if (total_opcoes_combo_especialidade < 2) {

		// Defino valores de posições no objeto
		retorno.liberado = false;
		retorno.mensagem_erro = 'Não foi possível localizar médicos que possam prestar atendimento para este paciente devido a sua faixa de idade e/ou sexo ou por não trabalharem na unidade informada.';

		// Retorno o objeto
		return retorno;

	} else if (total_opcoes_combo_medico < 2) { // Verifico se existem opções dentro do combo de medicos. Por padrão, existirá ao menos uma opção. Se não tiverem mais do que isso, retorna erro

		// Defino valores de posições no objeto
		retorno.liberado = false;
		retorno.mensagem_erro = 'Não foi possível localizar médicos que possam prestar atendimento para este paciente devido a sua faixa de idade e/ou sexo ou por não trabalharem na unidade informada.';

		// Retorno o objeto
		return retorno;

	} else {

		// Defino valores de posições no objeto
		retorno.liberado = true;

		// Retorno o objeto
		return retorno;

	}

}


/************************************
 #
 # Função que inicia o carregamento de dados para a agenda levando em conta as opções selecionados em filtros
 # OBS 1: Esta função automaticamente chama as outras funções necessárias para coleta de dados para a agenda
 # OBS 2: Por haver múltiplas requisições ajax (assíncronas), foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function carregar_agenda(cod_especialidade, cod_unidade = '', cod_medico = '') {

	// Reseto valores de variaveis globais usadas no desenho da agenda
	caixas_unidades_pai = new Array;
	caixas_medicos_pai = new Array;
	lista_eventos_pai = new Array;

	// Inicializo um objeto deferred
    var def = $.Deferred();

    // Efetua requisição ajax para buscar unidades para desenhar a agenda
    $.ajax({
		cache: false,
		type: "POST",
		url: UrlBuscarUnidadesAtendemEspecialidade,
		data: { 
			"cod_especialidade": cod_especialidade,
			"cod_unidade": cod_unidade,
			"cod_medico": cod_medico
		}
	})
    .done(function(response) {

    	// Variaveis de controle
		var response = JSON.parse(response); // Convertendo resposta para objeto javascript
        var requisicoes_medicos = []; // Vetor para requisições
        var requisicoes_eventos = []; // Vetor para requisições

        // Verifico se o status do retorno é igual a 'sucesso'
		if (response.status == 'sucesso') {

			// Verifico se o total de unidades encontrado é maior que zero
			if (response.total_unidades > 0) {

		        // Faço loop utilizando o total de unidades como valor máximo
				for (var x = 0; x < response.total_unidades; x++) {

					// Colocando HTML dentro da variavel
					var html_temp = '';
					html_temp +=
					'<!-- INICIO DIV .PANEL_UNIDADE -->' +
					'<div class="panel_unidade panel_unidade_' + response.codigos_unidades[x] + '">' +

						'<!-- Input oculto para guardar código da unidade -->' +
						'<input type="hidden" id="cod_unidade" name="cod_unidade" value="' + response.codigos_unidades[x] + '" />' +
						
						'<h3 class="agenda_titulo_unidade letra-azul-claro">Unidade: ' + response.nomes_unidades[x] + '</h3>' +

						'<!-- INICIO DIV .ESPACO_CAIXAS_MEDICOS -->' + 
						'<div class="espaco_caixas_medicos">' +
						'</div>' +
						'<!-- FIM DIV .ESPACO_CAIXAS_MEDICOS -->' +

					'</div>' +
					'<!-- FIM DIV .PANEL_UNIDADE -->';

					// Coloco variavel html dentro do array-pai
					caixas_unidades_pai.push(html_temp);

					// Coloco requisição a função seguinte dentro de um array
		        	requisicoes_medicos.push( carregar_medicos_para_agenda(cod_especialidade, response.codigos_unidades[x], cod_medico) );

		        } // Fecha FOR

		        // Executa TODAS as funções presentes dentro do array e depois que todas estiverem concluídas, executa ação dentro do bloco then()
		        $.when.apply($, requisicoes_medicos).then(function() { 

		        	// Executa função e depois que estiver concluída, executa ação dentro do bloco then()
		        	$.when( desenhar_caixas_da_agenda() ).then(function() {
		        		
		        		// Conto total de caixas de calendário
					    var total_caixas_calendarios = $('.calendario_de_agenda').length;

					    // Faço loop pelas caixas de calendário utilizando a classe .calendario_de_agenda para localizá-las
					    $('.calendario_de_agenda').each(function() {

					    	// Pego código da agenda através de input hidden / oculto
					    	var codigo_agenda = $(this).closest('.panel_medico').find('#cod_agenda').val();

					    	// Capto a identificação (nome único de classe) deste elemento utilizando o comando split() e pegando a posição [1] do vetor gerado. O valor de $elemento_destino será utilizado para localizar o FullCalendar onde serão carregadas as informações retornadas da função carregar_eventos_para_agenda() 
					    	var elemento_destino = $(this).attr('class').split(' ')[1];

					    	// Coloco requisição a função seguinte dentro de um array
		        			requisicoes_eventos.push( carregar_eventos_para_agenda(cod_especialidade, codigo_agenda, elemento_destino) );

					    });

		        		// Executa TODAS as funções presentes dentro do array e depois que todas estiverem concluídas, executa ação dentro do bloco then()
		        		$.when.apply($, requisicoes_eventos).then(function() { 

			        		// Resolve o objeto deferred
			        		def.resolve();

		        		}).fail(function(err) { // Caso algum erro tenha sido retornado

				        	// Marca o objeto deferred como rejeitado e passo a mensagem de rejeição recebida da função carregar_medicos_para_agenda() como parametro
				        	def.reject(err);

				        });

		        	}).fail(function(err) { // Caso algum erro tenha sido retornado

			        	// Marca o objeto deferred como rejeitado e passo a mensagem de rejeição recebida da função carregar_medicos_para_agenda() como parametro
			        	def.reject(err);

			        });
		        	
		        }).fail(function(err) { // Caso algum erro tenha sido retornado

		        	// Marca o objeto deferred como rejeitado e passo a mensagem de rejeição recebida da função carregar_medicos_para_agenda() como parametro
		        	def.reject(err);

		        });

		    } else {

		    	// Marca o objeto deferred como rejeitado
	        	def.reject('Não foi possivel localizar unidades');

		    }

    	} else {

    		// Marca o objeto deferred como rejeitado
	        def.reject('Não foi possivel localizar unidades');

    	}

    });

    // Retorno a promise
    return def.promise();

}


/************************************
 #
 # Função que carrega dados dos médicos para a agenda baseado nos parametros passados
 # OBS 1: Por haver múltiplas requisições ajax (assíncronas), foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function carregar_medicos_para_agenda(cod_especialidade, cod_unidade = '', cod_medico = '') {

	// Inicializo um objeto deferred
    var def = $.Deferred();

    // Efetua requisição ajax para buscar médicos para desenhar a agenda
	$.ajax({
		cache: false,
		type: "POST",
		url: UrlBuscarMedicosAtendemEspecialidadeUnidade,
		data: { 
			"cod_especialidade": cod_especialidade,
			"cod_unidade": cod_unidade,
			"cod_medico": cod_medico
		}
	})
    .done(function(response) {

    	// Variaveis de controle
		var response = JSON.parse(response); // Convertendo resposta para objeto javascript

		// Verifico se o status do retorno é igual a 'sucesso'
		if (response.status == 'sucesso') {

			// Verifico se o total de medicos encontrado é maior que zero
			if (response.total_medicos > 0) {

		    	// Faço loop utilizando o total de médicos como valor máximo
				for (var x = 0; x < response.total_medicos; x++) {

					// Colocando HTML dentro da variavel
					var html_temp = '';
					html_temp +=
					'<!-- ### INICIO PANEL .PANEL_MEDICO ### -->' +
					'<div class="panel panel-default panel_medico">' +

						'<!-- Input oculto para guardar código do médico -->' +
						'<input type="hidden" id="cod_medico" name="cod_medico" value="' + response.codigos_medicos[x] + '" />' +

						'<!-- Input oculto para guardar código da agenda -->' +
						'<input type="hidden" id="cod_agenda" name="cod_agenda" value="' + response.codigos_agendas[x] + '" />' +
						
						'<div class="panel-heading">' +
							'Médico(a): <span class="letra-azul-claro letra-maiuscula">' + response.nomes_medicos[x] + '</span> <br />' +
							'Especialidade: <span class="letra-azul-claro letra-maiuscula">' + response.nomes_especialidades[x] + '</span> ' +
						'</div>' +

						'<div class="panel-body">';

							html_temp +=
							'<div class="calendario_de_agenda calendario_' + response.codigos_agendas[x] + '"></div>';

					html_temp +=
						'</div>' +

					'</div>' +
					'<!-- ### FIM PANEL .PANEL_MEDICO ### -->';

					// Coloco dados em posições dentro de um objeto javascript
					caixas_medicos_filho['cod_unidade'] = cod_unidade;
					caixas_medicos_filho['cod_medico'] = response.codigos_medicos[x];
					caixas_medicos_filho['cod_agenda'] = response.codigos_agendas[x];
					caixas_medicos_filho['html_caixa'] = html_temp;

					// Coloco o objeto-filho dentro do array-pai
		            caixas_medicos_pai.push(caixas_medicos_filho);

		            // Limpo variaveis para futuras utilizações
		            caixas_medicos_filho = {};

				} // Fecha FOR

				// Resolve o objeto deferred
				def.resolve();

			} else {

				// Marca o objeto deferred como rejeitado
	        	def.reject('Não foi possivel localizar médicos para a unidade #' + cod_unidade);

			}

		} else if (response.status == 'vazio') {

			// Colocando HTML dentro da variavel
			var html_temp = '';
			html_temp +=
			'<!-- ### [INICIO] NÃO EXISTEM MEDICOS ### -->' +
			'<div class="box_erro_agenda_unidade_medico_vazia">' + 

				'<div class="row">' +

					'<!-- Coluna -->' +
		            '<div class="col-md-12 col-xs-12">' +

		            	'Atualmente não existem médicos atendendo esta unidade.'

					'</div>' +

				'</div>' +

			'</div>' +
			'<!-- ### [FIM] NÃO EXISTEM MEDICOS ### -->';

			// Coloco dados em posições dentro de um objeto javascript
			caixas_medicos_filho['cod_unidade'] = cod_unidade;
			caixas_medicos_filho['cod_medico'] = '';
			caixas_medicos_filho['cod_agenda'] = '';
			caixas_medicos_filho['html_caixa'] = html_temp;
			caixas_medicos_filho['unidade_sem_medicos'] = 'sim';

			// Coloco o objeto-filho dentro do array-pai
            caixas_medicos_pai.push(caixas_medicos_filho);

            // Limpo variaveis para futuras utilizações
            caixas_medicos_filho = {};

            // Resolve o objeto deferred
			def.resolve();

		} else {

    		// Marca o objeto deferred como rejeitado
	        def.reject('Não foi possivel localizar médicos para a unidade #' + cod_unidade);

    	}

    });

    // Retorno a promise
    return def.promise();

}


/************************************
 #
 # Função que desenha as caixas de unidades / médicos / calendários dentro da div '.panel_agendas'
 # OBS 1: Para seguir a cadeia das outras funções relacionadas ao desenho da agenda, foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function desenhar_caixas_da_agenda() {

	// Inicializo um objeto deferred
    var def = $.Deferred();

	// Conto total de caixas de unidades geradas
    var total_caixas_unidades = caixas_unidades_pai.length;

    // Faço loop pelas caixas de unidades presentes na variavel global
    $.each(caixas_unidades_pai, function(index, value) {

    	// Verifico se é a última caixa
    	if (index === (total_caixas_unidades - 1)) {

    		// Não mexo no valor da variavel
    		value = value;

    	} else {

    		// Acrescento um HR no final da variavel
    		value = value + ' <hr style="margin-top: 30px; margin-bottom: 30px; border-top: 2px solid #4286f4;" /> ';

    	}

    	// Insiro HTML das caixas de unidades dentro da div .panel_agendas (elemento .panel-body é onde fica o conteúdo)
    	$(value).appendTo('.panel_agendas .panel-body');

    });
	
	// Exibo a div '.panel_agendas' apenas para aplicar configurações de FullCalendar (que não inicializa corretamente em divs ocultas)
	$('.panel_agendas').show();

    // Faço loop pelas caixas de médicos presentes na variavel global
    $.each(caixas_medicos_pai, function(index, value) {

    	// Insiro HTML das caixas de médicos dentro da div .panel_unidade fazendo relação pelo código da unidade presente na classe .panel_unidade_{VARIAVEL}
    	$('.panel_unidade_' + value['cod_unidade']).find('.espaco_caixas_medicos').append(value['html_caixa']);

    	// Checo se a caixa de unidade está COM médicos. Se estiver, habilitar fullCalendar
    	if (value['unidade_sem_medicos'] != 'sim') {

	    	// Inicializo FullCalendar dentro de cada caixa de médico
			$('.calendario_' + value['cod_agenda']).fullCalendar(opcoes_calendario);

		}

    });

    // Oculto a div '.panel_agendas'
	$('.panel_agendas').hide();

	// Resolve o objeto deferred
	def.resolve();

	// Retorno a promise
    return def.promise();

}


/************************************
 #
 # Função que carrega dados dos eventos (vagas / encaixes / bloqueios) para a agenda baseado nos parametros passados
 # OBS 1: Por haver múltiplas requisições ajax (assíncronas), foi necessário utilizar javascript promises / deferred
 # 
*************************************/
function carregar_eventos_para_agenda(cod_especialidade, cod_agenda, elemento_destino) {
	
	// Inicializo um objeto deferred
    var def = $.Deferred();

    // Efetua requisição ajax para buscar eventos para desenhar a agenda
	$.ajax({
		cache: false,
		type: "POST",
		url: UrlBuscarDiasTrabalhadosAgendaMedico,
		data: { 
			"cod_especialidade": cod_especialidade,
			"cod_agenda": cod_agenda
		}
	})
    .done(function(response) {

    	// Variaveis de controle
		var response = JSON.parse(response); // Convertendo resposta para objeto javascript

		// Verifico se o status do retorno é igual a 'sucesso'
		if (response.status == 'sucesso') {

			// Coloco dados em posições dentro de um objeto javascript
			lista_eventos_filho['elemento_de_destino'] = elemento_destino;
			lista_eventos_filho['vetor_eventos_manha'] = response.array_eventos_manha;
			lista_eventos_filho['vetor_eventos_tarde'] = response.array_eventos_tarde;

			// Coloco o objeto-filho dentro do array-pai
            lista_eventos_pai.push(lista_eventos_filho);

            // Limpo variaveis para futuras utilizações
            lista_eventos_filho = {};

            // Resolve o objeto deferred
			def.resolve();

		} else {

    		// Marca o objeto deferred como rejeitado
	        def.reject('Não foi possivel localizar eventos para a agenda #' + cod_agenda);

    	}

    });

    // Retorno a promise
    return def.promise();
	
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

	// Vou até o final da tela para chamar a atenção
	$('html, body').animate({ scrollTop: $(document).height() - $(window).height() });

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

	// Vou até o final da tela para chamar a atenção
	//$('html, body').animate({ scrollTop: $(document).height() - $(window).height() });

}


/************************************
 #
 # Registra agendamento, passando o tipo de consulta (contrato / particular) e o tipo de agendamento (vaga / encaixe) como parametros
 # 
*************************************/
function executar_agendamento(tipo_consulta, tipo_agendamento, botao_origem = '', forcar_agendamento = '') {

	// Resetando todos os possiveis Toast
    $.toast().reset('all');

    // Caso nenhum tipo de agendamento seja informado, utiliza a referência do botão de origem para descobrir este tipo
    if (tipo_agendamento == '') {

    	// Pego o ID da janela modal onde o botão está presente
		var id_modal_do_botao = $(botao_origem).closest('.modal').attr('id');

		// Verifico o texto do ID
		if (id_modal_do_botao == 'modal-agendar-vagas') {

			// Atribuo valor a variavel
			tipo_agendamento = 1; // vaga

		} else if (id_modal_do_botao == 'modal-agendar-encaixes') {

			// Atribuo valor a variavel
			tipo_agendamento = 2; // encaixe

		} else if (id_modal_do_botao == 'modal-agendar-lotado') {

			// Atribuo valor PROVISORIO a variavel
			tipo_agendamento = 0; // lotado

		}

    }

	// Define o prefixo que será utilizado para localizar campos pertinentes dentro do modal
	if (tipo_agendamento == 1) {

		// Indico prefixo referente a elementos do modal de 'agendar para vaga'
		var prefixo = 'mav';

	} else if (tipo_agendamento == 2) {

		// Indico prefixo referente a elementos do modal de 'agendar para encaixe'
		var prefixo = 'mae';

	} else if (tipo_agendamento == 0) {

		// Indico prefixo referente a elementos do modal de 'agendar lotado'
		var prefixo = 'mal';

	}

	// Limpo e oculto div de erros
    $('.' + prefixo + '_msg_erro').html('');
    $('.' + prefixo + '_msg_erro').hide();
    $('.' + prefixo + '_msg_erro').append('<h4 class="pt-0">Alerta</h4>');

    // Reúno dados necessários
    var form_ag_data_selecionada = $('.' + prefixo + '_data').text();
    var form_ag_tipo_consulta = tipo_consulta; // contrato (1) ou particular (2)
    var form_ag_cod_unidade = $('#' + prefixo + '_hide_cod_unidade').val(); // Retirado de input hidden dentro do modal
    var form_ag_cod_medico = $('#' + prefixo + '_hide_cod_medico').val(); // Retirado de input hidden dentro do modal
    var form_ag_cod_especialidade = $('#cod_especialidade option:selected').val(); // Retirado de combobox no filtro
    var form_ag_cod_horario_agenda = $('#' + prefixo + '_hide_cod_horario_agenda').val(); // Retirado de input hidden dentro do modal
    var form_ag_periodo = $('#' + prefixo + '_hide_periodo').val(); // Retirado de input hidden dentro do modal
    var form_ag_cod_pessoa_crypt = $('#cod_pessoa_crypt').val(); // Retirado de input hidden dentro da caixa de paciente
    var form_ag_tipo_contrato = $('#tipo_contrato').val(); // Retirado de input hidden dentro da caixa de paciente. Pode receber os valores 'pf' ou 'pj'
    var form_ag_cod_contrato_crypt = $('#cod_contrato_crypt').val(); // Retirado de input hidden dentro da caixa de paciente
    var form_ag_tipo_agendamento = tipo_agendamento; // 1 = vaga, 2 = encaixe
    var form_ag_usuario_gerente = $('#' + prefixo + '_usuario_gerente').val();
    var form_ag_senha_gerente = $('#' + prefixo + '_senha_gerente').val();
    var form_ag_logado_como_gerente = $('#' + prefixo + '_hide_logado_como_gerente').val(); // Retirado de input hidden dentro do modal. Pode ser: 1 (sim) ou 0 (não)
   
    // Garanto que o valor da variavel seja sempre 1 ou 0
    if (form_ag_logado_como_gerente == '') { form_ag_logado_como_gerente = 0; }

    // Verifico se o parametro 'forcar_agendamento' foi setado na chamada da função
    if (forcar_agendamento == 1) {

    	// Sinalizo que É para 'forçar agendamento'
    	var form_ag_forcar_agendamento = 1;

    } else {

    	// Sinalizo que NÃO É para 'forçar agendamento'
    	var form_ag_forcar_agendamento = 0;

    }

    /*
     ###########################################
     # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
     ###########################################
    */
    if (form_ag_tipo_consulta == '') {

        // Coloco mensagem dentro da div de erros e exibo a div de erros
        $('.' + prefixo + '_msg_erro').append('- O campo TIPO DE CONSULTA não foi preenchido corretamente.');
        $('.' + prefixo + '_msg_erro').show();    

        // Finaliza função
        return false;

    }
    /*
     ###########################################
     # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
     ###########################################
    */

    // Verifico se existe TRANSFERÊNCIA ATIVA no momento
    if (transferencia_de_consulta == 'ativa') {

    	var tipo_requisicao_agendamento = 'transferencia';

    } else {

    	var tipo_requisicao_agendamento = 'cadastro';

    }

    // Verifico o texto do ID da janela modal onde o botão está presente. Se for referente a agendamento lotado, altero o valor da variavel 'form_ag_tipo_agendamento' para 2, porque qualquer liberação de agendamento pós-lotação conta como ENCAIXE
    if (id_modal_do_botao == 'modal-agendar-lotado') {

    	// Altero valor da variavel
    	form_ag_tipo_agendamento = 2;

    }

    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlExecutarAgendamento,
        data: { 
        	"forcar_agendamento": form_ag_forcar_agendamento, // pode ser: 1 (sim) ou 0 (não)
        	"usuario_gerente": form_ag_usuario_gerente,
        	"senha_gerente": form_ag_senha_gerente,
        	"logado_como_gerente": form_ag_logado_como_gerente, // pode ser: 1 (sim) ou 0 (não)
            "cod_pessoa": form_ag_cod_pessoa_crypt,
            "tipo_contrato": form_ag_tipo_contrato,
            "cod_contrato": form_ag_cod_contrato_crypt,
            "tipo_agendamento": form_ag_tipo_agendamento, // vaga ou encaixe
            "tipo_consulta": form_ag_tipo_consulta, // contrato (1) ou particular (2)
            "data_selecionada": form_ag_data_selecionada,
            "cod_medico": form_ag_cod_medico,
            "cod_unidade": form_ag_cod_unidade,
            "cod_especialidade": form_ag_cod_especialidade,
            "cod_horario_agenda": form_ag_cod_horario_agenda,
            "periodo": form_ag_periodo,
            "tipo_requisicao_agendamento": tipo_requisicao_agendamento, // transferencia ou cadastro
            "cod_consulta_transferida": $('#cod_consulta_em_transferencia').val()
        },
        beforeSend: function() { 
            
            // Revela div #msg_processando
        	$('#msg_processando').show();

        },
        success: function(response) {
            
            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Checo retorno
            if (response.status_requisicao == 'erro') {

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.' + prefixo + '_msg_erro').append(response.erro);
                $('.' + prefixo + '_msg_erro').show();     

            } else if (response.status_requisicao == 'validacao') {

            	// Limpo e oculto div com mensagem de FORÇAR AGENDAMENTO
			    $('.' + prefixo + '_msg_forcar_agendamento').html('');
			    $('.' + prefixo + '_msg_forcar_agendamento').hide();

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros
                $('.' + prefixo + '_msg_erro').append(response.erro);

                // Colocando HTML dentro da variavel   
                var html_caixa_login_gerente = '';
                html_caixa_login_gerente +=
                '<!-- Inicio linha -->' +
                '<div class="row">' +

                	'<div class="col-md-12 col-sm-12 col-xs-12">' +

                		'<b>Deseja LIBERAR o agendamento?</b>' +

                	'</div>' +

                '</div>' +
                '<!-- Fim linha -->';

			    // Checa se o usuario logado tem permissão 'forcar-agendamento'. A variavel 'v_forcar_agendamento' é definida na view
			    if (v_forcar_agendamento == 1) {

			    	html_caixa_login_gerente +=
			    	'<!-- Inputs ocultos para guardar códigos e outros dados -->' + 
		    		'<input type="hidden" id="' + prefixo + '_hide_logado_como_gerente" name="' + prefixo + '_hide_logado_como_gerente" value=1 />' +
			    	
			    	'<!-- Inicio linha -->' +
					'<div class="row">' + 

			    		'<!-- Coluna -->' +
						'<div class="col-md-12 col-xs-12">' +

							'<label class="control-label"></label>' +
							'<button type="button" class="btn btn-md btn-success btn_forcar_agendamento">Liberar</button>' +

						'</div>' +

					'</div>' +
					'<!-- Fim linha -->';

				} else {

					html_caixa_login_gerente +=
					'<!-- Inputs ocultos para guardar códigos e outros dados -->' + 
			    	'<input type="hidden" id="' + prefixo + '_hide_logado_como_gerente" name="' + prefixo + '_hide_logado_como_gerente" value=0 />' +

	                '<!-- Inicio linha -->' +
					'<div class="row">' +   

						'<!-- Coluna -->' +
						'<div class="col-md-5 col-xs-12">' +

							'<label class="control-label"><small>Usuário do Gerente</small></label>' +
	                    	'<input type="text" id="' + prefixo + '_usuario_gerente" name="' + prefixo + '_usuario_gerente" class="form-control input-sm" autocomplete="off" />' +

						'</div>' + 

						'<!-- Coluna -->' +
						'<div class="col-md-5 col-xs-12">' +

							'<label class="control-label"><small>Senha do Gerente</small></label>' +
	                    	'<input type="password" id="' + prefixo + '_senha_gerente" name="' + prefixo + '_senha_gerente" class="form-control input-sm" autocomplete="off" />' +

						'</div>' +

						'<!-- Coluna -->' +
						'<div class="col-md-2 col-xs-12">' +

							'<label class="control-label"></label>' +
							'<button type="button" class="btn btn-block btn-success btn_forcar_agendamento" style="margin-top: 3px;">Liberar</button>' +

						'</div>' +

					'</div>' +
					'<!-- Fim linha -->';

				}

                // Coloco HTML dentro da div
                $('.' + prefixo + '_msg_forcar_agendamento').append(html_caixa_login_gerente);

                // Exibo a div da mensagem de FORÇAR AGENDAMENTO
                $('.' + prefixo + '_msg_forcar_agendamento').show();

                // Exibo a div de erros
                $('.' + prefixo + '_msg_erro').show();

            } else if (response.status_requisicao == 'sucesso') {
				
				// Defino a mensagem de sucesso no agendamento
				var msg_sucesso_executar_agendamento = 'Agendado com sucesso.';

				// Checo se existe uma TRANSFERÊNCIA DE CONSULTA ativa no momento
				if (transferencia_de_consulta == 'ativa') {

					// Modifico a mensagem de sucesso para indicar que este novo agendamento partiu de uma transferência
					msg_sucesso_executar_agendamento = 'Transferido com sucesso.';

					// Sinalizo em variavel javascript que NÃO EXISTE uma transferência ativa
					transferencia_de_consulta = 'inativa';

					// Reseto valor de input hidden
					$('#cod_consulta_em_transferencia').val('');

					// Remove classe 'botao_desativado' do botão 'btn_modal_cliente_rapido' (botão que abre modal de cadastro rápido de cliente)
					$('#btn_modal_cliente_rapido').removeClass('botao_desativado');

					// Oculto DIV que informa que existe uma consulta em processo de TRANSFERÊNCIA
					$('.aviso_em_transferencia').hide();

					// Simulo o evento 'click' na aba #tab_buscar_agendamento, fazendo com que o conteúdo visto seja referente as consultas agendadas do paciente (ou seja, troco a aba)
					$('#tab_buscar_agendamento').trigger('click');

				}

            	/*
		         ###########################################
		         # INICIO ZERAR AGENDA E FILTROS
		         ###########################################
		        */
            	// Limpa valor da div .msg_erro_validacao_filtros
		        $('.msg_erro_validacao_filtros').html('');

		        // Oculta div .msg_erro_validacao_filtros
		        $('.msg_erro_validacao_filtros').hide();

		        // Oculto div .box_erro_carregamento_agenda
				$('.box_erro_carregamento_agenda').hide();

				// Oculto div .box_erro_agenda_vazia
				$('.box_erro_agenda_vazia').hide();

				// Desativa / reseta campos de busca de agenda
	        	desativar_campos_busca_agenda();

	        	// Ativa campos de busca de agenda
	        	ativar_campos_busca_agenda();
	        	/*
		         ###########################################
		         # FIM ZERAR AGENDA E FILTROS
		         ###########################################
		        */

		        // Verifica o prefixo definido anteriormente para ocultar o modal de agendamento adequado
		        if (prefixo == 'mav') {

	            	// Oculta modal de agendamento de vagas
					$('#modal-agendar-vagas').modal('hide');

				} else if (prefixo == 'mae') {

					// Oculta modal de agendamento de encaixes
					$('#modal-agendar-encaixes').modal('hide');

				} else if (prefixo == 'mal') {

					// Oculta modal de agendamento lotado
					$('#modal-agendar-lotado').modal('hide');

				}

            	// Preencho espaços / marcações com valores retornados da requisição. Esses valores são colocados dentro do modal do resumo da consulta
        		$('.pnmav_nome_paciente').html(response.nome_paciente);
        		$('.pnmav_tipo_consulta').html(response.tipo_consulta);
        		$('.pnmav_numero_contrato').html(response.numero_contrato);
                $('.pnmav_numero_carteirinha').html(response.numero_carteirinha);
        		$('.pnmav_nome_unidade').html(response.nome_unidade);
        		$('.pnmav_telefone_unidade').html(response.telefone_unidade);
        		$('.pnmav_email_unidade').html(response.email_unidade);
        		$('.pnmav_logradouro_unidade').html(response.logradouro_unidade);
        		$('.pnmav_numero_unidade').html(response.numero_unidade);
        		$('.pnmav_cep_unidade').html(response.cep_unidade);
        		$('.pnmav_bairro_unidade').html(response.bairro_unidade);
        		$('.pnmav_cidade_unidade').html(response.cidade_unidade);
        		$('.pnmav_estado_unidade').html(response.estado_unidade);
        		$('.pnmav_numero_protocolo').html(response.numero_protocolo);
        		$('.pnmav_nome_especialidade').html(response.nome_especialidade);
        		$('.pnmav_nome_profissional').html(response.nome_profissional);
        		$('.pnmav_nome_procedimento').html(response.nome_procedimento);
        		$('.pnmav_data_consulta').html(response.data_consulta);
        		$('.pnmav_periodo_consulta').html(response.periodo_consulta);
        		$('.pnmav_hora_distribuicao_senhas').html(response.hora_distribuicao_senhas);
        		$('.pnmav_taxa_consulta').html('R$ ' + response.taxa_consulta);

        		// Adiciono código da consulta criptografado dentro de input hidden
	        	$('#pnmav_hide_cod_consulta_crypt').val(response.cod_consulta_crypt);

        		// Oculta mensagem 'processando...
                $('#msg_processando').hide();

            	// Exibo modal com RESUMO DA CONSULTA
            	$('#modal-resumo-consulta-agendada').modal('show');

            	// Rola a página até a primeira caixa de unidade
			    $('html, body').animate({
			        scrollTop: $('.tab_content_customizado').offset().top
			    }, 50);

                // Alerta sucesso
                $.toast({
                    heading: 'Sucesso',
                    text: msg_sucesso_executar_agendamento,
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right',
                    hideAfter: 3500, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() { // Evento após o alert desaparecer
                        // Nothing here for now
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

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.' + prefixo + '_msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');
            $('.' + prefixo + '_msg_erro').show();

        }
    });

}