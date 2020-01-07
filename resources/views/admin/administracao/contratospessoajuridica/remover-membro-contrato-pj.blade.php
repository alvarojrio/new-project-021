@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contratos | Remover Membro
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-remover-membro-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Remover Membro do Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form id="frm_remover_membro" method="post" action="<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/remover-membro'); ?>">

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">
                            
                            <div class="form-group col-md-3 col-xs-12">
                                <label class="control-label">CPF</label> <br />
                                <span class="letra-azul-claro"><?php echo $cliente->pessoa->cpf; ?></span>
                            </div>

                            <div class="form-group col-md-3 col-xs-12">
                                <label class="control-label">Nome</label> <br />
                                <span class="letra-azul-claro"><?php echo $cliente->pessoa->nome; ?></span>
                            </div>

                            <div class="form-group col-md-3 col-xs-12">
                                <label class="control-label">Nº do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pj; ?></span>
                            </div>

                            <div class="form-group col-md-3 col-xs-12">
                                <label class="control-label">Data de inclusão no contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($membro->data_inicio)); ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Tem certeza que realmente deseja <b>REMOVER</b> este membro do contrato?

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <input type="hidden" id="cod_pjc" name="cod_pjc" value="<?php echo $id_membro; ?>" /> 
                        
                        <!-- BOTÃO RETORNAR -->
                        <a class="btn btn-md btn-danger" id="btn_retornar" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/gerenciar-membros/' . Crypt::encrypt($contrato->cod_contrato_pessoa_juridica_plano)); ?>">
                            <i class="fa fa-arrow-circle-left"></i> Voltar
                        </a> 

                        <!-- BOTÃO PARA CONFIRMAR REMOÇÃO -->
                        <button type="submit" id="btn_remover_membro" class="btn btn-md btn-success"><i class="fa fa-times"></i> Confirmar Remoção</button>

                    </div>

                </div>
                <!-- FIM LINHA -->

                </form>

            </div>
        </div>
    </div>

</div>

@stop
