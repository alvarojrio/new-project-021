@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Bloqueios | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('bloqueios-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Bloqueio</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- COLUNA -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="panel panel-info">                 
                            <div class="panel-heading"><i class="fas fa-ban"></i> Bloqueio</div>
                            <div class="panel-body">
                                
                                <!-- INICIO DA LINHA -->
                                <div class="row">

                                    <div class="col-lg-5 col-md-5 col-sm-11 col-xs-11">

                                        <div class="form-group">
                                            <label class="control-label">Médico <span class="required-red">*</span></label>
                                            <input type="hidden" class="form-control" name="cod_medico" id="cod_medico" <?php if (!empty(old('cod_medico'))) { ?>value="<?php echo old('cod_medico'); ?>"<?php } ?>  autocomplete="off" required="required">
                                            <input type="text" class="form-control col-lg-2" name="medico" id="autocomplete" placeholder="Digite o nome do médico" <?php if (!empty(old('medico'))) { ?>value="<?php echo old('medico'); ?>"<?php } ?> minlength="5"  autocomplete="off" required="required">
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                        <div class="row">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="control-label">&nbsp;</label><br/>
                                                    <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar'><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>    
                                        </div>    
                                    </div>
                                   
                                </div>
                                <!-- FIM LINHA -->
                                
                                <!-- INICIO DA LINHA -->
                                <div class="row">
                                  <div id="avisoValidacao" role="alert">
                                      <div class="col-xs-12">
                                          <div class="alert alert-warning msg_consulta_agendada" style="display:none">
                                              <h4 class="pt-0">Alerta</h4><br>
                                          </div>
                                      </div>
                                  </div>
                                </div>    
                                <!-- FIM DA LINHA -->
                                
                                <!-- INICIO DA LINHA -->
                                <div class="row" style="margin-top: 15px;">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='caixas_unidade'>
                                    <!-- Recebe as caixas de unidades dinamicamente via javascript -->
                                    </div>
                                
                                </div>
                                <!-- FIM LINHA -->
                  
                            </div>    
                            <!-- FIM DO PANEL-BODY -->
                        </div>
                        
                    </div> 
                     
                </div>
                <!-- FIM LINHA -->
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- COLUNA -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id='caixa_botoes'>
                    <!-- Recebe os botoes fechar e salvar dinamicamente via javascript -->
                    </div>

                </div>
                <!-- FIM LINHA -->
        
            </div>  
        </div>
    </div>

</div>

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/autocomplete/src/jquery.autocomplete.js') }}"></script>

<script type="text/javascript">
 
$(document).ready(function(){
    
   
    /**************************************************************************/
    /**************************************************************************/
    
    /*recebo o objeto medico e armazeno na váriavel countries*/
    
    /**************************************************************************/
    /**************************************************************************/
    
    var medicos = [
        <?php 
            foreach($medicos as $m):
                
                // Criptonfo o código
                $cod_medico = Crypt::encrypt($m->cod_medico);
                $nome_medico = $m->nome;
                
                echo "{value:' $nome_medico ', cod: ' $cod_medico '},";
            
            
            endforeach;
        ?>
       
    ];

    $('#autocomplete').autocomplete({
        lookup: medicos,
        onSelect: function (suggestion) {
            
            //var nome_medico = suggestion.value;
            var cod_medico = suggestion.cod;
            $("#cod_medico").val(cod_medico);

        }
    });
    
    
    $("#btn_buscar").on('click', function(){
        
        var nome_medico = $("#autocomplete").val();
        var cod_medico = $("#cod_medico").val();
        
        
        // Verifico se variavel está vazio
        if(nome_medico.length == 0){
            
            alert("Informe o nome do médico");
            return false;
            
        }
        
        // Verifico se variavel recebeu o codigo do médico
        if(cod_medico == "" || cod_medico == " "){
            alert("Não encontramos o médico na base de dados!");
            return false;
        }
        
        
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/bloqueiosferiados/buscar-unidades-vinculada-ao-medico-para-bloqueio-ajax'); ?>",
            data: { 
                "cod_medico": cod_medico
            },
            beforeSend: function() { 
                $("#btn_buscar").prop('disabled', true)
            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Executa ao completar envio
                    alert("Ocorreu um erro na busca, favor tente novamente!");
                    $("#btn_buscar").prop('disabled', false); 
           
                } else if (response.status == 'sucesso') {
                
                    // Recebo o valores nas variaveis
                    var cod_medico = response.cod_medico;
                    var unidades = response.unidades;
                    var cod_unidades = response.cod_unidades;
                    var total_unidades_medico = response.total_unidades_medico;
                    
                    var especialidades = response.especialidades;
                    var cods_especialidades = response.cods_especialidades;
                    var total_especialidades = response.total_especialidades;
                    
                    var extras_response = "";
                    extras_response += "<input type='hidden' name='total_unidades_medico' id='total_unidades_medico' value='" + total_unidades_medico + "' />";
                    extras_response += "<input type='hidden' name='cod_medico' id='cod_medico' value='" + cod_medico + "' />";
                    
                    var caixas_unidade = '';

                    for (var i = 0; i < total_unidades_medico; i++) {
                       
                        extras_response += "<input type='hidden' name='nome_unidade' id='nome_unidade' value='" + unidades[i] + "' />";
                       
                        // CAIXA DE VALIDAÇÃO
                        caixas_unidade += "<div class='row row_msg_erro_cadastrar"+i+"'>";
                        
                        caixas_unidade += "<div id='avisoValidacao' role='alert'>";
                        caixas_unidade += "<div class='col-xs-12'>";
                        caixas_unidade += "<div class='alert alert-danger msg_erro_cadastrar"+i+"' style='display:none'>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        
                        caixas_unidade += "</div>";    
                        //FIM DA CAIXA DE VALIDAÇÃO
                        
                       
                        // INICIO DO PANEL  
                        caixas_unidade += "<div class='panel panel-default panel_unidade'>";
                        
                        // INICIO DO PANEL-HEADING
                        caixas_unidade += "<div class='panel-heading'>";
                        caixas_unidade += "<input type='hidden' id='caixa' name='caixa' value='"+i+"' />";
                        caixas_unidade +=  unidades[i];
                        caixas_unidade += "</div>";
                        // FIM DO PANEL-HEADING
                        
                        // INICIO DO PANEL-BODY
                        caixas_unidade += "<div class='panel-body'>";

                        // INICIO COLUNA
                        caixas_unidade += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<p class='text-right tile_head'><small'>Criar Bloqueio </small'> <input type='checkbox' class='btn_bloqueio' name='btn_bloqueio' id='btn_bloqueio' value='" + i + "'></p>";
                        caixas_unidade += "</div>";
                        // FIM COLUNA
                                                                                                              
                        // INICIO COLUNA
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<input type='hidden' name='cod_unidade' id='cod_unidade' value='"+ cod_unidades[i]+"' />";
                        caixas_unidade += "<div class='form-group'>";
                        caixas_unidade += "<label class='control-label'>Descrição <span class='required-red'>*</span></label>";
                        caixas_unidade += "<input type='text' class='form-control' disabled='disabled' name='descricao' id='descricao' <?php if (!empty(old('descricao'))) { ?>value='<?php echo old('descricao'); ?>'<?php } ?> autocomplete='off' required='required'>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        // FIM COLUNA
                                                                    
                        // INICIO COLUNA
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<div class='row'>";
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<div class='form-group'>";
                        caixas_unidade += "<label class='control-label'>Data início <span class='required-red'>*</span></label>";
                        caixas_unidade += "<input type='text' class='form-control data' disabled='disabled' name='data_inicio' id='data_inicio' <?php if (!empty(old('data_inicio'))) { ?>value='<?php echo old('data_inicio'); ?>'<?php } ?> autocomplete='off' required='required'>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<div class='form-group'>";
                        caixas_unidade += "<label class='control-label'>Data fim <span class='required-red'>*</span></label>";
                        caixas_unidade += "<input type='text' class='form-control data' disabled='disabled' name='data_fim' id='data_fim' <?php if (!empty(old('data_fim'))) { ?>value='<?php echo old('data_fim'); ?>'<?php } ?> autocomplete='off' required='required'>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        caixas_unidade += "</div>";
                        // FIM DO COLUNA
                         
                        // INICIO COLUNA
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";
                        caixas_unidade += "<div class='form-group'>";
                        caixas_unidade += "<label class='control-label'>Especialidades <span class='required-red'>*</span></label>";
                        caixas_unidade += "<select class='form-control select2_multiple_especialidades' disabled='disabled' name='especialidades[]' id='especialidades' style='width:100%' multiple required='required'>";
                  
                        for (var e = 0; e < total_especialidades; e++) {
                            
                            caixas_unidade += "<option value=" + cods_especialidades[e] + ">" + especialidades[e] + "</option>";

                        } // FECHA FOR

                        caixas_unidade += "</select>";
                        caixas_unidade += "</div>";                       
                        caixas_unidade += "</div>";
                        // FIM COLUNA      
                                                                   
                        // INICIO COLUNA
                        caixas_unidade += "<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>";                        
                        caixas_unidade += "<div class='form-group'>";

                        caixas_unidade += "<label class='control-label'>Turno <span class='required-red'>*</span></label>";
                        caixas_unidade += "<select class='form-control select2_multiple_turnos' disabled='disabled' name='turnos[]' id='turnos' style='width:100%' multiple required='required'>";
                        caixas_unidade += "<option value='1'>Manhã</option>";        
                        caixas_unidade += "<option value='2'>Tarde</option>";
                        caixas_unidade += "</select>";
                        caixas_unidade += "</div>";                        
                        caixas_unidade += "</div>";
                        // FIM COLUNA
                 
                        caixas_unidade += "</div>";
                        // FIM DO PANEL-BODY
                                                 
                        caixas_unidade += "</div>";
                        // FIM DO PANEL 
             
                        caixas_unidade += "</div>";
                        // FIM COLUNA

                        caixas_unidade += "<br /><hr/><br />";

                        //caixas_unidade += "<div class=col-lg-12 col-md-12 col-sm-12 col-xs-12'> <hr /> </div>";                         
              
                    }
                    
                    //caixas_unidade +=   "</div>";
                    // FIM LINHA
                    
                    // Inicializo a variavel para recebe os botoes
                    var caixa_botoes = "<hr />";                    
                    caixa_botoes += "<button type='button' class='btn btn-success pull-right' id='btn_salvar_bloqueio'><i class='far fa-save'></i> Salvar</button>";
                    caixa_botoes += "<a href='{{ url('admin/painel/bloqueiosferiados/') }}' class='btn btn-default pull-right'><i class='fas fa-arrow-circle-left'></i> Voltar</a>";                    
                   
                    // limpando caixas_unidade
                    $("#caixas_unidade").html("");
                    // insiro na div com ID caixas_unidade no HTML
                    $("#caixas_unidade").append(caixas_unidade);
                    // insiro na div com ID caixas_unidade no HTML, mas antes de qualquer conteúdo que já exista lá
                    $("#caixas_unidade").prepend(extras_response);
                    
                    // limpando caixa_botoes
                    $("#caixa_botoes").html("");
                    // insiro na div com ID caixa_botoes no HTML
                    $("#caixa_botoes").append(caixa_botoes);
                    
                    // ========================================================
                    // ========================================================
                    // CONTROLE DAS UNIDADES QUE SERÃO HABILITADA
                    // ========================================================
                    // ========================================================
                    
                    $(".btn_bloqueio").on('click', function(){
                        
                        // RECEBO O VALOR DO CHECKBOX CLICADO
                        var i = $(this).val();                        
                        var caixa = i;
                        
                        // VERIFICO SE CHECKBOX FOI HABILITADO
                        if ($(this).is(":checked") == true) {
                           
                           // Habilitando campos
                           $(this).closest('div.panel_unidade').find("#descricao").prop('disabled', false);
                           $(this).closest('div.panel_unidade').find("#data_inicio").prop('disabled', false);
                           $(this).closest('div.panel_unidade').find("#data_fim").prop('disabled', false);
                           $(this).closest('div.panel_unidade').find("#turnos").prop('disabled', false);
                           $(this).closest('div.panel_unidade').find("#especialidades").prop('disabled', false);
                           
                        } else {

                            // Desabilitando campos
                            $(this).closest('div.panel_unidade').find("#descricao").prop('disabled', true);
                            $(this).closest('div.panel_unidade').find("#data_inicio").prop('disabled', true);
                            $(this).closest('div.panel_unidade').find("#data_fim").prop('disabled', true);
                            $(this).closest('div.panel_unidade').find("#turnos").prop('disabled', true);
                            $(this).closest('div.panel_unidade').find("#especialidades").prop('disabled', true);
                            
                            // Limpo a div de erros
                            $('.msg_erro_cadastrar'+caixa).html('');

                            // Escondo a div de erros 
                            $('.alert-danger').hide();

                        }
                        
                    })
         
                    $(".select2_multiple_turnos").select2({
                        placeholder: "Selecione os turnos",
                        allowClear: true
                    });
                     
                    $(".select2_multiple_especialidades").select2({
                        placeholder: "Selecione as especialidades",
                        allowClear: true
                    });

                    // função para controlar data minima e maxima
                    $(function() {

                         $(".data").datepicker({
                          autoclose: true,
                          format: 'dd/mm/yyyy',
                          startDate: '1d',
                          //endDate: '0d',
                          language: 'pt-BR'   
                         });

                    });
                    
               
                    // ========================================================
                    // ========================================================
                    // FUNÇÃO CHAMADA AO CLICAR NO SALVAR (btn_salvar_bloqueio)
                    // ========================================================
                    // ========================================================
                    
                    $("#btn_salvar_bloqueio").on('click', function(){
                        
                        // Previne ação default do elemento
                        // e.preventDefault();

                        // Apaga Toast que estejam abertos
                        // $.toast().reset('all');

                        // Limpo e oculto div de erros
                        // $('.msg_erro_cadastrar').hide();
                        // $('.msg_erro_gerencia_membro').html('');
                        // $('.msg_erro_gerencia_membro').hide();
                        
                        // DECLARANDO VARIAVEIS
                        var form_valido = true;
                        var msg_erro_validacao = "";
                        var array_unidade_pai = new Array;
                        var obj_unidade_filha = {}; // Crio um objeto
                        var array_cods_especialidades = new Array;
                        var array_cods_turnos = new Array;
                        var check_unidade = 0; // para verificar se ao menos uma unidade foi habilitada
                        var status_erro = 0; // para verificar formulários
                        
                        // RECEBO O TOTAL DE UNIDADES QUE O MEDICO TEM VINCULO
                        var total_unidades_medico = $("#total_unidades_medico").val();
                        // Recebo o nome da unidade
                        var nome_unidade = $("#nome_unidade").val();
                        var cod_medico = $("#cod_medico").val();
                        var check_unidade = 0; // para verificar se ao menos uma unidade foi habilitada
                   
                        // Loop por todas as caixas de pessoas 
                        $('div#caixas_unidade > div.panel_unidade').each(function() {
                        
                            // Verifico se o checkbox está marcado
                            if ($("#btn_bloqueio", this).is(":checked") == true) {
                                
                                /*
                                 #
                                 # RECEBO O VALOR DA CAIXA PARA SABER EM QUAL UNIDADE DEVO  
                                 # COLOCAR A MSG DE ERRO;
                                 # 
                                */
                                
                                var caixa =  $("#caixa", this).val();
                                check_unidade = 1; // Garanto que ao menos uma unidade foi habilitada
                                
                                // Reuno os dados da caixa atual do loop e coloco num objeto javascript
                                obj_unidade_filha['cod_unidade'] = $("#cod_unidade", this).val();
                                obj_unidade_filha['descricao'] = $("#descricao", this).val();
                                obj_unidade_filha['data_inicio'] = $("#data_inicio", this).val();
                                obj_unidade_filha['data_fim'] = $("#data_fim", this).val();

                                // Loop por todas as option selecionado de especialidades 
                                $(this).find('#especialidades > option:selected').each(function() {
                                    array_cods_especialidades.push( $(this).val() );
                                });

                                obj_unidade_filha['especialidades'] = (array_cods_especialidades.length == 0) ? '' : array_cods_especialidades; // Checo tamanho do array com o length
                                
                                // Loop por todas as option selecionado de turnos
                                $(this).find('#turnos > option:selected').each(function() {
                                    array_cods_turnos.push( $(this).val() );
                                });

                                obj_unidade_filha['turnos'] = (array_cods_turnos.length == 0) ? '' : array_cods_turnos; // Checo tamanho do array com o length

                                // Coloco o Objeto filho dentro do Array pai
                                array_unidade_pai.push(obj_unidade_filha);
                                
                                
                                /*
                                    ###########################################
                                    # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
                                    ###########################################
                               */
                                
                                    // cod_unidade, esse campo é preenchido pelo sistema
                                    if (obj_unidade_filha['cod_unidade'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- Ocorreu um erro, favor tente novamente.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    // descricao, campo preenchido pelo usuário
                                    if (obj_unidade_filha['descricao'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- O campo descrição é obrigatório.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    // descricao, campo preenchido pelo usuário
                                    if (obj_unidade_filha['data_inicio'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- O campo data início é obrigatório.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    // descricao, campo preenchido pelo usuário
                                    if (obj_unidade_filha['data_fim'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- O campo data fim é obrigatório.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    /*
                                     #
                                     #  Verificação se a data início é maior que a data fim 
                                     # 
                                     # 
                                     */  
                                    
                                    var data_inicio = obj_unidade_filha['data_inicio'];
                                    var data_fim = obj_unidade_filha['data_fim'];
                                    
                                    var objDate_inicio = new Date();
                                    objDate_inicio.setYear(data_inicio.split("/")[2]);
                                    objDate_inicio.setMonth(data_inicio.split("/")[1]  - 1);//- 1 pq em js é de 0 a 11 os meses
                                    objDate_inicio.setDate(data_inicio.split("/")[0]);
                         
                                    var objDate_fim = new Date();
                                    objDate_fim.setYear(data_fim.split("/")[2]);
                                    objDate_fim.setMonth(data_fim.split("/")[1]  - 1);//- 1 pq em js é de 0 a 11 os meses
                                    objDate_fim.setDate(data_fim.split("/")[0]);

                                    // Data_inicio tem que ser menor ou igual a data_fim, campo preenchido pelo usuário
                                    if (objDate_inicio  > objDate_fim ) { 
                                       
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- A data início não pode ser maior que a data fim.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    // descricao, campo preenchido pelo usuário
                                    if (obj_unidade_filha['especialidades'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- Preencha ao menos uma especialidade.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                    
                                    // descricao, campo preenchido pelo usuário
                                    if (obj_unidade_filha['turnos'].length === 0) {
                                        // Sinaliza erro
                                        form_valido = false;
                                        // Monto mensagem de erro
                                        msg_erro_validacao += '- Preencha ao menos um turno.<br/>';
                                        // Sai do loop
                                        //return false;
                                    }
                                
                                
                                /*
                                    ###########################################
                                    # FIM VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
                                    ###########################################
                                */
                                
                                
                                
                                
                                /*
                                    ###########################################
                                    # Checo se houve erro no preenchimento dos campos obrigatórios
                                    ###########################################
                                */

                                if (form_valido == false) {
                                    
                                    // Limpo a div de erros
                                    $('.msg_erro_cadastrar'+caixa).html('');
                                     
                                    // Escondo a div de erros 
                                    $('.alert-danger').hide();

                                    // Coloco mensagem dentro da div de erros
                                    $('.msg_erro_cadastrar'+caixa).append('<h4 class="pt-0">Alerta</h4>');
                                    $('.msg_erro_cadastrar'+caixa).append(msg_erro_validacao);

                                    // Exibo div de erros
                                    $('.msg_erro_cadastrar'+caixa).show();

                                    // Volto até o topo da tela para chamar a atenção
                                    $([document.documentElement, document.body]).animate({
                                        scrollTop: $('.row_msg_erro_cadastrar'+caixa).offset().top
                                    }, 'fast'); 

                                    // Travo execução do resto da função
                                    return false;
                                   
                                }

                                
                                // Limpo variaveis para futuras utilizações
                                obj_unidade_filha = {};
                                array_cods_especialidades = new Array;
                                array_cods_turnos = new Array;

                            }
                            
                        }); // Fecho loop pelas caixas de unidades    
                        
                        
                        if(form_valido == false){
                            return false;
                        }
                        
                        if(check_unidade == 0){
                            
                            alert("Ao menos uma unidade tem que se ativada");
                            return false;
                            
                        }
                        
                        
                        // PARA TESTAR. ORIGINAL SALVO NO PC DO ANDRE
                        //console.log( JSON.stringify(array_unidade_pai, null, 2) ); return false;
                        
                        // Converto Array para JSON
                        var bloqueios_em_json = JSON.stringify(array_unidade_pai, null, 2);
              
                        // Requisição ajax
                        $.ajax({
                            cache: false,
                            type: "POST",
                            url: "<?php echo url('admin/painel/bloqueiosferiados/cadastrar-bloqueio-unidades-vinculada-ajax'); ?>",
                            data: { 
                                "cod_medico": cod_medico,
                                "bloqueios_em_json": bloqueios_em_json
                            },
                            beforeSend: function() { 

                                // Executa antes do envio
                                $("#btn_salvar_bloqueio").html('processando...');
                                $("#btn_salvar_bloqueio").prop('disabled', true);
                                

                            },
                            success: function(response) {

                                // Convertendo resposta para objeto javascript
                                var response = JSON.parse(response);

                                // Checo retorno
                                if (response.status == 'erro') {

                                    // Faz algo      
                                    //alert(response.erro);
                                    
                                    // Mudo a masagem do botão
                                    //$("#btn_salvar_bloqueio").html('Salvar');
                                    // Habilito o botão
                                    //$("#btn_salvar_bloqueio").prop('disabled', false);
                                    
                                    
                                    // Mostra mensagem de erro
                                    $.toast({
                                        heading: 'Erro!',
                                        text: response.erro,
                                        showHideTransition: 'fade',
                                        icon: 'error',
                                        position: 'top-right',
                                        hideAfter: 1500, // em milisegundos
                                        allowToastClose: true,
                                        afterHidden: function() {

                                            window.location.replace("<?php  echo url("admin/painel/bloqueiosferiados"); ?>");

                                        }   
                                    });  
                                    

                                } else if (response.status == 'sucesso') {

                                    // defino o tempo do toast
                                    var tempo = 1500;

                                    if(response.msg_consulta_agendada != ""){
                                      
                                      $(".msg_consulta_agendada").html("");
                                      $(".msg_consulta_agendada").append(response.msg_consulta_agendada);
                                      $(".msg_consulta_agendada").show();
                                      
                                      tempo = 9900;
                                      
                                    }
                                    
                                    // Mostra mensagem de sucesso
                                    $.toast({
                                        heading: 'Sucesso!',
                                        text: response.sucesso,
                                        showHideTransition: 'fade',
                                        icon: 'success',
                                        position: 'top-right',
                                        hideAfter: tempo, // em milisegundos
                                        allowToastClose: true,
                                        afterHidden: function() {

                                            window.location.replace("<?php  echo url("admin/painel/bloqueiosferiados"); ?>");

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
                        }); // FECHO AJAX
                        
                        
                    }); // FECHO FUNÇÃO (btn_salvar_bloqueio)
                      
                }

            },
            complete: function(response) {

                // Executa ao completar envio
                $("#btn_buscar").prop('disabled', false);
             

            },
            error: function(response, thrownError) {

                // Faz algo se der erro
                // Executa ao completar envio
                $("#btn_buscar").prop('disabled', false);
     
            }
        });
        
        // Buscar as unidades que o medico atende
        

        // Buscar o turno que o medico
        
    })
      
});


</script>
@stop