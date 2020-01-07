@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Pessoa Jurídica | Visualizar
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-inativo-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Pessoa Jurídica</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:10px">Nome Fantasia: </th>
                                    <td>{{ $pj->nome_fantasia }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">CNPJ: </th>
                                    <td>{{ $pj->cnpj }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">E-mail: </th>
                                    <td>{{ $pj->email_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td>{{ $pj->telefone_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Nome dos Responsáveis: </th>
                                    <td>
                                        @foreach($pj->pessoa as $p)
                                            {{ $p->nome }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Segmento: </th>
                                    <td>{{ $pj->segmento }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados de Endereço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:10px">CEP: </th>
                                    <td>{{ $pj->cep_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td>@if($pj->cidades->estados != null){{ $pj->cidades->estados->nome }} @endif</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                    <td>@if($pj->cidades != null) {{ $pj->cidades->nome }} @endif</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Logradouro: </th>
                                    <td>{{ $pj->logradouro_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Número: </th>
                                    <td>{{ $pj->numero_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Complemento: </th>
                                    <td>{{ $pj->complemento_empresa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Bairro: </th>
                                    <td>{{ $pj->bairro_empresa }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- LIMPAR FLOAT -->
                    <div class="clearfix"></div>
                    
                    @if($pj->contratos_pessoa_juridica_planos->count())
                        @foreach($pj->contratos_pessoa_juridica_planos as $contrato)
                        <div class="col-md-6 col-xs-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Dados do Plano</th>
                                        </tr>
                                    </thead>

                                        <tbody>
                                            <tr>
                                                <th style="width:200px">Nome do Plano: </th>
                                                <td>{{ $contrato->planos->nome }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:200px">Número de Contrato: </th>
                                                <td>{{ $contrato->numero_contrato_pj }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:200px">Data de Inclusão: </th>
                                                <td>{{ date('d/m/Y', strtotime($contrato->data_inclusao)) }}</td>
                                            </tr>
                                            <tr>
                                            <th style="width:10px">Vendedor:</th>
                                                <td>
                                                    @foreach($contrato->vendas as $v)
                                                        {{ $v->funcionarios->pessoa->nome }}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>                                    
                                        </tbody>

                                </table>
                        </div>
                        @endforeach
                    @endif
                    
                    @if($pj->arquivos_pessoa_juridica->count())
                    <div class="col-md-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome do Arquivo</th>
                                    <th class="text-center">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pj->arquivos_pessoa_juridica as $arquivo)
                                <tr>
                                    <td>{{ $arquivo->arquivo }}</td>
                                    <td class="text-center"><a href="{{ url(app('prefixo') . '/painel/pessoajuridica/download_upload/' . Crypt::encrypt($arquivo->cod_arquivo_pessoa_juridica)) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <a href="{{ url('admin/painel/pessoajuridica/') }}" class="btn btn-default pull-right">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop