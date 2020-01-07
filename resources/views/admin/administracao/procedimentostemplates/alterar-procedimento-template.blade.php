@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos Templates | Alterar
@stop

@section('conteudo')
<div class="page-title">
	<div class="title_left">
		<h3>Alterar Procedimento Template</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<form method="POST" action="<?php echo url('admin/painel/procedimentostemplates/alterar-procedimento-template/');?>" enctype="multipart/form-data">
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
						<div class="col-sm-6 col-xs-12">
                                                    
                                                        <div class="form-group">
								<label class="control-label">Tabela Template<span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_tabela_template" id="cod_tabela_template">
                                                                    @foreach($tabelas_templates as $tabela_template)
									<option value="{{ $tabela_template->cod_tabela_template }}" <?php if(old('cod_tabela_template') == $tabela_template->cod_tabela_template){ echo "selected"; }?>>{{ $tabela_template->descricao }}</option>
                                                                    @endforeach
								</select>
							</div>
						                                                                                                        
							<div class="form-group">
								<label class="control-label">Código</label>
								<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ $procedimento_template->codigo }}">
							</div>
							
							<div class="form-group">
								<label class="control-label">Código Interno</label>
								<input type="text" class="form-control" name="codigo_interno" id="codigo_interno" placeholder="Código Interno" value="{{ $procedimento_template->codigo_interno }}">
							</div>
							
							<div class="form-group">
								<label class="control-label">Descrição</label>
								<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{ $procedimento_template->descricao }}">
							</div>
							
							<div class="form-group">
								<label class="control-label">Capítulo</label>
								<input type="text" class="form-control" name="capitulo" id="capitulo" placeholder="Capítulo" value="{{ $procedimento_template->capitulo }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Grupo</label>
								<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" value="{{ $procedimento_template->grupo }}">
							</div>                                                    
							
							<div class="form-group">
								<label class="control-label">Sub-Grupo</label>
								<input type="text" class="form-control" name="subgrupo" id="subgrupo" placeholder="Sub-Grupo" value="{{ $procedimento_template->subgrupo }}">
							</div>
                                                                                                            
							<div class="form-group">
								<label class="control-label">Metro do Filme</label>
								<input type="number" class="form-control" name="metro_filme" id="metro_filme" placeholder="M² do Filme" value="{{ $procedimento_template->metro_filme }}">
							</div>                                                    
                                                        
							<div class="form-group">
								<label class="control-label">Deflator</label>
								<input type="text" class="form-control decimal" name="deflator" id="deflator" placeholder="Deflator" value="{{ $procedimento_template->deflator }}">
							</div> 
                                                    
                                                        <div class="form-group">
								<label class="control-label">Porte</label>
								<input type="text" class="form-control" name="porte" id="porte" placeholder="Porte" value="{{ $procedimento_template->porte }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Valor do Porte</label>
								<input type="text" class="form-control decimal" name="valor_porte" id="valor_porte" placeholder="Valor do Porte" value="{{ $procedimento_template->valor_porte }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Honorários</label>
								<input type="text" class="form-control decimal" name="honorarios" id="honorarios" placeholder="Honorários" value="{{ $procedimento_template->honorarios }}">
							</div>
														
						</div>
                                                
						<div class="col-sm-6 col-xs-12">						
                                                        
                                                        <div class="form-group">
								<label class="control-label">Valor UCO</label>
								<input type="text" class="form-control decimal" name="valor_uco" id="valor_uco" placeholder="Valor UCO" value="{{ $procedimento_template->valor_uco }}">
							</div>
                                                        <div class="form-group">
								<label class="control-label">Auxiliares</label>
								<input type="number" class="form-control" name="auxiliares" id="auxiliares" placeholder="Auxiliares" value="{{ $procedimento_template->auxiliares }}">
							</div>
							
							<div class="form-group">
								<label class="control-label">Incidência</label>
								<input type="number" class="form-control" name="incidencia" id="incidencia" placeholder="Incidência" value="{{ $procedimento_template->incidencia }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CH Total</label>
								<input type="number" class="form-control" name="ch_total" id="ch_total" placeholder="CH Total" value="{{ $procedimento_template->ch_total }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">QTDE Filme MQ</label>
								<input type="number" class="form-control" name="qtde_filme_mq" id="qtde_filme_mq" placeholder="QTDE Filme MQ" value="{{ $procedimento_template->qtde_filme_mq }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Porte Anastésico</label>
								<input type="text" class="form-control decimal" name="porte_anastesico" id="porte_anastesico" placeholder="Porte Anastésico" value="{{ $procedimento_template->porte_anastesico }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Custo Operacional</label>
								<input type="text" class="form-control decimal" name="custo_operacional" id="custo_operacional" placeholder="Custo Operacional" value="{{ $procedimento_template->custo_operacional }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CO</label>
								<input type="text" class="form-control decimal" name="co" id="co" placeholder="CO" value="{{ $procedimento_template->co }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">PA</label>
								<input type="number" class="form-control" name="pa" id="pa" placeholder="PA" value="{{ $procedimento_template->pa }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Filme M2</label>
								<input type="text" class="form-control decimal" name="filme_m2" id="filme_m2" placeholder="Filme M2" value="{{ $procedimento_template->filme_m2 }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CRR</label>
								<input type="text" class="form-control decimal" name="crr" id="crr" placeholder="CRR" value="{{ $procedimento_template->crr }}">
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CH</label>
								<input type="number" class="form-control" name="ch" id="ch" placeholder="CH" value="{{ $procedimento_template->ch }}">
							</div>
                                                    
                                                    </div>
                                                	
						</div>
						
						<div class="col-xs-12">
                                                    <input type="hidden" id="cod_procedimento_template" name="cod_procedimento_template" value="<?php echo $codigo_procedimento_template; ?>" />
                                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop