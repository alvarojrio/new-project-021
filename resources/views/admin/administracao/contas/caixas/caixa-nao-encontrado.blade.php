@extends('layouts.administracao.layout')

@section('conteudo')

<div class="container">
    
  <div class="row">
      
    <div class="col-md-2"></div>
    
    
    <div class="col-md-8">
        
      <div class="panel panel-info">
          
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fas fa-info-circle" aria-hidden="true"></i> Caixa não encontrado:<br/>
            <small>O Caixa que você procura não pode ser - <b> localizada.</b></small>
          </h3>
        </div>
        <div class="panel-body">
          <p>
          <h2 class="text-danger">Atenção!</h2> 
          <p>Volte a listagem de caixas e tente novamente!</p>

          <br /><br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/contas/caixas'); ?>');">
            <i class="fas fa-undo" aria-hidden="true"></i> Listagem de Caixas
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop

