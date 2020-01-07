@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos Templates | Alterar
@stop

@section('conteudo')
<div class="page-title">
	<div class="title_left">
		<h3>Cadastrar Procedimento Template</h3>
	</div>
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="row">
					<form method="POST" action="<?php echo url('admin/painel/procedimentostemplates/cadastrar-procedimento-template/');?>" enctype="multipart/form-data">
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
                                                                        <option value="">Selecione uma Tabela</option>
                                                                    @foreach($tabelas_templates as $tabela_template)
									<option value="{{ $tabela_template->cod_tabela_template }}" <?php if(old('cod_tabela_template') == $tabela_template->cod_tabela_template){ echo "selected"; }?>>{{ $tabela_template->descricao }}</option>
                                                                    @endforeach
								</select>
							</div>
                                                    
							<div class="form-group">
								<label class="control-label">Código</label>
								<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" <?php if (!empty(old('codigo'))) { ?>value="<?php echo old('codigo'); ?>"<?php } ?>>
							</div>
							
							<div class="form-group">
								<label class="control-label">Código Interno</label>
								<input type="text" class="form-control" name="codigo_interno" id="codigo_interno" placeholder="Código Interno" <?php if (!empty(old('codigo_interno'))) { ?>value="<?php echo old('codigo_interno'); ?>"<?php } ?>>
							</div>
							
							<div class="form-group">
								<label class="control-label">Descrição</label>
								<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" <?php if (!empty(old('descricao'))) { ?>value="<?php echo old('descricao'); ?>"<?php } ?>>
							</div>
							
							<div class="form-group">
								<label class="control-label">Capítulo</label>
								<input type="text" class="form-control" name="capitulo" id="capitulo" placeholder="Capítulo" <?php if (!empty(old('capitulo'))) { ?>value="<?php echo old('capitulo'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Grupo</label>
								<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" <?php if (!empty(old('grupo'))) { ?>value="<?php echo old('grupo'); ?>"<?php } ?>>
							</div>                                                    
							
							<div class="form-group">
								<label class="control-label">Sub-Grupo</label>
								<input type="text" class="form-control" name="subgrupo" id="subgrupo" placeholder="Sub-Grupo" <?php if (!empty(old('subgrupo'))) { ?>value="<?php echo old('subgrupo'); ?>"<?php } ?>>
							</div>
                                                                                                            
							<div class="form-group">
								<label class="control-label">Metro do Filme</label>
								<input type="number" class="form-control" name="metro_filme" id="metro_filme" placeholder="M² do Filme" <?php if (!empty(old('metro_filme'))) { ?>value="<?php echo old('metro_filme'); ?>"<?php } ?>>
							</div>                                                    
                                                        
							<div class="form-group">
								<label class="control-label">Deflator</label>
								<input type="text" class="form-control decimal" name="deflator" id="deflator" placeholder="Deflator" <?php if (!empty(old('deflator'))) { ?>value="<?php echo old('deflator'); ?>"<?php } ?>>
							</div> 
                                                    
                                                        <div class="form-group">
								<label class="control-label">Porte</label>
								<input type="text" class="form-control" name="porte" id="porte" placeholder="Porte" <?php if (!empty(old('porte'))) { ?>value="<?php echo old('porte'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Valor do Porte</label>
								<input type="text" class="form-control decimal" name="valor_porte" id="valor_porte" placeholder="Valor do Porte" <?php if (!empty(old('valor_porte'))) { ?>value="<?php echo old('valor_porte'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Honorários</label>
								<input type="text" class="form-control decimal" name="honorarios" id="honorarios" placeholder="Honorários" <?php if (!empty(old('honorarios'))) { ?>value="<?php echo old('honorarios'); ?>"<?php } ?>>
							</div>
							
                                                        <div class="form-group">
								<label class="control-label">Valor UCO</label>
								<input type="text" class="form-control decimal" name="valor_uco" id="valor_uco" placeholder="Valor UCO" <?php if (!empty(old('valor_uco'))) { ?>value="<?php echo old('valor_uco'); ?>"<?php } ?>>
							</div>
							
						</div>
                                                
						<div class="col-sm-6 col-xs-12">						
                                                        	
                                                        <div class="form-group">
								<label class="control-label">Auxiliares</label>
								<input type="number" class="form-control" name="auxiliares" id="auxiliares" placeholder="Auxiliares" <?php if (!empty(old('auxiliares'))) { ?>value="<?php echo old('auxiliares'); ?>"<?php } ?>>
							</div>
							
							<div class="form-group">
								<label class="control-label">Incidência</label>
								<input type="number" class="form-control" name="incidencia" id="incidencia" placeholder="Incidência" <?php if (!empty(old('incidencia'))) { ?>value="<?php echo old('incidencia'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CH Total</label>
								<input type="number" class="form-control" name="ch_total" id="ch_total" placeholder="CH Total" <?php if (!empty(old('ch_total'))) { ?>value="<?php echo old('ch_total'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">QTDE Filme MQ</label>
								<input type="number" class="form-control" name="qtde_filme_mq" id="qtde_filme_mq" placeholder="QTDE Filme MQ" <?php if (!empty(old('qtde_filme_mq'))) { ?>value="<?php echo old('qtde_filme_mq'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Porte Anastésico</label>
								<input type="text" class="form-control decimal" name="porte_anastesico" id="porte_anastesico" placeholder="Porte Anastésico" <?php if (!empty(old('porte_anastesico'))) { ?>value="<?php echo old('porte_anastesico'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Custo Operacional</label>
								<input type="text" class="form-control decimal" name="custo_operacional" id="custo_operacional" placeholder="Custo Operacional" <?php if (!empty(old('custo_operacional'))) { ?>value="<?php echo old('custo_operacional'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CO</label>
								<input type="text" class="form-control decimal" name="co" id="co" placeholder="CO" <?php if (!empty(old('co'))) { ?>value="<?php echo old('co'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">PA</label>
								<input type="number" class="form-control" name="pa" id="pa" placeholder="PA" <?php if (!empty(old('pa'))) { ?>value="<?php echo old('pa'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">Filme M2</label>
								<input type="text" class="form-control decimal" name="filme_m2" id="filme_m2" placeholder="Filme M2" <?php if (!empty(old('filme_m2'))) { ?>value="<?php echo old('filme_m2'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CRR</label>
								<input type="text" class="form-control decimal" name="crr" id="crr" placeholder="CRR" <?php if (!empty(old('crr'))) { ?>value="<?php echo old('crr'); ?>"<?php } ?>>
							</div>
                                                    
                                                        <div class="form-group">
								<label class="control-label">CH</label>
								<input type="number" class="form-control" name="ch" id="ch" placeholder="CH" <?php if (!empty(old('ch'))) { ?>value="<?php echo old('ch'); ?>"<?php } ?>>
							</div>
                                                    
                                                    </div>
                                                	
						</div>
						
						<div class="col-xs-12">
                                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop