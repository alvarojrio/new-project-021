@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos | Alterar
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-alterar-procedimento', $tabela) !!}

<div class="page-title">
	<div class="title_left">
		<h3>Alterar Procedimento</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				
				<!-- INICIO LINHA -->
				<div class="row">

					<!-- INICIO DIV DE ERROS DE VALIDAÇÃO -->
                    <div id="avisoValidacao">

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

					</div>
                    <!-- FIM DIV DE ERROS DE VALIDAÇÃO --> 

                </div>
                <!-- FIM LINHA -->



                <form method="POST" action="<?php echo url('admin/painel/procedimentos/alterar-procedimento/'); ?>">
				


				<!-- INICIO LINHA -->
				<div class="row">
					
					<!-- INICIO COL-XS-12 (COLUNA 1) -->
					<div class="col-xs-12 col-sm-4">
						
						<div class="form-group">
                            <label class="control-label">Tabela <span class="required-red">*</span></label>
                            <input type="text"class="form-control"  readonly="readonly" value="{{ $tabela->nome_tabela }}">
                            <input type="hidden"class="form-control" name="cod_tabela" id="cod_tabela" readonly="readonly" value="{{ $tabela->cod_tabela }}">                                            			
                        </div>

                        <div class="form-group">
                            <label class="control-label">Categoria<span class="required-red"></span></label>
                            <select class="form-control" name="cod_categoria" id="cod_categoria"> 
                            	<option value="">Selecione uma opção</option>                                                          
                                @foreach($categorias as $categoria)
                                    <option value="<?php echo $categoria->cod_categoria; ?>" 
                                    	<?php 
                                    	if (!empty(old('cod_categoria')) and old('cod_categoria') == $categoria->cod_categoria) { 
                                    		echo 'selected="selected"'; 
                                    	} else if (empty(old('cod_categoria')) and $procedimento->cod_categoria == $categoria->cod_categoria) { 
                                    		echo 'selected="selected"'; 
                                    	} 
                                    	?>>
                                        <?php echo $categoria->descricao; ?>                                                                                   
                                    </option>                                                                    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
							<label class="control-label">Sinônimo</label>
							<input type="text" class="form-control" name="sinonimo" id="sinonimo" placeholder="Sinônimo" value="{{ $procedimento->sinonimo }}">
						</div>

						<div class="form-group">
							<label class="control-label">Sub-Grupo</label>
							<input type="text" class="form-control" name="subgrupo" id="subgrupo" placeholder="Sub-Grupo" value="{{ $procedimento->subgrupo }}">
						</div>

						<div class="form-group">
							<label class="control-label">Auxiliares</label>
							<input type="number" class="form-control" name="auxiliares" id="auxiliares" placeholder="Auxiliares" value="{{ $procedimento->auxiliares }}">
						</div>

						<div class="form-group">
							<label class="control-label">Porte Anastésico</label>
							<input type="text" class="form-control decimal" name="porte_anastesico" id="porte_anastesico" placeholder="Porte Anastésico" value="{{ $procedimento->porte_anastesico }}">
						</div>

						<div class="form-group">
							<label class="control-label">CRR</label>
							<input type="text" class="form-control decimal" name="crr" id="crr" placeholder="CRR" value="{{ $procedimento->crr }}">
						</div>

					</div>
					<!-- FIM COL-XS-12 -->



					<!-- INICIO COL-XS-12 (COLUNA 2) -->
					<div class="col-xs-12 col-sm-4">
						
						<div class="form-group">
							<label class="control-label">Sexo </label>
							<select class="form-control" name="sexo" id="sexo">
							    <option value="">Selecione uma opção</option>
							    <option value="3" 
								    <?php 
								    if (!empty(old('sexo')) and old('sexo') == 3) {
									    echo 'selected="selected"'; 
								    } else if (empty(old('sexo')) and $procedimento->sexo == 3) { 
									    echo 'selected="selected"';  
								    }
								    ?>>
								    Ambos
							    </option>
							    <option value="2"
								    <?php 
								    if (!empty(old('sexo')) and old('sexo') == 2) {
									    echo 'selected="selected"'; 
								    } else if (empty(old('sexo')) and $procedimento->sexo == 2) { 
									    echo 'selected="selected"';  
								    }
								    ?>>
								    Feminino
							    </option>
							    <option value="1"
								    <?php 
								    if (!empty(old('sexo')) and old('sexo') == 1) {
									    echo 'selected="selected"'; 
								    } else if (empty(old('sexo')) and $procedimento->sexo == 1) { 
									    echo 'selected="selected"';  
								    }
								    ?>>
								    Masculino
							    </option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label">Código</label>
							<input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ $procedimento->codigo }}">
						</div>

						<div class="form-group">
							<label class="control-label">Código Interno</label>
							<input type="text" class="form-control" name="codigo_interno" id="codigo_interno" placeholder="Código Interno" value="{{ $procedimento->codigo_interno }}">
						</div>

						<div class="form-group">
							<label class="control-label">Deflator</label>
							<input type="text" class="form-control decimal" name="deflator" id="deflator" placeholder="Deflator" value="{{ $procedimento->deflator }}">
						</div> 

						<div class="form-group">
							<label class="control-label">Incidência</label>
							<input type="number" class="form-control" name="incidencia" id="incidencia" placeholder="Incidência" value="{{ $procedimento->incidencia }}">
						</div>

						<div class="form-group">
							<label class="control-label">Custo Operacional</label>
							<input type="text" class="form-control decimal" name="custo_operacional" id="custo_operacional" placeholder="Custo Operacional" value="{{ $procedimento->custo_operacional }}">
						</div>

						<div class="form-group">
							<label class="control-label">CH</label>
							<input type="number" class="form-control" name="ch" id="ch" placeholder="CH" value="{{ $procedimento->ch }}">
						</div>

					</div>
					<!-- FIM COL-XS-12 -->



					<!-- INICIO COL-XS-12 (COLUNA 3) -->
					<div class="col-xs-12 col-sm-4">
						
						<div class="form-group">
							<label class="control-label">Descrição</label>
							<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="{{ mb_strtoupper($procedimento->descricao) }}">
						</div>

						<div class="form-group">
							<label class="control-label">Capítulo</label>
							<input type="text" class="form-control" name="capitulo" id="capitulo" placeholder="Capítulo" value="{{ $procedimento->capitulo }}">
						</div>

						<div class="form-group">
							<label class="control-label">Grupo</label>
							<input type="text" class="form-control" name="grupo" id="grupo" placeholder="Grupo" value="{{ $procedimento->grupo }}">
						</div> 

						<div class="form-group">
							<label class="control-label">Honorários</label>
							<input type="text" class="form-control decimal" name="honorarios" id="honorarios" placeholder="Honorários" value="{{ $procedimento->honorarios }}">
						</div>

						<div class="form-group">
							<label class="control-label">CH Total</label>
							<input type="number" class="form-control" name="ch_total" id="ch_total" placeholder="CH Total" value="{{ $procedimento->ch_total }}">
						</div>

						<div class="form-group">
							<label class="control-label">Filme M2</label>
							<input type="text" class="form-control decimal" name="filme_m2" id="filme_m2" placeholder="Filme M2" value="{{ $procedimento->filme_m2 }}">
						</div>
					    
						<div class="form-group">
							<label class="control-label">Sigla <span class="required-red">*</span></label></label>
                                                        <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" value="{{ $procedimento->sigla }}">
						</div>

					</div>
					<!-- FIM COL-XS-12 -->

				</div>
                <!-- FIM LINHA -->



                <br /><br />



                <!-- INICIO LINHA -->
                <div class="row">
						
					<div class="col-xs-12">
                                                    
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Salvar</button>
                        <input type="hidden" id="cod_procedimento" name="cod_procedimento" value="<?php echo $codigo_procedimento; ?>" />
                        <input type="hidden" id="cod_tabela" name="cod_tabela" value="<?php echo Crypt::encrypt($tabela->cod_tabela); ?>" />
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

					</div>

				</div>
                <!-- FIM LINHA -->
				

				</form>

			</div>
		</div>
	</div>

</div>

<script type="text/javascript">   

// função para permitir apenas caracter informado no regex (Filme M2)
$("#filme_m2").on("input", function(){
 var regexp = /[^0-9.]/g; // -> Somente letras: /[^a-zA-ZáéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ ]/g
 if(this.value.match(regexp)){
   $(this).val(this.value.replace(regexp,''));
 }
});

</script>
@stop