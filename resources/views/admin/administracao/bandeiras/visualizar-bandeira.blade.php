@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Bandeira | Visualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('bandeiras-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Bandeira</h3>
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
                                    <th style="width:180px">Nome: </th>
                                    <td>{{ $bandeira->nome_bandeira }}</td>                                   
                                </tr>
                                
                                <tr>
                                    <th style="width:180px">Operadora: </th>
                                    <td>{{ $bandeira->nome_operadora_cartao }}</td>                                   
                                </tr>
                                
                                <?php 
                                   
                                    if(count($operadora_debito) > 0){
                                        
                                        ?>
                                        
                                            <tr>
                                                <th style="width:180px">Débito: </th>
                                                <td>
                                                    <ul class="unstyled list-group">
                                                        <?php 
                                                            echo "<li class='list-group-item'>Taxa: ".$operadora_debito->taxa_abatimento ." % </li>";
                                                        ?>
                                                    </ul>    
                                                </td>                                   
                                            </tr>
                                        
                                        <?php
                                        
                                    }
                                
                                    
                                    if(count($operadora_credito) > 0){
                                        
                                        ?>
                                        
                                            <tr>
                                                <th style="width:180px">Crédito: </th>
                                                <td>
                                                    <ul class="unstyled list-group">
                                                    <?php
                                                        foreach($operadora_credito as $o_c){
                                                            
                                                            echo "<li class='list-group-item'>Taxa em ". $o_c->parcela ."x : ".  $o_c->taxa_abatimento ." % </li>";
                                                                    
                                                        }        
                                                    ?>
                                                    </ul>    
                                                </td>                                   
                                            </tr>
                                        
                                        <?php
                                        
                                    }
                                    
                                    
                                ?>
                            
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

@section('includes_no_body')

@stop
