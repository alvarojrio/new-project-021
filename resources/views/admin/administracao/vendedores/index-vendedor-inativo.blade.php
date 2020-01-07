@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Vendedores Inativos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('vendedores-inativos') !!}

<div class="page-title">
    <div class="title_left">
           <h3>Vendedores Inativos</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				
             <div class="clearfix"></div>
                                
				<div class="table-responsive">
                                    <table class="table table-striped table-bordered tabela">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Contratos</th>
                                                <th>&nbsp</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php foreach ($vendedores as $vendedor) : ?>
                                                        <tr>
                                                            <td><?php echo $vendedor->nome; ?></td>
                                                            <td><?php echo $vendedor->cpf; ?></td>
                                                            <td><?php echo $vendedor->telefone; ?></td> 
                                                            <td>
                                                            <?php foreach ($vendedor->unidades as $unidade) : ?>

                                                                <?php echo $unidade->nome_unidade; ?>,

                                                            <?php endforeach; ?>
                                                            </td>                        
                                                            <td class="text-center col-xs">

                                                                <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/vendedores/visualizar-vendedor-inativo/'. Crypt::encrypt($vendedor->cod_funcionario)) }}">
                                                                    <i class="fas fa-search"></i>
                                                                </a>

                                                            </td>                                                               
                                                            <td class="text-center col-xs">

                                                                <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/vendedores/reativar-vendedor/'.   Crypt::encrypt($vendedor->cod_funcionario)) }}">
                                                                    <i class="fas fa-power-off"></i>
                                                                </a>

                                                            </td>									
                                                        </tr>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                    <br />
                                    
                                    <a class="btn btn-sm btn-success" href="{{ url('admin/painel/vendedores') }}"><i class="fas fa-list-ul"></i> Listagem de Ativos</a>
                                    
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
        function atualiza_modal_inativar(url){
                $("#form_inativar").attr('action', url);
        }

        var options = {
            success: function(response) {
                if(response.status == 1){
                        toastr.success(response.mensagem,"Sucesso!");

                        $("table").find("[data-row-id='"+response.cod+"']").remove();
                        $("#modal_inativar").modal('hide');
                }else{
                        toastr.error(response.mensagem,"Erro!");
                        alert('Tente novamente mais tarde!');
                };
            },
            error: function(response){
                alert('Tente novamente mais tarde!');
            }
        }; 

        $('#form_inativar').ajaxForm(options);

        function atualiza_modal_upload(url){
                $("#form_upload").attr('action', url);
        }

        var options2 = {
            success: function(response) {
                if(response.status == 1){
                        toastr.success(response.mensagem,"Sucesso!");

                        $("#modal_upload").modal('hide');
                }else{
                        toastr.error(response.mensagem,"Erro!");
                };
            },
            error: function(response){
                alert('Tente novamente mais tarde!');
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