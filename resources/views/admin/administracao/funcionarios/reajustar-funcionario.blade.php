@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Funcionários | Reajustar
@stop

@section('includes_no_head')

<link type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('funcionarios-reajustar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reajustar Valores</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">                    
                    <!-- INICIO DIV DE ERROS DE VALIDAÇÃO -->
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
                    <!-- FIM DIV DE ERROS DE VALIDAÇÃO -->
                </div>
                <!-- FIM LINHA -->
                
 
                        
                <form method="POST" action="<?php echo url('admin/painel/funcionarios/reajustar-funcionario'); ?>">
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin-top: 0px;">Instruções</h4>
                            
                            - Este formulário irá fazer o reajuste do salário do funcionário ativo. <br />
                            
                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->
                
                <br/>
                                
                
                <!--INÍCIO INFORMAÇÕES DE SALÁRIO-->
                
                <div class="col-xs-12"> <!-- INICIO DIV PAGAMENTOS -->

                    <div class="panel panel-default"> <!-- INICIO PANEL PAGAMENTOS -->
                        
                        <div class="panel-heading"><i class="fa fa-hand-holding-usd"></i> Informações de Salário</div>
                        
                        <div class="panel-body">  
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                                
                                <!--INICIO BTN REAJUSTAR SALARIO -->
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-sm-2 pull-right">                                
                                        <div class="form-group">
                                            <label class="control-label">Reajustar</label>
                                            <input class="form-check-input" type="checkbox" name="btn_reajustar_salario" id="btn_reajustar_salario" value="1"  <?php if (old('btn_reajustar_salario') == "1") { echo "checked";} ?> >
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM BTN REAJUSTAR SALARIO -->
                                
                                <!--INICIO PAGAMENTO SALÁRIO-->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Salário Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px">R$ <?php if(!empty($historico_salario->valor_salario)){ echo $historico_salario->valor_salario; }else{ echo "0,00"; }?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <div class="form-group">
                                        <label class="control-label">Novo Salário <span class="required-red">*</span></label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_salario" id="valor_salario" placeholder="Valor em R$ do Salário" <?php if (!empty(old('valor_salario'))) { ?>value="<?php echo old('valor_salario'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>
                                                        
                                <!--FIM PAGAMENTO SALÁRIO-->
                            
                            </div>
                            <!-- FIM LINHA -->
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                                
                                <!--INICIO PAGAMENTO SALÁRIO-->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Insalubridade Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px">R$ <?php if(!empty($historico_salario->valor_insalubridade)){ echo $historico_salario->valor_insalubridade; }else{ echo "0,00"; }?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <div class="form-group">
                                        <label class="control-label">Nova Insalubridade</label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_insalubridade" id="valor_insalubridade" placeholder="Valor em R$ da Insalubridade" <?php if (!empty(old('valor_insalubridade'))) { ?>value="<?php echo old('valor_insalubridade'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>
                                                        
                                <!--FIM PAGAMENTO SALÁRIO-->
                            
                            </div>
                            <!-- FIM LINHA -->    
                                
                            <!-- INICIO LINHA -->
                            <div class="row">
                            
                                <!--INICIO PAGAMENTO INSS-->
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Percentual INSS Atual</label> 
                                        <p><span class="label label-warning" style="font-size:14px"><?php if(!empty($historico_salario->percentual_inss)){ echo $historico_salario->percentual_inss ." %"; }else{ echo "0%"; } ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <!-- LINHA -->								
                                    <label class="control-label valor">Novo Percentual INSS</label>
                                    <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_inss" id="percentual_inss" placeholder="Percentual INSS" <?php if (!empty(old('percentual_inss'))) { ?>value="<?php echo old('percentual_inss'); ?>"<?php } ?> disabled="disabled">
                                            <span class="input-group-addon">
                                                    <label class="control-label">%</label>
                                            </span>
                                    </div>                                    
                                </div>

                                <!--FIM PAGAMENTO INSS-->
                            
                            </div>
                            <!-- FIM LINHA -->
                            
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                            
                                <!--PAGAMENTO IR-->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Percentual IR Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px"><?php if(!empty($historico_salario->percentual_ir)){echo $historico_salario->percentual_ir ." %";}else{ echo "0%"; } ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">
                                    
                                    <label class="control-label">Novo Percentual IR</label>
                                    <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_ir" id="percentual_ir" placeholder="Percentual IR" <?php if (!empty(old('percentual_ir'))) { ?>value="<?php echo old('percentual_ir'); ?>"<?php } ?> disabled="disabled">
                                            <span class="input-group-addon">
                                                    <label class="control-label">%</label>
                                            </span>
                                     </div> 
                                   
                                </div>

                                <!--FIM PAGAMENTO IR-->
                            
                            </div>
                            <!-- FIM LINHA -->
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                            
                                <!--PAGAMENTO VALE TRANSPORTE-->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Percentual Vale Transporte Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px"><?php if(!empty($historico_salario->percentual_vale_transporte)){echo $historico_salario->percentual_vale_transporte ." %";}else{ echo "0%";} ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <label class="control-label">Novo Percentual Vale Transporte</label>
                                    <div class="input-group">
                                        <input type="text" autocomplete="off" class="form-control" name="percentual_vale_transporte" id="percentual_vale_transporte" placeholder="Percentual Vale Transporte" <?php if (!empty(old('percentual_vale_transporte'))) { ?>value="<?php echo old('percentual_vale_transporte'); ?>"<?php } ?> disabled="disabled">
                                        <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                        </span>
                                    </div>
                                </div>

                                <!--FIM PAGAMENTO VALE TRANSPORTE-->
                            
                            </div>
                            <!-- FIM LINHA -->
                            
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                            
                            <!--PAGAMENTO ADIANTAMENTO-->
                            
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Percentual Adiantamento Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px"><?php if(!empty($historico_salario->percentual_adiantamento)){ echo $historico_salario->percentual_adiantamento . " %";}else{ echo "0%";} ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                        <label class="control-label">Novo Percentual Adiantamento</label>
                                        <div class="input-group">
                                            <input type="text" autocomplete="off" class="form-control" name="percentual_adiantamento" id="percentual_adiantamento" placeholder="Percentual Adiantamento" <?php if (!empty(old('percentual_adiantamento'))) { ?>value="<?php echo old('percentual_adiantamento'); ?>"<?php } ?> disabled="disabled">
                                            <span class="input-group-addon">
                                                <label class="control-label">%</label>
                                            </span>
                                        </div>
                                </div>
                            
                            <!--FIM PAGAMENTO ADIANTAMENTO-->
                            
                            </div>
                            <!-- FIM LINHA -->
                            
                            
                            <!-- INICIO LINHA -->
                            <div class="row">
                            
                                <div class="col-xs-12 col-sm-3">                                     
                                    <div class="form-group">
                                        <label class="control-label">Data Início <span class="required-red">*</span></label>
                                        <input type="text" class="form-control datepicker" name="data_inicio_salario" id="data_inicio_salario" placeholder="00/00/0000" autocomplete="off" <?php if (!empty(old('data_inicio_salario'))) { ?>value="<?php echo old('data_inicio_salario'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- FIM LINHA -->

                        </div> <!-- FIM PANEL PAGAMENTOS -->    
                    </div>
                </div> 
                
                <!--INÍCIO INFORMAÇÕES DE TRANSPORTE-->
                
                <div class="col-xs-12"> <!-- INICIO DIV TRANSPORTE -->

                    <div class="panel panel-default"> <!-- INICIO PANEL TRANSPORTE -->
                        <div class="panel-heading"><i class="fa fa-bus"></i> Informações de Transporte</div>
                        
                        <div class="panel-body"> <!--INÍCIO PAGAMENTO TRANSPORTE -->
                            
                            <div class="row"> 
                                
                                <!--INICIO BTN REAJUSTAR TRANSPORTE -->
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-sm-2 pull-right">                                
                                        <div class="form-group">
                                            <label class="control-label">Reajustar</label>
                                            <input class="form-check-input" type="checkbox" name="btn_reajustar_transporte" id="btn_reajustar_transporte" value="1"  <?php if (old('btn_reajustar_transporte') == "1") { echo "checked";} ?> >
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM BTN REAJUSTAR TRANSPORTE -->
                                
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Total Transporte Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px">R$ <?php if(!empty($historico_transporte->valor_transporte)){ echo $historico_transporte->valor_transporte;}else{ echo "0,00";} ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <div class="form-group">
                                        <label class="control-label">Novo Valor Transporte <span class="required-red">*</span></label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_transporte" id="valor_transporte" placeholder="Valor em R$ do Transporte" <?php if (!empty(old('valor_transporte'))) { ?>value="<?php echo old('valor_transporte'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">                                     
                                    <div class="form-group">
                                        <label class="control-label">Data Início <span class="required-red">*</span></label>
                                        <input type="text" class="form-control datepicker" name="data_inicio_transporte" id="data_inicio_transporte" placeholder="00/00/0000" autocomplete="off" <?php if (!empty(old('data_inicio_transporte'))) { ?>value="<?php echo old('data_inicio_transporte'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>

                            </div>     
                            
                        </div> <!-- FIM PANEL PAGAMENTOS TRANSPORTE -->    
                    </div>
                </div> 
                
                <!--INÍCIO INFORMAÇÕES DE TRANSPORTE-->
                
                
                <!--INÍCIO INFORMAÇÕES DE ALIMENTAÇÃO-->
                
                <div class="col-xs-12"> <!-- INICIO DIV ALIMENTAÇÃO -->

                    <div class="panel panel-default"> <!-- INICIO PANEL ALIMENTAÇÃO -->
                        
                        <div class="panel-heading"><i class="fa fa-utensils"></i> Informações de Alimentação</div>
                        
                        <div class="panel-body">
                            
                            <div class="row"> 
                                
                                <!--INICIO BTN REAJUSTAR ALIMENTAÇÃO -->  
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-sm-2 pull-right">                                
                                        <div class="form-group">
                                            <label class="control-label">Reajustar</label>
                                            <input class="form-check-input" type="checkbox" name="btn_reajustar_alimentacao" id="btn_reajustar_alimentacao" value="1"  <?php if (old('btn_reajustar_alimentacao') == "1") { echo "checked";} ?> >
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- FIM BTN REAJUSTAR ALIMENTAÇÃO -->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Total Alimentação Atual</label>
                                        <p><span class="label label-warning" style="font-size:14px">R$ <?php if(!empty($historico_alimentacao->valor_alimentacao)){echo $historico_alimentacao->valor_alimentacao;}else{ echo "0,00";} ?></span></p>
                                    </div>
                                </div>  

                                <div class="col-xs-12 col-sm-3">                                
                                    <div class="form-group">
                                        <label class="control-label">Novo Valor Alimentação <span class="required-red">*</span></label>
                                        <input type="text" autocomplete="off" class="form-control" name="valor_alimentacao" id="valor_alimentacao" placeholder="Valor em R$ do Alimentação " <?php if (!empty(old('valor_alimentacao'))) { ?>value="<?php echo old('valor_alimentacao'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">                                     
                                    <div class="form-group">
                                        <label class="control-label">Data Início <span class="required-red">*</span></label>
                                        <input type="text" class="form-control datepicker" name="data_inicio_alimentacao" id="data_inicio_alimentacao" placeholder="00/00/0000" autocomplete="off" <?php if (!empty(old('data_inicio_alimentacao'))) { ?>value="<?php echo old('data_inicio_alimentacao'); ?>"<?php } ?> disabled="disabled">
                                    </div>
                                </div>


                            </div>  
                        </div> <!-- FIM PANEL ALIMENTAÇÃO -->    
                    </div>
                </div> <!-- FIM DIV ALIMENTAÇÃO -->
                
                <!--INÍCIO INFORMAÇÕES DE ALIMENTAÇÃO-->
                                                

                <!-- INICIO LINHA -->
                <div class="row">
                                
                    <div class="col-md-12 col-xs-12"> 

                        <div class="clearfix"></div>

                        <hr />

                        <div class="col-xs-12">

                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                            <a href="{{ url('admin/painel/funcionarios') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                            
                            <input type="hidden" id="codigo_funcionario_criptografado" name="codigo_funcionario_criptografado" value="<?php echo $codigo_funcionario_criptografado; ?>" />

                        </div>
                        
                    </div>

                </div>
                <!-- FIM LINHA -->
                                                            
                </form>

            </div> 
        </div>
    </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

// Ativa máscara de dinheiro em campos
$('#valor_salario').maskMoney();
$('#valor_transporte').maskMoney();
$('#valor_alimentacao').maskMoney();
$('#valor_insalubridade').maskMoney();

$('#percentual_inss').maskMoney();
$('#percentual_ir').maskMoney();
$('#percentual_transporte').maskMoney();
$('#percentual_adiantamento').maskMoney();
$('#percentual_vale_transporte').maskMoney();


// Ativação de plugin datepicker em campos
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    endDate: '+5y',
    startDate: '0d',
    todayHighlight: true,
    autoclose: true
});

$(document).ready(function () {
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA REAJUSTAR SALARIO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
<?php if(old('btn_reajustar_salario') == 1) { ?> 
    
    $('#valor_salario').prop("disabled", false);
    $('#valor_insalubridade').prop("disabled", false);
    $('#percentual_inss').prop("disabled", false);
    $('#percentual_ir').prop("disabled", false);
    $('#percentual_vale_transporte').prop("disabled", false);
    $('#percentual_adiantamento').prop("disabled", false);
    $('#data_inicio_salario').prop("disabled", false);
    
<?php } ?>
    
<?php if(old('btn_reajustar_transporte') == 1) { ?> 
    
    $('#valor_transporte').prop("disabled", false);
    $('#data_inicio_transporte').prop("disabled", false);
    
<?php } ?>
    
<?php if(old('btn_reajustar_alimentacao') == 1) { ?> 
    
    $('#valor_alimentacao').prop("disabled", false);
    $('#data_inicio_alimentacao').prop("disabled", false);
    
<?php } ?>

    // verificação em check button 
    document.getElementById('btn_reajustar_salario').onclick = function() {

        // is hazard checkbox checked?
        var checkButtonSalario = this.checked; // true or false

            if (checkButtonSalario) { // checkButtonSalario checkbox checked

                $('#valor_salario').prop("disabled", false);
                $('#valor_insalubridade').prop("disabled", false);
                $('#percentual_inss').prop("disabled", false);
                $('#percentual_ir').prop("disabled", false);
                $('#percentual_vale_transporte').prop("disabled", false);
                $('#percentual_adiantamento').prop("disabled", false);
                $('#data_inicio_salario').prop("disabled", false);

            } else { // checkButtonSalario not checked

                $('#valor_salario').prop("disabled", true);
                $('#valor_insalubridade').prop("disabled", true);
                $('#percentual_inss').prop("disabled", true);
                $('#percentual_ir').prop("disabled", true);
                $('#percentual_vale_transporte').prop("disabled", true);
                $('#percentual_adiantamento').prop("disabled", true);
                $('#data_inicio_salario').prop("disabled", true);
            }                
    }

/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA REAJUSTAR TRANSPORTE ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
    // verificação em check button 
    document.getElementById('btn_reajustar_transporte').onclick = function() {

        // is hazard checkbox checked?
        var checkButtonTransporte = this.checked; // true or false

            if (checkButtonTransporte) { // checkButtonTransporte checkbox checked

                $('#valor_transporte').prop("disabled", false);
                $('#data_inicio_transporte').prop("disabled", false);
                

            } else { // checkButtonSalario not checked

                $('#valor_transporte').prop("disabled", true);
                $('#data_inicio_transporte').prop("disabled", true);
                
            }                
    }
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA REAJUSTAR ALIMENTAÇÃO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
    // verificação em check button 
    document.getElementById('btn_reajustar_alimentacao').onclick = function() {

        // is hazard checkbox checked?
        var checkButtonAlimentacao = this.checked; // true or false

            if (checkButtonAlimentacao) { // checkButtonAlimentacao checkbox checked

                $('#valor_alimentacao').prop("disabled", false);
                $('#data_inicio_alimentacao').prop("disabled", false);

            } else { // checkButtonSalario not checked

                $('#valor_alimentacao').prop("disabled", true);
                $('#data_inicio_alimentacao').prop("disabled", true);
            }                
    }    
});    
    
</script>

@stop