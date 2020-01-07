@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Carteirinhas
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/printjs/print.min.css') }}" rel="stylesheet">
@stop

@section('conteudo')

{!! Breadcrumbs::render('carteirinhas') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Carteirinhas - PJ</h3>
    </div>
</div>



<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- ##################### INICIO CAIXA QUAL PACIENTE ##################### -->
                <div class="panel panel-info panel_qual_paciente">
                    <div class="panel-heading">PARA QUAL EMPRESA?</div>
                    <div class="panel-body">

                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-sm-2 col-xs-12">

                                <label class="control-label">Buscar por </label>
                                <select class="form-control input-sm" name="filtro_paciente" id="filtro_paciente">
                                    <option value="">Selecione um filtro</option>
                                    <option value="numero_contrato_pj">Numero Contrato</option>
                                    <option value="nome_fantasia">Pessoa Jurídica</option>
                                    <option value="cnpj">CNPJ</option>                                              
                                </select>

                            </div>

                            <div class="form-group col-sm-7 col-xs-12">

                                <label class="control-label">Empresa</label>
                                <input type="text" class="form-control input-sm" name="termo" id="termo" placeholder="Digite para iniciar a busca" autocomplete="off" value="" />

                            </div>


                        </div>
                        <!-- FIM LINHA -->
                    </div>	
                </div>	
            </div>	

        </div><!-- ROMWS --->
</div>
</div>


      <div class="clearfix"></div>
        <div class="row" >
            <div class="col-xs-12">





                <div class="form-group text-center" style="margin-top:20px">

                </div>


                <div class="x_panel">

                    <button    class="btn btn-info" onclick="printAllTo()"><i class="fa fa-print"></i> Imprimir</button>
                    <button   class="btn btn-success" onclick="downAll()"><i class="fa fa-file-pdf" aria-hidden="true"></i> Finalizar Impressão</button>
                    <button   class="btn btn-info" onclick="gerarAll()"><i class="fa fa-id-card" aria-hidden="true"></i> Gerar Em Massa </button>

                    <div class="x_content">
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered tabela">
                                <thead>
                                    <tr>
                                        <th class="append_check" style="text-align:center" ></th>
                                        <th>Contrato</th>
                                        <th>Nome</th>
                                        <th class="text-center">Gerar Carteirinha</th>
                                    </tr>
                                </thead>
                                <tbody class="appendMembros">



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <style type="text/css">


        </style>



        @stop


        @section('includes_no_body')
        <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

        <script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/printjs/print.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('plugins/autocomplete/src/jquery.autocomplete.js'); ?>"></script>

        <script type="text/javascript">
                        var tabela_pf = null;
                        var pdfObject = document.getElementById("output");

                        /*
                         * FAZ O CHECKING EM TODOS OS CHECKBOX QUE ESTIVEM NO DATATABLE
                         * @returns {Boolean}
                         */
                        function checkedAll() {
                           var id = null;
                           if($(".checkall").prop("checked")){
                                $('input[name=checkecard]').each(function () { 
                                         id = $(this).attr("data-id");    
                                        $(this).prop('checked', true); 
                                        $(".active_" + id).css("background-color", "#d0ebff");
                                    });
                                }else{
                                    $('input[name=checkecard]').each(function () { 
                                         id = $(this).attr("data-id");    
                                        $(this).prop('checked', false); 
                                        $(".active_" + id).css("background-color", "#ffff");
                                    });
                                }
                            }  
                            
                          
                        
                        
                        /*
                         * FAZ O CHECKING EM TODOS OS CHECKBOX QUE ESTIVEM NO DATATABLE
                         * @returns {Boolean}
                         */
                        function cssCheck(e) {
                           var id = $(e).attr("data-id");
                           if($(e).prop("checked")){
                                  $(".active_" + id).css("background-color", "#d0ebff");
                              }else{
                                  $(".active_" + id).css("background-color", "#ffff");  
                             }
                            return false;
                        }
                        /*
                         * FAZ A GERAÇÃO DE CARTEIRINAH EM MASSA
                         * @returns {Boolean}
                         */
                        function gerarAll() {
                            $(".gerarAll").click();
                            var $btn = $(".gerarAll");
                            $btn.button('loading');
                            setTimeout(function () {
                                $btn.button('reset');
                                $btn.text("Não Impressa");
                            }, 1000);
                            return false;
                        }

                        /*
                         * FUNÇÃO PARA IMPRIMIR AS CARTERINHA, FAÇO UM CHECK EM TODOS OS CAMPOS VERIFICANDO QUAL AS SELECINADAS
                         * APÓS ISSO. FAÇO UM MERGE COM OS PDFS (CARTERINHAS QUE FORAM MARCADAS) PARA IMPRIMIR EM MASASRO 
                         * PARA IMPRIMIR APENAS UMA O PROCESSO SERÁ O MESMO..
                         * @param {type} INT - ID
                         * @returns {String}
                         */
                        function printAllTo() {
                            var ids = [];
                            $('input[name=checkecard]').each(function () {
                                if (this.checked) {
                                    var id = $(this).val();
                                    ids.push(id);
                                }
                            });
                            if (ids.length > 0) {
                                $.ajax({
                                    cache: false,
                                    type: "POST",
                                    url: "<?php echo url('admin/painel/carteirinha/carteirinha-merge-pdf-pj'); ?>",
                                    data: {"vetor": ids},
                                    beforeSend: function () {
                                    },
                                    success: function (response) {
                                        var json = JSON.parse(response);
                                        if (json.retorno) {
                                            printJS("{{URL::to('/')}}" + json.url_path);
                                        } else {
                                            alert("Ops, Impossível  processar as carterinhas selecionada");
                                        }
                                    }

                                });
                            } else {

                                alert("Por favor, selecione alguma carteirinha para realizar finalização da impressão");

                            }

                        }
                        /*
                         *   FUNÇÃO JS.CHECA TODOS OS CHECKBOX E CAPTURA TODOS OS MARCADOS PARA DA BAIXA NAS CARTEIRINHA.
                         *   APOS ISSO É CONTABILIZADO UMA IMPRESSÃO PARA AS CARTEIRINHA SELECIONADA
                         *   * @returns {Boolean}                        
                         *   */

                        function downAll() {
                            var ids = [];
                            $('input[name=checkecard]').each(function () {
                                if (this.checked) {
                                    var id = $(this).attr("data-id");
                                    ids.push(id);
                                }
                            });
                            //verifica se existe alguma id dentro do array para enviar a requisição  para backend
                            if (ids.length > 0) {
                                var r = confirm("Você tem certeza que deseja contabilizar as impressão para as carteirinahs que foram selecinadas ?");
                                if (r == true) {
                                    $.ajax({
                                        cache: false,
                                        type: "POST",
                                        url: "<?php echo url('admin/painel/carteirinha/carteirinha-pj-baixar'); ?>",
                                        data: {"vetor": ids},
                                        beforeSend: function () {
                                        },
                                        success: function (response) {
                                            console.log(response);
                                            var json = JSON.parse(response);
                                            console.log(json);

                                            if (json.retorno) {
                                                alert("Baixar realizada com sucesso !");
                                                $('input[name=checkecard]').each(function () {
                                                    if (this.checked) {
                                                        $(this).hide();
                                                        var ids = $(this).attr("data-id");
                                                        $(".status_" + ids).removeAttr("style").text("Impressão Realizada Com Sucesso!");
                                                        $(".active_" + ids).css("background-color", "#ffff");  

                                                    }
                                                });
                                            } else {
                                                alert("Houve um problema ao realizar a finalização da impressão, por favor entre em contato com suporte")
                                            }
                                        }

                                    });

                                }
                            } else {

                                alert("Por favor, selecione alguma carteriinha para contabilizar a impressão.")

                            }

                            return false;
                        }


        </script>


        <script type="text/javascript">

            /*
             * FAÇO A GERAÇÃO DO PDF PARA AS CARTEIRINHA. PASSA TODOS OS PARAMETROS QUE FORAM GUARDADOS NAS ÚLTIMA REQUISIÇÕES 
             * PARA QUE NÃO HAJA NENHUMA REQUISIÇÃO OU VALIDAÇÃO EXTRA. TUDO É GUARDADO EM UM VETOR 
             * @param {type} codigo_pessoa
             * @param {type} nomepj
             * @param {type} plano
             * @param {type} contrato
             * @param {type} template
             * @returns {Boolean}
             */
            function gerarCarteirinha(strinfo, id) {
                strinfo = decodeURIComponent(strinfo);
                vetor = strinfo.split("|");
                // Requisição ajax
                //promessa
                var jqDeferred = $.ajax({
                    cache: false,
                    type: "POST",
                    url: "<?php echo url('admin/painel/carteirinha/gerar-carteirinha-pj'); ?>",
                    data: {"vetor": vetor},
                    beforeSend: function () {
                    },
                    success: function (response) {
                        var json = JSON.parse(response);
                        if (json.retorno) {
                            $(".append_" + id).html('<input data-url=' + json.url + ' data-id=' + json.id_client + ' name="checkecard" type="checkbox" class="form-check-input" onclick="cssCheck(this)" value="' + json.url + '">');
                            $(".status_" + json.id_client).removeAttr("style").text("Não Impressa");
                        } else if (json.retorno == '2') {
                           // console.log('carteirinha pendente de impressão');
                           alert("Carterinhas pendente de impressão");
                        } else {
                           // console.log('não pode gerar a carteirinha');
                           //alert("error desconhecido.");
                        }


                    },
                    complete: function (response) {
                        // Soon
                    },
                    error: function (response, thrownError) {
                        // Soon
                    }

                });
                jqDeferred.then(function (response, statusText, xhrObj) {

                }, function (xhrObj, textStatus, err) {
                    var r = confirm("A impressão da carteirinha Sr(a) " + vetor[2] + " Não foi gerada, deseja imprimir novamente ?");
                    if (r == true) {
                        $(".status_" + vetor[8]).click();
                    }
                })

                return false;
            }

            /*
             *  FUNÇÃO AUTOCOMPLETE - PESQUISA DE PJ
             * @param {type} codigo_pessoa
             * @param {type} nomepj
             * @param {type} plano
             * @param {type} contrato
             * @param {type} template
             * @returns {array datatable}             */
            $(document).ready(function () {

                /************************************
                 #
                 # Aplicando função AUTOCOMPLETE no input #termo
                 # Buscará pessoas através de requisição ajax de acordo com o que for digitado
                 # 
                 *************************************/
                var autocomplete_paciente = $('#termo').devbridgeAutocomplete({
                    noCache: true,
                    minChars: 3,
                    deferRequestBy: 300,
                    triggerSelectOnValidInput: false, // Impede que execute evento 'onselect' ao clicar no input, deixando apenas quando clicar em uma das opções
                    showNoSuggestionNotice: true,
                    noSuggestionNotice: 'Nenhum resultado encontrado',
                    type: 'POST',
                    serviceUrl: "<?php echo url('admin/painel/carteirinha/buscar-pessoas-basico-json'); ?>",
                    paramName: "termo_pesquisado", // Define o nome do parametro que vai guardar a informação digitada. Esse parametro será passado na requisição e poderá ser recuperado pelo controller php
                    params: {// Passa parametros adicionais, que também estarão presentes na requisição
                        filtro_paciente: function () {
                            return $('#filtro_paciente option:selected').val();
                        },
                    },
                    transformResult: function (response) {
                        console.log(response);
                        return {
                            suggestions: $.map($.parseJSON(response), function (item) {
                                return {
                                    value: item.nome_fantasia,
                                    data: {codigo: item.numero_contrato_pj, nome: item.nome_fantasia, cod: item.cod_pessoa_juridica, plano: item.nome_plano, cod_contrato: item.numero_contrato_pj, template: item.codigo_template}
                                };
                            })
                        };

                    },
                    formatResult: function (suggestion, currentValue) {
                        // Usando $.Autocomplete.defaults.formatResult(suggestion, currentValue) você mantém a formatação de marcação com cores das letras pesquisadas, que é padrão do plugin
                        return ' <small><i>' + suggestion.data.codigo + '</i></small> - ' + $.Autocomplete.defaults.formatResult(suggestion, currentValue);
                    },
                    onSearchStart: function (params) {

                        // Ativa função de ocultação de div
                        //ocultar_caixa_paciente();

                    },
                    onSearchComplete: function (query, suggestions) {
                        // Nothing here for now
                    },
                    onSearchError: function (query, jqXHR, textStatus, errorThrown) {
                        //console.log(textStatus);
                    },
                    onSelect: function (suggestion) {
                        // Passo codigo da pessoa selecionada para função
                        carregar_caixa_paciente(suggestion.data.cod, suggestion.data.nome, suggestion.data.plano, suggestion.data.cod_contrato, suggestion.data.template);
                    }
                });





                /************************************
                 #
                 # Coloca informações / dados do paciente em posições especificas dentro da div #caixa_paciente
                 # 
                 *************************************/

                function carregar_caixa_paciente(codigo_pessoa, nomepj, plano, contrato, template) {

                    // Requisição ajax
                    $.ajax({
                        cache: false,
                        type: "POST",
                        url: "<?php echo url('admin/painel/carteirinha/buscar-membro-pj-datatable'); ?>",
                        data: {"codigo_pessoa": codigo_pessoa},
                        beforeSend: function () {
                             // Oculta DIV
                            //  $('.box_alerta_erro').hide(); 
                        },
                        success: function (response) {

                            $(".appendMembros").html("");
                            // Convertendo resposta para objeto javascript
                            var pt = JSON.stringify(response);
                            var response = JSON.parse(response);
                            var array = [];
                            for (var x = 0; x < response.length; x++) {
                                var string = nomepj + "|" + codigo_pessoa + "|" + response[x].nome + "|" + response[x].numero_contrato_membro + "|" + response[x].data_nascimento + "|" + response[x].datainclusao + "|" + plano + "|" + contrato + "|" + response[x].cod_cliente + "|" + template + "|" + response[x].foto;
                                var bnt;
                                if (response[x].status_impressao == "nao_impressa") {
                                    bnt = "<td class='text-center'><a data-loading-text='Gerando Carteirinha...' onClick=gerarCarteirinha('" + encodeURIComponent(string) + "','" + x + "')  style='opacity: 0.65;'  class='btn btn-sm btn-primary gerarAll status_" + response[x].cod_cliente + "'>Não Impressa</a></td>";
                                } else if (response[x].quantidade_impressa > 1) {
                                    //terceira via e indiante.
                                    bnt = "<td class='text-center'><a  class='btn btn-sm btn-primary gerarAll status_" + response[x].cod_cliente + "' data-loading-text='Gerando Carteirinha...' onClick=gerarCarteirinha('" + encodeURIComponent(string) + "','" + x + "')>" + response[x].quantidade_impressa + "° Via</a</td>";
                                } else {
                                    //primeira via
                                    bnt = "<td class='text-center'><a  class='btn btn-sm btn-primary gerarAll status_" + response[x].cod_cliente + "' data-loading-text='Gerando Carteirinha...' onClick=gerarCarteirinha('" + encodeURIComponent(string) + "','" + x + "')>1º Via</a</td>";
                                }
                                array.push({bnt: '<div class="append_' + x + ' text-center ocultar_checked"></div>', nmembro: response[x].numero_contrato_membro, nome: response[x].nome, bnt_gerar: bnt, id: response[x].cod_cliente});

                            }


                            // Tabela de dados
                            tabela_pf = $('.tabela').DataTable({
                                destroy: true, // Apaga datatable atual, se existir
                                data: array,
                                stateSave: false,
                                deferRender: false,
                                info: true,
                                ordering: true,
                                paging: true,
                                searching: true,
                                autoWidth: false,
                                pageLength: 30,
                                lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
                                pagingType: "full_numbers",
                                language: {
                                    "emptyTable": "Não foram encontrados registros",
                                    "zeroRecords": "Não há registros para exibir",
                                    "processing": "Reunindo dados",
                                    "loadingRecords": "Carregando...",
                                    "lengthMenu": "Mostrar _MENU_ itens por página",
                                    "search": "Buscar:",
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
                                order: [[1, "asc"]],
                                columns: [
                                    {"data": "bnt", "name": "bnt", "width": "2%", "searchable": false, "sortable": false},
                                    {"data": "nmembro", "name": "nmembro", "width": "3%", "searchable": true, "sortable": true},
                                    {"data": "nome", "name": "nome", "width": "25%", "searchable": true, "sortable": true},
                                    {"data": "bnt_gerar", "name": "bnt_gerar", "width": "5%", "searchable": true, "sortable": false},
                                    {"data": "id", "name": "id", "width": "5%", "searchable": true, "visible": false}
                                ],
                                "createdRow": function (row, data, dataIndex) {
                                    $(row).addClass('active_' + data.id);
                                },
                                "fnDrawCallback": function (oSettings) {
                                    // Ativação de TOOLTIPS, se existirem
                                    $('[data-toggle="tooltip"]').tooltip();

                                }
                            });

                            $(".append_check").html('<input  type="checkbox" class="form-control  checkall" style="width: 20px;padding: 0px; margin:auto;" data-id="0" onclick="checkedAll()" >');
                        },
                        complete: function (response) {
                            // Soon
                        },
                        error: function (response, thrownError) {
                            // Soon
                        }
                    });

                }

            });


        </script>
        @stop