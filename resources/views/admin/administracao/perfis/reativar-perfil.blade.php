@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfis de Usuário | Reativar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('perfis-reativar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reativar Perfil de Usuário</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form id="frm_reativar" method="post" action="<?php echo url('admin/painel/perfis/reativar-perfil'); ?>">

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-12 col-xs-12">
                                <label class="control-label">Nome</label> <br />
                                <span class="letra-azul-claro"><?php echo $perfil->display_name; ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Tem certeza que realmente deseja <b>REATIVAR</b> este perfil de usuário?

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <input type="hidden" id="cod_perfil" name="cod_perfil" value="<?php echo \Crypt::encrypt($perfil->id); ?>" /> 
                        
                        <!-- BOTÃO RETORNAR -->
                        <a class="btn btn-md btn-danger" id="btn_retornar" href="<?php echo url('admin/painel/perfis'); ?>">
                            <i class="fa fa-arrow-circle-left"></i> Voltar
                        </a>

                        <!-- BOTÃO PARA CONFIRMAR REATIVAÇÃO -->
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
