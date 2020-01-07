@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabela | Cadastrar
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-reativar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Reativar Tabela </h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">

        <div class="row">
          
          <h2 class="text-danger">Esta Tabela encontra-se inativa!</h2>
          <p>O campo MOTIVO deve conter no mínimo <span class="required-red">10 caracteres</span> ! </p>
          Caso deseje efetuar a <strong class="green"> ATIVAÇÃO </strong> desta TABELA informe um motivo e pressione o botão SIM. 
         
          <br /><br />  
          <hr/>
          
          <strong>Nome:</strong> <span class="text-primary"><?php echo $tabela->nome_tabela; ?></span> <br />
          <strong>Data Inicial:</strong> <span class="text-primary"><?php echo date('d/m/Y', strtotime($tabela->data_inicial)); ?></span>

          <hr />
          
          <form method="POST" action="<?php echo url('admin/painel/tabelas/reativar-tabela'); ?>">
            
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
              
               Deseja realmente <strong class="green"> REATIVAR </strong> esta TABELA?

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

               <input type="hidden" id="codigo_tabela" name="codigo_tabela" value="<?php echo Crypt::encrypt($tabela->cod_tabela); ?>" />

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