@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Cadastrar Tabela Modelo
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/jQuery-File-Upload-9.11.2/css/jquery.fileupload.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/jQuery-File-Upload-9.11.2/css/jquery.fileupload-ui.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-cadastrar-template') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Cadastrar Tabela Modelo <small>Importação de arquivo</small></h3>
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
                    
                    <div class="col-md-12 col-xs-12" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin-top: 0px;">Instruções</h4>
                            
                            - Para cadastrar a Tabela Modelo será necessário configurar o arquivo a ser importado seguindo a organização de colunas presente no modelo a seguir.
                            
                            <br /><br />

                            <a href="{{ url('/downloads/tabelastemplates/Tabela_Modelo_Exemplo.xlsx')}}">
                                <b>Download do modelo</b>
                            </a> 

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
				<div class="row">

					<div class="col-xs-12">

						<h2>Dados Gerais</h2>

					</div>

				</div>
				<!-- FIM LINHA -->


				
				<!-- INICIO LINHA -->
				<div class="row">
				
					<div class="form-group col-sm-6 col-xs-12">									

						<label class="control-label">Descrição <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off" <?php if (!empty(old('descricao'))) { ?>value="<?php echo old('descricao'); ?>"<?php } ?>>
							
                    </div>
                    
                    <div class="form-group col-sm-3 col-xs-12">
                                                                    
						<label class="control-label">Data de Criação <span class="required-red">*</span></label>
                        <input type="text" class="form-control datepicker" name="data_criacao" id="data_criacao" placeholder="Data Criação" autocomplete="off" readonly="readonly" <?php if (!empty(old('data_criacao'))) { ?>value="<?php echo old('data_criacao'); ?>"<?php } ?>>
                                                                                                                                       
					</div>  

				</div>
				<!-- FIM LINHA -->



				<!-- INICIO LINHA -->
				<div class="row">                                                          							
                                                                
					<div class="col-sm-6 col-xs-12">
						
						<div><b>Arquivo da Tabela <span class="required-red">*</span></b></div>

                        <span class="btn btn-primary fileinput-button" style="margin-top: 7px; margin-bottom: 15px;">
			                <i class="fa fa-plus"></i>
			                <span>Selecionar arquivo...</span>
			                <input type="file" id="arquivo" name="arquivo" />
			            </span>

                    </div>

                </div>
                <!-- FIM LINHA -->



                <!-- INICIO LINHA -->
				<div class="row"> 
					
					<div class="col-xs-12">
						
						<!-- Barra de progresso geral -->
			            <div class="progress">
			                <div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%;"></div>
			            </div>

			            <!-- Caixa para exibir nome do arquivo selecionado -->
			            <div id="info_arquivo"><b>Nenhum arquivo selecionado. Selecione um arquivo antes de prosseguir.</b></div>

					</div>

				</div>
                <!-- FIM LINHA -->
                


                <!-- INICIO LINHA -->                                    
				<div class="row">

					<div class="clearfix"></div>

					<hr />

					<div class="col-sm-6 col-xs-12">
						
						<!-- Caixa para exibir o botão de upload -->
        				<div id="espacodobotao"></div>

					</div>				

				</div>	
				<!-- FIM LINHA -->



				<!--</form>-->


			</div>
		</div>
	</div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="{{ asset('plugins/jQuery-File-Upload-9.11.2/js/vendor/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jQuery-File-Upload-9.11.2/js/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jQuery-File-Upload-9.11.2/js/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jQuery-File-Upload-9.11.2/js/jquery.fileupload-process.js') }}"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativando datepicker em campos                    
    $('.datepicker').datepicker({
    	format: 'dd/mm/yyyy',
    	language: 'pt-BR',
    	weekStart: 0,
    	endDate: '+5y',
    	startDate: '0d',
    	todayHighlight: true,
    	autoclose: true
    });

    // Preparo o padrão do BOTÃO de upload para ser usado pelo plugin FILEUPLOAD depois
    var botao_upload = $('<button id="atualizar" type="submit"></button>')
                            .addClass('btn btn-success')
                            .html('<i class="fa fa-plus"></i> Salvar template')
                            .on('click', function() {

                                var data = $(this).data();

                                data.submit().always(function() {
                                    $('#atualizar').remove();
                                });

                        	});

    // Envio / upload do arquivo
    $('#arquivo').fileupload({
        url: "<?php echo url('admin/painel/tabelastemplates/cadastrar-tabela-template'); ?>",
        type: 'post',
        singleFileUploads: true,
        autoUpload: false,
        fail: function (e, data) {

            // Insiro a resposta do procedimento dentro da DIV de resposta adequada
            $('.msg_erro').append(data);

            // Revela DIV
            $('.msg_erro').show();

            //console.log(data.jqXHR.responseText);

        },
        done: function (e, data) {
            
            $('.progress-bar').html('ENVIO CONCLUÍDO. EFETUANDO LEITURA DO ARQUIVO.');

            // O valor da variavel RESPOSTA é recolhido diferente dependendo do navegador
            var resposta = '';

            if (navigator.appVersion.indexOf('MSIE ') != -1) {

                resposta = data.result[0].body.innerHTML;

            } else {

                resposta = data.result;

            } 

            // Verifico o tipo de retorno
            if (resposta == "erro_arquivo_invalido") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('O arquivo selecionado é inválido.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_peso_excedido") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('O peso máximo do arquivo foi excedido.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_naosalvou_arquivo") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('O arquivo não pôde ser salvo na pasta temporária.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_sem_arquivo") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('Nenhum arquivo foi selecionado.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "sem_linhas") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('O arquivo enviado não possui linhas ou elas não puderam ser lidas.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_descricao_vazia") { 

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('É necessário informar uma descrição para a tabela template.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_data_criacao_vazia") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('É necessário informar uma data de criação para a tabela template.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_descricao_ja_existe") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('Já existe uma tabela template cadastrada com esta descrição.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_criacao_template") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('Erro ao criar um novo registro de tabela template.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_montagem_vetor") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('Erro ao montar lista de procedimentos para inserção.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "erro_inserir_dados") {

                // Insiro a resposta do procedimento dentro da DIV de resposta adequada 
                $('.msg_erro').append('Erro ao cadastrar procedimentos para esta tabela template.');

                // Revela DIV
                $('.msg_erro').show();

            } else if (resposta == "sucesso") {

                // Redireciono
                window.location.replace("<?php echo url('admin/painel/tabelas'); ?>");
                //console.log('sucesso');

            }

        },
        progress: function (e, data) {

            var progress = parseInt(data.loaded / data.total * 100, 10);

            $('.progress-bar').css('width', progress + '%');
            $('.progress-bar').html(progress + '%');

        }
    }).on('fileuploadadd', function (e, data) { // callback

    	// Limpo e oculto div de erros
    	$('.msg_erro').html('');
    	$('.msg_erro').hide();

        // Insiro o BOTÃO de upload na div
        var espaco_botao = $('#espacodobotao');

        espaco_botao.empty();
        espaco_botao.append(botao_upload.clone(true).data(data));
        espaco_botao.appendTo(data.context);

        // Carrego o nome do arquivo selecionado na div
        $.each(data.files, function (index, file) { 
            $('#info_arquivo').empty(); 
            $('#info_arquivo').append('<b>Arquivo selecionado:</b> ' + file.name);
        });

    }).on('fileuploadchange', function (e, data) { // callback
        
        // Zero a barra de progresso
        $('.progress-bar').css('width', '0%');
        $('.progress-bar').html('0%');

    }).on('fileuploadsubmit', function (e, data) { // callback

        // Passo dados adicionais no evento submit
        data.formData = { descricao: $('input#descricao').val(), data_criacao: $('input#data_criacao').val() };

    }).on('fileuploadalways', function (e, data) { // callback

        //console.log('Resposta: ' + data.result);

    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

});
</script>

@stop