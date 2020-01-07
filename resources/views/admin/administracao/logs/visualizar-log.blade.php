@extends('layouts.administracao.layout')
@section('titulo_pagina')
CMRJ | Logs | Visualizar
@stop

@section('conteudo')
{!! Breadcrumbs::render('logs-visualizar') !!}
<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Log</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="container">
                    <div class="row">
                        <h4><strong>Mensagem:</strong></h4>
                        <?php echo nl2br($logs->mensagem); ?>
                    </div>
                    <?php if($logs->motivo != null){ ?>
                    
                    <hr/>
                    
                    <div class="row">                        
                        <h4><strong>Motivo:</strong></h4>                          
                        <?php echo nl2br($logs->motivo); ?>
                    </div>
                    <?php } ?>
                    
                    <hr/>
                    
                    <div class="row">                        
                        <h5><strong>Cadastrado em:</strong></h5>                          
                        <?php echo date('d/m/Y H:i:s',strtotime($logs->created_at)); ?>
                    </div>

                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop