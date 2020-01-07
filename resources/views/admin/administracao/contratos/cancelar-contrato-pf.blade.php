@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contratos | Cancelar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-fisica-cancelar-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cancelar Contrato Pessoa Física</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form id="frm_cancelar_contrato" method="post" action="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/cancelar'); ?>">

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nº do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pf; ?></span>
                            </div>

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Data de inclusão do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_inclusao)); ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Tem certeza que realmente deseja <b>CANCELAR</b> este contrato?

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <label class="control-label">Motivo <span class="required-red">*</span></label>
                        <select class="form-control input-sm" name="motivo_cancelamento" id="motivo_cancelamento">
                            <option value="">Selecione</option>
                            <option value="1">Outros</option>
                            <option value="2">Insatisfação com o SAC</option>
                            <option value="3">Dificuldade Financeira</option>
                            <option value="4">Descontentamento com o atendimento</option>
                            <option value="5">Especialidade não disponível nas unidades</option>
                            <option value="6">Descontentamento com o médico</option>
                            <option value="7">Difícil acesso</option>
                            <option value="8">Infraestrutura da clínica</option>
                            <option value="9">Mudança</option>
                            <option value="10">Óbito</option>
                        </select>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <label class="control-label">Detalhamento do Motivo</label>
                        <textarea class="form-control" rows="4" id="descricao_motivo_cancelamento" name="descricao_motivo_cancelamento" minlength="5"></textarea>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <input type="hidden" id="cod_contrato_pessoa_fisica_plano" name="cod_contrato_pessoa_fisica_plano" value="<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>" /> 

                        <!-- BOTÃO PARA CONFIRMAR CANCELAMENTO -->
                        <button type="submit" id="btn_cancelar_contrato" class="btn btn-md btn-success pull-right"><i class="fa fa-times"></i> Confirmar Cancelamento</button>

                        <!-- BOTÃO RETORNAR -->
                        <a class="btn btn-md btn-danger pull-right" id="btn_retornar" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/visualizar/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                            <i class="fa fa-arrow-circle-left"></i> Voltar
                        </a> 

                    </div>

                </div>
                <!-- FIM LINHA -->

                </form>

            </div>
        </div>
    </div>

</div>

@stop
