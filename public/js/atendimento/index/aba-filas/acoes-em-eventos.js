/*
*
* AÇÕES EM EVENTOS DE ELEMENTOS HTML
*
*/

$(document).ready(function() {

	/************************************
     #
     # Aplicando função ao evento change do combobox #medicos_hoje_filtro_especialidade
     # 
    *************************************/ 
    $(document).on('change', '#medicos_hoje_filtro_especialidade', function() { 
    
    	// Simulo evento 'click' na aba 'tab filas'
        $('#tab_filas').trigger('click');

    });




	/************************************
     #
     # Aplicando função na aba #TAB_FILAS
     # Carrega uma Datatable com a lista de médicos que atendem hoje
     # 
    *************************************/
    $(document).on('click', '#tab_filas', function(e) {

		// Requisição ajax
	    $.ajax({
	        cache: false,
	        type: "POST",
	        url: UrlBuscarMedicosQueAtendemHoje,
	        data: { 
	            "especialidade_marcada": $('#medicos_hoje_filtro_especialidade').val()
	        },
	        beforeSend: function() { 

	        	// Revela div #msg_processando
                $('#msg_processando').show();

	            // Oculto mensagem sinalizando que nenhum médico foi encontrado
	            $('.box_sem_medicos_hoje').hide();

	        },
	        success: function(response) {
	            
	            // Apago HTML da tabela, garantindo que tudo começará zerado
            	$('#aba_filas .caixa_medicos_hoje .table-responsive').empty();

	            // Convertendo resposta para objeto javascript
	            var response = JSON.parse(response);

	            // Checo retorno
	            if (response.status_requisicao == 'erro') {

	                // Exibo mensagem sinalizando que nenhum médico foi encontrado
	                $('.box_sem_medicos_hoje').show();    

	            } else if (response.status_requisicao == 'sucesso') {

	            	// Colocando HTML dentro da variavel
				    var html_temp = '';
				    html_temp +=
				    '<table class="table table-striped table-hover table-bordered" id="tabela_medicos_hoje">' +
				        '<thead>' +
				            '<tr>' +
				                '<th>Médico(a)</th>' +
				                '<th>Fila</th>' +
				                '<th class="text-center">&nbsp;</th>' +
				            '</tr>' +
				        '</thead>' +
				    '</table>';

				    // Adiciona html da tabela
				    $('#aba_filas .caixa_medicos_hoje .table-responsive').append(html_temp);

	            	// Tabela de dados
	                medicos_hoje = $('#tabela_medicos_hoje').DataTable({
	                    destroy: true, // Apaga datatable atual, se existir
	                    data: response.dados,                                        
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
	                    order: [[ 0, "asc" ]],
	                    columns: [
	                        { "data": "nome", "name": "nome", "width": "29%", "searchable": true, "sortable": true },
	                        { "data": "fila", "name": "fila", "width": "6%", "searchable": false, "sortable": false },
			    			{ "data": "btn_ver_modal_fila", "name": "btn_ver_modal_fila", "width": "2%", "searchable": false, "sortable": false }
	                    ],
				        "fnDrawCallback": function(oSettings) { 

				            // Ativação de TOOLTIPS, se existirem
				            $('[data-toggle="tooltip"]').tooltip();

				        }
	                });

	                // Exibe caixa com filtro de especialidades
	        		$('.caixa_filtro_medico_hoje_especialidade').show();

	                // Exibe tabela
	                $('.caixa_medicos_hoje').show(); 

	            }

	        },
	        complete: function(response) {
	            
	        	// Oculta div #msg_processando
                $('#msg_processando').hide();

	        },
	        error: function(response, thrownError) {

	            // Exibo mensagem sinalizando que nenhum médico foi encontrado
	            $('.box_sem_medicos_hoje').show(); 

	        }
	    });

	}).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão #BTN_VER_PACIENTES_MEDICO
     # Abre modal com lista dos pacientes para hoje do médico
     # 
    *************************************/ 
    $(document).on('click', '.btn_ver_pacientes_medico', function(event) {

        // Previne ação default do elemento
        event.preventDefault();

        // Checo se este botão possui a classe 'botao_desativado'
        if ($(this).hasClass('botao_desativado')) {

            // Não executa nenhuma ação
            return false;

        } else {

        	// Recupero CODIGO DO MÉDICO através de data-attribute no botão
        	var codigo_do_medico = $(this).data('cod-medico-crypt');

            // Requisição ajax
		    $.ajax({
		        cache: false,
		        type: "POST",
		        url: UrlBuscarPacientesHojeMedico,
		        data: { 
		            "cod_medico_crypt": codigo_do_medico
		        },
		        beforeSend: function() { 

		        	// Revela div #msg_processando
	                $('#msg_processando').show();

		            // Oculto mensagem sinalizando que nenhum médico foi encontrado
		            $('.box_sem_pacientes_hoje').hide();

		            // Limpo nome do médico dentro do modal
		            $('.mphm_nome_medico').html('');

		            // Limpo o código do médico no atributo do botão
		            $('.btn_imprimir_pacientes_fila_hoje_medico').data('cod-medico-crypt', '');

		        },
		        success: function(response) {
		            
		            // Apago HTML da tabela, garantindo que tudo começará zerado
	            	$('.caixa_pacientes_na_fila_medico .table-responsive').empty();

		            // Convertendo resposta para objeto javascript
		            var response = JSON.parse(response);

		            // Checo retorno
		            if (response.status_requisicao == 'erro') {

		            	// Coloco o nome do médico no modal
		                $('.mphm_nome_medico').html(response.nome_medico);
		                
		                // Exibo mensagem sinalizando que nenhum médico foi encontrado
		                $('.box_sem_pacientes_hoje').show();

		                // Oculta botão de imprimir fila de pacientes do médico
		                $('.btn_imprimir_pacientes_fila_hoje_medico').hide();

		                // Exibo janela modal com lista dos pacientes para hoje do médico
            			$('#modal-pacientes-hoje-medico').modal();

		            } else if (response.status_requisicao == 'sucesso') {

		            	// Colocando HTML dentro da variavel
					    var html_temp = '';
					    html_temp +=
					    '<table class="table table-striped table-hover table-bordered" id="tabela_pacientes_na_fila_medico">' +
					        '<thead>' +
					            '<tr>' +
					                '<th>Ordem</th>' +
					                '<th>Paciente</th>' +
					                '<th>Especialidade</th>' +
					                '<th>Período</th>' +
					                '<th>Status</th>' +
					                '<th>Tipo de Consulta</th>' +
					            '</tr>' +
					        '</thead>' +
					    '</table>';

					    // Adiciona html da tabela
					    $('.caixa_pacientes_na_fila_medico .table-responsive').append(html_temp);

		            	// Tabela de dados
		                medicos_hoje = $('#tabela_pacientes_na_fila_medico').DataTable({
		                    destroy: true, // Apaga datatable atual, se existir
		                    data: response.dados,                                        
		                    stateSave: false,
		                    deferRender: false,
		                    info: true,
		                    ordering: true,
		                    paging: true,
		                    searching: true,
		                    autoWidth: false,
		                    pageLength: 5,
		                    lengthMenu: [[5, 15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
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
		                    order: [ [0, "asc"] ],
		                    columns: [
		                    	{ "data": "ordem", "name": "ordem", "width": "3%", "searchable": false, "sortable": true },
		                        { "data": "nome", "name": "nome", "width": "29%", "searchable": true, "sortable": true },
		                        { "data": "especialidade", "name": "especialidade", "width": "11%", "searchable": true, "sortable": true },
		                        { "data": "periodo", "name": "periodo", "width": "10%", "searchable": true, "sortable": true },
		                        { "data": "status_consulta", "name": "status_consulta", "width": "12%", "searchable": true, "sortable": true },
		                        { "data": "tipo_consulta", "name": "tipo_consulta", "width": "10%", "searchable": true, "sortable": true }
		                    ],
					        "fnDrawCallback": function(oSettings) { 

					            // Ativação de TOOLTIPS, se existirem
					            $('[data-toggle="tooltip"]').tooltip();

					        }
		                });

		                // Coloco o nome do médico no modal
		                $('.mphm_nome_medico').html(response.nome_medico);

		                // Coloco o código do médico no atributo do botão
		                $('.btn_imprimir_pacientes_fila_hoje_medico').data('cod-medico-crypt', codigo_do_medico);

		                // Exibe botão de imprimir fila de pacientes do médico
		                $('.btn_imprimir_pacientes_fila_hoje_medico').show();

		                // Exibo janela modal com lista dos pacientes para hoje do médico
            			$('#modal-pacientes-hoje-medico').modal({keyboard: true});

		                // Exibe tabela
		                $('.caixa_pacientes_na_fila_medico').show(); 

		            }

		        },
		        complete: function(response) {
		            
		        	// Oculta div #msg_processando
	                $('#msg_processando').hide();

		        },
		        error: function(response, thrownError) {

		            // Exibo mensagem sinalizando que nenhum médico foi encontrado
		            $('.box_sem_pacientes_hoje').show();

		            // Exibo janela modal com lista dos pacientes para hoje do médico
            		$('#modal-pacientes-hoje-medico').modal();

		        }
		    });            

        }

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });




    /************************************
     #
     # Aplicando função no botão .BTN_IMPRIMIR_PACIENTES_FILA_HOJE_MEDICO
     # Abre versão para impressão da lista dos pacientes para hoje do médico
     # 
    *************************************/ 
    $(document).on('click', '.btn_imprimir_pacientes_fila_hoje_medico', function(event) {

        // Recupero CODIGO DO MEDICO através de data-attribute no botão
        var codigo_do_medico = $(this).data('cod-medico-crypt');
   
        // Abre versão para impressão em nova janela
        window.open(UrlImpressaoPacientesFilaHojeMedico + "/" + codigo_do_medico);

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });
    
}); // Fecha $(document).ready