@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Reajustar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-visualizar-plano-ans', $plano) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reajustar Plano Auto Gestão</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2 class="text-info"><strong>Plano:</strong> <?php echo $plano->nome_plano; ?> </h2>
                        <hr/>
                    </div>    
                </div> 
                <form method="POST" action="<?php echo url('admin/painel/planos/reajustar-plano-auto-gestao');?>">    
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Valor individual atual</label>
                                        <input type="text" class="form-control" disabled="disabled" value="<?php echo number_format($plano->valor_mensal_individual, 2, ',', '.');?>">
                                    </div>
                                </div> 

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Valor grupo atual</label>
                                        <input type="text" class="form-control" disabled="disabled" value="<?php echo number_format($plano->valor_mensal_grupo, 2, ',', '.');?>">
                                    </div>
                                </div>
                            </div>    
                        </div>

                       <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Tipo de reajuste<span class="required-red"> * </span></label>
                                        <select class="form-control" name="tipo_reajuste" id="tipo_reajuste" required="required">
                                            <option value="1">Imediato com mais de 12 meses</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Data inicio <span class="required-red"> * </span></label>
                                        <input type="text" class="form-control" name="data_inicio" id="data_inicio" placeholder="00/00/0000" value="{{old('data_inicio')}}" autocomplete="off" required="required" />
                                    </div>
                                </div> 

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Valor mensal individual <span class="required-red"> * </span></label>
                                        <input type="text" class="form-control" name="valor_mensal_individual" id="valor_mensal_individual" placeholder="R$ 00,00" value="{{old('valor_mensal_individual')}}" autocomplete="off" required="required" />
                                    </div>
                                </div> 

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label class="control-label">Valor mensal grupo <span class="required-red"> * </span></label>
                                        <input type="text" class="form-control" name="valor_mensal_grupo" id="valor_mensal_grupo" placeholder="R$ 00,00" value="{{old('valor_mensal_grupo')}}" autocomplete="off" required="required" />
                                    </div>
                                </div>
                            </div>
                       </div>   
                    </div>  

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="radio" class="hidden" name="tipo_valor" id="tipo_valor" value="1" checked="checked"/> <!-- 1 = R$ -->
                            <input type="radio" class="hidden" name="tipo_valor" id="tipo_valor" value="2"/>  <!-- 2 = % -->
                            <input type="hidden" name="cod_plano" id="cod_plano" value="<?php echo Crypt::encrypt($plano->cod_plano)?>"/>
                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                            <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                        </div>
                    </div>    
                </form>
                
                <div class="x_content">
                    <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <hr/>
                            <h2 class="text-blue"> <strong>Histórico de reajuste</strong></h2>
                            <hr/>
                         </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if(count($reajustes) > 0){ ?>
                            <div class="x_panel">
                                <div class="clearfix"></div>
                                <br/>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tabela">
                                        <thead>
                                             <tr>
                                                <th>Status</th>
                                                <th>Tipo de Reajuste</th>
                                                <th>Data inicio</th>
                                                <th>Data fim</th>
                                                <th>Valor Individual</th>
                                                <th>Valor Grupo</th>
                                                <?php if($permissoes->TemPermissao("Excluir_Reajuste") === true) { ?>
                                                    <th>&nbsp;</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>   
                                <?php   foreach ($reajustes as $reajuste): ?>
                                        <tbody>   
                                            <tr>
                                                
                                                <!-- Status -->
                                                <td>
                                                    <?php if($reajuste->status == 0){ ?>
                                                            <span class="label label-danger" style="font-size:14px">Inativo</span>
                                                    <?php }else if($reajuste->status == 1){ ?>
                                                            <span class="label label-success" style="font-size:14px">Ativo</span>
                                                    <?php } ?>
                                                </td>
                                                <!-- Fim de Status -->
                                                
                                                <!-- Tipo reajuste -->
                                                <td>
                                                    <?php if($reajuste->tipo_reajuste == 0){ ?>
                                                            <span class="label" style="font-size:14px">Inativo</span>
                                                    <?php }else if($reajuste->tipo_reajuste == 1){ ?>
                                                            <span style="font-size:14px">Imediato para contratos com mais de 12 meses sem reajuste</span>
                                                    <?php } ?>
                                                </td>
                                                <!-- Fim tipo reajuste -->
                                                
                                                <!-- Data inicio -->
                                                <td><?php echo date('d/m/Y', strtotime(str_replace('-', '/',  $reajuste->data_inicio))); ?></td>
                                                <!-- Fim data inicio -->
                                                
                                                <!-- Data fim -->
                                                <td><?php if($reajuste->data_fim != ""){ echo date('d/m/Y', strtotime(str_replace('-', '/',  $reajuste->data_fim)));}else{echo "-";} ?></td>
                                                <!-- Fim data fim -->
                                                
                                                <!-- Valor mensal individual -->
                                                <td><?php echo number_format($reajuste->valor_mensal_individual, 2, ',', '.'); ?></td>
                                                <!-- Fim valor mensal individual -->
                                                
                                                <!-- Valor mensal grupo -->
                                                <td><?php echo number_format($reajuste->valor_mensal_grupo, 2, ',', '.'); ?></td>
                                                <!-- Fim valor mensal grupo -->
                                                
                                                <?php if($permissoes->TemPermissao("Excluir_Reajuste") === true) {?>
                                                
                                                <!-- Inativar reajuste -->
                                                <td class="text-center col-xs">
                                                    <?php if($reajuste->status == 0 OR $reajuste->data_inicio < date('Y-m-d')){ ?>
                                                             -
                                                    <?php }else if($reajuste->status == 1){ ?>
                                                            <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/planos/inativar-reajuste-plano-auto-gestao/'. Crypt::encrypt($plano->cod_plano))}}">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                    <?php } ?>
                                                </td>
                                                <!-- Fim inativar reajuste -->
                                                <?php } ?>
                                           </tr>
                                        </tbody>   
                                <?php   endforeach;?>           
                                   </table>
                                </div>     
                            </div>
                            <?php }else{ echo "<div class='alert'>Nenhum reajuste cadastrado.</div>"; } ?>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div> 

@stop


@section('includes_no_body')
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>

<script type="text/javascript">

// função para controlar data minima e maxima
$(function() {
   $("#data_inicio").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    startDate: '1d',
    language: 'pt-BR'   
   });
});

// função para permitir apenas caracter informado no regex
$("#valor_mensal_individual").on("input", function(){
  var regexp = /[^0-9.]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// função para permitir apenas caracter informado no regex
$("#valor_mensal_grupo").on("input", function(){
  var regexp = /[^0-9.]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

// Ativa máscara de dinheiro em campos
$('#valor_mensal_individual').maskMoney();
$('#valor_mensal_grupo').maskMoney();

</script>
@stop
