/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    // Ativação de máscaras de campos 
    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
    $('.celular').mask('(00) 00000-0000');
    $('.telefone').mask('(00) 0000-0000');

    // Ativação de plugin datepicker em campos
    $('#mncr_data_nascimento').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
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
     # Aplicando função no botão #BTN_MODAL_CLIENTE_RAPIDO
     # Impede ação padrão do botão, que deverá servir apenas para abrir janela modal
     # 
    *************************************/ 
    $(document).on('click', '#btn_modal_cliente_rapido', function(e) {
        
        // Previne ação default do elemento
        e.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

            // Exibo janela modal de cadastro rápido
            $('#modal-novo-cliente-rapido').modal();

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #filtro_paciente
     # Ao modificar valor selecionado, limpar o input #termo
     # 
    *************************************/ 
    $(document).on('change', '#filtro_paciente', function() { 

        // Limpa valor do input #termo
        $('#termo').val('');

        // Limpa informações da div #caixa_paciente
        limpar_caixa_paciente();

    });




    /************************************
     #
     # Bloqueando combobox após primeira seleção. Se quiser modificar o valor selecionado, deve resetar a busca
     # 
    *************************************/ 
    $(document).on('change', '.combos_de_uso_unico', function() {

        // Desabilita campo
        $(this).prop('disabled', true);

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_unidade
     # 
    *************************************/ 
    $(document).on('change', '#cod_unidade', function() { 

        // Checo se existe uma TRANSFERÊNCIA DE CONSULTA ativa no momento. Caso exista, o combobox #cod_especialidade não deverá ser modificado
        if (transferencia_de_consulta == 'ativa') {

            // Limpo opções atuais dos comboboxes dinâmicos e adiciono opções padrão
            $('#cod_medico').empty();
            $('#cod_medico').append("<option value=''>Selecione um médico</option>");

            // Carrega dados em combobox, filtrando por idade, especialidade e unidade
            carregar_combo_medicos( $('.cxp_idade').html(), $('#cod_especialidade').find(':selected').val(), $(this).find(':selected').val() ); // parametros: idade, especialidade, unidade

        } else { // NÃO existe transferência ativa, executo procedimento normal

            // Limpo opções atuais dos comboboxes dinâmicos e adiciono opções padrão
            $('#cod_especialidade').empty();
            $('#cod_especialidade').append("<option value=''>Selecione uma especialidade</option>");
            $('#cod_medico').empty();
            $('#cod_medico').append("<option value=''>Selecione um médico</option>");

            // Carrega dados em combobox, filtrando
            carregar_combo_especialidades( $('.cxp_sexo').data('codigosexo'), $(this).find(':selected').val(), '', $('.cxp_idade').html(), $('.cxp_data_nascimento').html() );
            // Carrega dados em combobox, filtrando
            carregar_combo_medicos( $('.cxp_idade').html(), $('#cod_especialidade').find(':selected').val(), $(this).find(':selected').val() ); // parametros: idade, especialidade, unidade

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_especialidade
     # 
    *************************************/ 
    $(document).on('change', '#cod_especialidade', function() { 

        // Caso o combobox de medico tenha sido selecionado
        if ($('#cod_medico option:selected').val() != '') {

            var ultimo_medico_marcado = $('#cod_medico option:selected').val();

            // Carrega dados em combobox, filtrando por idade, especialidade e unidade
            carregar_combo_medicos( $('.cxp_idade').html(), $(this).find(':selected').val(), $('#cod_unidade').find(':selected').val(), ultimo_medico_marcado ); // parametros: idade, especialidade, unidade, ultimo_medico_marcado

        } else {

            // Carrega dados em combobox, filtrando por idade, especialidade e unidade
            carregar_combo_medicos( $('.cxp_idade').html(), $(this).find(':selected').val(), $('#cod_unidade').find(':selected').val() ); // parametros: idade, especialidade, unidade

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_medico
     # 
    *************************************/ 
    $(document).on('change', '#cod_medico', function() {

        // Checo se a TRANSFERÊNCIA DE CONSULTA se encontra INATIVA no momento. Caso esteja, o combobox #cod_especialidade poderá ser modificado
        if (transferencia_de_consulta == 'inativa') {

            // Caso o combobox de especialidade não tenha nada selecionado
            if ($('#cod_especialidade option:selected').val() == '') {
            
                // Capto o médico selecionado
                var medico_selecionado = $(this).find(':selected').val();

                // Carrega dados em combobox, filtrando por sexo e médico. Parametros: sexo, unidade, medico
                carregar_combo_especialidades( $('.cxp_sexo').data('codigosexo'), $('#cod_unidade').find(':selected').val(), medico_selecionado ); // Recupera o código do sexo através de um data-attribute e coloca na função

            }

        }

    });




    /************************************
     #
     # Aplicando função AUTOCOMPLETE no input #termo
     # Buscará pessoas através de requisição ajax de acordo com o que for digitado
     # 
    *************************************/ 
    var autocomplete_paciente = $('#termo').devbridgeAutocomplete({
        autoSelectFirst: true,
        noCache: true,
        minChars: 3,
        deferRequestBy: 300,
        triggerSelectOnValidInput: false, // Impede que execute evento 'onselect' ao clicar no input, deixando apenas quando clicar em uma das opções
        showNoSuggestionNotice: true,
        noSuggestionNotice: 'Nenhum resultado encontrado',
        type: 'POST',
        serviceUrl: UrlBuscarPessoasBasicoJson,
        paramName: "termo_pesquisado", // Define o nome do parametro que vai guardar a informação digitada. Esse parametro será passado na requisição e poderá ser recuperado pelo controller php
        params: { // Passa parametros adicionais, que também estarão presentes na requisição
            filtro_paciente: function() {
                return $('#filtro_paciente option:selected').val();
            },
        },
        transformResult: function (response) {

            return {
                suggestions: $.map($.parseJSON(response), function(item) {
                    return {
                        value: item.nome,
                        data: { codigo: item.codigo, nascimento: item.data_nascimento }
                    };
                })
            };

        },
        formatResult: function (suggestion, currentValue) {
            // Usando $.Autocomplete.defaults.formatResult(suggestion, currentValue) você mantém a formatação de marcação com cores das letras pesquisadas, que é padrão do plugin
            return $.Autocomplete.defaults.formatResult(suggestion, currentValue) + ' <small><i>(' + suggestion.data.nascimento + ')</i></small>';
        },
        onSearchStart: function (params) {

            // Ativa função de ocultação de div
            ocultar_caixa_paciente();

        },
        onSearchComplete: function (query, suggestions) {
            // Nothing here for now
        },
        onSearchError: function (query, jqXHR, textStatus, errorThrown) {
            //console.log(textStatus);
        },   
        onSelect: function (suggestion) {

            // Passo codigo da pessoa selecionada para função
            carregar_caixa_paciente(suggestion.data.codigo);

        }
    });




    /************************************
     #
     # Aplicando função no botão #BTN_BUSCAR_AGENDA
     # Busca agenda através dos parametros informados e exibe resultado em um ou vários FullCalendar gerados dinamicamente
     # 
    *************************************/ 
    $(document).on('click', '#btn_buscar_agenda', function(event) {

        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

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
            var cod_pessoa_crypt = $('#cod_pessoa_crypt').val();
            var filtro_cod_unidade = $('#cod_unidade option:selected').val();
            var filtro_cod_especialidade = $('#cod_especialidade option:selected').val();
            var filtro_cod_medico = $('#cod_medico option:selected').val();

            /*
             ###########################################
             # [INICIO] Executa função de verificação de existência opções dentro dos combos de especialidades e médicos
             ###########################################
            */
            // Executo função, que irá retornar um objeto
            var checar_combos = checar_existencia_opcoes_combos_filtros();

            if ( checar_combos.liberado == false ) {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros').append(checar_combos.mensagem_erro);
                $('.msg_erro_validacao_filtros').show();

                // Não executa nenhuma ação
                return false;

            }
            /*
             ###########################################
             # [FIM] Executa função de verificação de existência opções dentro dos combos de especialidades e médicos
             ###########################################
            */ 

            /*
             ###########################################
             # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
             ###########################################
            */
            if (filtro_cod_especialidade == '' && filtro_cod_medico == '') {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros').append('Você deve selecionar uma opção ou no campo ESPECIALIDADE ou no campo MÉDICO.');
                $('.msg_erro_validacao_filtros').show();

                // Não executa nenhuma ação
                return false;

            }

            if (filtro_cod_especialidade == '' && filtro_cod_medico != '') {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros').append('O campo ESPECIALIDADE não foi preenchido corretamente.');
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
            // Todas as outras funções de carregamento de dados para agenda serão chamadas em cadeia pela função carregar_agenda()
            $.when( carregar_agenda(filtro_cod_especialidade, filtro_cod_unidade, filtro_cod_medico) ).done(function() {

                //console.log('unidades: ' + JSON.stringify(caixas_unidades_pai, null, 4) );
                //console.log('medicos: ' + JSON.stringify(caixas_medicos_pai, null, 4) );
                //console.log('eventos: ' + JSON.stringify(lista_eventos_pai, null, 4) );

                // Faço loop pela lista de eventos presentes na variavel global
                $.each(lista_eventos_pai, function(index, value) {

                    // Checo se a posição do vetor existe
                    if (value['vetor_eventos_manha']) {

                        // Carrego eventos (vagas, encaixes, bloqueios, feriados) do periodo da manhã dentro do FullCalendar de cada médico
                        $('.' + value['elemento_de_destino']).fullCalendar('addEventSource', value['vetor_eventos_manha']);

                    }

                    // Checo se a posição do vetor existe
                    if (value['vetor_eventos_tarde']) {

                        // Carrego eventos (vagas, encaixes, bloqueios, feriados) do periodo da tarde dentro do FullCalendar de cada médico
                        $('.' + value['elemento_de_destino']).fullCalendar('addEventSource', value['vetor_eventos_tarde']);

                    }

                });

                // Executa função que sinaliza sucesso no desenho da agenda
                sucesso_desenhar_agenda();

            }).fail(function(err) { // Caso algum erro tenha sido retornado

                // Imprimo mensagem de erro no console
                //console.log( err );

                mensagem_agenda_vazia();

                return false;

            }); // Fecha $.when()

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_RESETAR_BUSCA_AGENDA
     # Zera comboboxes de filtros de busca e as agendas exibidas, permitindo começar a busca do zero
     # 
    *************************************/ 
    $(document).on('click', '#btn_resetar_busca_agenda', function(event) {

        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

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

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_AGENDAR_PARA_VAGA
     # Capta dados necessários e efetua requisição ajax para tentar cadastrar um agendamento
     # 
    *************************************/ 
    $(document).on('click', '.btn_agendar_para_vaga', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Reúno dados necessários
        var form_ag_tipo_consulta = $(this).closest('.modal-content').find('.tipo-consulta option:selected').val(); // Retirado de campo dentro do modal

        // Executa função para registrar agendamento
        executar_agendamento(form_ag_tipo_consulta, 1); // Parametros: tipo de consulta (contrato [1] / particular [2]) e tipo de agendamento (vaga [1] / encaixe [2])

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_AGENDAR_PARA_ENCAIXE
     # Capta dados necessários e efetua requisição ajax para tentar cadastrar um agendamento
     # 
    *************************************/ 
    $(document).on('click', '.btn_agendar_para_encaixe', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Reúno dados necessários
        var form_ag_tipo_consulta = $(this).closest('.modal-content').find('.tipo-consulta option:selected').val(); // Retirado de campo dentro do modal

        // Executa função para registrar agendamento
        executar_agendamento(form_ag_tipo_consulta, 2); // Parametros: tipo de consulta (contrato [1] / particular [2]) e tipo de agendamento (vaga [1] / encaixe [2])

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_FORCAR_AGENDAMENTO
     # Capta dados necessários e efetua requisição ajax para tentar cadastrar um agendamento, IGNORANDO RESTRIÇÕES
     # 
    *************************************/ 
    $(document).on('click', '.btn_forcar_agendamento', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Reúno dados necessários
        var form_ag_tipo_consulta = $(this).closest('.modal-content').find('.tipo-consulta option:selected').val(); // Retirado de campo dentro do modal

        // Executa função para registrar agendamento
        executar_agendamento(form_ag_tipo_consulta, '', this, 1); // Parametros: TIPO DA CONSULTA (contrato [1] / particular [2]), TIPO DE AGENDAMENTO (vaga [1] / encaixe [2]), BOTÃO DE ORIGEM, FORÇAR AGENDAMENTO (sim [1] / não [0])

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });
    



    /************************************
     #
     # Aplicando função na aba #TAB_BUSCAR_AGENDAMENTO
     # Carrega uma Datatable com os agendamentos atuais do paciente / cliente
     # 
    *************************************/
    $(document).on('click', '#tab_buscar_agendamento', function(e) {
        
        // Previne ação default do elemento
        e.preventDefault();
        
        // Recupero o codigo da pessoa
        var cod_pessoa_crypt = $('#cod_pessoa_crypt').val();
        
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlBuscarAgendamentosPessoa,
            data: { 
                'cod_pessoa_crypt': cod_pessoa_crypt
            },
            beforeSend: function() { 

                // Apago HTML da tabela de agendamentos da pessoa de dentro da div, garantindo que tudo começará zerado
                $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').empty();

            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo se retorno veio SEM DADOS
                if (response.status == 'falha') {          

                    // Defino mensagem de aviso
                    var msg_sem_agendamentos = 'Não foram encontrados agendamentos para este paciente.';

                    // Coloco mensagem de aviso dentro da div
                    $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').html(msg_sem_agendamentos);

                } else if (response.status == 'sucesso') { // Caso retorno TENHA DADOS
                    
                    // Armazeno os dados retornados em variavel
                    var dados_retornados = response.dados;

                    // Colocando HTML dentro da variavel
                    var html_temp = '';
                    html_temp +=
                    '<table class="table table-striped table-hover table-bordered" id="tabela_buscar_agendamento">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>Especialidade</th>' +
                                '<th>Medico(a)</th>' +
                                '<th>Data</th>' +
                                '<th>Unidade</th>' +
                                '<th>Tipo Consulta</th>' +
                                '<th>Tipo Agendamento</th>' +
                                '<th class="text-center">&nbsp;</th>' +
                                '<th class="text-center">&nbsp;</th>' +
                                '<th class="text-center">&nbsp;</th>' +
                            '</tr>' +
                        '</thead>' +
                    '</table>';

                    // Adiciona html da tabela de agendamentos da pessoa dentro da div
                    $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').append(html_temp);

                    // Instancio DataTable
                    tabela_cancelar_agendamento = $('#tabela_buscar_agendamento').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: dados_retornados,                                        
                        stateSave: false,
                        deferRender: false,
                        info: true,
                        ordering: true,
                        paging: true,
                        searching: true,
                        autoWidth: false,
                        pageLength: 15,
                        lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
                        pagingType: "full_numbers",
                        language: {
                            "emptyTable": "Não foram encontrados registros",
                            "zeroRecords": "Não há registros para exibir",
                            "processing": "Reunindo dados",
                            "loadingRecords": "Carregando...",
                            "lengthMenu": "Mostrar _MENU_ itens por página",
                            "search": "Buscar:" ,
                            "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
                            "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
                            "infoFiltered": " (filtrado de _MAX_ registros)",
                            "paginate": {
                                "first": "<<",
                                "previous": "<",
                                "next": ">",
                                "last": ">>"
                            }
                        },
                        order: [[ 2, "asc" ]],
                        columns: [
                            { "data": "nome_especialidade", "name": "nome_especialidade", "width": "3%", "searchable": true, "sortable": true },
                            { "data": "nome_medico", "name": "nome_medico", "width": "29%", "searchable": true, "sortable": true },
                            { "data": "data_consulta", "name": "data_consulta", "width": "15%", "searchable": false, "sortable": false },
                            { "data": "nome_unidade", "name": "nome_unidade", "width": "40%", "searchable": true, "sortable": true },   
                            { "data": "tipo_consulta", "name": "tipo_consulta", "width": "19%", "searchable": true, "sortable": true },       
                            { "data": "tipo_agendamento", "name": "tipo_agendamento", "width": "19%", "searchable": true, "sortable": true },
                            { "data": "btn_resumo", "name": "btn_resumo", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_transferir", "name": "btn_transferir", "width": "3%", "searchable": false, "sortable": false },
                            { "data": "btn_cancelar", "name": "btn_cancelar", "width": "3%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip();

                        }
                    });
    
                }

            },
            complete: function(response) {

                // Executa ao completar envio

            },
            error: function(response, thrownError) {

                // Faz algo se der erro

            }
        }); // FIM DA REQUISIÇÃO AJAX

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_MODAL_CANCELAR_CONSULTA
     # Abre JANELA MODAL para confirmar cancelamento de consulta
     # 
    *************************************/ 
    $(document).on('click', '.btn_modal_cancelar_consulta', function(e) {
        
        // Previne ação default do elemento
        e.preventDefault();

        // Oculto e limpo mensagem de erro
        $('.mcc_msg_erro').hide();
        $('.mcc_msg_erro').html('');

        // Recupero CODIGO DA CONSULTA através de data-attribute no botão
        var codigo_da_consulta = $(this).data('cod-consulta-crypt');

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlBuscarDadosConsultaAgendada,
            data: { 
                "cod_consulta_crypt": codigo_da_consulta
            },
            beforeSend: function() { 
                // Nothing here
            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Não foi possivel abrir a janela de cancelamento.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true
                    }); 

                    return false;               

                } else if (response.status == 'sucesso') {

                    // Preencho espaços / marcações com valores retornados da requisição. Esses valores são colocados dentro do modal de cancelamento da consulta     
                    $('#mcc_cod_consulta').val(response.dados.cod_consulta); // guardo valor em input hidden
                    $('.pnmcc_nome_cliente').html(response.dados.nome_cliente);
                    $('.pnmcc_nome_unidade').html(response.dados.nome_unidade);
                    $('.pnmcc_nome_medico').html(response.dados.nome_medico);
                    $('.pnmcc_nome_especialidade').html(response.dados.nome_especialidade);
                    $('.pnmcc_data_consulta').html(response.dados.data_consulta);
                    $('.pnmcc_tipo_agendamento').html(response.dados.tipo_agendamento);         
                    
                    // Limpa campo
                    $('#motivo_cancelamento_consulta').val('');

                    // Exibe modal de CANCELAMENTO DE CONSULTA
                    $('#modal-cancelar-consulta').modal('show');

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel abrir a janela de cancelamento.',
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
     # Aplicando função no botão .BTN_CANCELAR_AGENDAMENTO
     # Capta dados necessários e efetua requisição ajax para tentar cancelar um agendamento
     # 
    *************************************/ 
    $(document).on('click', '.btn_cancelar_agendamento', function(e) {
        
        // Previne ação default do elemento
        e.preventDefault();

        // Oculto e limpo mensagem de erro
        $('.mcc_msg_erro').hide();
        $('.mcc_msg_erro').html('');

        // Armazeno valores em variaveis
        var cod_consulta_crypt = $('#mcc_cod_consulta').val();
        var motivo_cancelamento_consulta = $('#motivo_cancelamento_consulta').val();
      
        /*
        ###########################################
        # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
        ###########################################
        */
        if (cod_consulta_crypt == '') { 

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.mcc_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mcc_msg_erro').append('Ocorreu um erro ao localizar a consulta. Atualize a página e tente novamente.');
            $('.mcc_msg_erro').show();    

            // Finaliza função
            return false;

        }
       
        if (motivo_cancelamento_consulta.length < 10) {
        
            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.mcc_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mcc_msg_erro').append('O preenchimento do campo MOTIVO é obrigatório e o mesmo deve possuir no mínimo 10 caracteres.');
            $('.mcc_msg_erro').show();    

            // Finaliza função
            return false;

        }
        /*
        ###########################################
        # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
        ###########################################
        */
      
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlCancelarAgendamento,
            data: { 
                'cod_consulta_crypt': cod_consulta_crypt,
                'motivo_cancelamento_consulta': motivo_cancelamento_consulta
            },
            beforeSend: function() { 

                // Revela div #msg_processando
                $('#msg_processando').show();

            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'validacao') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Coloco mensagem dentro da div de erros e exibo a div de erros
                    $('.mcc_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                    $('.mcc_msg_erro').append(response.erro);
                    $('.mcc_msg_erro').show();

                    return false; 
        
                } else if (response.status == 'erro') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Falha ao tentar cancelar a consulta.',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: 1700, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            // Nothing here
                        }   
                    });

                    return false; 
                         
                } else if (response.status == 'sucesso') {
                    
                    // Recupero o codigo da pessoa
                    var cod_pessoa_crypt = $('#cod_pessoa_crypt').val();

                    // Requisição ajax para refazer tabela de agendamentos da pessoa
                    $.ajax({
                        cache: false,
                        type: "POST",
                        url: UrlBuscarAgendamentosPessoa,
                        data: { 
                            'cod_pessoa_crypt': cod_pessoa_crypt
                        },
                        beforeSend: function() { 

                            // Apago HTML da tabela de agendamentos da pessoa de dentro da div, garantindo que tudo começará zerado
                            $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').empty();

                        },
                        success: function(response) {

                            // Convertendo resposta para objeto javascript
                            var response = JSON.parse(response);

                            // Checo se retorno veio SEM DADOS
                            if (response.status == 'falha') {          

                                // Defino mensagem de aviso
                                var msg_sem_agendamentos = 'Não foram encontrados agendamentos para este paciente.';

                                // Coloco mensagem de aviso dentro da div
                                $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').html(msg_sem_agendamentos);

                                // Simulo o evento 'click' no botão 'resetar busca' para que a agenda desenhada e os filtros marcados sejam zerados
                                $('#btn_resetar_busca_agenda').trigger('click');

                                // Oculta mensagem 'processando...
                                $('#msg_processando').hide();

                                // Mostra mensagem de sucesso
                                $.toast({
                                    heading: 'Consulta cancelada com sucesso!',
                                    text: response.sucesso,
                                    showHideTransition: 'fade',
                                    icon: 'success',
                                    position: 'top-right',
                                    hideAfter: 2700, // em milisegundos
                                    allowToastClose: true,
                                    afterHidden: function() {
                                        // Nothing here
                                    }   
                                });

                                // Oculto modal
                                $('#modal-cancelar-consulta').modal('hide');

                            } else if (response.status == 'sucesso') { // Caso retorno TENHA DADOS
                                
                                // Armazeno os dados retornados em variavel
                                var dados_retornados = response.dados;

                                // Colocando HTML dentro da variavel
                                var html_temp = '';
                                html_temp +=
                                '<table class="table table-striped table-hover table-bordered" id="tabela_buscar_agendamento">' +
                                    '<thead>' +
                                        '<tr>' +
                                            '<th>Especialidade</th>' +
                                            '<th>Medico(a)</th>' +
                                            '<th>Data</th>' +
                                            '<th>Unidade</th>' +
                                            '<th>Tipo Consulta</th>' +
                                            '<th>Tipo Agendamento</th>' +
                                            '<th class="text-center">&nbsp;</th>' +
                                            '<th class="text-center">&nbsp;</th>' +
                                            '<th class="text-center">&nbsp;</th>' +
                                        '</tr>' +
                                    '</thead>' +
                                '</table>';

                                // Adiciona html da tabela de agendamentos da pessoa dentro da div
                                $('#aba_buscar_agendamento .panel-resultado-busca-agendamentos .panel-body .table-responsive').append(html_temp);

                                // Instancio DataTable
                                tabela_cancelar_agendamento = $('#tabela_buscar_agendamento').DataTable({
                                    destroy: true, // Apaga datatable atual, se existir
                                    data: dados_retornados,                                        
                                    stateSave: false,
                                    deferRender: false,
                                    info: true,
                                    ordering: true,
                                    paging: true,
                                    searching: true,
                                    autoWidth: false,
                                    pageLength: 15,
                                    lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
                                    pagingType: "full_numbers",
                                    language: {
                                        "emptyTable": "Não foram encontrados registros",
                                        "zeroRecords": "Não há registros para exibir",
                                        "processing": "Reunindo dados",
                                        "loadingRecords": "Carregando...",
                                        "lengthMenu": "Mostrar _MENU_ itens por página",
                                        "search": "Buscar:" ,
                                        "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
                                        "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
                                        "infoFiltered": " (filtrado de _MAX_ registros)",
                                        "paginate": {
                                            "first": "<<",
                                            "previous": "<",
                                            "next": ">",
                                            "last": ">>"
                                        }
                                    },
                                    order: [[ 1, "asc" ]],
                                    columns: [
                                        { "data": "nome_especialidade", "name": "nome_especialidade", "width": "3%", "searchable": true, "sortable": true },
                                        { "data": "nome_medico", "name": "nome_medico", "width": "29%", "searchable": true, "sortable": true },
                                        { "data": "data_consulta", "name": "data_consulta", "width": "15%", "searchable": false, "sortable": false },
                                        { "data": "nome_unidade", "name": "nome_unidade", "width": "40%", "searchable": true, "sortable": true },
                                        { "data": "tipo_consulta", "name": "tipo_consulta", "width": "19%", "searchable": true, "sortable": true },         
                                        { "data": "tipo_agendamento", "name": "tipo_agendamento", "width": "19%", "searchable": true, "sortable": true },
                                        { "data": "btn_resumo", "name": "btn_resumo", "width": "3%", "searchable": false, "sortable": false },         
                                        { "data": "btn_transferir", "name": "btn_transferir", "width": "3%", "searchable": false, "sortable": false },
                                        { "data": "btn_cancelar", "name": "btn_cancelar", "width": "3%", "searchable": false, "sortable": false }
                                    ],
                                    "fnDrawCallback": function(oSettings) { 

                                        // Ativação de TOOLTIPS, se existirem
                                        $('[data-toggle="tooltip"]').tooltip();

                                    }
                                });

                                // Simulo o evento 'click' no botão 'resetar busca' para que a agenda desenhada e os filtros marcados sejam zerados
                                $('#btn_resetar_busca_agenda').trigger('click');

                                // Oculta mensagem 'processando...
                                $('#msg_processando').hide();

                                // Mostra mensagem de sucesso
                                $.toast({
                                    heading: 'Consulta cancelada com sucesso!',
                                    text: response.sucesso,
                                    showHideTransition: 'fade',
                                    icon: 'success',
                                    position: 'top-right',
                                    hideAfter: 2700, // em milisegundos
                                    allowToastClose: true,
                                    afterHidden: function() {
                                        // Nothing here
                                    }   
                                });

                                // Oculto modal
                                $('#modal-cancelar-consulta').modal('hide');
                
                            }

                        },
                        complete: function(response) {

                            // Executa ao completar envio

                        },
                        error: function(response, thrownError) {

                            // Faz algo se der erro

                        }
                    }); // FIM DA REQUISIÇÃO AJAX
         
                }

            },
            complete: function(response) {
                // Nothing here for now
            },
            error: function(response, thrownError) {
                
                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Falha ao tentar cancelar a consulta.',
                    text: response.erro,
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 1700, // em milisegundos
                    allowToastClose: true,
                    afterHidden: function() {
                        // Nothing here
                    }   
                });

                return false; 

            }        
        }); // FIM DA REQUISIÇÃO AJAX  
 
    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_TRANSFERIR_CONSULTA
     # Marca consulta como 'em processo de agendamento' e direciona para aba de filtros de agenda
     # 
    *************************************/ 
    $(document).on('click', '.btn_transferir_consulta', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Caso já exista uma transferência em andamento, impeço que outra transferência seja feita ao mesmo tempo
        if (transferencia_de_consulta == 'ativa') {

            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Não foi possivel prosseguir. Já existe uma TRANSFERÊNCIA em andamento.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: 3600, // em milisegundos
                allowToastClose: true
            }); 

            return false;

        }

        // Garanto que input hidden está vazio
        $('#cod_consulta_em_transferencia').val('');

        // Recupero CODIGO DA CONSULTA através de data-attribute no botão
        var codigo_da_consulta = $(this).data('cod-consulta-crypt');

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlBuscarDadosConsultaAgendada,
            data: { 
                "cod_consulta_crypt": codigo_da_consulta
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

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Não foi possivel abrir a janela de transferência.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true
                    }); 

                    return false;               

                } else if (response.status == 'sucesso') {

                    // Preencho espaços / marcações com valores retornados da requisição. Esses valores são colocados dentro da div de aviso de transferência em andamento   
                    $('#cod_consulta_em_transferencia').val(response.dados.cod_consulta); // guardo valor em input hidden
                    $('.aet_nome_cliente').html(response.dados.nome_cliente);
                    $('.aet_nome_unidade').html(response.dados.nome_unidade);
                    $('.aet_nome_medico').html(response.dados.nome_medico);
                    $('.aet_nome_especialidade').html(response.dados.nome_especialidade);
                    $('.aet_data_consulta').html(response.dados.data_consulta);

                    // Sinalizo em variavel javascript que existe uma transferência ATIVA
                    transferencia_de_consulta = 'ativa';

                    // Adiciona classe 'botao_desativado' do botão 'btn_modal_cliente_rapido' (botão que abre modal de cadastro rápido de cliente)
                    $('#btn_modal_cliente_rapido').addClass('botao_desativado');

                    // Marco no combobox a ESPECIALIDADE referente a consulta em transferência e logo depois DESABILITO este combobox
                    $('#cod_especialidade option[value=' + response.dados.cod_especialidade + ']').prop('selected', true);
                    $('#cod_especialidade').prop('disabled', true);

                    // Recarrega dados no combobox #cod_medico
                    carregar_combo_medicos( $('.cxp_idade').html(), $('#cod_especialidade').find(':selected').val(), $('#cod_unidade').find(':selected').val() ); // parametros: idade, especialidade, unidade

                    // Simulo evento 'click' no botão 'buscar agenda', fazendo com o que o javascript comece a desenhar a agenda baseado nos filtros
                    $('#btn_buscar_agenda').trigger('click');

                    // Exibo DIV informando que existe uma consulta em processo de TRANSFERÊNCIA
                    $('.aviso_em_transferencia').show();

                    // Simulo o evento 'click' na aba #tab_novo_agendamento, fazendo com que o conteúdo visto seja referente aos filtros da agenda (ou seja, troco a aba)
                    $('#tab_novo_agendamento').trigger('click');

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel abrir a janela de transferência.',
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
     # Aplicando função no botão #BTN_CANCELAR_TRANSFERENCIA_CONSULTA
     # Cancela processo de transferência e reseta filtro de agenda
     # 
    *************************************/ 
    $(document).on('click', '#btn_cancelar_transferencia_consulta', function(e) {

        // Sinalizo em variavel javascript que NÃO EXISTE uma transferência ativa
        transferencia_de_consulta = 'inativa';

        // Reseto valor de input hidden
        $('#cod_consulta_em_transferencia').val('');

        // Remove classe 'botao_desativado' do botão 'btn_modal_cliente_rapido' (botão que abre modal de cadastro rápido de cliente)
        $('#btn_modal_cliente_rapido').removeClass('botao_desativado');

        // Simulo o evento 'click' no botão 'resetar busca' para que a agenda desenhada e os filtros marcados sejam zerados
        $('#btn_resetar_busca_agenda').trigger('click');

        // Oculto DIV que informa que existe uma consulta em processo de TRANSFERÊNCIA
        $('.aviso_em_transferencia').hide();

        // Simulo o evento 'click' na aba #tab_buscar_agendamento, fazendo com que o conteúdo visto seja referente as consultas agendadas do paciente (ou seja, troco a aba)
        $('#tab_buscar_agendamento').trigger('click');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_VER_RESUMO_CONSULTA_RAPIDO
     # Exibe modal com o resumo da consulta
     # 
    *************************************/ 
    $(document).on('click', '.btn_ver_resumo_consulta_rapido', function(e) {

        // Recupero CODIGO DA CONSULTA através de data-attribute no botão
        var codigo_da_consulta = $(this).data('cod-consulta-crypt');

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlBuscarDadosResumoConsulta,
            data: { 
                "cod_consulta_crypt": codigo_da_consulta
            },
            beforeSend: function() { 
                // Nothing here
            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status_requisicao == 'erro') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Não foi possivel abrir a janela de resumo da consulta.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: 2000, // em milisegundos
                        allowToastClose: true
                    }); 

                    return false;              

                } else if (response.status_requisicao == 'sucesso') {

                    // Preencho espaços / marcações com valores retornados da requisição. Esses valores são colocados dentro do modal do resumo da consulta
                    $('.pnmav_nome_paciente').html(response.dados.nome_paciente);
                    $('.pnmav_tipo_consulta').html(response.dados.tipo_consulta);
                    $('.pnmav_numero_contrato').html(response.dados.numero_contrato);
                    $('.pnmav_numero_carteirinha').html(response.dados.numero_carteirinha);
                    $('.pnmav_nome_unidade').html(response.dados.nome_unidade);
                    $('.pnmav_telefone_unidade').html(response.dados.telefone_unidade);
                    $('.pnmav_email_unidade').html(response.dados.email_unidade);
                    $('.pnmav_logradouro_unidade').html(response.dados.logradouro_unidade);
                    $('.pnmav_numero_unidade').html(response.dados.numero_unidade);
                    $('.pnmav_cep_unidade').html(response.dados.cep_unidade);
                    $('.pnmav_bairro_unidade').html(response.dados.bairro_unidade);
                    $('.pnmav_cidade_unidade').html(response.dados.cidade_unidade);
                    $('.pnmav_estado_unidade').html(response.dados.estado_unidade);
                    $('.pnmav_numero_protocolo').html(response.dados.numero_protocolo);
                    $('.pnmav_nome_especialidade').html(response.dados.nome_especialidade);
                    $('.pnmav_nome_profissional').html(response.dados.nome_profissional);
                    $('.pnmav_nome_procedimento').html(response.dados.nome_procedimento);
                    $('.pnmav_data_consulta').html(response.dados.data_consulta);
                    $('.pnmav_periodo_consulta').html(response.dados.periodo_consulta);
                    $('.pnmav_hora_distribuicao_senhas').html(response.dados.hora_distribuicao_senhas);
                    $('.pnmav_taxa_consulta').html('R$ ' + response.dados.taxa_consulta);

                    // Adiciono código da consulta criptografado dentro de input hidden
                    $('#pnmav_hide_cod_consulta_crypt').val(codigo_da_consulta);

                    // Exibo modal com RESUMO DA CONSULTA
                    $('#modal-resumo-consulta-agendada').modal('show');

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {
                
                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel abrir a janela de resumo da consulta.',
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
     # Aplicando função no botão .BTN_IMPRIMIR_RESUMO_CONSULTA_AGENDADA
     # Abre janela com versão para impressão do resumo da consulta
     # 
    *************************************/ 
    $(document).on('click', '.btn_imprimir_resumo_consulta_agendada', function(e) {

        // Recupero CODIGO DA CONSULTA através de input hidden dentro do modal
        var codigo_da_consulta = $('#pnmav_hide_cod_consulta_crypt').val();

        // Abre versão para impressão em nova janela
        window.open(UrlImpressaoResumoConsulta + "/" + codigo_da_consulta);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_EMAIL_RESUMO_CONSULTA_AGENDADA
     # Envia cópia do resumo da consulta por e-mail
     # 
    *************************************/ 
    $(document).on('click', '.btn_email_resumo_consulta_agendada', function(e) {

        // Recupero CODIGO DA CONSULTA através de input hidden dentro do modal
        var codigo_da_consulta = $('#pnmav_hide_cod_consulta_crypt').val();

        alert('EM BREVE!');

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_CADASTRAR_CLIENTE_RAPIDO
     # Efetua um cadastro rápido do novo cliente / paciente e o deixa 'selecionado' na #caixa_paciente
     # 
    *************************************/ 
    $(document).on('click', '.btn_cadastrar_cliente_rapido', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Limpo e oculto div de erros
        $('.mncr_msg_erro').html('');
        $('.mncr_msg_erro').hide();

        // Declaração de variaveis
        var form_valido = true;
        var msg_erro_validacao;

        // Armazeno valores do form em variaveis
        var mncr_nome = $('#mncr_nome').val();
        var mncr_data_nascimento = $('#mncr_data_nascimento').val();
        var mncr_sexo = $('#mncr_sexo option:selected').val();
        var mncr_telefone = $('#mncr_telefone').val();
        var mncr_celular = $('#mncr_celular').val();
        var mncr_celular_2 = $('#mncr_celular_2').val();
        var mncr_cpf = $('#mncr_cpf').val();
        var mncr_rg = $('#mncr_rg').val();
        var mncr_certidao_nascimento = $('#mncr_certidao_nascimento').val();
        var mncr_filiacao_mae = $('#mncr_filiacao_mae').val();
        var mncr_filiacao_pai = $('#mncr_filiacao_pai').val();

        /*
         ###########################################
         # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */
        if (mncr_nome == '') {

            // Coloco mensagem dentro da div de erros e a exibo
            $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mncr_msg_erro').append('- O preenchimento do campo NOME é obrigatório.');
            $('.mncr_msg_erro').show();

            // Travo execução do resto da função
            return false;

        }

        if (mncr_data_nascimento == '') {
            
            // Coloco mensagem dentro da div de erros e a exibo
            $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mncr_msg_erro').append('- O preenchimento do campo DATA DE NASCIMENTO é obrigatório.');
            $('.mncr_msg_erro').show();

            // Travo execução do resto da função
            return false;

        }

        if (mncr_sexo == '') {
            
            // Coloco mensagem dentro da div de erros e a exibo
            $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mncr_msg_erro').append('- O preenchimento do campo SEXO é obrigatório.');
            $('.mncr_msg_erro').show();

            // Travo execução do resto da função
            return false;

        }

        // Calcula idade da pessoa através da data de nascimento
        var a = mncr_data_nascimento.split('/');
        var idade = checa_idade(a[2], a[1], a[0]);

        // Checa se é MENOR de idade
        if (idade < 18) {

            // Campos obrigatórios apenas para menores de idade
            if (mncr_certidao_nascimento == '' && mncr_filiacao_mae == '') {
                
                // Coloco mensagem dentro da div de erros e a exibo
                $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.mncr_msg_erro').append('- A pessoa cujo dados foram digitados é menor de idade, logo deverá ser informado obrigatoriamente a MATRICULA DA CERTIDÃO DO NASCIMENTO ou o NOME DA MÃE.');
                $('.mncr_msg_erro').show();

                // Travo execução do resto da função
                return false;

            }

        }

        // Checa se é MAIOR de idade
        if (idade >= 18) {

            // Checo se o CPF foi preenchido
            if (mncr_cpf == '') {
                
                // Coloco mensagem dentro da div de erros e a exibo
                $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.mncr_msg_erro').append('- O preenchimento do campo CPF é obrigatório.');
                $('.mncr_msg_erro').show();

                // Travo execução do resto da função
                return false;

            }

            // Checo se o CPF é válido
            if (!valida_cpf_cnpj(mncr_cpf)) {
                
                // Coloco mensagem dentro da div de erros e a exibo
                $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                $('.mncr_msg_erro').append('- O campo CPF foi preenchido com uma informação inválida.');
                $('.mncr_msg_erro').show();

                // Travo execução do resto da função
                return false;

            }

        }

        if (mncr_sexo == '') {

            // Coloco mensagem dentro da div de erros e a exibo
            $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
            $('.mncr_msg_erro').append('- O preenchimento do campo SEXO é obrigatório.');
            $('.mncr_msg_erro').show();

            // Travo execução do resto da função
            return false;

        }
        /*
         ###########################################
         # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
         ###########################################
        */

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlCadastrarPessoaFisicaRapido,
            data: { 
                "nome": mncr_nome,
                "data_nascimento": mncr_data_nascimento,
                "sexo": mncr_sexo,
                "telefone": mncr_telefone,
                "celular": mncr_celular,
                "celular_2": mncr_celular_2,
                "cpf": mncr_cpf,
                "rg": mncr_rg,
                "certidao_nascimento": mncr_certidao_nascimento,
                "filiacao_mae": mncr_filiacao_mae,
                "filiacao_pai": mncr_filiacao_pai
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.mncr_msg_erro').html('');

                // Oculta DIV
                $('.mncr_msg_erro').hide();

                // Mostra mensagem 'processando...'
                $('#msg_processando').show();

            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status_requisicao == 'erro') {

                    // Oculta mensagem 'processando...'
                    $('#msg_processando').hide();

                    // Coloco mensagem dentro da div de erros
                    $('.mncr_msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                    $('.mncr_msg_erro').append(response.erro);  

                    // Exibo div de erros
                    $('.mncr_msg_erro').show();

                } else if (response.status_requisicao == 'sucesso') {

                    // Oculto modal com CADASTRO RÁPIDO DE CLIENTE/PACIENTE
                    $('#modal-novo-cliente-rapido').modal('hide');

                    // Oculta mensagem 'processando...'
                    $('#msg_processando').hide();

                    // Ativa função de ocultação de div #caixa_paciente
                    ocultar_caixa_paciente();

                    // Passo codigo da pessoa para função que preencherá e exibirá a div #caixa_paciente
                    carregar_caixa_paciente(response.codigo_pessoa);

                    // Alerta sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Paciente cadastrado(a) com sucesso.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() { // Evento após o alert desaparecer
                            // Nothing here                 
                        }
                    });

                }

            },
            complete: function(response) {
                // Soon
            },
            error: function(response, thrownError) {

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros
                $('.mncr_msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');

                // Exibo div de erros
                $('.mncr_msg_erro').show();

            }
        });     

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });

}); // Fecha $(document).ready