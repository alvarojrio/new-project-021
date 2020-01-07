@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Convênios | Visualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Convênio <small>{{ $convenio->nome_convenio }}</small></h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">                            
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Convênio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <img src="<?php if ($convenio->logotipo == "") {
                                            $foto = "sem_foto.png";
                                        } else {
                                            $foto = $convenio->logotipo;
                                        } echo asset('uploads/convenios/logotipos/' . $foto) ?>" alt="Imagem" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                    </td>                                    
                                </tr>
                                <tr>
                                    <th style="width:180px">Razão Social: </th>
                                    <td>{{ $convenio->razao_social }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Nome: </th>
                                    <td>{{ $convenio->nome_convenio }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">CNPJ: </th>
                                    <td>{{ $convenio->cnpj }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código ANS: </th>
                                    <td>{{ $convenio->codigo_ans }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Inscrição Estadual: </th>
                                    <td>{{ $convenio->inscricao_estadual }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código na Operadora: </th>
                                    <td>{{ $convenio->codigo_operadora }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Contratado: </th>
                                    <td>{{ $convenio->contratado }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Telefone: </th>
                                    <td>{{ $convenio->telefone }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Setor: </th>
                                    <td>{{ $convenio->setor }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">CNES: </th>
                                    <td>{{ $convenio->cnes }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo de Identificação: </th>
                                    <td>
                                        @if($convenio->tipo_identificacao == 1)
                                        Código da Operadora
                                        @endif
                                        @if($convenio->tipo_identificacao == 2)
                                        CNPJ
                                        @endif
                                        @if($convenio->tipo_identificacao == 3)
                                        CPF
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Auto gestão: </th>
                                    <td>
                                        @if($convenio->auto_gestao == 1)
                                        Sim
                                        @endif
                                        @if($convenio->auto_gestao == 0)
                                        Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código Solicitante da Operadora: </th>
                                    <td>
                                        @if($convenio->codigo_solicitante_operadora == 1)
                                        CRM Solicitante
                                        @endif
                                        @if($convenio->codigo_solicitante_operadora == 2)
                                        Cód/CNPJ Solicitante
                                        @endif
                                        @if($convenio->codigo_solicitante_operadora == 3)
                                        Código Operadora Prestador
                                        @endif
                                        @if($convenio->codigo_solicitante_operadora == 4)
                                        CNPJ Prestador
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Aviso: </th>
                                    <td>{{ $convenio->aviso }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados de Endereço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:180px">CEP: </th>
                                    <td>{{ $convenio->cep }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Estado: </th>
                                    <td>@if($convenio->cidades->estados->nome != null){{ $convenio->cidades->estados->nome_estado }} @endif </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Cidade: </th>
                                    <td>@if($convenio->cidades->nome != null) {{ $convenio->cidades->nome_cidade }} @endif</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Bairro: </th>
                                    <td>{{ $convenio->bairro }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Logradouro: </th>
                                    <td>{{ $convenio->logradouro }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Número: </th>
                                    <td>{{ $convenio->numero }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Complemento: </th>
                                    <td>{{ $convenio->complemento }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix"></div>

                </div> <!-- Aqui row -->

                <hr/>
                <h2 class="text-blue"> <strong> Planos atrelados a este convênio:</strong> </h2>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            <a class="btn btn-primary" href="{{ url('admin/painel/planos/cadastrar-plano-sequencial/'. Crypt::encrypt($convenio->cod_convenio)) }}"><i class="fas fa-plus"></i> Cadastrar Novo Plano</a>
                               
                            <div class="clearfix"></div>
                            <br/>
                            <?php if($convenio->auto_gestao == 0) { ?>
                            
                                @if($convenio->planos->count())
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tabela">
                                        <thead>
                                            <tr>
                                                <th>Nome do plano</th>
                                                <th>Tipo</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($convenio->planos as $plano)
                                            
                                                <tr>
                                                    <td>{{ $plano->nome_plano }}</td>
                                                    <td>
                                                    <?php if ($plano->tipo_plano == 1) { ?>
                                                            <span class="label label-success" style="font-size:14px">PESSOA FÍSICA</span>
                                                    <?php } elseif ($plano->tipo_plano == 2) { ?>
                                                            <span class="label label-info" style="font-size:14px">PESSOA JURÍDICA</span>
                                                    <?php }elseif ($plano->tipo_plano == 3) { ?>
                                                            <span class="label label-warning" style="font-size:14px">ANS</span>
                                                    <?php } ?>        
                                                    </td>
                                                    <td>
                                                    <?php if ($plano->status == 1) { ?>
                                                            <span class="label label-success" style="font-size:14px">ATIVO</span>
                                                    <?php } elseif ($plano->status == 0) { ?>
                                                            <span class="label label-danger" style="font-size:14px">INATIVO</span>
                                                    <?php } ?>        
                                                    </td>
                                                    
                                                    
                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/planos/visualizar-plano-ans/'.  Crypt::encrypt($plano->cod_plano)) }}">
                                                            <i class="fas fa-search"></i>
                                                        </a>

                                                    </td>
                                                    
                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/planos/alterar-plano-ans/'.   Crypt::encrypt($plano->cod_plano)) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                    </td>
                                                                                                    
                                                    <td class="text-center col-xs">

                                                        <?php if ($plano->status == 1) { ?>

                                                            <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/planos/inativar-plano-ans/'.  Crypt::encrypt($plano->cod_plano)) }}">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>

                                                        <?php } elseif ($plano->status == 0){ ?>
                                                        
                                                            <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar" href="{{ url('admin/painel/planos/reativar-plano-ans/'.  Crypt::encrypt($plano->cod_plano)) }}">
                                                                <i class="fas fa-power-off"></i>
                                                            </a>
                                                        
                                                        <?php } ?>

                                                    </td>
                                                </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                @else

                                    Não há planos atrelados a este convênio.

                                @endif

                            <?php }else if($convenio->auto_gestao == 1){  ?> 

                                <div class="clearfix"></div>

                                <br/> 

                                @if($convenio->planos->count())

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tabela">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Reajuste em</th>
                                                <th>Nome do plano</th>
                                                <th>Tipo</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($convenio->planos as $plano)

                                                <tr>
                                                    <td>
                                                        <?php
                                                        switch ($plano->status) {
                                                            case 0:
                                                                echo "<span class='label label-danger' style='font-size:14px'>Inativo</span>";
                                                            break;

                                                            case 1:
                                                                echo "<span class='label label-success' style='font-size:14px'>Ativo</span>";
                                                            break;

                                                            default:
                                                                echo "Não definido";
                                                            break;
                                                        } 
                                                        ?>    
                                                    </td>
                                                    
                                                    <td>
                                                        <?php 
                                                            if($plano->precificacoes_planos->count() > 0){
                                                                foreach($plano->precificacoes_planos as $precificacoes):
                                                                    if($precificacoes->status == 1){
                                                                        echo $data_inicio_reajuste = date('d/m/Y', strtotime(str_replace('/', '-', $precificacoes->data_inicio)));    
                                                                    }
                                                                endforeach;
                                                            }else{
                                                                echo "Sem reajuste";
                                                            }    
                                                        ?>
                                                    </td>

                                                    <td>{{ $plano->nome_plano }}</td>

                                                    <td>
                                                        <?php if ($plano->tipo_plano == 1) { ?>
                                                                <span class="label label-success" style="font-size:14px">PF</span>
                                                        <?php } elseif ($plano->tipo_plano == 2) { ?>
                                                                <span class="label label-info" style="font-size:14px">PJ</span>
                                                        <?php }elseif ($plano->tipo_plano == 3) { ?>
                                                                <span class="label label-warning" style="font-size:14px">ANS</span>
                                                        <?php } ?>        
                                                    </td>
                                                    
                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/planos/visualizar-plano-auto-gestao/'. Crypt::encrypt($plano->cod_plano)) }}">
                                                            <i class="fas fa-search"></i>
                                                        </a>

                                                    </td>

                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm btn-info <?php if($plano->status == 0){ echo 'disabled'; } ?>" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/planos/alterar-plano-ag-sequencial/'. Crypt::encrypt($plano->cod_plano)) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                    </td>

                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm btn-primary <?php if($plano->status == 0){ echo 'disabled'; } ?>" data-tooltip="tooltip" title="Clonar" href="#">
                                                            <i class="fas fa-clone"></i>
                                                        </a>

                                                    </td>

                                                    <td class="text-center col-xs">

                                                        <a class="btn btn-sm  btn-reajustar <?php if($plano->status == 0){ echo 'disabled'; } ?>" data-tooltip="tooltip" title="Reajustar Plano" href="{{ url('admin/painel/planos/reajustar-plano-auto-gestao/'. Crypt::encrypt($plano->cod_plano)) }}">
                                                            <i class="fas fa-wrench"></i>
                                                        </a>

                                                    </td>

                                                    <td class="text-center col-xs">

                                                        <?php  
                                                        switch ($plano->status) {
                                                            case 0:
                                                            ?>
                                                                <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar"  href="{{ url('admin/painel/planos/reativar-plano-auto-gestao/'. Crypt::encrypt($plano->cod_plano)) }}">
                                                                    <i class="fas fa-power-off"></i>
                                                                </a>    
                                                            <?php            
                                                            break;

                                                            case 1:
                                                            ?>    
                                                                <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar"  href="{{ url('admin/painel/planos/inativar-plano-auto-gestao/'. Crypt::encrypt($plano->cod_plano)) }}')">
                                                                    <i class="fas fa-power-off"></i>
                                                                </a>
                                                            <?php    
                                                            break;

                                                            default:
                                                                echo "-";
                                                            break;
                                                        }                                                   
                                                        ?>

                                                    </td>
                                                </tr> 

                                            @endforeach

                                        </tbody>
                                    </table>
                                    
                                </div>

                                @else

                                    Não há planos atrelados a este convênio.

                                @endif

                                <div class="clearfix"></div>

                                <br/>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="{{ url('admin/painel/convenios/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                </div>  
            </div>
        </div>
    </div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">

    function atualiza_modal_deletar(url){
        $("#form_deletar").attr('action', url);
    }

    var options = {
        success: function(response) {
            if (response.status == 1){

                toastr.success(response.mensagem, "Sucesso!");
                $("table").find("[data-row-id='" + response.cod + "']").remove();
                $("#modal_deletar").modal('hide');

            } else{
                toastr.error(response.mensagem, "Erro!");
            };
        }
    };
    $('#form_deletar').ajaxForm(options);
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