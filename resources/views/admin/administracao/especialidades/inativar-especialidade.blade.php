@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidade | Inativar
@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-inativar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Inativar Especialidade </h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-info"><strong>Especialidade:</strong> {{$especialidade->nome_especialidade}}</h2>
       
          <hr/>

          Você está prestes a efetuar a INATIVAÇÃO desta ESPECIALIDADE. Lembre-se de que automaticamente o mesmo ficará INDISPONÍVEL a todos e a tudo o que está vinculado a ela. 

          <br /><br />

          <form method="POST" action="<?php echo url('admin/painel/especialidades/inativar-especialidade'); ?>" id="form_salas">
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
              
               Deseja realmente INATIVAR esta ESPECIALIDADE?

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

               <input type="hidden" id="cod" name="cod" value="{{Crypt::encrypt($especialidade->cod_especialidade)}}" />

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
