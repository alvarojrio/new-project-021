@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Definir Valores
@stop

@section('includes_no_head')

<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-definir-valores') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Tabela <small>Definir Valores de Procedimentos</small></h3>
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
                


                
                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">
                        
                        <h4>Definindo valores da tabela: <b><?php echo $tabela->nome_tabela; ?></b></h4>

                        É importante ressaltar que ao definir a data de vigência de um preço para a data de hoje, o procedimento terá automaticamente seu status alterado para <b>ativo</b>.

                        <br /><br />

                    </div>

                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12" align="center">

                        <a class="btn btn-md btn-primary" href="<?php echo url('admin/painel/tabelas/definir-valores-procedimentos-ativos-tabela/' . Crypt::encrypt($tabela->cod_tabela)); ?>">
                            <i class="fa fa-dna"></i> Mostrar Procedimentos Ativos
                        </a>

                        <a class="btn btn-md btn-info" href="<?php echo url('admin/painel/tabelas/definir-valores-procedimentos-inativos-tabela/' . Crypt::encrypt($tabela->cod_tabela)); ?>">
                            <i class="fa fa-dna"></i> Mostrar Procedimentos Inativos
                        </a>

                        <br /><br />

                    </div>
         
                </div>
                <!-- FIM LINHA -->




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-md-3 col-xs-12">

                        <!-- INICIO FORM-GROUP -->
                        <div class="form-group">

                            <label class="control-label">Tipo de Cobrança <span class="required-red">*</span></label>
                            <select class="form-control" name="tipo_cobranca" id="tipo_cobranca">
                                <option value="">Selecione uma opção</option>
                                <option value="unidade" <?php if (old('tipo_cobranca') == "unidade") { echo "selected"; } ?>>
                                    Digitar Valor R$
                                </option>
                                <option value="boleto" <?php if (old('tipo_cobranca') == "boleto") { echo "selected"; } ?>>
                                    Por CH/ Filme
                                </option>
                            </select>

                        </div>
                        <!-- FIM FORM-GROUP -->

                    </div>     

                    <div class="form-group col-md-3 col-xs-12 linha_campos_extras" style="display: none;">
                        <label class="control-label">Valor CH <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="valor_ch" id="valor_ch" placeholder="0.00" autocomplete="off" <?php if (!empty(old('valor_ch'))) { ?>value="<?php echo old('valor_ch'); ?>"<?php } ?>>
                    </div>
                          
                    <div class="form-group col-md-3 col-xs-12 linha_campos_extras" style="display: none;">
                        <label class="control-label">Valor Filme </label>
                        <input type="text" class="form-control" name="valor_filme" id="valor_filme" placeholder="0.00" autocomplete="off" <?php if (!empty(old('valor_filme'))) { ?>value="<?php echo old('valor_filme'); ?>"<?php } ?>>
                    </div>                  

                </div>
                <!-- FIM LINHA -->            




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">  

                        <h2>Lista de Procedimentos Ativos</h2>

                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
                        <div class="table-responsive">
                                
                            <table class="minha_datatable table table-striped table-hover table-bordered tabela">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Custo R$</th>
                                <th>Venda R$</th>
                                <th>Data de Inicio</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td>Status</td>
                                <td>Código</td>
                                <td>Descrição</td>
                                <td>Custo R$</td>
                                <td>Venda R$</td>
                                <td>Data de Inicio</td>
                                <td>&nbsp;</td>
                            </tr>
                            </tfoot>
                            </table>

                        </div>
                        <!-- FIM DIV.TABLE-RESPONSIVE -->
 
                    </div>

                </div>
                <!-- FIM LINHA -->



                <br /><br />



                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-xs-12">
                        
                        <a class="btn btn-md btn-info" href="<?php echo url('admin/painel/tabelas'); ?>">
                            <i class="fa fa-bars"></i> IR PARA LISTA DE TABELAS
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
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Aplicando função no combobox TIPO DE COBRANÇA
    $(document).on('change', '#tipo_cobranca', function() {

        // Reseta a Datatable para estado original
        tabela.ajax.reload();

        // Zera valores de campos
        $('#valor_ch').val('');
        $('#valor_filme').val('');

        // Caso TIPO DE COBRANÇA seja igual a BOLETO (POR CH)
        if (this.value == 'boleto') { 

            // Ativa máscara de dinheiro em campos
            $('#valor_ch').maskMoney();
            $('#valor_filme').maskMoney();

            // Mostra linha dos campos adicionais
            $('.linha_campos_extras').show();            

        } else {

            // Oculta linha dos campos adicionais
            $('.linha_campos_extras').hide();

        }
        
    }); 

                        
    // Capto o código (criptografado) da tabela que estará sendo trabalhada
    var cod_tabela_criptografado = '<?php echo $cod_tabela_criptografado; ?>'; 

    // Tabela de dados
    var tabela = $('.minha_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "<?php echo url('admin/painel/tabelas/datatable-tabelas-procedimentos'); ?>",
            "type": "POST",
            "data": {
                "cod_tabela_criptografado": cod_tabela_criptografado
            }
        },
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
        order: [[ 2, "asc" ]],
        columns: [
            { "data": 0, "name": "status", "width": "8%", "searchable": false, "sortable": false },
            { "data": 1, "name": "codigo", "width": "10%", "searchable": true, "sortable": true },
            { "data": 2, "name": "descricao", "width": "35%", "searchable": true, "sortable": true },            
            { "data": 3, "name": "custo", "width": "10%", "searchable": false, "sortable": false },
            { "data": 4, "name": "venda", "width": "10%", "searchable": false, "sortable": false },
            { "data": 5, "name": "data_inicio", "width": "12%", "searchable": false, "sortable": false },
            { "data": 6, "name": "editar", "width": "9%", "searchable": false, "sortable": false }
        ],
        "fnDrawCallback": function(oSettings) { 

            // Ativação de TOOLTIPS, se existirem
            $('[data-toggle="tooltip"]').tooltip();

        } 
    });


    // Aplicando função no botão EDITAR
    $(document).on('click', '.btn_editar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Capto o TIPO DE COBRANÇA selecionado
        var tipo_cobranca = $('#tipo_cobranca option:selected').val(); 

        // Checo se foi selecionada uma tabela modelo
        if (tipo_cobranca == '') {

            // Alerta de erro
            alert('Primeiro você deve selecionar o tipo de cobrança.');

        } else if (tipo_cobranca == 'unidade') { // Checo se o tipo de cobrança é igual a 'unidade' (DIGITAR VALOR)

            // Faço loop pelas células (TDs) da linha
            $.each($tds, function(i, el) {

                // Checa se o loop está na coluna CUSTO
                if (i == 3) {

                    // Capto o texto atual dentro da célula, se houver
                    var txt = $(this).text();

                    // Limpo a célula
                    $(this).html('');

                    // Adiciono o novo input
                    $(this).append('<input type="text" class="form-control" id="valor_custo" name="valor_custo" value="' + txt + '" placeholder="R$ 00,00" autocomplete="off" style="width: 100%;">');
                
                } else if (i == 4) { // Caso seja a coluna VENDA

                    // Capto o texto atual dentro da célula, se houver
                    var txt = $(this).text();

                    // Limpo a célula
                    $(this).html('');

                    // Adiciono o novo input
                    $(this).append('<input type="text" class="form-control" id="valor_venda" name="valor_venda" value="' + txt + '" placeholder="R$ 00,00" autocomplete="off" style="width: 100%;">');

                } else if (i == 5) { // Caso seja a coluna DATA INICIO

                    // Capto o texto atual dentro da célula, se houver
                    var txt = $(this).text();

                    // Limpo a célula
                    $(this).html('');

                    // Adiciono o novo input
                    $(this).append('<input type="text" class="form-control" id="data_inicio" name="data_inicio" autocomplete="off" value="' + txt + '" style="width: 100%;">');

                } else if (i == 6) { // Caso seja a coluna do botão editar

                    // Limpa célula
                    $(this).html('');

                    // Adiciono botão CANCELAR
                    $(this).append('<a class="btn btn-sm btn-danger btn_cancelar" href="javascript:void(null);"><i class="fa fa-times-circle"></i></a>');

                    // Adiciono botão SALVAR
                    $(this).append('<a class="btn btn-sm btn-success btn_salvar" href="javascript:void(null);"><i class="fa fa-save"></i></a>');

                }

            }); // Fecha loop

            // Ativa máscara de dinheiro em campos
            $('#valor_custo').maskMoney();
            $('#valor_venda').maskMoney();

            // Ativo datepicker em campo
            $("#data_inicio").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                startDate: '0d',
                language: 'pt-BR'   
            });

        } else if (tipo_cobranca == 'boleto') { // Checo se o tipo de cobrança é igual a 'boleto' (POR CH/FILME)

            // Defino o valor da variavel 'cod_procedimento'
            var cod_procedimento = $row.find('input#cod_procedimento').val();

            // Variaveis para guardar valores de inputs adicionais
            var valor_ch = $('#valor_ch').val();
            var valor_filme = $('#valor_filme').val();

            // Checo se foi campo 'valor_ch' foi preenchido
            if (valor_ch == '') {

                // Alerta de erro
                alert('Primeiro você deve preencher o campo valor CH.');

            } else {

                // Requisição ajax
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "<?php echo url('admin/painel/procedimentos/gerar-custo-procedimento'); ?>",
                    data: { 
                        "cod_procedimento": cod_procedimento,
                        "valor_ch": valor_ch,
                        "valor_filme": valor_filme
                    },
                    beforeSend: function() { 
                        // Nothing here
                    },
                    success: function(response) {
                        
                        // Convertendo resposta para objeto javascript
                        var response = JSON.parse(response);

                        // Checo retorno
                        if (response.status == 'erro') {

                            // Alerta de erro
                            alert('Falha ao calcular o valor do custo. Atualize a página e tente novamente.');                      

                        } else if (response.status == 'sucesso') {

                            // Faço loop pelas células (TDs) da linha
                            $.each($tds, function(i, el) {

                                // Checa se o loop está na primeira coluna
                                if (i == 1) {

                                    // Defino o valor dos campos ocultos 'valor_ch_do_calculo' e 'valor_filme_do_calculo'
                                    $(this).find('input#valor_ch_do_calculo').val(valor_ch);
                                    $(this).find('input#valor_filme_do_calculo').val(valor_filme);

                                } else if (i == 3) { // Caso seja a coluna CUSTO

                                    // Limpo a célula
                                    $(this).html('');

                                    // Adiciono o novo input
                                    $(this).append('<input type="text" class="form-control" id="valor_custo" name="valor_custo" value="' + response.custo + '" readonly="readonly" placeholder="R$ 00,00" autocomplete="off" style="width: 100%;">');

                                } else if (i == 4) { // Caso seja a coluna VENDA

                                    // Capto o texto atual dentro da célula, se houver
                                    var txt = $(this).text();

                                    // Limpo a célula
                                    $(this).html('');

                                    // Adiciono o novo input
                                    $(this).append('<input type="text" class="form-control" id="valor_venda" name="valor_venda" value="' + txt + '" placeholder="R$ 00,00" autocomplete="off" style="width: 100%;">');
                                
                                } else if (i == 5) { // Caso seja a coluna DATA INICIO

                                    // Capto o texto atual dentro da célula, se houver
                                    var txt = $(this).text();

                                    // Limpo a célula
                                    $(this).html('');

                                    // Adiciono o novo input
                                    $(this).append('<input type="text" class="form-control" id="data_inicio" name="data_inicio" autocomplete="off" value="' + txt + '" style="width: 100%;">');

                                } else if (i == 6) { // Caso seja a coluna do botão editar

                                    // Limpa célula
                                    $(this).html('');

                                    // Adiciono botão CANCELAR
                                    $(this).append('<a class="btn btn-sm btn-danger btn_cancelar" href="javascript:void(null);"><i class="fa fa-times-circle"></i></a>');

                                    // Adiciono botão SALVAR
                                    $(this).append('<a class="btn btn-sm btn-success btn_salvar" href="javascript:void(null);"><i class="fa fa-save"></i></a>');

                                }

                            }); // Fecha loop

                            // Ativa máscara de dinheiro em campos
                            $('#valor_venda').maskMoney();

                            // Ativo datepicker em campo
                            $("#data_inicio").datepicker({
                                autoclose: true,
                                format: 'dd/mm/yyyy',
                                startDate: '0d',
                                language: 'pt-BR'   
                            });

                        }

                    },
                    complete: function(response) {
                        // Nothing here
                    },
                    error: function(response, thrownError) {

                        // Alerta de erro
                        alert('Falha ao calcular o valor do custo. Atualize a página e tente novamente.');

                    }
                }); 

            }

        }

    });


    // Aplicando função no botão CANCELAR EDIÇÃO
    $(document).on('click', '.btn_cancelar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Variaveis para guardar valores dos inputs e códigos
        var cod_procedimento = $row.find('input#cod_procedimento').val();
        var valor_custo = '';
        var valor_venda = '';

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/procedimentos/buscar-valores-procedimento-ajax'); ?>",
            data: { 
                "cod_procedimento": cod_procedimento
            },
            beforeSend: function() { 
                // Resetando todos os possiveis Toast
                $.toast().reset('all');
            },
            success: function(response) {
               
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                } else if (response.status == 'sucesso') {

                    // Faço loop pelas células (TDs) da linha
                    $.each($tds, function(i, el) {

                        // Checa se o loop está na coluna CUSTO
                        if (i == 3) {

                            // Preenche célula com novo valor
                            $(this).html(response.dados.valor_custo);

                        } else if (i == 4) { // Caso seja a coluna VENDA

                            // Preenche célula com novo valor
                            $(this).html(response.dados.valor_venda);

                        } else if (i == 5) { // Caso seja a coluna DATA INICIO

                            // Preenche célula com novo valor
                            $(this).html(response.dados.data_inicio);

                        } else if (i == 6) { // Caso seja a coluna do botão editar

                            // Limpa célula
                            $(this).html('');

                            // Adiciono botão EDITAR
                            $(this).append('<a class="btn btn-sm btn-info btn_editar" href="javascript:void(null);"><i class="fa fa-edit"></i></a>');

                        }

                    }); // Fecha loop

                }                

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Falha na comunicação com a base de dados.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: false,
                    allowToastClose: true
                });

            }
        }); 

    });


    // Aplicando função no botão SALVAR EDIÇÃO
    $(document).on('click', '.btn_salvar', function() {

        // Capto a linha mais próxima do botão
        var $row = $(this).closest('tr');

        // Capto as células (TD) da linha
        var $tds = $row.find('td');

        // Variaveis para guardar valores dos inputs e códigos
        var cod_procedimento = '';
        var valor_ch_do_calculo = '';
        var valor_filme_do_calculo = '';
        var valor_custo = '';
        var valor_venda = '';
        var data_inicio = '';

        // Capto o TIPO DE COBRANÇA selecionado
        var tipo_cobranca = $('#tipo_cobranca option:selected').val(); 

        // Checo se foi selecionada uma tabela modelo
        if (tipo_cobranca == '') {

            // Alerta de erro
            alert('Primeiro você deve selecionar o tipo de cobrança.');

        } else if (tipo_cobranca == 'unidade') { // Checo se o tipo de cobrança é igual a 'unidade' (DIGITAR VALOR)

            // Faço loop pelas células (TDs) da linha
            $.each($tds, function(i, el) {

                // Checa se o loop está na primeira coluna
                if (i == 1) {

                    // Defino o valor da variavel 'cod_procedimento'
                    cod_procedimento = $(this).find('input#cod_procedimento').val();

                } else if (i == 3) { // Caso seja a coluna CUSTO

                    // Defino valor de variavel 'valor_custo'
                    valor_custo = $(this).find('input').val();

                } else if (i == 4) { // Caso seja a coluna VENDA

                    // Defino valor de variavel 'valor_venda'
                    valor_venda = $(this).find('input').val();

                } else if (i == 5) { // Caso seja a coluna DATA INICIO

                    // Defino valor de variavel 'data_inicio'
                    data_inicio = $(this).find('input').val();

                }

            }); // Fecha loop

            // Variavel do Toast da mensagem 'processando...'
            var toast_processando = '';

            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/procedimentos/salvar-procedimento'); ?>",
                data: { 
                    "cod_procedimento": cod_procedimento,
                    "tipo_cobranca": tipo_cobranca,
                    "valor_custo": valor_custo,
                    "valor_venda": valor_venda,
                    "data_inicio": data_inicio
                },
                beforeSend: function() { 
                    // Resetando todos os possiveis Toast
                    $.toast().reset('all');

                    // Mostra mensagem 'processando...'
                    /*toast_processando = $.toast({
                        text: 'Processando...',
                        showHideTransition: 'fade',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: false
                    });*/
                },
                success: function(response) {
                    
                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                        // Mostra mensagem de erro
                        $.toast({
                            heading: 'Erro',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true
                        });

                    } else if (response.status == 'sucesso') {

                        // Faço loop pelas células (TDs) da linha
                        $.each($tds, function(i, el) {

                            // Checa se o loop está na coluna STATUS
                            if (i == 0) {

                                // Limpa célula
                                $(this).html('');

                                // Checa status retornado
                                if (response.dados.status == '1') {
                                
                                    // Atualiza valor da badge
                                    $(this).html('<span class="label label-success" style="font-size:14px;">Ativo</span>');
                                
                                } else {

                                    // Atualiza valor da badge
                                    $(this).html('<span class="label label-danger" style="font-size:14px;">Inativo</span>');

                                }

                            } else if (i == 3) { // Caso seja a coluna CUSTO

                                // Preenche célula com novo valor
                                $(this).html(response.dados.valor_custo);

                            } else if (i == 4) { // Caso seja a coluna VENDA

                                // Preenche célula com novo valor
                                $(this).html(response.dados.valor_venda);

                            } else if (i == 5) { // Caso seja a coluna DATA INICIO

                                // Preenche célula com novo valor
                                $(this).html(response.dados.data_inicio);

                            } else if (i == 6) { // Caso seja a coluna do botão editar

                                // Limpa célula
                                $(this).html('');

                                // Adiciono botão EDITAR
                                $(this).append('<a class="btn btn-sm btn-info btn_editar" href="javascript:void(null);"><i class="fa fa-edit"></i></a>');

                            }

                        }); // Fecha loop

                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Dados atualizados com sucesso.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 2000, // em milisegundos
                            allowToastClose: true
                        });

                    }

                },
                complete: function(response) {
                    // Oculta mensagem 'processando...'
                    //toast_processando.reset();
                },
                error: function(response, thrownError) {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Falha na comunicação com a base de dados.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
            }); 

        } else if (tipo_cobranca == 'boleto') { // Checo se o tipo de cobrança é igual a 'boleto' (POR CH/FILME)

            // Faço loop pelas células (TDs) da linha
            $.each($tds, function(i, el) {

                // Checa se o loop está na primeira coluna
                if (i == 1) {

                    // Defino o valor da variavel 'cod_procedimento'
                    cod_procedimento = $(this).find('input#cod_procedimento').val();

                    // Defino o valor das variaveis 'valor_ch_do_calculo' e 'valor_filme_do_calculo'
                    valor_ch_do_calculo = $(this).find('input#valor_ch_do_calculo').val();
                    valor_filme_do_calculo = $(this).find('input#valor_filme_do_calculo').val();

                } else if (i == 3) { // Caso seja a coluna CUSTO

                    // Defino valor de variavel 'valor_custo'
                    valor_custo = $(this).find('input').val();

                } else if (i == 4) { // Caso seja a coluna VENDA

                    // Defino valor de variavel 'valor_venda'
                    valor_venda = $(this).find('input').val();

                } else if (i == 5) { // Caso seja a coluna DATA INICIO

                    // Defino valor de variavel 'data_inicio'
                    data_inicio = $(this).find('input').val();

                }

            }); // Fecha loop

            // Variavel do Toast da mensagem 'processando...'
            var toast_processando = '';

            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/procedimentos/salvar-procedimento'); ?>",
                data: { 
                    "cod_procedimento": cod_procedimento,
                    "tipo_cobranca": tipo_cobranca,
                    "valor_custo": valor_custo,
                    "valor_venda": valor_venda,
                    "data_inicio": data_inicio,
                    "valor_ch_do_calculo": valor_ch_do_calculo,
                    "valor_filme_do_calculo": valor_filme_do_calculo
                },
                beforeSend: function() { 
                    // Resetando todos os possiveis Toast
                    $.toast().reset('all');

                    // Mostra mensagem 'processando...'
                    /*toast_processando = $.toast({
                        text: 'Processando...',
                        showHideTransition: 'fade',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: false
                    });*/
                },
                success: function(response) {
                    
                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                        // Mostra mensagem de erro
                        $.toast({
                            heading: 'Erro',
                            text: response.erro,
                            showHideTransition: 'fade',
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: false,
                            allowToastClose: true
                        });

                    } else if (response.status == 'sucesso') {

                        // Faço loop pelas células (TDs) da linha
                        $.each($tds, function(i, el) {

                            // Checa se o loop está na coluna STATUS
                            if (i == 0) {

                                // Limpa célula
                                $(this).html('');

                                // Checa status retornado
                                if (response.dados.status == '1') {
                                
                                    // Atualiza valor da badge
                                    $(this).html('<span class="label label-success" style="font-size:14px;">Ativo</span>');
                                
                                } else {

                                    // Atualiza valor da badge
                                    $(this).html('<span class="label label-danger" style="font-size:14px;">Inativo</span>');

                                }

                            } else if (i == 3) { // Caso seja a coluna CUSTO

                                // Preenche célula com novo valor
                                $(this).html(response.dados.valor_custo);

                            } else if (i == 4) { // Caso seja a coluna VENDA

                                // Preenche célula com novo valor
                                $(this).html(response.dados.valor_venda);

                            } else if (i == 5) { // Caso seja a coluna DATA INICIO

                                // Preenche célula com novo valor
                                $(this).html(response.dados.data_inicio);

                            } else if (i == 6) { // Caso seja a coluna do botão editar

                                // Limpa célula
                                $(this).html('');

                                // Adiciono botão EDITAR
                                $(this).append('<a class="btn btn-sm btn-info btn_editar" href="javascript:void(null);"><i class="fa fa-edit"></i></a>');

                            }

                        }); // Fecha loop

                        // Mostra mensagem de sucesso
                        $.toast({
                            heading: 'Sucesso',
                            text: 'Dados atualizados com sucesso.',
                            showHideTransition: 'fade',
                            icon: 'success',
                            position: 'top-right',
                            hideAfter: 2000, // em milisegundos
                            allowToastClose: true
                        });

                    }

                },
                complete: function(response) {
                    // Oculta mensagem 'processando...'
                    //toast_processando.reset();
                },
                error: function(response, thrownError) {

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Erro',
                        text: 'Falha na comunicação com a base de dados.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
            });

        }

    });

});                  
</script>

@stop