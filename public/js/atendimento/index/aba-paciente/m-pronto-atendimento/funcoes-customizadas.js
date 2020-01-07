/*
*
* FUNÇÕES CUSTOMIZADAS
* Funções de carregamento e manipulação de dados e elementos
*
*/

/************************************
 #
 # Carrega opções dentro do combobox #cod_especialidade_atend
 # 
*************************************/ 
function carregar_combo_especialidades_atend(sexo = '', unidade = '', medico = '', idade = '', data_nascimento = '') {

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
            "data_nascimento_pesquisada": data_nascimento,
            "remover_filtro_agendaveis": 1
        },
        beforeSend: function() { 
            // Soon 
        },
        success: function(response) {

            // Limpo opções atuais do combobox
            $('#cod_especialidade_atend').empty();

            // Adiciono opção padrão
            $('#cod_especialidade_atend').append("<option value=''>Selecione uma especialidade</option>");

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

                        $('#cod_especialidade_atend').append("<option value='" + value.cod_especialidade + "' selected='selected'>" + value.nome_especialidade + "</option>");

                    });

                    // Desabilita campo
                    $('#cod_especialidade_atend').prop('disabled', true);

                } else {

                    // Faço loop pelo vetor
                    $(response).each(function (index, value) {

                        $('#cod_especialidade_atend').append("<option value='" + value.cod_especialidade + "'>" + value.nome_especialidade + "</option>");

                        
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
 # Carrega opções dentro do combobox #cod_medico_atend
 # 
*************************************/ 
function carregar_combo_medicos_atend(idade = '', especialidade = '', unidade = '', filtrar_por_dia = 'inativo', ultimo_medico_marcado = '', data_nascimento = '') {

    // Busca MÉDICOS para preencher combobox (requisição ajax)
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlListaMedicosPorFiltros,
        data: { 
            "idade_pesquisada": idade,
            "especialidade_pesquisada": especialidade,
            "unidade_pesquisada": unidade,
            "data_nascimento_pesquisada": data_nascimento,
            "filtrar_por_dia": filtrar_por_dia
        },
        beforeSend: function() { 
            // Soon 
        },
        success: function(response) {

            // Limpo opções atuais do combobox
            $('#cod_medico_atend').empty();

            // Adiciono opção padrão
            $('#cod_medico_atend').append("<option value=''>Selecione um médico</option>");

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

                    $('#cod_medico_atend').append("<option value='" + value.cod_medico + "'>" + value.nome + "</option>");
                    
                });

                // Caso tenha sido definido um médico para manter marcado
                if (ultimo_medico_marcado != '') {

                    // Deixo marcado uma opção
                    $('#cod_medico_atend').val(ultimo_medico_marcado);

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
 # Ativa os campos e botões presentes dentro da div #caixa_busca_pronto_atendimento
 # 
*************************************/ 
function ativar_campos_pronto_atendimento() {

    // [Carregamento padrão] Carrega dados em combobox, filtrando apenas por sexo
    carregar_combo_especialidades_atend( $('.cxp_sexo').data('codigosexo'), $('#cod_unidade').find(':selected').val(), '', $('.cxp_idade').html(), $('.cxp_data_nascimento').html() ); // Recupera o código do sexo através de um data-attribute e coloca na função

    // [Carregamento padrão] Carrega dados em combobox, filtrando apenas por idade
    carregar_combo_medicos_atend( $('.cxp_idade').html(), '', $('#cod_unidade').find(':selected').val(), 'ativo', '', $('.cxp_data_nascimento').html() );

    // Desativa propriedade 'disabled' dos campos
    $('#cod_especialidade_atend').prop('disabled', false);
    $('#cod_medico_atend').prop('disabled', false);

    // Remove classe 'botao_desativado' do botão 'btn_buscar_para_atendimento'
    $('#btn_buscar_para_atendimento').removeClass('botao_desativado');

    // Remove classe 'botao_desativado' do botão 'btn_resetar_busca_para_atendimento'
    $('#btn_resetar_busca_para_atendimento').removeClass('botao_desativado');
    
    // Oculta div de dica
    $('.box_alerta_amarelo').hide();

}


/************************************
 #
 # Desativa os campos e botões presentes dentro da div #caixa_busca_pronto_atendimento
 # 
*************************************/ 
function desativar_campos_pronto_atendimento() {

    // Ativa propriedade 'disabled' dos campos
    $('#cod_especialidade_atend').prop('disabled', true);
    $('#cod_medico_atend').prop('disabled', true);

    // Limpo opções atuais dos comboboxes dinâmicos e adiciono opções padrão
    $('#cod_especialidade_atend').empty(); //
    $('#cod_especialidade_atend').append("<option value=''>Selecione uma especialidade</option>");
    $('#cod_medico_atend').empty();
    $('#cod_medico_atend').append("<option value=''>Selecione um médico</option>");

    // Reseta comboboxes, devolvendo-os para a opção padrão
    $('#cod_especialidade_atend').prop('selectedIndex', 0);
    $('#cod_medico_atend').prop('selectedIndex', 0);

    // Adiciona classe 'botao_desativado' do botão 'btn_buscar_para_atendimento'
    $('#btn_buscar_para_atendimento').addClass('botao_desativado');

    // Adiciona classe 'botao_desativado' do botão 'btn_resetar_busca_para_atendimento'
    $('#btn_resetar_busca_para_atendimento').addClass('botao_desativado');

    // Limpa valor da div .msg_erro_validacao_filtros_atend
    $('.msg_erro_validacao_filtros_atend').html('');

    // Oculta div .msg_erro_validacao_filtros
    $('.msg_erro_validacao_filtros_atend').hide();

    // Exibe div de dica
    $('.box_alerta_amarelo').show();

    // Oculto div .box_erro_carregamento_agenda_atendimento
    $('.box_erro_carregamento_agenda_atendimento').hide();

    // Oculto div .box_erro_agenda_atendimento_vazia
    $('.box_erro_agenda_atendimento_vazia').hide();

    // Oculto div .panel_agendas_atendimento
    $('.panel_agendas_atendimento').hide();

    // Limpo a div .panel_agendas_atendimento para receber novos dados (elemento .panel-body é onde fica o conteúdo da agenda)
    $('.panel_agendas_atendimento .panel-body .table-responsive').empty();

}


/************************************
 #
 # Verificar se os comboboxes de especialidade e médico tem opções disponiveis. Caso não tenham tenham, TRAVA botão 'Buscar Vagas'
 # 
*************************************/ 
function checar_existencia_opcoes_combos_filtros_atend() {

    var retorno = {}; // Crio um objeto
    var total_opcoes_combo_especialidade = $('#cod_especialidade_atend option').length;
    var total_opcoes_combo_medico = $('#cod_medico_atend option').length;

    // Verifico se existem opções dentro do combo de especialidade. Por padrão, existirá ao menos uma opção. Se não tiverem mais do que isso, retorna erro
    if (total_opcoes_combo_especialidade < 2) {

        // Defino valores de posições no objeto
        retorno.liberado = false;
        retorno.mensagem_erro = 'Não foi possível localizar médicos que possam prestar atendimento para este paciente devido a sua faixa de idade e/ou sexo ou por não trabalharem na data de hoje.';

        // Retorno o objeto
        return retorno;

    } else if (total_opcoes_combo_medico < 2) { // Verifico se existem opções dentro do combo de medicos. Por padrão, existirá ao menos uma opção. Se não tiverem mais do que isso, retorna erro

        // Defino valores de posições no objeto
        retorno.liberado = false;
        retorno.mensagem_erro = 'Não foi possível localizar médicos que possam prestar atendimento para este paciente devido a sua faixa de idade e/ou sexo ou por não trabalharem na data de hoje.';

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
 # Registra atendimento, passando o codigo da consulta como parametro. Se necessário, também é possivel informar um pedido de 'forçar agendamento/atendimento'
 # 
*************************************/
function executar_atendimento(origem, tipo_consulta, codigo_consulta = '', codigo_horario_agenda = '', codigo_especialidade = '', forcar_atendimento = '') {

    // Resetando todos os possiveis Toast
    $.toast().reset('all');

    // Limpo e oculto div de erros
    $('.mac_msg_erro').html('');
    $('.mac_msg_erro').hide();
    $('.mac_msg_erro').append('<h4 class="pt-0">Alerta</h4>');

    // Reuno dados do formulário de busca
    var form_at_origem = origem;
    var form_at_cod_consulta_crypt = codigo_consulta;
    var form_at_cod_horario_agenda_crypt = codigo_horario_agenda;
    var form_at_cod_especialidade_crypt = codigo_especialidade;
    var form_at_tipo_consulta = tipo_consulta; // contrato (1) ou particular (2)
    var form_at_periodo = $('#mac_hide_periodo').val(); // Retirado de input hidden dentro do modal
    var form_at_cod_pessoa_crypt = $('#cod_pessoa_crypt').val(); // Retirado de input hidden dentro da caixa de paciente
    var form_at_tipo_contrato = $('#tipo_contrato').val(); // Retirado de input hidden dentro da caixa de paciente. Pode receber os valores 'pf' ou 'pj'
    var form_at_cod_contrato_crypt = $('#cod_contrato_crypt').val(); // Retirado de input hidden dentro da caixa de paciente
    var form_at_usuario_gerente = $('#mac_usuario_gerente').val();
    var form_at_senha_gerente = $('#mac_senha_gerente').val();
    var form_at_logado_como_gerente = $('#mac_hide_logado_como_gerente').val(); // Retirado de input hidden dentro do modal. Pode ser: 1 (sim) ou 0 (não)

    // Garanto que o valor da variavel seja sempre 1 ou 0
    if (form_at_logado_como_gerente == '') { form_at_logado_como_gerente = 0; }

    // Verifico se o parametro 'forcar_agendamento' foi setado na chamada da função
    if (forcar_atendimento == 1) {

        // Sinalizo que É para 'forçar atendimento'
        var form_at_forcar_atendimento = 1;

    } else {

        // Sinalizo que NÃO É para 'forçar atendimento'
        var form_at_forcar_atendimento = 0;

    }

    // Checo se pelo menos um dos parametros (cod_consulta ou cod_horario_agenda) está presente como data-attribute no botão
    if (form_at_cod_consulta_crypt == '' && form_at_cod_horario_agenda_crypt == '') {

        // Oculta mensagem 'processando...'
        $('#msg_processando').hide();

        // Coloco mensagem dentro da div de erros e exibo a div de erros
        $('.mac_msg_erro').append('Não foi possivel abrir a janela de confirmação de atendimento. Atualize a página e tente novamente.');
        $('.mac_msg_erro').show();  

    }

    /*
     ###########################################
     # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
     ###########################################
    */
    if (form_at_tipo_consulta == '') {

        // Coloco mensagem dentro da div de erros e exibo a div de erros
        $('.mac_msg_erro').append('- O campo TIPO DE CONSULTA não foi preenchido corretamente.');
        $('.mac_msg_erro').show();    

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

    // Requisição ajax
    $.ajax({
        cache: false,
        type: "POST",
        url: UrlExecutarAtendimento,
        data: { 
            'forcar_atendimento': form_at_forcar_atendimento, // pode ser: 1 (sim) ou 0 (não)
            'aba_origem': form_at_origem, // aba onde está o botão que foi clicado
            'cod_consulta_crypt': form_at_cod_consulta_crypt,
            'cod_horario_agenda_crypt': form_at_cod_horario_agenda_crypt,
            'cod_especialidade_crypt': form_at_cod_especialidade_crypt,
            'tipo_consulta': form_at_tipo_consulta, // contrato (1) ou particular (2)
            'periodo': form_at_periodo,
            'usuario_gerente': form_at_usuario_gerente,
            'senha_gerente': form_at_senha_gerente,
            'logado_como_gerente': form_at_logado_como_gerente, // pode ser: 1 (sim) ou 0 (não)
            'cod_pessoa_crypt': form_at_cod_pessoa_crypt,
            'tipo_contrato': form_at_tipo_contrato, // pode ser: pf ou pj
            'codigo_contrato_crypt': form_at_cod_contrato_crypt,
            "tipo_requisicao_agendamento": tipo_requisicao_agendamento, // transferencia ou cadastro
            "cod_consulta_transferida": $('#cod_consulta_em_transferencia').val()
        },
        beforeSend: function() { 
            
            // Revela div #msg_processando
            $('#msg_processando').show();

            // Limpo espaço da senha do médico no modal
            $('.msfm_senha').html('');

            // Limpo input hidden no modal
            $('#msfm_hide_cod_senha_crypt').val('');

        },
        success: function(response) {

            // Convertendo resposta para objeto javascript
            var response = JSON.parse(response);

            // Caso o retorno seja de erro
            if (response.status_requisicao == 'erro') {

                // Oculta mensagem 'processando...'
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.mac_msg_erro').append(response.erro);
                $('.mac_msg_erro').show();    

            } else if (response.status_requisicao == 'validacao') {

                // Limpo e oculto div com mensagem de FORÇAR AGENDAMENTO
                $('.mac_msg_forcar_atendimento').html('');
                $('.mac_msg_forcar_atendimento').hide();

                // Oculta mensagem 'processando...
                $('#msg_processando').hide();

                // Coloco mensagem dentro da div de erros
                $('.mac_msg_erro').append(response.erro);

                // Colocando HTML dentro da variavel   
                var html_caixa_login_gerente = '';
                html_caixa_login_gerente +=
                '<!-- Inicio linha -->' +
                '<div class="row">' +

                    '<div class="col-md-12 col-sm-12 col-xs-12">' +

                        '<b>Deseja LIBERAR o atendimento?</b>' +

                    '</div>' +

                '</div>' +
                '<!-- Fim linha -->';

                // Checa se o usuario logado tem permissão 'forcar-agendamento'. A variavel 'v_forcar_agendamento' é definida na view
                if (v_forcar_agendamento == 1) {

                    html_caixa_login_gerente +=
                    '<!-- Inputs ocultos para guardar códigos e outros dados -->' + 
                    '<input type="hidden" id="mac_hide_logado_como_gerente" name="mac_hide_logado_como_gerente" value=1 />' +
                    
                    '<!-- Inicio linha -->' +
                    '<div class="row">' + 

                        '<!-- Coluna -->' +
                        '<div class="col-md-12 col-xs-12">' +

                            '<label class="control-label"></label>' +
                            '<button type="button" class="btn btn-md btn-success btn_forcar_atendimento">Liberar</button>' +

                        '</div>' +

                    '</div>' +
                    '<!-- Fim linha -->';

                } else {

                    html_caixa_login_gerente +=
                    '<!-- Inputs ocultos para guardar códigos e outros dados -->' + 
                    '<input type="hidden" id="mac_hide_logado_como_gerente" name="mac_hide_logado_como_gerente" value=0 />' +

                    '<!-- Inicio linha -->' +
                    '<div class="row">' +   

                        '<!-- Coluna -->' +
                        '<div class="col-md-5 col-xs-12">' +

                            '<label class="control-label"><small>Usuário do Gerente</small></label>' +
                            '<input type="text" id="mac_usuario_gerente" name="mac_usuario_gerente" class="form-control input-sm" autocomplete="off" />' +

                        '</div>' + 

                        '<!-- Coluna -->' +
                        '<div class="col-md-5 col-xs-12">' +

                            '<label class="control-label"><small>Senha do Gerente</small></label>' +
                            '<input type="password" id="mac_senha_gerente" name="mac_senha_gerente" class="form-control input-sm" autocomplete="off" />' +

                        '</div>' +

                        '<!-- Coluna -->' +
                        '<div class="col-md-2 col-xs-12">' +

                            '<label class="control-label"></label>' +
                            '<button type="button" class="btn btn-block btn-success btn_forcar_atendimento" style="margin-top: 3px;">Liberar</button>' +

                        '</div>' +

                    '</div>' +
                    '<!-- Fim linha -->';

                }

                // Coloco HTML dentro da div
                $('.mac_msg_forcar_atendimento').append(html_caixa_login_gerente);

                // Exibo a div da mensagem de FORÇAR ATENDIMENTO
                $('.mac_msg_forcar_atendimento').show();

                // Exibo a div de erros
                $('.mac_msg_erro').show();

            } else if (response.status_requisicao == 'sucesso') { // Caso o retorno seja de sucesso

                // Checo se existe uma TRANSFERÊNCIA DE CONSULTA ativa no momento
                if (transferencia_de_consulta == 'ativa') {

                    // Sinalizo em variavel javascript que NÃO EXISTE uma transferência ativa
                    transferencia_de_consulta = 'inativa';

                    // Reseto valor de input hidden
                    $('#cod_consulta_em_transferencia').val('');

                    // Remove classe 'botao_desativado' do botão 'btn_modal_cliente_rapido' (botão que abre modal de cadastro rápido de cliente)
                    $('#btn_modal_cliente_rapido').removeClass('botao_desativado');

                    // Oculto DIV que informa que existe uma consulta em processo de TRANSFERÊNCIA
                    $('.aviso_em_transferencia').hide();

                }

                // Simulo o evento 'click' no botão #btn_buscar_para_atendimento
                $('#btn_buscar_para_atendimento').trigger('click');

                // Simulo o evento 'click' na aba #tab_buscar_agendamento
                $('#tab_buscar_agendamento').trigger('click');

                // Oculta modal de confirmar atendimento
                $('#modal-confirmar-atendimento').modal('hide');

                // Oculta mensagem 'processando...'
                $('#msg_processando').hide();

                // Preencho input hidden no modal
                $('#msfm_hide_cod_senha_crypt').val(response.cod_senha_fila_medico);

                // Preencho espaço da senha do médico no modal
                $('.msfm_senha').html(response.senha_fila_medico);

                // Exibo modal com a SENHA da FILA DO MÉDICO
                $('#modal-senha-fila-medico').modal('show');

                // Mostra mensagem de sucesso
                $.toast({
                    heading: 'Sucesso',
                    text: 'Presença confirmada com sucesso.',
                    showHideTransition: 'fade',
                    icon: 'success',
                    position: 'top-right',
                    hideAfter: 3000, // em milisegundos
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
            $('.mac_msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');
            $('.mac_msg_erro').show();  

        }
    }); // FIM DA REQUISIÇÃO AJAX

}