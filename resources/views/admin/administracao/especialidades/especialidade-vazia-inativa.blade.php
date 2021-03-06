@extends('layouts.administracao.layout')

@section('conteudo')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fas fa-info-circle" aria-hidden="true"></i> Cadastre uma Especialidade:<br/>
            <small>Ainda não há - <b> especialidades no sistema.</b></small>
          </h3>
        </div>
        <div class="panel-body">
         <h2 class="text-danger">Atenção!</h2> 
          Clique no botão abaixo e efetue o cadastro de uma especialidade!

          <br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/especialidades/cadastrar-especialidade'); ?>');">
            <i class="fas fa-undo" aria-hidden="true"></i> Cadastrar especialidade
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop