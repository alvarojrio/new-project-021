/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_especialidade_atend
     # 
    *************************************/ 
    $(document).on('change', '#cod_especialidade_atend', function() { 

        // Caso o combobox de medico tenha sido selecionado
        if ($('#cod_medico_atend option:selected').val() != '') {

            var ultimo_medico_marcado = $('#cod_medico_atend option:selected').val();

            // Carrega dados em combobox, filtrando por idade, especialidade e unidade
            carregar_combo_medicos_atend( $('.cxp_idade').html(), $(this).find(':selected').val(), $('#cod_unidade').find(':selected').val(), 'ativo', ultimo_medico_marcado ); // parametros: idade, especialidade, unidade, filtrar_por_dia, ultimo_medico_marcado

        } else {

            // Carrega dados em combobox, filtrando por idade, especialidade e unidade
            carregar_combo_medicos_atend( $('.cxp_idade').html(), $(this).find(':selected').val(), $('#cod_unidade').find(':selected').val(), 'ativo' ); // parametros: idade, especialidade, unidade, filtrar_por_dia

        }

    });




    /************************************
     #
     # Aplicando função ao evento change do combobox #cod_medico_atend
     # 
    *************************************/ 
    $(document).on('change', '#cod_medico_atend', function() {

        // Caso o combobox de especialidade não tenha nada selecionado
        if ($('#cod_especialidade_atend option:selected').val() == '') {
        
            // Capto o médico selecionado
            var medico_selecionado = $(this).find(':selected').val();

            // Carrega dados em combobox, filtrando por sexo e médico. Parametros: sexo, unidade, medico, idade, data de nascimento
            carregar_combo_especialidades_atend( $('.cxp_sexo').data('codigosexo'), $('#cod_unidade').find(':selected').val(), medico_selecionado, $('.cxp_idade').html(), $('.cxp_data_nascimento').html() ); // Recupera o código do sexo através de um data-attribute e coloca na função

        }

    });




    /************************************
     #
     # Aplicando função no botão #BTN_BUSCAR_PARA_ATENDIMENTO
     # Busca agenda através dos parametros informados e exibe resultado em uma datatable gerada dinamicamente
     # 
    *************************************/ 
    $(document).on('click', '#btn_buscar_para_atendimento', function(event) {

        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

            // Limpa valor da div .msg_erro_validacao_filtros_atend
            $('.msg_erro_validacao_filtros_atend').html('');

            // Oculta div .msg_erro_validacao_filtros_atend
            $('.msg_erro_validacao_filtros_atend').hide();

            // Oculto div .box_erro_carregamento_agenda_atendimento
            $('.box_erro_carregamento_agenda_atendimento').hide();

            // Oculto div .box_erro_agenda_atendimento_vazia
            $('.box_erro_agenda_atendimento_vazia').hide();

            // Oculto div .panel_agendas
            $('.panel_agendas_atendimento').hide();

            // Limpo a div .panel_agendas para receber novos dados (elemento .panel-body é onde fica o conteúdo)
            $('.panel_agendas_atendimento .panel-body .table-responsive').empty();

            // Reuno dados do formulário de busca
            var filtro_cod_unidade_atend = $('#cod_unidade option:selected').val();
            var filtro_cod_especialidade_atend = $('#cod_especialidade_atend option:selected').val();
            var filtro_cod_medico_atend = $('#cod_medico_atend option:selected').val();

            /*
             ###########################################
             # [INICIO] Executa função de verificação de existência opções dentro dos combos de especialidades e médicos
             ###########################################
            */
            // Executo função, que irá retornar um objeto
            var checar_combos = checar_existencia_opcoes_combos_filtros_atend();

            if ( checar_combos.liberado == false ) {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros_atend').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros_atend').append(checar_combos.mensagem_erro);
                $('.msg_erro_validacao_filtros_atend').show();

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
            if (filtro_cod_especialidade_atend == '' && filtro_cod_medico_atend == '') {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros_atend').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros_atend').append('Você deve selecionar uma opção ou no campo ESPECIALIDADE ou no campo MÉDICO.');
                $('.msg_erro_validacao_filtros_atend').show();

                // Não executa nenhuma ação
                return false;

            }

            if (filtro_cod_especialidade_atend == '' && filtro_cod_medico_atend != '') {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_validacao_filtros_atend').append('<h4 class="pt-0">Alerta</h4>');
                $('.msg_erro_validacao_filtros_atend').append('O campo ESPECIALIDADE não foi preenchido corretamente.');
                $('.msg_erro_validacao_filtros_atend').show();

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

            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: UrlBuscarVagasParaAtendimento,
                data: { 
                    'cod_unidade': filtro_cod_unidade_atend,
                    'cod_especialidade': filtro_cod_especialidade_atend,
                    'cod_medico': filtro_cod_medico_atend,
                    'data_nascimento_pesquisada': $('.cxp_data_nascimento').html()
                },
                beforeSend: function() { 

                    // Apago HTML da tabela de vagas para atendimento de dentro da div, garantindo que tudo começará zerado
                    $('.panel_agendas_atendimento .panel-body .table-responsive').empty();

                },
                success: function(response) {

                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo se retorno veio SEM DADOS
                    if (response.status == 'falha') {          

                        // Defino mensagem de aviso
                        var msg_sem_vagas_atendimento = 'Não foram encontrados vagas com os parametros informados.';

                        // Coloco mensagem de aviso dentro da div
                        $('.panel_agendas_atendimento .panel-body .table-responsive').html(msg_sem_vagas_atendimento);

                    } else if (response.status == 'sucesso') { // Caso retorno TENHA DADOS
                        
                        // Armazeno os dados retornados em variavel
                        var dados_retornados = response.dados;

                        // Colocando HTML dentro da variavel
                        var html_temp = '';
                        html_temp +=
                        '<table class="table table-striped table-hover table-bordered" id="tabela_agendas_atendimento">' +
                            '<thead>' +
                                '<tr>' +
                                    '<th>Especialidade</th>' +
                                    '<th>Médico(a)</th>' +
                                    '<th>Período</th>' +
                                    '<th>Vagas</th>' +
                                    '<th class="text-center">&nbsp;</th>' +
                                '</tr>' +
                            '</thead>' +
                        '</table>';

                        // Adiciona html da tabela de agendamentos da pessoa dentro da div
                        $('.panel_agendas_atendimento .panel-body .table-responsive').append(html_temp);

                        // Instancio DataTable
                        tabela_agendas_atendimento = $('#tabela_agendas_atendimento').DataTable({
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
                                { "data": "especialidade", "name": "especialidade", "width": "19%", "searchable": true, "sortable": true },
                                { "data": "medico", "name": "medico", "width": "29%", "searchable": true, "sortable": true },
                                { "data": "periodo", "name": "periodo", "width": "10%", "searchable": true, "sortable": true },
                                { "data": "vagas", "name": "vagas", "width": "12%", "searchable": false, "sortable": false },
                                { "data": "btn_atender", "name": "btn_atender", "width": "3%", "searchable": false, "sortable": false }
                            ],
                            "fnDrawCallback": function(oSettings) { 

                                // Ativação de TOOLTIPS, se existirem
                                $('[data-toggle="tooltip"]').tooltip();

                            }
                        });

                        // Revela div #msg_processando
                        $('#msg_processando').hide();

                        // Revela div #msg_processando
                        $('.panel_agendas_atendimento').show();
        
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

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_RESETAR_BUSCA_PARA_ATENDIMENTO
     # Zera comboboxes de filtros de busca e as agendas exibidas, permitindo começar a busca do zero
     # 
    *************************************/ 
    $(document).on('click', '#btn_resetar_busca_para_atendimento', function(event) {

        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

            // Limpa valor da div .msg_erro_validacao_filtros_atend
            $('.msg_erro_validacao_filtros_atend').html('');

            // Oculta div .msg_erro_validacao_filtros_atend
            $('.msg_erro_validacao_filtros_atend').hide();

            // Oculto div .box_erro_carregamento_agenda
            $('.box_erro_carregamento_agenda_atendimento').hide();

            // Oculto div .box_erro_agenda_vazia
            $('.box_erro_agenda_atendimento_vazia').hide();

            // Desativa / reseta campos de busca de agenda
            desativar_campos_pronto_atendimento();

            // Ativa campos de busca de agenda
            ativar_campos_pronto_atendimento();

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_ATENDER_CONSULTA
     # Abre modal de confirmação de atendimento
     # 
    *************************************/ 
    $(document).on('click', '.btn_atender_consulta', function(event) {

        // Previne ação default do elemento
        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

            // Limpo div e a oculto
            $('.mac_msg_erro').html('');
            $('.mac_msg_erro').hide();
            $('.mac_msg_forcar_atendimento').html('');
            $('.mac_msg_forcar_atendimento').hide();

            // Garanto que inputs hidden estão zerados
            $('#mac_hide_btn_de_origem').val('');
            $('#mac_hide_cod_consulta').val('');
            $('#mac_hide_cod_horario_agenda').val('');
            $('#mac_hide_periodo').val('');
            $('#mac_hide_cod_especialidade').val('');

            // Adiciono valores aos elementos do modal
            $('.mac_nome').html( $('.cxp_nome').text() );
            $('.mac_nome_medico').html( $(this).closest('tr').find('.trba_nome_medico').text() );
            $('#mac_hide_periodo').val( $(this).closest('tr').find('.trba_periodo').text() ); // input hidden
            $('#mac_hide_btn_de_origem').val( $(this).data('origem') ); // input hidden
            $('#mac_hide_cod_consulta').val( $(this).data('cod-consulta-crypt') ); // input hidden
            $('#mac_hide_cod_horario_agenda').val( $(this).data('cod-horario-agenda-crypt') ); // input hidden
            $('#mac_hide_cod_especialidade').val( $(this).data('cod-especialidade-crypt') ); // input hidden

            // Ativo função de carregamento de opções no combobox #tipo_consulta
            carregar_combo_tipo_consulta( $('#tipo_consulta_liberado').val(), $('#tipo_contrato').val() );

            // Exibo janela modal de confirmação de atendimento
            $('#modal-confirmar-atendimento').modal();

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_CONFIRMAR_ATENDIMENTO_CONSULTA
     # Confirma presença do paciente e o coloca na fila de espera do médico
     # 
    *************************************/ 
    $(document).on('click', '.btn_confirmar_atendimento_consulta', function(event) {

        // Previne ação default do elemento
        event.preventDefault();

        // Reúno dados necessários
        var mac_tipo_consulta = $(this).closest('.modal-content').find('.tipo-consulta option:selected').val(); // Retirado de campo dentro do modal
        var mac_origem = $('#mac_hide_btn_de_origem').val();
        var mac_cod_consulta_crypt = $('#mac_hide_cod_consulta').val();
        var mac_cod_horario_agenda_crypt = $('#mac_hide_cod_horario_agenda').val();
        var mac_cod_especialidade_crypt = $('#mac_hide_cod_especialidade').val();

        // Executa função para registrar atendimento
        executar_atendimento(mac_origem, mac_tipo_consulta, mac_cod_consulta_crypt, mac_cod_horario_agenda_crypt, mac_cod_especialidade_crypt);

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
    $(document).on('click', '.btn_forcar_atendimento', function(e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Reúno dados necessários
        var mac_tipo_consulta = $(this).closest('.modal-content').find('.tipo-consulta option:selected').val(); // Retirado de campo dentro do modal
        var mac_origem = $('#mac_hide_btn_de_origem').val();
        var mac_cod_consulta_crypt = $('#mac_hide_cod_consulta').val();
        var mac_cod_horario_agenda_crypt = $('#mac_hide_cod_horario_agenda').val();
        var mac_cod_especialidade_crypt = $('#mac_hide_cod_especialidade').val();

        // Executa função para registrar agendamento
        executar_atendimento(mac_origem, mac_tipo_consulta, mac_cod_consulta_crypt, mac_cod_horario_agenda_crypt, mac_cod_especialidade_crypt, 1);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_IMPRIMIR_SENHA_FILA_MEDICO
     # Abre versão para impressão da senha da fila do médico
     # 
    *************************************/ 
    $(document).on('click', '.btn_imprimir_senha_fila_medico', function(event) {

        // Recupero CODIGO DA SENHA através de input hidden dentro do modal
        var codigo_da_senha = $('#msfm_hide_cod_senha_crypt').val();

        // Exibo modal com a SENHA da FILA DO MÉDICO
        $('#modal-senha-fila-medico').modal('hide');
        
        // Abre versão para impressão em nova janela
        window.open(UrlImpressaoSenhaFilaMedico + "/" + codigo_da_senha);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_REIMPRIMIR_SENHA_FILA_MEDICO
     # Abre versão para impressão da senha da fila do médico
     # 
    *************************************/ 
    $(document).on('click', '.btn_reimprimir_senha_fila_medico', function(event) {

        // Recupero CODIGO DA SENHA através de data-attribute no botão
        var codigo_da_senha = $(this).data('cod-senha-crypt');
        
        // Abre versão para impressão em nova janela
        window.open(UrlImpressaoSenhaFilaMedico + "/" + codigo_da_senha);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_TRANSFERIR_CONSULTA_ATEND
     # Marca consulta como 'em processo de transferencia' e direciona para aba de filtros de agenda
     # 
    *************************************/ 
    $(document).on('click', '.btn_transferir_consulta_atend', function(e) {

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
                    $('#cod_especialidade_atend option[value=' + response.dados.cod_especialidade + ']').prop('selected', true);
                    $('#cod_especialidade_atend').prop('disabled', true);

                    // Recarrega dados no combobox #cod_medico
                    carregar_combo_medicos_atend( $('.cxp_idade').html(), $('#cod_especialidade_atend').find(':selected').val(), $('#cod_unidade').find(':selected').val(), 'ativo', '', $('.cxp_data_nascimento').html() );

                    // Simulo evento 'click' no botão 'buscar agenda', fazendo com o que o javascript comece a desenhar a agenda baseado nos filtros
                    $('#btn_buscar_para_atendimento').trigger('click');

                    // Exibo DIV informando que existe uma consulta em processo de TRANSFERÊNCIA
                    $('.aviso_em_transferencia').show();

                    // Simulo o evento 'click' na aba #tab_pronto_atendimento, fazendo com que o conteúdo visto seja referente aos filtros da agenda (ou seja, troco a aba)
                    $('#tab_pronto_atendimento').trigger('click');

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



}); // Fecha $(document).ready