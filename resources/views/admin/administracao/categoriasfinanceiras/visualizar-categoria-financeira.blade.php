@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categorias financeira | Visualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('categorias-financeiras-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Categoria Financeira</h3>
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
                                    <td>{{ $categoriafinanceira->nome_categoria_financeira }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo:</th>
                                    <td>
                                        @if($categoriafinanceira->tipo_categoria_financeira == 1)
                                        <span class="label label-success" style="font-size:14px">ENTRADA</span>
                                        @elseif($categoriafinanceira->tipo_categoria_financeira == 2)
                                        <span class="label label-danger" style="font-size:14px">SAÍDA</span>
                                        @endif
                                    </td>
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

            <?php if (count($categoriafinanceira->sub_categorias_financeiras) > 0): ?>

                <hr>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h2 class="text-blue">
                        <strong> Sub Categorias de <?php echo $categoriafinanceira->nome_categoria_financeira; ?>:</strong>
                    </h2>
                </div> 
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <?php foreach ($categoriafinanceira->sub_categorias_financeiras as $subcategoria): ?>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning"><?php echo $subcategoria->nome_sub_categoria_financeira ."<br>";?></li>     
                        </ul>
                    <?php endforeach; ?>
                </div> 

            <?php endif; ?>

        </div>
    </div>



</div>

@stop

@section('includes_no_body')

@stop
