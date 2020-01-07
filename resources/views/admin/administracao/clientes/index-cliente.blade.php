@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Clientes
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('clientes') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Clientes & Contratos</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- Espaço para exibição de erros de validação -->
                    <div id="avisoValidacao">
                        <div class="col-xs-12">
                            <div class="alert alert-danger msg_erro" style="display: none;"></div>
                        </div>
                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

						<ul class="nav nav-tabs" role="tablist">
		            		<li class="active"><a data-toggle="tab" href="#aba_pf" id="tab_pf">Pessoa Física</a></li>							
                            <li><a data-toggle="tab" href="#aba_pj" id="tab_pj">Pessoa Jurídica</a></li>
		        		</ul>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">
					
                    <!-- INICIO COLUNA -->
                    <div class="col-xs-12">

                        <!-- INICIO CONTEUDO DAS ABAS -->
						<div class="tab-content tab_content_customizado">

                            <!-- ###### INICIO ABA PESSOA FISICA ############################# -->
                            <div id="aba_pf" class="tab-pane fade in active">
                                
                                <!-- INICIO LINHA -->
                                <div class="row" style="margin-bottom: 10px;">

                                    <!-- Coluna -->
                                    <div class="col-md-3 col-xs-12 pull-right">
                                        
                                        <a class="btn btn-block btn-primary-darker" href="<?php echo url(app("prefixo") . '/painel/contratos/pessoafisica/cadastrar'); ?>">
                                            <i class="far fa-handshake"></i> Cadastrar Contrato PF
                                        </a>

                                    </div>

                                    <!-- Coluna -->
                                    <div class="col-md-3 col-xs-12 pull-right">
                                        
                                        <a class="btn btn-block btn-info" href="<?php echo url(app("prefixo") . '/painel/clientes/pessoafisica/cadastrar'); ?>">
                                            <i class="fa fa-plus"></i> Cadastrar Pessoa Física
                                        </a>

                                    </div>

                                </div>
                                <!-- FIM LINHA -->

                                <div class="clearfix"></div>

                            	<!-- INICIO LINHA -->
                				<div class="row">

                                    <div class="form-group col-md-2 col-xs-12">
                                        
                                        <label class="control-label">CPF</label>
                                        <input type="text" id="cpf_busca" name="cpf_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o CPF" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        
                                        <label class="control-label">Nome</label>
                                        <input type="text" id="nome_busca" name="nome_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nome" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-2 col-xs-12">
                                        
                                        <label class="control-label">Data de Nascimento</label>
                                        <input type="text" id="data_nascimento_busca" name="data_nascimento_busca" class="form-control input-sm" autocomplete="off" placeholder="00/00/0000" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        
                                        <label class="control-label">Número do contrato</label>
                                        <input type="text" id="numero_contrato_busca" name="numero_contrato_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nº do Contrato" />
                                                                                                      
                                    </div>

								</div>
                				<!-- FIM LINHA -->	

								<!-- INICIO LINHA -->
                				<div class="row">

                                    <div class="form-group col-xs-12">
									
										<a href="javascript:void(null);" class="btn btn-info pull-right btn_buscar_pf">
                                            <i class="fas fa-search"></i> Buscar
										</a>

                                    </div>

                                </div>
                				<!-- FIM LINHA -->

                				<!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                				<div class="box_alerta_carregando" style="display: none;">
									Processando...
                				</div>
                				<!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
								
								<!-- INICIO CAIXA DE ALERTA DE ERRO -->
                				<div class="box_alerta_erro" style="display: none;">

                                    <h4>Atenção</h4>

                                    Não foi possivel localizar uma pessoa física com as informações fornecidas. 

									<br />

                                    <a href="<?php echo url(app("prefixo") . '/painel/clientes/pessoafisica/cadastrar'); ?>" class="btn btn-success pull-right">
                                        Cadastrar Nova Pessoa Física
                                    </a>

									<div class="clearfix"></div>

								</div>
								<!-- FIM CAIXA DE ALERTA DE ERRO -->
								
								<!-- INICIO PANEL RESULTADO DA BUSCA -->
								<div class="panel panel-info panel-resultado-busca-pf" style="display: none;">
				                  	<div class="panel-heading">Resultado da Busca</div>
				                  	<div class="panel-body">
										
										<!-- INICIO DIV.TABLE-RESPONSIVE -->
				                        <div class="table-responsive">
				                                
				                            <table class="minha_datatable_pf table table-striped table-hover table-bordered tabela">
				                            <thead>
				                            <tr>
				                                <th>CPF</th>
				                                <th>Nome</th>
                                                <th>Data Nascimento</th>
				                                <th>Vínculo</th>
				                                <th>Empresa</th>
				                                <th>Contrato Atual</th>
				                                <th>&nbsp;</th>
				                                <th>&nbsp;</th>
				                            </tr>
				                            </thead>
				                            </table>

				                        </div>
				                        <!-- FIM DIV.TABLE-RESPONSIVE -->

				                  	</div>
			                  	</div>
			                  	<!-- FIM PANEL RESULTADO DA BUSCA -->									

                            </div>
                            <!-- ###### FIM ABA PESSOA FISICA ############################# -->					


							
                            <!-- ###### INICIO ABA PESSOA JURIDICA ############################# -->
                            <div id="aba_pj" class="tab-pane fade">

                                <!-- INICIO LINHA -->
                                <div class="row" style="margin-bottom: 10px;">
                                    
                                    <!-- Coluna -->
                                    <div class="col-md-3 col-xs-12 pull-right">
                                        
                                        <a class="btn btn-block btn-success-darker" href="<?php echo url(app("prefixo") . '/painel/contratos/pessoajuridica/cadastrar'); ?>">
                                            <i class="far fa-handshake"></i> Cadastrar Contrato PJ
                                        </a>

                                    </div>

                                    <!-- Coluna -->
                                    <div class="col-md-3 col-xs-12 pull-right">
                                        
                                        <a class="btn btn-block btn-success" href="<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/cadastrar'); ?>">
                                            <i class="fa fa-plus"></i> Cadastrar Pessoa Jurídica
                                        </a>

                                    </div>

                                </div>
                                <!-- FIM LINHA -->

        				        <!-- INICIO LINHA -->
                        		<div class="row">

                                    <div class="form-group col-md-2 col-xs-12">
                                        
                                        <label class="control-label">CNPJ</label>
                                        <input type="text" id="cnpj_busca" name="cnpj_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o CNPJ" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        
                                        <label class="control-label">Razão Social</label>
                                        <input type="text" id="razao_social_busca" name="razao_social_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite a Razão Social" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-4 col-xs-12">
                                        
                                        <label class="control-label">Nome Fantasia</label>
                                        <input type="text" id="nome_fantasia_busca" name="nome_fantasia_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nome Fantasia" />
                                                                                                      
                                    </div>

                                    <div class="form-group col-md-2 col-xs-12">
                                        
                                        <label class="control-label">Número do contrato</label>
                                        <input type="text" id="numero_contrato_pj_busca" name="numero_contrato_pj_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nº do Contrato" />
                                                                                                      
                                    </div>

								</div>
                				<!-- FIM LINHA -->	

								<!-- INICIO LINHA -->
                				<div class="row">

                                    <div class="form-group col-xs-12">
									
										<a href="javascript:void(null);" class="btn btn-primary pull-right btn_buscar_pj">
                                            <i class="fas fa-search"></i> Buscar
										</a>

                                    </div>

                                </div>
                				<!-- FIM LINHA -->

                				<!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                				<div class="box_alerta_carregando_pj" style="display: none;">
									Processando...
                				</div>
                				<!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
								
								<!-- INICIO CAIXA DE ALERTA DE ERRO -->
                				<div class="box_alerta_erro_pj" style="display: none;">

                                    <h4>Atenção</h4>

                                    Não foi possivel localizar uma pessoa jurídica com as informações fornecidas. 

									<br />

                                    <a href="<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/cadastrar'); ?>" class="btn btn-success pull-right">
                                        Cadastrar Nova Pessoa Jurídica
                                    </a>

									<div class="clearfix"></div>

								</div>
								<!-- FIM CAIXA DE ALERTA DE ERRO -->
								
								<!-- INICIO PANEL RESULTADO DA BUSCA -->
								<div class="panel panel-info panel-resultado-busca-pj" style="display: none;">
				                  	<div class="panel-heading">Resultado da Busca</div>
				                  	<div class="panel-body">
										
                                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
				                        <div class="table-responsive">
				                                
				                            <table class="minha_datatable_pj table table-striped table-hover table-bordered tabela">
				                            <thead>
				                            <tr>
				                                <th>CNPJ</th>
				                                <th>Nome Fantasia</th>
                                                <th>Razão Social</th>
				                                <th>Contrato Atual</th>
				                                <th>&nbsp;</th>
				                                <th>&nbsp;</th>
				                            </tr>
				                            </thead>
				                            </table>

				                        </div>
				                        <!-- FIM DIV.TABLE-RESPONSIVE -->

				                  	</div>
			                  	</div>
			                  	<!-- FIM PANEL RESULTADO DA BUSCA -->

                            </div>
                            <!-- ###### FIM ABA PESSOA JURIDICA ############################# -->

                        </div>
                        <!-- FIM CONTEUDO DAS ABAS -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->


			</div>
		</div>
	</div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

	// Garante que apenas números sejam digitados no campo cpf_busca
    $(document).on('keyup', '#cpf_busca', function() {
	 	this.value = this.value.replace(/[^0-9]/g,'');
	});

	// Garante que apenas números sejam digitados no campo cpf_busca
    $(document).on('keyup', '#cnpj_busca', function() {
	 	this.value = this.value.replace(/[^0-9]/g,'');
	});

	// Garante que apenas números (e o caracter .) sejam digitados no campo numero_contrato_busca
    $(document).on('keyup', '#numero_contrato_busca', function() {
	 	this.value = this.value.replace(/[^0-9.]/g,'');
	});

	// Garante que apenas números (e o caracter .) sejam digitados no campo numero_contrato_pj_busca
    $(document).on('keyup', '#numero_contrato_pj_busca', function() {
	 	this.value = this.value.replace(/[^0-9.]/g,'');
	});




    // Defino verificação de tecla apertada quando o foco estiver dentro de um input da INDEX PF. Caso a tecla apertada seja ENTER, executar ação padrão do botão '.btn_buscar_pf'
    $(document).on('keypress', '#cpf_busca, #nome_busca, #data_nascimento_busca, #numero_contrato_busca', function(event) {

        // Checa se a tecla apertada foi a ENTER
        if (event.which == 13) {

            // Simulo o evento 'click' no botão 'buscar' para que a busca por dados seja iniciada
            $('.btn_buscar_pf').trigger('click');

        }

    });

    // Defino verificação de tecla apertada quando o foco estiver dentro de um input da INDEX PJ. Caso a tecla apertada seja ENTER, executar ação padrão do botão '.btn_buscar_pj'
    $(document).on('keypress', '#cnpj_busca, #razao_social_busca, #nome_fantasia_busca, #numero_contrato_pj_busca', function(event) {

        // Checa se a tecla apertada foi a ENTER
        if (event.which == 13) {

            // Simulo o evento 'click' no botão 'buscar' para que a busca por dados seja iniciada
            $('.btn_buscar_pj').trigger('click');

        }

    });




	// Ativação de plugin datepicker no campo data_nascimento
    $('#data_nascimento_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });




	// Defino variaveis globais
	var tabela_pf = null;
	var tabela_pj = null;

    // Aplicando função no botão BUSCAR (PESSOA FISICA) ##############################
	$(document).on('click', '.btn_buscar_pf', function(event) {

        event.preventDefault();

        // Capto valores dos campos
        var cpf_busca = $('#cpf_busca').val();
        var nome_busca = $('#nome_busca').val();
        var data_nascimento_busca = $('#data_nascimento_busca').val();
        var numero_contrato_busca = $('#numero_contrato_busca').val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app("prefixo") . '/painel/clientes/pessoafisica/buscar'); ?>",
            data: { 
                "cpf_busca": cpf_busca,
                "nome_busca": nome_busca,
                "data_nascimento_busca": data_nascimento_busca,
                "numero_contrato_busca": numero_contrato_busca
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();
                $('.panel-resultado-busca-pf').hide();
                $('.box_alerta_erro').hide(); 

                // Revela DIV
                $('.box_alerta_carregando').show(); 

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV
                    $('.box_alerta_erro').show();                     

                } else {
                
                    // Tabela de dados
                    tabela_pf = $('.minha_datatable_pf').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response,                                        
                        stateSave: false,
                        deferRender: false,
                        info: true,
                        ordering: true,
                        paging: true,
                        searching: true,
                        autoWidth: false,
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
                        },
                        order: [[ 1, "asc" ]],
                        columns: [
                            { "data": "cpf", "name": "cpf", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "nome", "name": "nome", "width": "23%", "searchable": true, "sortable": true },
                            { "data": "data_nascimento", "name": "data_nascimento", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "vinculo", "name": "vinculo", "width": "15%", "searchable": true, "sortable": false },            
                            { "data": "razao_social", "name": "razao_social", "width": "20%", "searchable": true, "sortable": false },
                            { "data": "situacao_contrato", "name": "situacao_contrato", "width": "20%", "searchable": false, "sortable": false },
                            { "data": "btn_ver", "name": "btn_ver", "width": "7%", "searchable": false, "sortable": false },
                            { "data": "btn_editar", "name": "btn_editar", "width": "7%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

                        } 
                    });

                    // Revela DIV
                    $('.panel-resultado-busca-pf').show();

                }

            },
            complete: function(response) {
                // Revela DIV
                $('.box_alerta_carregando').hide(); 
            },
            error: function(response, thrownError) {

                // Insiro mensagem de erro dentro da DIV
                $('.msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');

                // Revela DIV
                $('.msg_erro').show();

            }
        }); 

    });
    
    // Aplicando função no evento KEYPRESS do botão BUSCAR (PESSOA FISICA)
    $(document).on('keypress', '.btn_buscar_pf', function(event) {

        // Verificamos se foi apertada a tecla ENTER através do keycode
        if (event.keyCode == 13) {

            // Indico que deve ser iniciada a função aplicada no evento CLICK
            $(this).trigger('click');

        }

    });



    // Aplicando função no botão BUSCAR (PESSOA JURIDICA) ############################
    $(document).on('click', '.btn_buscar_pj', function() {
    	
    	event.preventDefault();

    	// Capto valores dos campos
        var cnpj_busca = $('#cnpj_busca').val();
        var razao_social_busca = $('#razao_social_busca').val();
        var nome_fantasia_busca = $('#nome_fantasia_busca').val();
        var numero_contrato_pj_busca = $('#numero_contrato_pj_busca').val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app("prefixo") . '/painel/clientes/pessoajuridica/buscar'); ?>",
            data: { 
                "cnpj_busca": cnpj_busca,
                "razao_social_busca": razao_social_busca,
                "nome_fantasia_busca": nome_fantasia_busca,
                "numero_contrato_busca": numero_contrato_pj_busca
            },
            beforeSend: function() { 

            	// Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();
            	$('.panel-resultado-busca-pj').hide();
            	$('.box_alerta_erro_pj').hide(); 

            	// Revela DIV
                $('.box_alerta_carregando_pj').show(); 

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV
                    $('.box_alerta_erro_pj').show();                     

                } else {
                
                	// Tabela de dados
				    tabela_pj = $('.minha_datatable_pj').DataTable({
				        destroy: true, // Apaga datatable atual, se existir
                        data: response,                                        
				        stateSave: false,
				        deferRender: false,
				        info: true,
				        ordering: true,
				        paging: true,
				        searching: true,
				        autoWidth: false,
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
				        },
				        order: [[ 1, "asc" ]],
				        columns: [
				            { "data": "cnpj", "name": "cnpj", "width": "10%", "searchable": true, "sortable": true },
				            { "data": "nome_fantasia", "name": "nome_fantasia", "width": "23%", "searchable": true, "sortable": true },           
				            { "data": "razao_social", "name": "razao_social", "width": "20%", "searchable": true, "sortable": false },
				            { "data": "situacao_contrato", "name": "situacao_contrato", "width": "20%", "searchable": false, "sortable": false },
				            { "data": "btn_ver", "name": "btn_ver", "width": "7%", "searchable": false, "sortable": false },
				            { "data": "btn_editar", "name": "btn_editar", "width": "7%", "searchable": false, "sortable": false }
				        ],
				        "fnDrawCallback": function(oSettings) { 

				            // Ativação de TOOLTIPS, se existirem
				            $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

				        } 
				    });

                    // Revela DIV
                	$('.panel-resultado-busca-pj').show();

                }

            },
            complete: function(response) {
                // Revela DIV
                $('.box_alerta_carregando_pj').hide(); 
            },
            error: function(response, thrownError) {

                // Insiro mensagem de erro dentro da DIV
                $('.msg_erro').append('Falha na requisição. Atualize a página e tente novamente.');

                // Revela DIV
                $('.msg_erro').show();

            }
        });

    });

    // Aplicando função no evento KEYPRESS do botão BUSCAR (PESSOA JURIDICA)
    $(document).on('keypress', '.btn_buscar_pj', function(event) {

        // Verificamos se foi apertada a tecla ENTER através do keycode
        if (event.keyCode == 13) {

            // Indico que deve ser iniciada a função aplicada no evento CLICK
            $(this).trigger('click');

        }

    });

});
</script>

@stop