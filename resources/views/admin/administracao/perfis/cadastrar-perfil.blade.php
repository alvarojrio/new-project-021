@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfis de Usuário | Cadastrar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('perfis-cadastrar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Cadastrar Perfil de Usuário</h3>
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



                <form method="POST" action="<?php echo url('admin/painel/perfis/cadastrar-perfil'); ?>">
				


				<h2>Dados Gerais</h2>

				<!-- INICIO LINHA -->
                <div class="row">  
                    
                    <!-- COLUNA -->      
                    <div class="form-group col-sm-12 col-xs-12">

                        <label class="control-label">Nome <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="nome" id="nome" autocomplete="off" <?php if (!empty(old('nome'))) { ?>value="<?php echo old('nome'); ?>"<?php } ?>>
                    
                    </div>

                </div> 
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row"> 
                    
                    <!-- COLUNA -->
                    <div class="form-group col-sm-12 col-xs-12">

                        <label class="control-label">Descrição <span class="required-red">*</span></label>
                        <textarea class="form-control" rows="2" id="descricao" name="descricao" minlength="5"></textarea>

                    </div>                                                                       
                                                                                                                                            
                </div> 
                <!-- FIM LINHA -->




                <h2>Lista de Permissões <small>(<?php echo $total_permissoes; ?> permissões)</small></h2>

                <!-- INICIO LINHA -->
                <div class="row"> 
					
					<!-- COLUNA -->
					<div class="form-group col-sm-12 col-xs-12">
						
						<div class="panel panel-default">
                    		<div class="panel-heading clearfix">
                    			
                    			<input class="form-check-input" type="checkbox" name="toogleall" id="toogleall" />
                                Marcar / Desmarcar Todos

                    		</div>
                    	</div>

					</div>

                </div> 
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row"> 

                	<?php
                	// Contador
                	$i = 1;

                	// Faço loop pelas seções das permissões
                	foreach ($secoes as $s) : 
                	?>
					
						<!-- INICIO COLUNA -->
						<div class="form-group col-sm-6 col-xs-12">
							
                            <!-- INICIO PANEL -->
							<div class="panel panel-default">
			                    <div class="panel-heading clearfix" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
	                                <span data-toggle="collapse" href="#collapse<?php echo $i; ?>"><?php echo mb_strtoupper($s->secao); ?></span>
	                                <span class="pull-right">
	                                    <a data-toggle="collapse" href="#collapse<?php echo $i; ?>">
	                                        <i class="fas fa-chevron-down"></i>
	                                    </a>
	                                </span>
	                            </div>
	                            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse muda-collapse">

				                    <div class="panel-body">
										
										<?php
										// Busco permissões da seção atual
                						$permissoes = drclub\models\Permission::where('secao', '=', $s->secao)->get();

                						// Faço loop pelas permissões
                						foreach ($permissoes as $p) :
										?>

											<input class="form-check-input" type="checkbox" name="permissao[]" value="<?php echo $p->id; ?>" />
			                                <?php echo $p->display_name; ?> <br />
			                                <b>Descrição:</b> <i><?php echo (!empty($p->description)) ? $p->description : '-'; ?></i>

			                                <br /><br />

		                                <?php
		                                endforeach;
		                                ?>

				                    </div>

			                	</div>
			                </div>
                            <!-- FIM PANEL -->

						</div>
						<!-- FIM COLUNA -->
						
						<?php
						// Checo se é o fim da linha, sendo que cada linha só deverá conter 2 panels
						if ($i % 2 == 0) {
	
							echo '</div>';
							echo '<!-- FIM LINHA -->';
							echo '<!-- INICIO LINHA -->';
							echo '<div class="row">';
							
						}
						?>

					<?php
						// Incremento contador
						$i++;

						// Limpo variaveis
						unset($permissoes);

					endforeach;
					?>

                </div> 
                <!-- FIM LINHA -->


				
				<br />

                <hr />
                
                <!-- BOTÃO PARA SALVAR FORMULARIO -->
                <button type="submit" id="btn_salvar_perfil" class="btn btn-success pull-right">
                	<i class="far fa-save"></i> Salvar
                </button>
                
                <!-- BOTÃO PARA VOLTAR -->
                <a href="<?php echo url('admin/painel/perfis'); ?>" class="btn btn-default pull-right">
                	<i class="fas fa-arrow-circle-left"></i> Voltar
                </a>
                
                <!-- DIV DA MENSAGEM 'PROCESSANDO' -->
                <div id="msg_processando">
                    <div id="txt_msg_processando">
                        <i class="fa fa-exchange"></i> PROCESSANDO...
                    </div>
                </div>

                </form>

			</div>
		</div>
	</div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

	// Controle de caracteres permitidos no campo
    $('#nome').on('input blur keyup paste', function() {

        // Expressão regular. Permite letras e o caracter '-'
        var regexp = /[^a-zA-Z0-9áéíóúÁÉÍÓÚâêîôûÂÊÎÔÛçÇãõÃÕ\-\ ]/g;

        // Testo o valor digitado com a expressão
        if (this.value.match(regexp)) {

            $(this).val(this.value.replace(regexp,''));

        }

    });



	/*********************************************
     #
     # Modifica o icone dos paineis .muda-collapse de acordo com o status atual deles
     # 
    **********************************************/ 
    $('.muda-collapse').on('show.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    $('.muda-collapse').on('hide.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });



    /***********************************************
     #
     # Aplicando função no checkbox MARCAR/DESMARCAR TODOS
     # 
    ************************************************/ 
    $(document).on('click', '#toogleall', function(e) {

    	// Marca / desmarca todos os checkboxes da página
    	$('input:checkbox').not(this).prop('checked', this.checked);

    });

});
</script>

@stop
