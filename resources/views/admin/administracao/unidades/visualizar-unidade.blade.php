@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Unidades | Visualizar
@stop

@section('conteudo')

{!! Breadcrumbs::render('unidades-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Unidade</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <img src="{{asset('uploads/unidades/logotipos/'.$unidade->logomarca)}}" alt="{{$unidade->logomarca}}" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                    </td>                                    
                                </tr>                                
                                <tr>
                                    <th style="width:190px">Nome da Unidade: </th>
                                    <td>{{ $unidade->nome_unidade }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">CNPJ: </th>
                                    <td>{{ drclub\Biblioteca\FuncoesGlobais::mascaraCnpj($unidade->cnpj) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">E-mail: </th>
                                    <td>{{ $unidade->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Telefone: </th>
                                        <!--Exibe valor com máscara já adicionada-->
                                    <td>{{ drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($unidade->telefone) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Responsável pela Unidade: </th>
                                    <td>{{ $unidade->responsavel }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Planos atendidos: </th>
                                    <td>
                                        <?php foreach($planos as $plano): ?>
                                            <?php if (in_array($plano->cod_plano, $array_planos_unidades->pluck('cod_plano')->toArray())) { echo $plano->convenios->nome_convenio.' - '.$plano->nome_plano."<br/>";  } ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados de Endereço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:10px">CEP: </th>
                                    <td>{{ $unidade->cep }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td>@if($unidade->cod_cidade != null){{ $unidade->cidades->estados->nome_estado }} @endif</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                    <td>@if($unidade->cod_cidade != null) {{ $unidade->cidades->nome_cidade }} @endif</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Logradouro: </th>
                                    <td>{{ $unidade->logradouro }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Número: </th>
                                    <td>{{ $unidade->numero }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Complemento: </th>
                                    <td>{{ $unidade->complemento }}</td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Bairro: </th>
                                    <td>{{ $unidade->bairro }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    @if($unidade->arquivos_unidades->count())
                    <div class="col-md-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome do Arquivo</th>
                                    <th class="text-center">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unidade->arquivos_unidades as $arquivo)
                                <tr>
                                    <td>{{ $arquivo->arquivo }}</td>
                                    <td class="text-center"><a href="{{ url('admin/painel/unidades/download_upload/'.Crypt::encrypt($arquivo->cod_arquivo_unidade)) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop