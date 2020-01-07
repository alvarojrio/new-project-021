@extends('layouts.administracao.layout')

@section('conteudo')

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fas fa-lock" aria-hidden="true"></i> Área Restrita:<br/>
            <small>Você não possui - <b> acesso a esta seção do sistema.</b></small>
          </h3>
        </div>
        <div class="panel-body">
         <h2 class="text-danger">Atenção!</h2> 
          Se ainda houver dúvidas, entre em contato com o Administrador para mais informações.

          <br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel'); ?>');">
            <i class="fas fa-undo" aria-hidden="true"></i> Ir para página principal
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop