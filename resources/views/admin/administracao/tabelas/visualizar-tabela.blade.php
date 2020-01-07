@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Visualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-visualizar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Visualizar Tabela</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<!-- INICIO LINHA -->
				<div class="row">

					<div class="col-md-6 col-xs-12">

						<h2>Dados Gerais</h2>

						<table class="table table-striped table-bordered">
						<tbody>
                        	<tr>
								<td style="width:100px"><b>Nome:</b> </td>
								<td><span class="text-primary"><b>{{ $tabelas->nome_tabela }}</b></span></td>
							</tr>
							<tr>
								<td style="width:100px"><b>Tipo:</b> </td>
								<td>
									<?php
									switch ($tabelas->tipo_tabela) {
										case 1:
											echo 'Convênio';
										break;

										case 2:
											echo 'Particular';
										break;

										default:
											echo 'Indefinido';
										break;
									}
									?>
								</td>
							</tr>
							<tr>
								<td style="width:100px"><b>Data Inicial:</b> </td>
								<td>{{ date('d/m/Y', strtotime($tabelas->data_inicial)) }}</td>
							</tr>
						</tbody>
						</table>
					</div>

				</div>
				<!-- FIM LINHA -->
				


				<!-- INICIO LINHA -->
				<div class="row">

					<div class="col-md-12 col-xs-12">  

                    	<h2>Lista de Procedimentos Ativos</h2>
                        	
                    	<!-- INICIO TABLE-RESPONSIVE -->
                    	<div class="table-responsive" data-row-id="">
                        
                        	<table class="table table-striped table-bordered tabela">
                            <thead>
                            <tr>											
                                <th>Cód.</th>											
                                <th>Descrição</th>	
                                <th>Categoria</th>	
                                <th>Sexo</th>
                                <th>Sinônimo</th>									
                                <th>Qtd. CH</th>
                                <th>m² Filme</th>
                                <th>Valor de Custo</th>
                                <th>Valor de Venda</th>
                                <th>Margem de Lucro (%)</th>
                                <th>&nbsp;</th> 
                            </tr>
                            </thead>
                            
                            <tbody>
                            
                            	@foreach ($procedimentos as $p)
                                    
                                    <tr>                                                                        
                                        <td>{{ $p->codigo }}</td>
                                        <td>{{ $p->descricao }}</td>
                                        <td><?php echo (!empty($p->descricao_categoria)) ? $p->descricao_categoria : '-'; ?></td>
                                        <td>
						<?php 
		                                    if ($p->sexo == 1) {
		                                        echo 'Masculino'; 
		                                    } elseif ($p->sexo == 2) {
		                                        echo 'Feminino';
		                                    } elseif ($p->sexo == 3) {
		                                        echo 'Ambos';
		                                    }
		                                ?> 
					</td>
										<td>{{ $p->sinonimo }}</td>
										<td>{{ $p->ch }}</td>
                                        <td>{{ $p->filme_m2 }}</td>
										<td>R$ {{ $p->valor_custo }}</td>
                                        <td>R$ {{ $p->valor_venda }}</td> 
                                        <td>
                                        	<?php 
	                                        // Checo se valores utilizados no cálculo foram definidos na base
	                                        if (!empty($p->valor_custo) and $p->valor_custo != 0 and !empty($p->valor_venda)) {

	                                            // Efetuo cálculo da margem de lucro (lucro real)
	                                            // FORMULA: ((VALOR_VENDA * 100) / VALOR_CUSTO) - 100
	                                            $calculo_margem = (($p->valor_venda * 100) / $p->valor_custo) - 100;

	                                            // Exibo resultado do cálculo, arredondado e com duas casas depois da virgula
	                                            echo round($calculo_margem, 2) . '%';

	                                        } elseif (!empty($p->valor_custo) and $p->valor_custo == 0 and !empty($p->valor_venda)) { // Caso o valor_venda tenha sido definido e o valor_custo tenha sido definido e seja igual a 0 (zero)

	                                            // Efetuo cálculo da margem de lucro (lucro real)
	                                            // FORMULA: (VALOR_VENDA * 100)
	                                            $calculo_margem = ($p->valor_venda * 100);

	                                            // Exibo resultado do cálculo, arredondado e com duas casas depois da virgula
	                                            echo round($calculo_margem, 2) . '%';

	                                        } else {

	                                            // Variavel da margem de lucro
	                                            $calculo_margem = '-';

	                                            // Exibo valor
	                                            echo $calculo_margem;

	                                        }

	                                        // Limpo variavel
	                                        unset($calculo_margem);
	                                        ?>
                                        </td> 
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-default" href="{{ url('admin/painel/procedimentos/visualizar-procedimento/' . Crypt::encrypt($p->cod_procedimento)) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

							</tbody>
							</table>

						</div>
						<!-- FIM TABLE-RESPONSIVE -->
												
					</div>

				</div>
				<!-- FIM LINHA -->
   
				<!--
            	<br />

                <a class="btn btn-sm btn-danger" href="{{ url('admin/painel/procedimentos/index-inativo-procedimento') }}"><i class="fas fa-list-ul"></i> Listagem Inativos</a>                                            
				-->
				
				<?php if (count($procedimentos) == 0) { ?>
                <a class="btn btn-sm btn-info" href="<?php echo url('admin/painel/tabelas/definir-valores-tabela/' . Crypt::encrypt($tabelas->cod_tabela)); ?>">
                	<i class="fas fa-dollar-sign"></i> Definir Valores dos Procedimentos
                </a>  
            	<?php } ?>

				<!-- INICIO LINHA -->
				<div class="row">
					
					<hr />

					<div class="col-md-6 col-xs-12">
						<div align="center" style="margin-top: 10px;">
                    		<a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                    	</div>
					</div>

				</div>
				<!-- FIM LINHA -->

			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="modal_deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="POST" action="" id="form_deletar">
	            <div class="modal-header">
	                <h4 class="modal-title">Você realmente deseja deletar esta tabela?</h4>
	            </div>
	            <div class="modal-body">
	                <p>Ao deletar a tabela, todos os dados ligados a ela também serão deletados e não poderão ser recuperados.</p>
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
$.ajaxSetup ({cache: false});

$(document).ready(function() {

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
	        	console.log(response);
	        	toastr.error(response.mensagem,"Erro!");
	        };
	    },
	    error: function(response){
	    	console.log(response);
	    }
	}; 

	$('#form_deletar').ajaxForm(options);

	// Tabela de dados
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
			},
		},
		order: [[ 1, "asc" ]]
	});

});
</script>

@stop