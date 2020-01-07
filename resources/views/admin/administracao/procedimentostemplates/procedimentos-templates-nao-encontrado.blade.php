@extends('layouts.administracao.layout')

@section('conteudo')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Procedimento Template não encontrado:<br/>
            <small>O Procedimento Template que você procura não pode ser - <b> localizado.</b></small>
          </h3>
        </div>
        <div class="panel-body">
          <p>
          <h2 class="text-danger">Atenção!</h2> 
          Volte a listagem de Procedimento Template e tente novamente!

          <br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/tabelas/cadastrar'); ?>');">
            <i class="fa fa-undo" aria-hidden="true"></i> Listagem de Procedimentos Templates
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop