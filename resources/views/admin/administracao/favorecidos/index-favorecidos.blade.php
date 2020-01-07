@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Favorecidos
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('favorecidos') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Favorecidos</h3>
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

                                    <!-- INICIO DA LINHA -->
                                    <div class="row">

                                        <!-- INICIO DA BUSCAR POR CPF -->
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-10">

                                            <div class="form-group">
                                                <label class="control-label">CPF</label>
                                                <input type="text" class="form-control col-lg-2 cpf" name="buscar_cpf" id="buscar_cpf" placeholder="Somente numeros" autocomplete="off" >
                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label><br/>
                                                        <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar_cpf'><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>    
                                            </div>    
                                        </div>
                                        <!-- FIM DA BUSCA POR CPF
                                        
                                        
                                        <!-- INICIO DA BUSCAR POR NOME -->
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-10">

                                            <div class="form-group">
                                                <label class="control-label">Nome</label>
                                                <input type="text" class="form-control col-lg-2" name="buscar_nome" id="buscar_nome" autocomplete="off" >
                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label><br/>
                                                        <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar_nome'><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>    
                                            </div>    
                                        </div>
                                        <!-- FIM DA BUSCA POR NOME -->
                                        

                                    </div>
                                    <!-- FIM LINHA -->	

                                    

                                    <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                    <div class="box_alerta_carregando" id="box_alerta_carregando_favorecido_pessoa_fisica" style="display: none">
                                        
                                        Processando...
                                        
                                    </div>
                                    <!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->

                                    <!-- INICIO CAIXA DE ALERTA DE ERRO -->
                                    <div class="box_alerta_erro" id="box_alerta_erro_favorecido_pessoa_fisica" style="display: none">

                                        <h4>Atenção</h4>

                                        Não foi possivel localizar uma pessoa física com as informações fornecidas. 
                                        <br />

                                        <a href="<?php echo url('admin/painel/favorecidos/cadastrar-favorecido-pessoa-fisica'); ?>" class="btn btn-success pull-right">
                                           Cadastrar novo favorecido pessoa física
                                        </a>

                                        <div class="clearfix"></div>


                                    </div>
                                    <!-- FIM CAIXA DE ALERTA DE ERRO -->

                                    <!-- INICIO PANEL RESULTADO DA BUSCA -->

                                    <div class="panel panel-info panel-resultado-busca-pf" id="resultado-busca-pf" style="display: none;">
                                        
                                        
                                        <div class="panel-heading">Resultado da Busca</div>  

                                        <div class="panel-body">

                                            <!-- INICIO DIV.TABLE-RESPONSIVE -->

                                            <div class="table-responsive">


                                                <table class="table table-striped table-hover table-bordered tabela" id="tabela-pessoa-fisica">

                                                    <thead>

                                                        <tr>

                                                            <th>Nome</th>

                                                            <th>CPF</th>

                                                            <th>Telefone</th>

                                                            <th>Categoria</th>

                                                            <th>&nbsp;</th>

                                                            <th>&nbsp;</th>
                                                            
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

                                    <!-- INICIO DA LINHA -->
                                    <div class="row">

                                        <!-- INICIO DA BUSCA POR CNPJ -->
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-10">

                                            <div class="form-group">
                                                <label class="control-label">CNPJ</label>
                                                <input type="text" class="form-control col-lg-2 cnpj" name="buscar_cnpj" id="buscar_cnpj" placeholder="Somente numeros">
                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label><br/>
                                                        <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar_cnpj'><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>    
                                            </div>    
                                        </div>
                                        <!-- FIM DA BUSCA POR CNPJ -->
                                        
                                        <!-- INICIO DA BUSCA POR NOME FANTASIA -->
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-10">

                                            <div class="form-group">
                                                <label class="control-label">Nome Fantasia </label>
                                                <input type="text" class="form-control col-lg-2" name="buscar_nome_fantasia" id="buscar_nome_fantasia" autocomplete="off" required="required">
                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label><br/>
                                                        <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar_nome_fantasia'><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>    
                                            </div>    
                                        </div>
                                        <!-- FIM DA BUSCA POR NOME FANTASIA -->
                                        
                                        <!-- INICIO DA BUSCA POR RAZAO SOCIAL -->
                                        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-10">

                                            <div class="form-group">
                                                <label class="control-label">Razão Social </label>
                                                <input type="text" class="form-control col-lg-2" name="buscar_razao_social" id="buscar_razao_social" autocomplete="off" required="required">
                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="control-label">&nbsp;</label><br/>
                                                        <button class="btn btn-info col-lg-10 col-md-10 col-sm-10 col-xs-10"  id='btn_buscar_razao_social'><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>    
                                            </div>    
                                        </div>
                                        <!-- FIM DA BUSCA POR RAZAO SOCIAL -->

                                    </div>
                                    <!-- FIM LINHA -->	

                                    

                                    <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                    <div class="box_alerta_carregando" id="box_alerta_carregando_favorecido_pessoa_juridica" style="display: none">
                                        
                                        Processando...
                                        
                                    </div>
                                    <!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->

                                    <!-- INICIO CAIXA DE ALERTA DE ERRO -->
                                    <div class="box_alerta_erro" id="box_alerta_erro_favorecido_pessoa_juridica" style="display: none">

                                        <h4>Atenção</h4>

                                        Não foi possivel localizar uma pessoa jurídica com as informações fornecidas. 
                                        <br />

                                        <a href="<?php echo url('admin/painel/favorecidos/cadastrar-favorecido-pessoa-juridica'); ?>" class="btn btn-success pull-right">
                                           Cadastrar novo favorecido pessoa jurídica
                                        </a>

                                        <div class="clearfix"></div>


                                    </div>
                                    <!-- FIM CAIXA DE ALERTA DE ERRO -->

                                    <!-- INICIO PANEL RESULTADO DA BUSCA -->

                                    <div class="panel panel-info panel-resultado-busca-pj" id="resultado-busca-pj" style="display: none;">
                                        
                                        
                                        <div class="panel-heading">Resultado da Busca</div>  

                                        <div class="panel-body">

                                            <!-- INICIO DIV.TABLE-RESPONSIVE -->

                                            <div class="table-responsive">


                                                <table class="table table-striped table-hover table-bordered tabela" id="tabela-pessoa-juridica">

                                                    <thead>

                                                        <tr>

                                                            <th>Nome</th>

                                                            <th>CNPJ</th>

                                                            <th>Telefone</th>

                                                            <th>Categoria</th>

                                                            <th>&nbsp;</th>

                                                            <th>&nbsp;</th>
                                                            
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
<script type="text/javascript" src="<?php echo asset('plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>  
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {
    
    // Mascaras     
    $(".cnpj").mask('00.000.000/0000-00');
    $(".cpf").mask('000.000.000-00');
    
    $(".select2_multiple").select2({
        placeholder: "Selecione as categorias",
        allowClear: true
    });
    
    
     // Ao clicar no input cpf, limpo todos os outros campo input de busca
    $("#buscar_cpf").on("click", function(){
        $("#buscar_nome").val("");
        $("#buscar_cnpj").val("");
        $("#buscar_nome_fantasia").val("");
        $("#buscar_razao_social").val("");
    });
    
    
    // Ao clicar no input nome, limpo todos os outros campo input de busca
    $("#buscar_nome").on("click", function(){
        $("#buscar_cpf").val("");
        $("#buscar_cnpj").val("");
        $("#buscar_nome_fantasia").val("");
        $("#buscar_razao_social").val("");
    });
    
    // Ao clicar no input cnpj, limpo todos os outros campo input de busca
    $("#buscar_cnpj").on("click", function(){
        $("#buscar_cpf").val("");
        $("#buscar_nome").val("");
        $("#buscar_nome_fantasia").val("");
        $("#buscar_razao_social").val("");
    });
    
    // Ao clicar no input cnpj, limpo todos os outros campo input de busca
    $("#buscar_nome_fantasia").on("click", function(){
        $("#buscar_cpf").val("");
        $("#buscar_nome").val("");
        $("#buscar_cnpj").val("");
        $("#buscar_razao_social").val("");
    });
    
    // Ao clicar no input razao social, limpo todos os outros campo input de busca
    $("#buscar_razao_social").on("click", function(){
        $("#buscar_cpf").val("");
        $("#buscar_nome").val("");
        $("#buscar_cnpj").val("");
        $("#buscar_nome_fantasia").val("");
    });
    

    // INICIO DO CONTROLE DA ABA PESSOA FISICA \\
    $("#btn_buscar_cpf, #btn_buscar_nome").on("click", function(){
        
        // Limpo as div de msg
        $("#box_alerta_carregando_favorecido_pessoa_fisica").hide();
        $("#box_alerta_erro_favorecido_pessoa_fisica").hide();
        
        // Declaro a variavel e gato que está vazia;
        var id = "";
        // Pego o id do btn clicado
        var id = $(this).attr('id');
        //alert(id);
        
        
        if(id == "btn_buscar_cpf"){
            
            // Variaveis
            var nome = "";
            var cpf = $("#buscar_cpf").val();
            

            if(cpf.length != 14){

                alert("CPF deve ter 11 digistos");
                return false;

            }
            
        
        } else if(id == "btn_buscar_nome"){
            
            // Variaveis
            var cpf = "";
            var nome = $("#buscar_nome").val();
            
            if(nome.length < 3){

                alert("Nome deve ter no mínino 3 letras");
                return false;

            }
            
            
        } else {
            
            return false;
            
        }
 
      
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/favorecidos/buscar-pessoa-fisica-ajax'); ?>",
            data: { 
                "cpf": cpf,
                "nome": nome
            },
            beforeSend: function() { 
                
                // Executa antes do envio
                
                $("#resultado-busca-pf").hide();
                $("#box_alerta_erro_favorecido_pessoa_fisica").hide();
                $("#box_alerta_carregando_favorecido_pessoa_fisica").show();

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                //alert(response.status);

                // Checo retorno
                if (response.status == 'erro') {

                    // Faz algo 
                    //alert(response.status);

                } else if (response.status == 'sucesso') {
                    
                    //alert(response.pessoa);
                    
                    if(response.pessoa == 0){
                        
                        /*
                        * Pessoa não encontrada!
                        * Informo que pessoa não foi encotrada e 
                        * Exibo o botão de cadastrar pessoa
                        */ 
                        
                        $("#resultado-busca-pf").hide();
                        $("#box_alerta_carregando_favorecido_pessoa_fisica").hide();
                        $("#box_alerta_erro_favorecido_pessoa_fisica").show();
                  
                        return false
                    
                    }else if(response.pessoa == 1){
                        
                        $("#resultado-busca-pf").hide();
                        $("#box_alerta_carregando_favorecido_pessoa_fisica").hide();
                        $("#box_alerta_erro_favorecido_pessoa_fisica").hide();
                      
                        // PAGINAÇÃO TABELA ........................................
                            $('#tabela-pessoa-fisica').DataTable({
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
                                order: [[ 1, "asc" ]],
                                columns: [
                                    { "data": "nome", "name": "nome", "width": "20%", "searchable": true, "sortable": true },
                                    { "data": "cpf", "name": "cpf", "width": "12%", "searchable": true, "sortable": true },
                                    { "data": "telefone", "name": "telefone", "width": "15%", "searchable": true, "sortable": true },
                                    { "data": "categorias", "name": "categorias", "width": "31%", "searchable": true, "sortable": true },          
                                    { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_add_fornecedor", "name": "$btn_add_fornecedor", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                                ],
                                "fnDrawCallback": function(oSettings) { 

                                    // Ativação de TOOLTIPS, se existirem
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });
                        
                            $("#resultado-busca-pf").show();
                       
                    }
            
                }

            },
            complete: function(response) {

                // Executa ao completar envio

            },
            error: function(response, thrownError) {

                // Faz algo se der erro

            }
        });
        
    });
    // FIM DO CONTROLE DA ABA PESSOA FISICA \\
    
    /**************************************************************************/
    
    // INICIO DO CONTROLE DA ABA PESSO JURIDICA \\
    
    $("#btn_buscar_cnpj, #btn_buscar_nome_fantasia, #btn_buscar_razao_social").on("click", function(){
   
        // Limpo as div de msg
        $("#box_alerta_carregando_favorecido_pessoa_fisica").hide();
        $("#box_alerta_erro_favorecido_pessoa_fisica").hide();
        
        
        // Declaro a variavel e gato que está vazia;
        var id = "";
        // Pego o id do btn clicado
        id = $(this).attr('id');
        
        
        switch(id){
            
            case "btn_buscar_cnpj":
                
                var cnpj = $("#buscar_cnpj").val();
                //alert(cnpj);

                if(cnpj.length != 18){

                    alert("CNPJ deve ter 18 digitos");
                    return false;

                }
                
            break;
            
            case "btn_buscar_nome_fantasia":
                
                 var nome_fantasia = $("#buscar_nome_fantasia").val();
                //alert(nome_fantasia);

                if(nome_fantasia.length < 3){

                    alert("Nome fantasia deve ter no mínimo 3 caracteres");
                    return false;

                }
                
            break;
            
            case "btn_buscar_razao_social":
                
                var razao_social = $("#buscar_razao_social").val();
                //alert(razao_social);

                if(razao_social.length < 3){

                    alert("Razão social deve ter no mínimo 3 caracteres");
                    return false;

                }
                
            break;
            
            default:
                alert("Ocorreu um erro, favor tente novamente.");
                return false;
            break
            
        }
        
    
      
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/favorecidos/buscar-pessoa-juridica-ajax'); ?>",
            data: { 
                "cnpj": cnpj,
                "nome_fantasia": nome_fantasia,
                "razao_social": razao_social
            },
            beforeSend: function() { 
                
                // Executa antes do envio
                
                $("#resultado-busca-pj").hide();
                $("#box_alerta_erro_favorecido_pessoa_juridica").hide();
                $("#box_alerta_carregando_favorecido_pessoa_juridica").show();

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                //alert(response.status);

                // Checo retorno
                if (response.status == 'erro') {

                    // Faz algo 
                    //alert(response.status);

                } else if (response.status == 'sucesso') {
                    
                    //alert(response.pessoa);
                    
                    if(response.pessoa == 0){
                        
                        /*
                        * Pessoa não encontrada!
                        * Informo que pessoa não foi encotrada e 
                        * Exibo o botão de cadastrar pessoa
                        */ 
                        
                        $("#resultado-busca-pj").hide();
                        $("#box_alerta_carregando_favorecido_pessoa_juridica").hide();
                        $("#box_alerta_erro_favorecido_pessoa_juridica").show();
                 
                        return false
                    
                    }else if(response.pessoa == 1){
                        
                        $("#resultado-busca-pj").hide();
                        $("#box_alerta_carregando_favorecido_pessoa_juridica").hide();
                        $("#box_alerta_erro_favorecido_pessoa_juridica").hide();
                      
                        // PAGINAÇÃO TABELA ........................................
                            $('#tabela-pessoa-juridica').DataTable({
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
                                order: [[ 1, "asc" ]],
                                columns: [
                                    { "data": "nome", "name": "nome", "width": "20%", "searchable": true, "sortable": true },
                                    { "data": "cnpj", "name": "cnpj", "width": "12%", "searchable": true, "sortable": true },
                                    { "data": "telefone", "name": "telefone", "width": "15%", "searchable": true, "sortable": true },
                                    { "data": "categorias", "name": "categorias", "width": "31%", "searchable": true, "sortable": true },          
                                    { "data": "btn_ver", "name": "btn_ver", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_add_fornecedor", "name": "$btn_add_fornecedor", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_editar", "name": "btn_editar", "width": "3%", "searchable": false, "sortable": false },
                                    { "data": "btn_inativar", "name": "btn_inativar", "width": "3%", "searchable": false, "sortable": false }
                                ],
                                "fnDrawCallback": function(oSettings) { 

                                    // Ativação de TOOLTIPS, se existirem
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });
                        
                            $("#resultado-busca-pj").show();
                       
                    }
            
                }

            },
            complete: function(response) {

                // Executa ao completar envio

            },
            error: function(response, thrownError) {

                // Faz algo se der erro

            }
        });
        
    });
    
    // FIM DO CONTROLE DA ABA PESSO JURIDICA \\
    

});
</script>

@stop