@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Salas de Espera | Cadastrar
@stop

@section('conteudo')

<div class="page-title">
  <div class="title_left">
    <h3>Inativar Procedimento Template </h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-info"><strong>Nome do Procedimento:</strong> <?php echo $procedimento_template->descricao; ?></h2>
       
          <hr/>

          Você está prestes a efetuar a INATIVAÇÃO deste procedimento. Lembre-se de que automaticamente a mesma ficará INDISPONÍVEL a todos e a tudo o que está vinculado a ele. 

          <br /><br />

          
          
          <form method="POST" action="<?php echo url('admin/painel/procedimentostemplates/inativar-procedimento-template'); ?>" enctype="multipart/form-data" id="form_salas">
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
              
               Deseja realmente INATIVAR este PROCEDIMENTO?

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

               <input type="hidden" id="cod_procedimento_template" name="cod_procedimento_template" value="<?php echo $codigo_procedimento_template; ?>" />

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