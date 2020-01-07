@extends('layouts.administracao.layout')

@section('conteudo')

<div class="container">

    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">

                    <h3 class="text-center">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Contrato em conciliação não encontrado:<br/>
                        <small>O contrato em conciliação que você procura não pôde ser <b> localizado.</b></small>
                    </h3>

                </div>
                
                <div class="panel-body">

                    <h2 class="text-danger">Atenção!</h2> 

                    Volte a listagem de conciliações e tente novamente!

                    <br /><br /> 

                    <button id="enviar" type="button" class="btn btn-primary" onclick="javascript: window.location.replace('<?php echo URL::to('admin/painel/conciliacaovendas'); ?>');">
                        <i class="fa fa-undo" aria-hidden="true"></i> Listagem de Conciliações de Vendas
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@stop