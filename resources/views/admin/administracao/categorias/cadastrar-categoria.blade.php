@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias | Cadastrar
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categorias-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Categoria</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
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
                    
                    <div class="col-xs-12">    
                        <form method="POST" action="<?php echo url('admin/painel/categorias/cadastrar-categoria'); ?>">
                            
                            <div class="row"> 
                                
                                <div class="col-sm-6 col-xs-12">   
                                    
                                    <div class="form-group">
                                        <label class="control-label">Descrição <span class="required-red">*</span></label>
                                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off" <?php if (!empty(old('descricao'))) { ?>value="<?php echo old('descricao'); ?>"<?php } ?>>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Data de Criação <span class="required-red"></span></label>
                                        <input type="text" class="form-control datepicker" name="data_criacao" id="data_criacao" placeholder="Data de Criação" autocomplete="off" <?php if (!empty(old('data_criacao'))) { ?>value="<?php echo old('data_criacao'); ?>"<?php } ?>>
                                    </div>                                                                     
                                                                        
                                </div>                              
                                 
                                <div class="col-xs-12">                                                                       
                                    
                                    <div class="row">
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                            <a href="{{ url('admin/painel/categorias') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                    </div>							
                                </div>

                            </div>
                                
                        </form>
 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-4 hidden" id="clone_div">
        <div class="form-group">
            <div class="row">
                <div class="col-xs-10">
                    <input type="text" class="form-control campo_adicional" name="adicionais[]" placeholder="Nome do campo adicional">
                </div>
                <div class="col-xs-2">
                    <button type="button" onclick="confirmaCampo(this)" class="btn btn-success pull-right"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('includes_no_body')
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

    <script type="text/javascript">

                        $('.datepicker').datepicker({
                            format: 'dd/mm/yyyy',
                            language: 'pt-BR',
                            weekStart: 0,
                            endDate: '+5y',
                            startDate: '0d',
                            todayHighlight: true
                        });

                        function confirmaCampo(botao) {
                            if ($(botao).parent().parent().find('input').val() != "") {
                                $(botao).parent().parent().find('input').attr('readonly', true);
                                $(botao).attr('onclick', 'removeCampo(this)').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-remove"></i>');

                                var clone = $("#clone_div").clone().removeClass('hidden').removeAttr('id');

                                $("#div_campos_adicionais").append(clone);
                            }
                            ;
                        }

                        function removeCampo(botao) {
                            $(botao).parent().parent().parent().parent().remove();
                        }

                        /*
                         # FUNÇÃO PARA HABILITAR/DESABILITAR CAMPO
                         */
                        // Ao carregar Inicializo a função 
                        habilitarDesabilitarCampoConfiguracaoBoleto();

                        function habilitarDesabilitarCampoConfiguracaoBoleto() {
                            var tipo_cobranca = $("#tipo_cobranca option:selected").val();
                            if (tipo_cobranca == "unidade") {
                                $("#div_configuracao_procedimentos").removeClass('hidden');
                                $("#div_configuracao_boleto").addClass('hidden');

                            } else if (tipo_cobranca == "boleto") {
                                $("#div_configuracao_boleto").removeClass('hidden');
                                $('#configuracao_boleto').prop("disabled", false);
                                $("#div_configuracao_procedimentos").addClass('hidden');
                            } else {
                                $("#div_configuracao_boleto").addClass('hidden');
                                $("#div_configuracao_procedimentos").addClass('hidden');
                                $('#configuracao_boleto').prop("disabled", true);
                                $('configuracao_boleto').val('');
                            }
                        }

                        //Configuração da tabela
                        $(".tabela").DataTable({
                            "language": {
                                "lengthMenu": "Mostrar _MENU_ itens por página",
                                "zeroRecords": "Nenhum resultado encontrado",
                                "info": "Mostrando página _PAGE_ de _PAGES_",
                                "infoEmpty": "Nenhum resultado disponível",
                                "infoFiltered": "(filtrado de _MAX_ itens ao total)",
                                "sSearch": "Buscar:",
                                "oPaginate": {
                                    "sPrevious": "Anterior",
                                    "sNext": "Próxima"
                                }
                            }
                        });
                        

    </script>
    @stop