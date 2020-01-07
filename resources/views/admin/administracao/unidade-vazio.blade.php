@extends('layouts.administracao.layout')

@section('conteudo')

<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="text-center">
            <i class="fas fa-info-circle" aria-hidden="true"></i> O Administrador precisa cadastrar uma ou mais unidades:<br/>
            <small>Ainda não há - <b> unidades no sistema.</b></small>
          </h3>
        </div>
        <div class="panel-body">
         <h2 class="text-danger">Atenção!</h2> 
         Contate o Adminstrador informando o mesmo que não há unidades na ferramenta!

        </div>
      </div>
    </div>
    
  </div>

</div>

@stop