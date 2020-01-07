@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Visualizar
@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-visualizar-plano-ans', $plano) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Plano</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:180px">Convênio: </th>
                                    <td>{{ $plano->convenios->nome_convenio }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tabela: </th>
                                    <td>{{ $plano->tabelas->nome_tabela }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Nome do plano: </th>
                                    <td>{{ $plano->nome_plano }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código: </th>
                                    <td>{{ $plano->codigo }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo do Plano</th>
                                    <td>
                                        @if($plano->tipo_plano == 1)
                                            <span class="label label-success" style="font-size:14px">PESSOA FÍSICA</span>
                                        @elseif($plano->tipo_plano == 2)
                                            <span class="label label-info" style="font-size:14px">PESSOA JURÍDICA</span>
                                        @elseif($plano->tipo_plano == 3)
                                            <span class="label label-warning" style="font-size:14px">ANS</span>
                                        @endif
                                         
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Possui Co-participação</th>
                                    <td>
                                        @if($plano->possui_co_participacao == 1)
                                            Sim
                                        @elseif($plano->possui_co_participacao == 0)
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo Co-participação</th>
                                    <td>
                                        @if($plano->tipo_co_participacao == 1)
                                            Sim
                                        @elseif($plano->tipo_co_participacao == 0)
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Faturado?</th>
                                    <td>
                                        @if($plano->faturado == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Data Inicial: </th>
                                    <td>{{ date('d/m/Y', strtotime($plano->data_inicial)) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Data Final: </th>
                                    <td>{{ ($plano->data_final != null) ? date('d/m/Y', strtotime($plano->data_final)) : 'Indefinida' }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
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