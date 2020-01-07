@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Reativar Pessoa Jurídica | Cadastrar
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-reativar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Reativar Pessoa Jurídica </h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
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
          
          <h2 class="text-danger"> Esta PESSOA JURÍDICA encontra-se inativa!</h2>
          <p>O campo MOTIVO deve conter no mínimo <span class="required-red">10 caracteres</span> ! </p>
          <p>Caso deseje efetuar a <strong class="green"> ATIVAÇÃO </strong> desta PESSOA JURÍDICA informe um motivo e pressione o botão SIM.</p> 
          <br />  
          <small><span class="text-danger">NOTA:</span> É importante ressaltar que será necessário vincular a mesma a um novo plano.</small>
          <br /><br />  
          <hr/>
          
          <h2 class="text-info"><strong>Nome fantasia:</strong> <?php echo $pj->nome; ?>.</h2>
          <h4 class="text-info"><strong>CPF:</strong> <span class="red"><?php echo $pj->cpf; ?></span></h4>

          <hr/>
          
          <form method="POST" action="<?php echo url(app('prefixo') . '/painel/pessoajuridica/reativar'); ?>" enctype="multipart/form-data">
            <div class="col--4 col-xs-12">
              <div class="form-group">
                <label class="control-label">Motivo da reativação <span class="required-red">*</span></label>
              </div>
              <div class="form-group">
                  <textarea class="form-control" rows="4" id="motivo" name="motivo" minlength="10" required></textarea>
              </div>
              
               Deseja realmente <strong class="green"> REATIVAR </strong> esta PESSOA JURÍDICA?

               <br /><br />

               <!-- BOTÃO SIM -->
               <div class="pull-left">

                 <button id="sim" type="submit" class="btn btn-primary btn-lg">
                   <i class="fas fa-check"></i> Sim
                 </button>

               </div>       

               <!-- BOTÃO NÃO -->
               <div class="pull-left">

                 <button id="nao" type="button" class="btn btn-danger btn-lg" onclick="window.location.replace('<?php echo URL::previous(); ?>');">
                   <i class="fas fa-times"></i> Não
                 </button>

               </div>

               <div class="limpar_float"></div>  

               <br /><br />

               <input type="hidden" id="codigo_pessoa_juridica" name="codigo_pessoa_juridica" value="<?php echo Crypt::encrypt($pj->cod_pessoa_juridica); ?>" />

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
