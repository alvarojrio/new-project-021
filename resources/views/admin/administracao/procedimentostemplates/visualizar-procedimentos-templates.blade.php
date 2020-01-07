@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos Templates | Visualizar
@stop

@section('conteudo')

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Procedimento Template</h3>
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
                                    <th style="width:180px">Código</th>
                                    <td>{{ ($procedimentos_templates->codigo) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código Interno:</th>
                                    <td>{{ $procedimentos_templates->codigo_interno }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Descrição:</th>
                                    <td>{{ $procedimentos_templates->descricao }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Capítulo:</th>
                                    <td>{{ $procedimentos_templates->capitulo }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Grupo:</th>
                                    <td>{{ $procedimentos_templates->grupo }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Sub-Grupo:</th>
                                    <td>{{ $procedimentos_templates->subgrupo }}</td>
                                </tr>                                
                                <tr>
                                    <th style="width:180px">Metro Filme:</th>
                                    <td>{{ $procedimentos_templates->metro_filme }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Deflator:</th>
                                    <td>{{ $procedimentos_templates->deflator }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Porte:</th>
                                    <td>{{ $procedimentos_templates->porte }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Valor do Porte:</th>
                                    <td>{{ $procedimentos_templates->valor_porte }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Honorários:</th>
                                    <td>{{ $procedimentos_templates->honorarios }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Valor UCO:</th>
                                    <td>{{ $procedimentos_templates->valor_uco }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Auxiliares:</th>
                                    <td>{{ $procedimentos_templates->auxiliares }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Incidência:</th>
                                    <td>{{ $procedimentos_templates->incidencia }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">CH Total:</th>
                                    <td>{{ $procedimentos_templates->ch_total }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Qtd. Filme MQ:</th>
                                    <td>{{ $procedimentos_templates->qtde_filme_mq }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Porte Anastésico:</th>
                                    <td>{{ $procedimentos_templates->porte_anastesico }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Custo Operacional:</th>
                                    <td>{{ $procedimentos_templates->custo_operacional }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">CO:</th>
                                    <td>{{ $procedimentos_templates->co }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">PA:</th>
                                    <td>{{ $procedimentos_templates->pa }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Filme m2:</th>
                                    <td>{{ $procedimentos_templates->filme_m2 }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">CRR:</th>
                                    <td>{{ $procedimentos_templates->crr }}</td>
                                </tr>                      
                                <tr>
                                    <th style="width:180px">CH:</th>
                                    <td>{{ $procedimentos_templates->ch }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <!--<div class="col-xs-12">
                        <a href="{{ url('admin/painel/tabelas/cadastrar/') }}" class="btn btn-default pull-right">Voltar</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
@stop