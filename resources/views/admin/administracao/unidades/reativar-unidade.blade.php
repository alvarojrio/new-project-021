@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Unidades | Reativar
@stop

@section('conteudo')

{!! Breadcrumbs::render('unidades-reativar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Reativar Unidade </h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-danger">Esta unidade encontra-se inativa!</h2>
          <p>O campo MOTIVO deve conter no mínimo <span class="required-red">10 caracteres</span> ! </p>
          Caso deseje efetuar a <strong class="green"> ATIVAÇÃO </strong> desta UNIDADE informe um motivo e pressione o botão SIM. 
          <br />  
          
          <br /><br />  
          <hr/>
          
          <h2 class="text-info"><strong>Nome:</strong> <?php echo $unidade->nome_unidade; ?>.</h2>
          <h4 class="text-info">
              <strong>CNPJ:</strong> 
              <span class="red">
                <?php  
                    $parte_um = substr($unidade->cnpj,0,2);
                    $parte_dois = substr($unidade->cnpj,2,3);
                    $parte_tres = substr($unidade->cnpj,5,3);
                    $parte_quatro = substr($unidade->cnpj,8,4);
                    $parte_cinco = substr($unidade->cnpj,12,2);
                    echo $monta_cnpj = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
                ?>    
              </span>
          </h4>

          <hr/>
          
          <form method="POST" action="<?php echo url('admin/painel/unidades/reativar-unidade'); ?>" enctype="multipart/form-data">
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
              
               Deseja realmente <strong class="green"> REATIVAR </strong> esta UNIDADE?

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

               <input type="hidden" id="cod_unidade" name="cod_unidade" value="{{$unidade->cod_unidade}}" />

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
