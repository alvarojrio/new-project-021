@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contas |Caixas | Visualizar
@stop

@section('conteudo')

{!! Breadcrumbs::render('contas-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Caixa</h3>
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
                                    <th colspan="3">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                 <tr>
                                   
                                     <td rowspan="6" class="text-center">
                                        <?php 
                                            
                                            if($conta_caixa->foto == "" OR $conta_caixa->foto == " " OR $conta_caixa->foto == "NULL"){
                                                ?> <img src="{{asset('uploads/pessoas/sem_foto.jpg')}}" alt="{{$conta_caixa->foto}}" width="150px" height="150px" accesskey=""class="img-thumbnail"> <?php
                                            } else { 
                                               ?> <img src="{{asset('uploads/pessoas/'.$conta_caixa->foto)}}" alt="{{$conta_caixa->foto}}" width="150px" height="150px" accesskey=""class="img-thumbnail"> <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                                               
                                <tr>
                                    <th style="width:190px">Caixa: </th>
                                    <td>{{ $conta_caixa->nome }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Tipo do Caixa: </th>
                                    <td>
                                        <?php 
                                            $tipo_caixa = $conta_caixa->perfil_subconta; 
                                            
                                            switch($tipo_caixa){
                                                
                                                case 1:
                                                    echo "Gerente";
                                                break;
                                                
                                                case 2:
                                                    echo "Operacional";
                                                break;
                                                
                                                case 3:
                                                    echo "Vedendor";
                                                break;
                                                
                                                case 3:
                                                    echo "Não encontrado";
                                                break;
                                                
                                            }
                                            
                                            
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Banco: </th>
                                    <td>{{ $conta_caixa->nome_banco }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Agência: </th>
                                    <td>{{ $conta_caixa->agencia }}</td>
                                </tr>
                                <tr>
                                    <th style="width:190px">Conta Corrente: </th>
                                    <td>{{ $conta_caixa->cc }}</td>
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