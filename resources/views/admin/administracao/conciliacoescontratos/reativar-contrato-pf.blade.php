@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Conciliações | Contratos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('conciliacao-reativar-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reativar Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form id="frm_cancelar_contrato" method="post" action="<?php echo url('admin/painel/conciliacaovendas/reativar-contrato-pf'); ?>">

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-4 col-xs-12">
                                <label class="control-label">Nº do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pf; ?></span>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label class="control-label">Data de inclusão do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_inclusao)); ?></span>
                            </div>

                            <div class="form-group col-md-4 col-xs-12">
                                <label class="control-label">Data de cancelamento do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_cancelamento_contrato)); ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Tem certeza que realmente deseja <b>REATIVAR</b> este contrato?

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <input type="hidden" id="cod_contrato_pessoa_fisica_plano" name="cod_contrato_pessoa_fisica_plano" value="<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>" /> 
                        
                        <!-- BOTÃO RETORNAR -->
                        <a class="btn btn-md btn-danger" id="btn_retornar" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                            <i class="fa fa-arrow-circle-left"></i> Voltar
                        </a>

                        <!-- BOTÃO PARA CONFIRMAR REATIVAÇÂO -->
                        <button type="submit" id="btn_reativar_contrato" class="btn btn-md btn-success"><i class="fa fa-check"></i> Confirmar Reativação</button>

                    </div>

                </div>
                <!-- FIM LINHA -->

                </form>

            </div>
        </div>
    </div>

</div>

@stop
