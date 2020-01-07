@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')

{!! Breadcrumbs::render('medicos') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Médicos</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">

      <a class="btn btn-primary" href="{{ url('admin/painel/medicos/cadastrar-medico') }}"><i class="fa fa-plus"></i> Cadastrar Novo Médico</a>
      
      <br /><br />

      <div class="clearfix"></div>
      
        <div class="table-responsive">
          <table class="table table-striped table-bordered tabela">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Conselho</th>
                <th style="width: 77px">Nº consenho</th>
                <th>E-mail</th>
                <th style="width: 77px">Telefone</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>

              @foreach($medicos as $medico)
                <td>{{ $medico->nome }}</td>
                <td>{{ $medico->nome_conselho }}</td>
                <td>{{ $medico->numero_conselho }}</td>
                <td>{{ $medico->email }}</td>
                <td>{{ $medico->celular }}</td>
                
                
                <td class="text-center col-xs">

                    <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/medicos/visualizar-medico/'.  Crypt::encrypt($medico->cod_medico)) }}">
                        <i class="fa fa-search"></i>
                    </a>

                </td>                
                <td class="text-center col-xs">

                    <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#">
                        <i class="fas fa-edit"></i>
                    </a>

                </td>
                <td class="text-center col-xs">

                    <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Gerenciar Agenda" href="{{ url('admin/painel/medicos/gerenciar-agenda-medico/'. Crypt::encrypt($medico->cod_medico)) }}">
                        <i class="fa fa-bars"></i>
                    </a>

                </td>                
                <td class="text-center col-xs">

                    <a class="btn btn-sm btn-success" data-tooltip="tooltip" title="Repasse" href="{{ url('admin/painel/medicos/repasse-medico/'. Crypt::encrypt($medico->cod_medico)) }}">
                        <i class="fa fa-dollar-sign"></i>
                    </a>

                </td>
                <td class="text-center col-xs">

                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Upload de Arquivos" href="javascript:void(0)" data-toggle="modal" data-target="#modal_upload" onclick="atualiza_modal_upload('{{ url('admin/painel/medicos/upload/'.$medico->cod_medico) }}')">
                        <i class="fa fa-file"></i>
                    </a>

                </td>
                <td class="text-center col-xs">
                    
                    <?php  if($medico->status == 0) { ?>
                                <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar"  href="#">
                                    <i class="fas fa-power-off"></i>
                                </a>
                    
                    <?php }elseif($medico->status == 1){ ?>            
                                <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar"  href="#">
                                    <i class="fas fa-power-off"></i>
                                </a>
                    <?php } ?>

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

<div class="modal fade" id="modal_upload" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="" id="form_upload">
        <div class="modal-header">
          <h4 class="modal-title">Upload de Arquivos</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Nome do Documento</label>
            <input type="text" class="form-control" name="nome_documento" id="nome_documento" placeholder="Nome do Documento">
          </div>
          <div class="form-group">
            <label class="control-label">Data de Validade</label>
            <input type="text" class="form-control" name="data_validade" id="data_validade" placeholder="Data de validade do documento">
          </div>
          <div class="form-group">
            <label class="control-label">Arquivo</label>
            <input type="file" class="form-control" name="arquivo" id="arquivo">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

<script type="text/javascript">
  $('#data_validade').datepicker({
  format: 'dd/mm/yyyy',
          language: 'pt-BR',
          weekStart: 0,
          endDate: '+5y',
          startDate: '+1d',
          todayHighlight: true
  });
  function atualiza_modal_deletar(url){
  $("#form_deletar").attr('action', url);
  }

  var options = {
  success: function(response) {
  if (response.status == 1){
  toastr.success(response.mensagem, "Sucesso!");
  $("table").find("[data-row-id='" + response.cod + "']").remove();
  $("#modal_deletar").modal('hide');
  } else{
  toastr.error(response.mensagem, "Erro!");
  };
  }
  };
  $('#form_deletar').ajaxForm(options);
  function atualiza_modal_upload(url){
  $("#form_upload").attr('action', url);
  }

  var options2 = {
  success: function(response) {
  if (response.status == 1){
  toastr.success(response.mensagem, "Sucesso!");
  $("#modal_upload").modal('hide');
  } else{
  toastr.error(response.mensagem, "Erro!");
  };
  },
          error: function(response){
          console.log(response);
          }
  };

$('#form_upload').ajaxForm(options2);

$(".tabela").DataTable({
    pageLength: 15,
    lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
    pagingType: "full_numbers",
    language: {
        "emptyTable": "Não foram encontrados registros",
        "zeroRecords": "Não há registros para exibir",
        "processing": "Reunindo dados",
        "loadingRecords": "Carregando...",
        "lengthMenu": "Mostrar _MENU_ itens por página",
        "search": "Buscar:" ,
        "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
        "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
        "infoFiltered": " (filtrado de _MAX_ registros)",
        "paginate": {
            "first": "<<",
            "previous": "<",
            "next": ">",
            "last": ">>"
        }
    }
});
</script>
@stop