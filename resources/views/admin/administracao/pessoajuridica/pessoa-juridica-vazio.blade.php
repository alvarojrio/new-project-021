@extends('layouts.administracao.layout')

@section('conteudo')

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fa fa-info-circle" aria-hidden="true"></i> Cadastre uma pessoa jurídica:<br/>
            <small>Ainda não há registros de - <b>pessoas jurídicas no sistema</b>.</small>
          </h3>
        </div>
        <div class="panel-body">
         <h2 class="text-danger">Atenção!</h2> 
          Caso haja necessidade, clique no botão abaixo e efetue o cadastro de uma pessoa jurídica!

          <br /><br /> 

          <button id="enviar" type="submit" tabindex="1" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to(app('prefixo') . '/painel/clientes/pessoajuridica/cadastrar'); ?>');">
            <i class="fa fa-undo" aria-hidden="true"></i> Cadastrar Pessoa Jurídica
          </button>

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop