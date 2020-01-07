@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Vendedores
@stop

@section('includes_no_head')
  <link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('vendedores') !!}

<div class="page-title">
    <div class="title_left">
            <h3>Vendedor</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
                            
				<a class="btn btn-primary" href="{{ url('admin/painel/vendedores/cadastrar-vendedor') }}"><i class="fas fa-plus"></i> Cadastrar Novo Vendedor</a>
                
                <br /><br />

                <div class="clearfix"></div>
                                
				<div class="table-responsive">

                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Contratos</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            foreach ($vendedores as $vendedor) : 
                            ?>
                                        
                                <tr>
                                    <td><?php echo $vendedor->nome; ?></td>
                                    <td>
                                        <?php 
                                        echo drclub\Biblioteca\FuncoesGlobais::mascaraCpf($vendedor->cpf); 
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <?php 
                                        echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($vendedor->telefone); 
                                        ?>
                                    </td> 
                                    <td>

                                        <?php foreach($vendedor->unidades as $unidade): ?>

                                            <?php echo $unidade->nome_unidade; ?>.

                                        <?php endforeach; ?>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/vendedores/visualizar-vendedor/'. Crypt::encrypt($vendedor->cod_funcionario)) }}">
                                            <i class="fas fa-search"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/vendedores/alterar-vendedor/'. Crypt::encrypt($vendedor->cod_funcionario)) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/vendedores/inativar-vendedor/'. Crypt::encrypt($vendedor->cod_funcionario)) }}')">
                                            <i class="fas fa-power-off"></i>
                                        </a>

                                    </td>
                                </tr>

                            <?php 
                            endforeach; 
                            ?>

                        </tbody>
                    </table>
                    
                    <br />

                    <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/vendedores/index-vendedores-inativo') }}"> 
                        <i class="fas fa-list-ul"></i> Listagem Inativos
                    </a>
                    
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

<div class="modal fade" id="modal_inativar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_inativar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja inativar este cobrador?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao inativar o cobrador, todos os dados ligados a ele também serão deletados e não poderão ser recuperados.</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	                <button type="submit" class="btn btn-danger">inativar</button>
	            </div>
	        </form>
        </div>
    </div>
</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

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