@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Unidades
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('unidades-inativas') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Unidades</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">

        <a class="btn btn-primary" href="{{ url('admin/painel/unidades/cadastrar-unidade') }}"><i class="fa fa-plus"></i> Cadastrar Nova Unidade</a>

        <div class="clearfix"></div>

        <div class="table-responsive">

            <table class="table table-striped table-bordered tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>E-mail</th>
                    <th style="width: 79px">Telefone</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>					
                </tr>
            </thead>
            <tbody>

                @foreach($unidades as $unidade)

                    <tr>
                        <td>{{ $unidade->nome_unidade }}</td>
                        <td>{{ $unidade->responsavel }}</td>
                        <td>{{ $unidade->email }}</td>
                        <td>{{ $unidade->telefone }}</td>
                        <td class="text-center col-xs">

                            <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/unidades/visualizar-unidade-inativa/'. Crypt::encrypt($unidade->cod_unidade)) }}">
                                <i class="fas fa-search"></i>
                            </a>

                        </td>                  
                        <td class="text-center col-xs">
                            
                            <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar"  href="{{ url('admin/painel/unidades/reativar-unidade/'.  Crypt::encrypt($unidade->cod_unidade)) }}">
                                <i class="fas fa-power-off" aria-hidden="true"></i>
                            </a>
                         
                        </td>
                    </tr>

                @endforeach

            </tbody>
            </table>
            
            <br />

            <a class="btn btn-sm btn-success" href="{{ url('admin/painel/unidades') }}"> <i class="fas fa-list-ul"></i> Listagem Inativas</a> 
                
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

<script type="text/javascript">
function atualiza_modal_upload(url) {
    $("#form_upload").attr('action', url);
}

var options2 = {
    success: function(response) {

        if (response.status == 1) {

            toastr.success(response.mensagem, "Sucesso!");

            $("#modal_upload").modal('hide');

        } else {

            toastr.error(response.mensagem, "Erro!");

        }

    },
    error: function(response) {
        
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