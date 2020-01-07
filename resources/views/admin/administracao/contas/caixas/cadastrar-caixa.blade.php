@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Contas | Caixas | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('contas-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Caixa</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div id="avisoValidacao">
                    @if (count($errors) > 0)
                        <div class="col-xs-12">
                          <div class="alert alert-danger">
                            <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                    @endif
                    </div>

                    <!-- COLUNA -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="panel panel-info">                 
                            
                            <div class="panel-body">
                                
                                <!-- INICIO DA LINHA -->
                                <div class="row">

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="control-label">Funcionário <span class="required-red">*</span></label>
                                            
                                            <input type="hidden" class="form-control" name="cod_unidade" id="cod_unidade">
                                            <input type="hidden" class="form-control" name="cod_funcionario" id="cod_funcionario">
                                            
                                            <input type="text" class="form-control col-lg-2" name="funcionario" id="autocomplete" placeholder="Digite o nome do funcionário" <?php if (!empty(old('funcionario'))) { ?>value="<?php echo old('funcionario'); ?>"<?php } ?> minlength="5"  autocomplete="off" required="required">
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

                  
                            </div>    
                            <!-- FIM DO PANEL-BODY -->
                        </div>
                        
                    </div> 
                     
                </div>
                <!-- FIM LINHA -->
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- COLUNA -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="caixa">
                        
                        <!-- Dados preenchidos dinamicamente via jquery -->                    
    
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
    
    var funcionarios = [
        <?php 
            foreach($funcionarios as $f):
                
                // Criptonfo o código
                $cod_unidade = $f->cod_unidade; // codigo da unidade que o funcionario está atrelado
                $cod_funcionario = $f->cod_funcionario; // codigo da unidade que o funcionario está atrelado
                $nome_funcionario = $f->pessoa->nome;
                
                echo "{value:' $nome_funcionario ', cod_unidade: ' $cod_unidade ', cod_funcionario: '$cod_funcionario'},";
            
            
            endforeach;
        ?>
       
    ];

    $('#autocomplete').autocomplete({
        lookup: funcionarios,
        onSelect: function (suggestion) {
            
            //var nome_medico = suggestion.value;
            var cod_funcionario = suggestion.cod_funcionario;
            var cod_unidade = suggestion.cod_unidade;
            $("#cod_funcionario").val(cod_funcionario);
            $("#cod_unidade").val(cod_unidade);

        }
    });
    

    
    $("#btn_buscar").on('click', function(){
        
        var cod_unidade = $("#cod_unidade").val();
        var cod_funcionario = $("#cod_funcionario").val();


        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/contas/buscar-contas-unidade-ajax'); ?>",
            data: { 
                "cod_unidade": cod_unidade,
                "cod_funcionario": cod_funcionario
            },
            beforeSend: function() { 

                // Executa antes do envio

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                //alert(response.status);

                // Checo retorno
                if (response.status == 'erro') {

                    // limpando caixas_unidade
                    $("#caixa").html("");

                    switch(response.msg){


                        case"1":
                            alert("Este funcionário já tem conta cadastrada. Caso deseja fazer alguma mudança clique em alterar!");
                        break;

                        case"2":
                            alert("A unidade que o mesmo trabalha não tem uma conta ativa!");
                        break;

                    }

                    

                } else if (response.status == 'sucesso') {

                    var caixa = "";


                    // CAIXA DE VALIDAÇÃO
                    caixa += "<div class='row row_msg_erro_cadastrar'>";
                    
                    caixa += "<div id='avisoValidacao' role='alert'>";
                    caixa += "<div class='col-xs-12'>";
                    caixa += "<div class='alert alert-danger msg_erro_cadastrar' style='display:none'>";
                    caixa += "</div>";
                    caixa += "</div>";
                    caixa += "</div>";
                    
                    caixa += "</div>";    
                    //FIM DA CAIXA DE VALIDAÇÃO

                    // INICIO DO PANEL MASTER
                    caixa += "<div class='panel panel-default'>";
                    
                        // INICIO DO PANEL-HEADING MASTER
                        caixa += "<div class='panel-heading'>";
                        caixa += "Novo Caixa";
                        caixa += "</div>";
                        // FIM DO PANEL-HEADING
                        
                        // INICIO DO PANEL-BODY MASTER
                        caixa += "<div class='panel-body'>";
                        caixa +="<div class='row'>";
                        caixa +="<div class='row'>";

                            // INICIO DA COLUNA
                            caixa += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                                // 1542978008912475.png
                                // INICIO DA COLUNA 
                                caixa += "<div class='col-lg-2 col-md-2 col-sm-4 col-xs-4 text-center'>";
                              

                               
                                //caixa += "<img src='<?php //echo asset('uploads/pessoas/'); ?>/" + response.foto_funcionario + "' width='150px' height='150px' accesskey='' class='img-thumbnail'>";
                                caixa += "<i class='fas fa-donate' style='font-size:120px'></i>";

                        
                                caixa += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                                caixa += "<input type='hidden'name='cod_funcionario' id='cod_funcionario' value='"+response.cod_funcionario+"'> <br/>";
                                caixa += "Caixa: "+response.nome_funcionario+" <br/>";
                                caixa += "CPF: "+response.cpf_funcionario+"<br/>";
                                caixa += "</div>";
                                
                                caixa += "</div>";
                                // FIM DA COLUNA


                                // INICIO DA COLUNA 
                                caixa += "<div class='col-lg-5 col-md-5 col-sm-8 col-xs-8'>";
                                caixa += "<div class='form-group'>";
                                caixa += "<label class='control-label'>Conta Bancária</label>";
                                caixa += "<select class='form-control' name='cod_conta' id='cod_conta'>";
                                caixa += "<option value=''>Selecione</option>";


                                var i = 0;
                                // Rodo o total de contas que veio do controller
                                for(i = 0; i < response.total_contas; i++){
                       
                                    // armazeno o vetor[i] na variavel resultado
                                    var resultado = response.array_contas[i];
                             
                                    // Separo o vetor por possição
                                    var conta = resultado.split("|");       

                                    // recebo o valor do vetor[i] na possição 0
                                    var cod_conta_unidade = conta[0];
      
                                    // recebo o valor do vetor[i] na possição 2
                                    var nome_banco = conta[1];
                                    
                                    // recebo o valor do vetor[i] na possição 3
                                    var nome_agencia = conta[2];

                                    // recebo o valor do vetor[i] na possição 4
                                    var nome_cc = conta[3];
                                    
                                    // recebo o valor do vetor[i] na possição 5
                                    var tipo_conta = conta[4];
                                    
                                    if(tipo_conta == 2){ // tipo de conta bancaria
                                        
                                        caixa += "<option value='"+cod_conta_unidade+"'>"+nome_banco+" - "+nome_agencia+" / "+nome_cc+"</option>";    

                                    }else { // tipo de conta local

                                        var cod_conta_local = cod_conta_unidade;
                                        var nome_banco_local = nome_banco;

                                    }    
                                }
                                
                                caixa += "<select>";
                                caixa += "</div>";

                          
                                
                                caixa += "<div class='form-group'>";
                                caixa += "<label class='control-label'>Conta Cofre <span class='required-red'>*</span></label>";
                                caixa += "<select class='form-control' name='cod_conta_local' id='cod_conta_local'>";
                                caixa += "<option value='"+cod_conta_unidade+"'>"+nome_banco_local+"</option>";
                                caixa += "</select>"; 
                                caixa += "</div>";
                              
                            
                                caixa += "</div>";
                                // FIM DA COLUNA


                                // INICIO DA COLUNA 
                                caixa += "<div class='col-lg-5 col-md-5 col-sm-8 col-xs-8'>";
                                caixa += "<div class='form-group'>";
                                caixa += "<label class='control-label'>Assumir <span class='required-red'>*</span></label>";
                                caixa += "<select class='form-control' name='tipo_caixa' id='tipo_caixa'>";

                                caixa += "<option value=''>Selecione</option>";
                                caixa += "<option value='1'>Caixa Gerente</option>";
                                caixa += "<option value='2'>Caixa Operacional</option>";
 
                                caixa += "<select>";
                                caixa += "</div>";

                                caixa += "</div>";
                                // FIM DA COLUNA
 
                            caixa += "</div>";
                            caixa += "</div>";
                            caixa += "</div>";
                            // FIM DA COLUNA


                            // INICIO DA COLUNA 
                            caixa += "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                            caixa += "<hr/>";
                            caixa += "<button type='submit' class='btn btn-success pull-right' id='btn_salvar'><i class='far fa-save'></i> Salvar</button>";
                            caixa += "<a class='btn btn-default pull-right' href='http://localhost/clinica/public/admin/painel/contas/caixas'> <i class='fas fa-arrow-circle-left'></i> Voltar</a>";
                            caixa += "</div>";


                        caixa += "</div>";
                        // FIM DO PANEL-BODY MASTER


                    caixa += "</div>";
                    // FIM DO PANEL MASTER 

                    // limpando caixas_unidade
                    $("#caixa").html("");
                    // insiro na div com ID caixas_unidade no HTML
                    $("#caixa").append(caixa);


                    // fUNÇÃO CHAMADO AO CLICAR NO BOTÃO SALVAR QUE FOI CRIANDO VIA AJAX

                    $("#btn_salvar").on("click", function(){

                        // Limpo as div erro e msg de erro
                        $('.msg_erro_cadastrar').html("");
                        $('.msg_erro_cadastrar').hide();    


                        // Declarando variaveis
                        var cod_funcionario = $("#cod_funcionario").val();
                        var cod_conta = $("#cod_conta").val();
                        var cod_conta_local = $("#cod_conta_local").val();
                        var tipo_caixa = $("#tipo_caixa").val();
                        var array_conta = new Array;
                        var contem_erro = false;
                        var msg_erro = "";

                        /*
                        ###########################################
                        # INICIO VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
                        ###########################################
                        */

                        // Campo preenchido pelo sistema
                        if(cod_funcionario == ""){
                            msg_erro += "- Ocorreu um erro, favor tente novamente <br/>";
                            contem_erro = true;
                        }

                        // Campo preenchido pelo sistema
                        if(cod_conta_local == ""){
                            msg_erro += "- Infome o tipo de caixa <br/>";
                            contem_erro = true;
                        }

                        // Campo preenchido pelo usuário
                        if(tipo_caixa == ""){
                            msg_erro += "- Infome o tipo de caixa <br/>";
                            contem_erro = true;
                        }


                        if(contem_erro == true){

                            // Coloco mensagem dentro da div de erros
                            $('.msg_erro_cadastrar').append('<h4 class="pt-0">Alerta</h4>');
                            $('.msg_erro_cadastrar').append(msg_erro);

                            // Exibo div de erros
                            $('.msg_erro_cadastrar').show();

                            return false;
                            
                        }

                        /*
                        ###########################################
                        # FIM DA VALIDAÇÃO DE CAMPOS OBRIGATORIOS 
                        ###########################################
                       */

                        if(cod_conta != ""){

                            array_conta = [cod_conta_local, cod_conta];
                            // Converto Array para JSON
                            var contas_em_json = JSON.stringify(array_conta, null, 2);

                        } else {

                           array_conta = [cod_conta_local];
                           // Converto Array para JSON
                           var contas_em_json = JSON.stringify(array_conta, null, 2);

                        }
                        


                        // Requisição ajax
                        $.ajax({
                            cache: false,
                            type: "POST",
                            url: "<?php echo url('admin/painel/contas/caixas/cadastrar-caixa'); ?>",
                            data: { 
                                "cod_funcionario": cod_funcionario,
                                "contas_em_json": contas_em_json,
                                "tipo_caixa": tipo_caixa
                                
                            },
                            beforeSend: function() { 

                                // Executa antes do envio
                                $("#btn_salvar").html('processando...');
                                $("#btn_salvar").prop('disabled', true);
                                

                            },
                            success: function(response) {

                                // Convertendo resposta para objeto javascript
                                var response = JSON.parse(response);

                                // Checo retorno
                                if (response.status == 'erro') {

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

                                   
                                     // Mostra mensagem de sucesso
                                    $.toast({
                                        heading: 'Sucesso!',
                                        text: response.sucesso,
                                        showHideTransition: 'fade',
                                        icon: 'success',
                                        position: 'top-right',
                                        hideAfter: 1500, // em milisegundos
                                        allowToastClose: true,
                                        afterHidden: function() {

                                            window.location.replace("<?php  echo url("admin/painel/contas/caixas"); ?>");

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


                    })


                }

            },
            complete: function(response) {

                // Executa ao completar envio

            },
            error: function(response, thrownError) {

                // Faz algo se der erro

            }
        });
        
    });

});

</script>
@stop