@extends('layouts.administracao.layout')

@section('conteudo')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Ainda não há registros de logs<br/>
            <small>Aguarde até que <b> os usuários realizem ações e gerem registros de logs no sistema.</b></small>
          </h3>
        </div>
        <div class="panel-body">
         <h2 class="text-danger">Atenção!</h2> 
          Volte para a página inicial!

          <br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/'); ?>');">
            <i class="fa fa-undo" aria-hidden="true"></i> Voltar
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop