@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Logs
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@stop

<?php

use drclub\Biblioteca\FuncoesGlobais;

?>

@section('conteudo')
{!! Breadcrumbs::render('logs') !!}
<div class="page-title">
  <div class="title_left">
    <h3>Listagem de Logs</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
         <div class="clearfix"></div>        
         <h4 class="text-dark-blue"><i class="fab fa-medrt"></i> Total de: <strong class="text-success"><?php echo $total_logs; ?></strong><span class="text-dark-blue"> registros.</span></h4>
        <hr/>
        
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Mensagem</th>                
                <th>Cadastrado em</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($logs as $log)
              <tr>
                  <td>
                      <?php          
                        $log_nl2br  = nl2br($log->mensagem);                        
                        echo FuncoesGlobais::resumirTexto($log_nl2br,250); 
                      ?>
                  </td>                
                  <td style="width: 145px;"><?php echo date('d/m/Y H:i:s',strtotime($log->created_at)); ?></td>
                  <td class="text-center col-xs">
                      <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="<?php echo url('admin/painel/logs/visualizar-log/'.Crypt::encrypt($log->cod_log)); ?>">
                        <i class="fa fa-search"></i>
                      </a>
                    </td>    
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('includes_no_body')
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
  $(".tabela").DataTable({
      "language": {
      "lengthMenu": "Mostrar _MENU_ itens por página",
              "zeroRecords": "Nenhum resultado encontrado",
              "info": "Mostrando página _PAGE_ de _PAGES_",
              "infoEmpty": "Nenhum resultado disponível",
              "infoFiltered": "(filtrado de _MAX_ itens ao total)",
              "sSearch": "Buscar:",
              "oPaginate": {
              "sPrevious": "Anterior",
                      "sNext": "Próxima"
              }
      },
      order: [[ 1, "desc" ]]
  });
</script>
@stop