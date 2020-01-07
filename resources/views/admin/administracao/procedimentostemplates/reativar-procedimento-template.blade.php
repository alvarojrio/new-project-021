@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Salas de Espera | Cadastrar
@stop

@section('conteudo')

<div class="page-title">
  <div class="title_left">
    <h3>Reativar Procedimento template </h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-danger">Este procedimento encontra-se inativo!</h2>
          <p>O campo MOTIVO deve conter no mínimo <span class="required-red">10 caracteres</span> ! </p>
          Caso deseje efetuar a <strong class="green"> ATIVAÇÃO </strong> deste PROCEDIMENTO informe um motivo e pressione o botão SIM. 
          
          <br /><br />  
          <hr/>
          
          <h2 class="text-info"><strong>Código:</strong> <?php echo $procedimento_template->codigo; ?>.</h2>
          <h4 class="text-info"><strong>Descrição:</strong> <span class="red"><?php echo $procedimento_template->descricao; ?></span></h4>

          <hr/>
          
          <form method="POST" action="<?php echo url('admin/painel/procedimentostemplates/reativar-procedimento-template'); ?>" enctype="multipart/form-data">
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
                <label class="control-label">Motivo da reativação <span class="required-red">*</span></label>
              </div>
              <div class="form-group">
                  <textarea class="form-control" rows="4" id="motivo" name="motivo" minlength="10" required></textarea>
              </div>
              
               Deseja realmente <strong class="green"> REATIVAR </strong> este PROCEDIMENTO?

               <br /><br />

               <!-- BOTÃO SIM -->
               <div class="pull-left">

                 <button id="sim" type="submit" class="btn btn-primary btn-lg">
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

               <input type="hidden" id="codigo_procedimento_template" name="codigo_procedimento_template" value="<?php echo Crypt::encrypt($procedimento_template->cod_procedimento_template); ?>" />

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
