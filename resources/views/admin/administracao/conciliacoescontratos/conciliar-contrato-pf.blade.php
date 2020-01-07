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
{!! Breadcrumbs::render('conciliacao-conciliar-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Conciliar Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <?php if ($contrato->status_conciliacao == 0) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_vermelho">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Esta conciliação já foi reprovada</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>

                <?php if ($contrato->status_conciliacao == 1) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_verde">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Esta conciliação já foi aprovada</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>

                <?php if ($contrato->status_conciliacao == 2) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Este cadastro está em pré-ativação e aguardando movimentação</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>



                <form id="frm_conciliar_contrato" method="post" action="<?php echo url('admin/painel/conciliacaovendas/conciliar-contrato-pf'); ?>">

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
                                <label class="control-label">Status da conciliação</label> <br />
                                <span class="letra-azul-claro">
                                    <?php 
                                    switch ($contrato->status_conciliacao) {
                                        case 0:
                                            echo '<span class="label label-danger">REPROVADA</span>';
                                        break;

                                        case 1:
                                            echo '<span class="label label-success">APROVADA</span>';
                                        break;

                                        case 2:
                                            echo '<span class="label label-warning">AGUARDANDO</span>';
                                        break;
                                    }
                                    ?>
                                </span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Utilize esta página para alterar o status desta <b>CONCILIAÇÃO</b> dentro do sistema.

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <label class="control-label">Status da conciliação <span class="required-red">*</span></label>
                        <select class="form-control input-sm" name="status_conciliacao" id="status_conciliacao">
                            <option value="">Selecione</option>
                            <option value="1" <?php if (old('status_conciliacao') != '' and old('status_conciliacao') == 1) { ?>selected="selected"<?php } ?>>APROVADA</option>
                            <option value="0" <?php if (old('status_conciliacao') != '' and old('status_conciliacao') == 0) { ?>selected="selected"<?php } ?>>REPROVADA</option>
                        </select>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <label class="control-label">Motivo <span class="required-red"><small><i>(Obrigatório em caso de reprovação)</i></small></span></label>
                        <textarea class="form-control" rows="4" id="motivo_conciliacao_reprovada" name="motivo_conciliacao_reprovada" minlength="5"><?php echo old('motivo_conciliacao_reprovada'); ?></textarea>

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

                        <!-- BOTÃO PARA CONFIRMAR REMOÇÃO -->
                        <button type="submit" id="btn_conciliar_contrato" class="btn btn-md btn-success"><i class="fa fa-check"></i> Confirmar Alteração</button>

                    </div>

                </div>
                <!-- FIM LINHA -->

                </form>

            </div>
        </div>
    </div>

</div>

@stop
