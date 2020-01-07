@extends('layouts.administracao.layout')

@section('conteudo')
<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Bandeira não encontrada:<br/>
            <small>A Bandeira que você procura não pode ser - <b> localizada.</b></small>
          </h3>
        </div>
        <div class="panel-body">
          <p>
          <h2 class="text-danger">Atenção!</h2> 
          Volte a listagem de bandeiras e tente novamente!

          <br /><br /> 

          <button id="listar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/bandeiras/'); ?>');">
            <i class="fa fa-undo" aria-hidden="true"></i> Listagem de Bandeiras
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop