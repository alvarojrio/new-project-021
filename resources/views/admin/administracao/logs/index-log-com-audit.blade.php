@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

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

        <ul>
            
            @forelse ($audits as $audit)

            <li>
                <?php echo trans('plano.' . $audit->event . '.metadata', $audit->getMetadata()); ?>

                <?php foreach ($audit->getModified() as $attribute => $modified) : ?>
                <ul>
                    <li>
                        <?php
                        // Função trans(caminho para arquivo de idioma, array de valores para serem usados nos placeholders) 
                        echo trans('plano.' . $audit->event . '.modified.' . $attribute, $modified); ?>
                    </li>
                </ul>
                <?php endforeach ?>
            </li><br /><br />

            @empty

            <p>@lang('plano.unavailable_audits')</p>

            @endforelse

        </ul>

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