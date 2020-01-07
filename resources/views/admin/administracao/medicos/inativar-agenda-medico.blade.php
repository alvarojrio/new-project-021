@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos | Inativar
@stop

@section('conteudo')

{!! Breadcrumbs::render('medicos-inativar') !!}

<div class="page-title">
  <div class="title_left">
      <h3>Inativar Hórario da Agenda</h3>
      <ul class="list-group">
        <li class="list-group-item">
            Dia: 
                <?php 
                    switch($horario_agenda->dia):
                        
                        case 1: echo "Domingo "; break;
                        case 2: echo "Segunda "; break;
                        case 3: echo "Tarça "; break;
                        case 4: echo "Quarta "; break;
                        case 5: echo "Quinta "; break;
                        case 6: echo "Sexta "; break;
                        case 7: echo "Sábado "; break;
                        
                    endswitch; 
                    
                    echo $horario_agenda->periodo;
                    
                ?>,
            Entrada: <?php echo $horario_agenda->horario_entrada; ?>,
            Saída: <?php echo $horario_agenda->horario_saida; ?>
        </li>
      </ul>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          
          <h2 class="text-info"><strong>Nome do Médico:</strong> <?php echo $horario_agenda->agendas->medicos->pessoa->nome; ?></h2>
       
          <hr/>

          Você está prestes a efetuar a INATIVAÇÃO deste HÓRARIO. Lembre-se de que automaticamente o mesmo ficará INDISPONÍVEL a todos e a tudo o que está vinculado a ele. 

          <br /><br />

          <form method="POST" action="<?php echo url('admin/painel/medico/inativar-horario-agenda-medico'); ?>" enctype="multipart/form-data" id="form_salas">
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
              
               Deseja realmente INATIVAR este HÓRARIO?

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

               <input type="hidden" id="cod_horario_agenda" name="cod_horario_agenda" value="{{Crypt::encrypt($horario_agenda->cod_horario_agenda)}}" />

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
