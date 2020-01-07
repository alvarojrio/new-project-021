@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contas
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('clientes') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Contas</h3>
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
                <div class="row" style="margin-bottom: 10px;">
					
                	
                    <!-- Coluna -->
                    <div class="col-md-3 col-xs-12" style="display:none">
						
                        <a class="btn btn-block btn-success" href="<?php echo url('admin/painel/clientes/cadastrar-pessoa-juridica'); ?>">
                                <i class="fa fa-university"></i> Bancos
                        </a>

                    </div>

                    <!-- Coluna -->
                    <div class="col-md-3 col-xs-12" style="display:none">
						
                        <a class="btn btn-block btn-primary-darker" href="<?php echo url('admin/painel/contratos/cadastrar-contrato-pf'); ?>">
                                <i class="fa fa-piggy-bank"></i> Contas Bancaria
                        </a>

                    </div>

                    <!-- Coluna -->
                    <div class="col-md-3 col-xs-12">
						
                        <a class="btn btn-block btn-success-darker" href="<?php echo url('admin/painel/contas/caixas'); ?>">
                                <i class="fas fa-donate"></i> Caixas
                        </a>

                    </div>

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
            url: "<?php echo url('admin/painel/clientes/buscar-pessoa-fisica'); ?>",
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
                            $('[data-toggle="tooltip"]').tooltip();

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
            url: "<?php echo url('admin/painel/clientes/buscar-pessoa-juridica'); ?>",
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
				            $('[data-toggle="tooltip"]').tooltip();

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