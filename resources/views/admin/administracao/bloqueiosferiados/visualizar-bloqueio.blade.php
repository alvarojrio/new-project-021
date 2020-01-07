@extends('layouts.administracao.layout')

@inject('permissoes','drclub\models\Permissoes')

@section('titulo_pagina')
CMRJ | Bloqueios | Visualizar
@stop

@section('conteudo')

{!! Breadcrumbs::render('bloqueios-visualizar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Visualizar Bloqueio</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th colspan="2">Dados Gerais</th>
								</tr>
							</thead>
							<tbody>
                                                            
                                                            
								<tr>
									<th style="width:190px">Médico: </th>
									<td><?php echo mb_strtoupper($bloqueio->nome); ?></td>
								</tr>
                                                                
								<tr>
									<th style="width:190px">Descrição: </th>
									<td><?php echo mb_strtoupper($bloqueio->descricao); ?></td>
								</tr>
								<tr>
									<th style="width:190px">Data: </th>
									<td>
                                                                            <?php 
                                                                                echo date('d/m/Y', strtotime(str_replace('-', '/', $bloqueio->data_inicio))). " até ". date('d/m/Y', strtotime(str_replace('-', '/', $bloqueio->data_fim))) ;  
                                                                            ?>
                                                                        </td>
								</tr>
                                                                
								<tr>
									<th style="width:190px">Unidade(s): </th>
									<td>
                                                                            <ul class="list-group list-unstyled">
                                                                   
                                                                                <li class="list-group-item">        
                                                                                        <?php echo mb_strtoupper($bloqueio->nome_unidade); ?>
                                                                                </li>   
                                                                            
                                                                            </ul>    
                                                                        </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12">
						<a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i>Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop