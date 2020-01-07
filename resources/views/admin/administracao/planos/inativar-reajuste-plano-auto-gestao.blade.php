@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Reajuste
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('convenios-inativar-plano-ans', $plano) !!}

<div class="page-title">
  <div class="title_left">
    <h3>Inativar Reajuste Plano Auto Gestão </h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-info"><strong>Plano:</strong> <?php echo $plano->nome_plano; ?></h2>       
          <hr/>
          Você está prestes a efetuar a INATIVAÇÃO do REAJUSTE. Lembre-se de criar outra regra reajuste. 
          <br /><br />
          
          <form method="POST" action="<?php echo url('admin/painel/planos/inativar-reajuste-plano-auto-gestao'); ?>">
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
                <textarea class="form-control" rows="4" id="motivo" name="motivo"></textarea>
              </div>
              
               Deseja realmente INATIVAR este PLANO AUTO GESTÃO ?

               <br /><br />

               <!-- BOTÃO SIM -->
               <div class="pull-left">

                 <button id="sim" type="submit" class="btn btn-success btn-lg">
                   <i class="fas fa-check"></i> Sim
                 </button>

               </div>       

               <!-- BOTÃO NÃO -->
               <div class="pull-left">

                 <button id="nao" type="button" class="btn btn-danger btn-lg" onclick="window.location.replace('<?php echo URL::previous(); ?>');">
                   <i class="fas fa-times"></i> NãO
                 </button>

               </div>

               <div class="limpar_float"></div>  

               <br /><br />

               <input type="hidden" id="cod_plano" name="cod_plano" value="<?php echo Crypt::encrypt($plano->cod_plano); ?>" />

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('includes_no_body')

@stop
