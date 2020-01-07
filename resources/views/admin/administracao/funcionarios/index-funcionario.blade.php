@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Funcionários
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('funcionarios') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Funcionários</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<a class="btn btn-primary" href="{{ url('admin/painel/funcionarios/cadastrar-funcionario') }}"><i class="fa fa-plus"></i> Cadastrar Novo Funcionário</a>
                
                <br /><br />

                <div class="clearfix"></div>

				<div class="table-responsive">
					<table class="table table-striped table-bordered tabela">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CPF</th>
                                                    <th>RG</th>
                                                    <th>Telefone</th>                
                                                    <th>Unidades Gerenciáveis</th>
                                                    <th>&nbsp</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
						<tbody>

							<?php 
                            foreach ($funcionarios as $funcionario) : 
                            ?>
								<tr>
                                    <td><?php echo $funcionario->nome; ?></td>
                                    <td>
                                        <?php 
                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraCpf($funcionario->cpf); 
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo drclub\Biblioteca\FuncoesGlobais::mascaraRg($funcionario->rg); ?>
                                    </td>
                                    
                                    <td><?php echo $funcionario->telefone; ?></td>                                                                        
                                                                        
                                    <?php 
									switch ($funcionario->permissao) {
										case '1':
											echo "Caixa";
										break;
										case '2':
											echo "Atendimento";
										break;
										case '3':
											echo "Vendedor";
										break;
										case '4':
											echo "Financeiro";
										break;
										case '5':
											echo "Cobrador";
										break;
										case '6':
											echo "Cadastros";
										break;
										case '7':
											echo "Telefonia";
										break;
										case '8':
											echo "Gerente de Unidade";
										break;
										case '9':
											echo "Administrador";
										break;
									}
									?>

									<td>
                                        <?php 
                                        foreach ($funcionario->unidades as $unidade) : 
                                        ?>
                                                                            
                                            <span class="label label-primary" style="font-size: 11px;">
                                                <?php echo $unidade->nome_unidade; ?>
                                            </span>

                                            <br /><br />
                                                                        
                                        <?php 
                                        endforeach; 
                                        ?>                                                                        
                                    </td>

                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/funcionarios/visualizar-funcionario/'. Crypt::encrypt($funcionario->cod_funcionario)) }}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        
                                    </td>

                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                    </td>

                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="Upload de Arquivos" onclick="#">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        
                                    </td>
                                    
                                    <td class="text-center col-xs"> 

                                        <a class="btn btn-sm btn-reajustar" data-tooltip="tooltip" title="Reajustar" href="{{ url('admin/painel/funcionarios/reajustar-funcionario/'. Crypt::encrypt($funcionario->cod_funcionario))}}">
                                            <i class="fas fa-wrench "></i>
                                        </a>   

                                    </td>

                                    <td class="text-center col-xs">
                                        
                                        <?php  if($funcionario->funcionario == 0) { ?>
                                                    <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar"  href="#">
                                                        <i class="fas fa-power-off"></i>
                                                    </a>

                                        <?php }elseif($funcionario->funcionario == 1){ ?>            
                                                    <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar"  href="{{ url('admin/painel/funcionarios/inativar-funcionario/'.   Crypt::encrypt($funcionario->cod_funcionario)) }}">
                                                        <i class="fas fa-power-off"></i>
                                                    </a>
                                        <?php } ?>


                                    </td>
                                    
				</tr>

                            <?php 
                            endforeach; 
                            ?>

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

<div class="modal fade" id="modal_deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_deletar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja deletar este funcionário?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar o funcionário, todos os dados ligados a ele também deletados e não poderão ser recuperados.</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	                <button type="submit" class="btn btn-danger">Deletar</button>
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
        function atualiza_modal_deletar(url){
                $("#form_deletar").attr('action', url);
        }

        var options = {
            success: function(response) {
                if(response.status == 1){
                        toastr.success(response.mensagem,"Sucesso!");

                        $("table").find("[data-row-id='"+response.cod+"']").remove();
                        $("#modal_deletar").modal('hide');
                }else{
                        toastr.error(response.mensagem,"Erro!");
                        console.log(response);
                };
            },
            error: function(response){
                console.log(response);
            }
        }; 

        $('#form_deletar').ajaxForm(options);

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