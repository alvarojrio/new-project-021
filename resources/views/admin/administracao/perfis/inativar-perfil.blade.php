@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfis de Usuário | Inativar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('perfis-inativar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Inativar Perfil de Usuário</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <h2 class="text-info"><strong>Perfil:</strong> <?php echo $perfil->display_name; ?></h2>       
                <hr/>
                <form id="frm_inativar" method="post" action="<?php echo url('admin/painel/perfis/inativar-perfil'); ?>">
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
                    <div class="col--4 col-xs-12">
                        <div class="form-group">
                          <label class="control-label">Motivo da inativação <span class="required-red">*</span></label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" id="motivo" name="motivo" minlength="10" required></textarea>
                        </div>

                         Tem certeza que realmente deseja <b>INATIVAR</b> este perfil de usuário?

                         <br /><br />

                         <!-- BOTÃO SIM -->
                         <div class="pull-left">

                           <button id="sim" type="submit" class="btn btn-success btn-lg">
                             <i class="fa fa-check"></i> Sim
                           </button>

                         </div>       

                         <!-- BOTÃO NÃO -->
                         <div class="pull-left">

                           <button id="nao" type="button" class="btn btn-danger btn-lg" onclick="window.location.replace('<?php echo URL::previous(); ?>');">
                             <i class="fa fa-times"></i> Não
                           </button>

                         </div>

                         <div class="limpar_float"></div>  

                         <br /><br />

                         <input type="hidden" id="cod_perfil" name="cod_perfil" value="<?php echo \Crypt::encrypt($perfil->id); ?>" /> 

                    </div>    
                   
                </form>

            </div>
        </div>
    </div>

</div>

@stop
