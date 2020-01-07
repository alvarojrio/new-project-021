@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Reativar
@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-reativar-plano-ans', $plano) !!}

<div class="page-title">
  <div class="title_left">
    <h3>Reativar Plano ANS </h3>
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
          Você está prestes a efetuar a REATIVAÇÃO deste PLANO ANS. Lembre-se de que automaticamente o mesmo ficará DISPONÍVEL. 
          <br /><br />
          
          <form method="POST" action="<?php echo url('admin/painel/planos/reativar-plano-ans'); ?>" enctype="multipart/form-data">
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
                <label class="control-label">Motivo da Reativação <span class="required-red">*</span></label>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="4" id="motivo" name="motivo"></textarea>
              </div>
              
               Deseja realmente REATIVAR este PLANO ANS?

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
                   <i class="fas fa-times"></i> Não
                 </button>

               </div>

               <div class="limpar_float"></div>  

               <br /><br />

               <input type="hidden" id="cod_plano" name="cod_plano" value="<?php echo $codigo_plano; ?>" />

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
