@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Formas de pagamento | Visualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('formaspagamentos-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Forma de Pagamento</h3>
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
                                    <th style="width:180px">Forma de pagamento:</th>
                                    <td>
                                        @if($formapagamento->tipo_pagamento == 1)
                                            <i class="far fa-money-bill-alt"> DINHEIRO</i>
                                        @elseif($formapagamento->tipo_pagamento == 2)
                                            <i class="fas fa-barcode"> BOLETO BANCÁRIO</i>
                                        @elseif($formapagamento->tipo_pagamento == 3)
                                            <i class="fas fa-money-check"> CHEQUE</i>
                                        @elseif($formapagamento->tipo_pagamento == 4)
                                            <i class="fas fa-business-time"> CHEQUE PRÉ-DATADO</i>
                                        @elseif($formapagamento->tipo_pagamento == 5)
                                            <i class="fas fa-exchange-alt"> TRANSFERÊNCIA BANCÁRIA</i>
                                        @elseif($formapagamento->tipo_pagamento == 6)
                                            <i class="fas fa-piggy-bank"> DEPÓSITO BANCÁRIO </i>
                                        @elseif($formapagamento->tipo_pagamento == 7)
                                            <i class="fas fa-gift"> CORTESIA</i>
                                        @elseif($formapagamento->tipo_pagamento == 8)
                                            <i class="far fa-handshake"> CONVÊNIO</i>
                                        @elseif($formapagamento->tipo_pagamento == 9)
                                            <i class="fas fa-credit-card"> CARTÃO DE DÉBITO
                                        @elseif($formapagamento->tipo_pagamento == 10)</i>
                                            <i class="far fa-credit-card"> CARTÃO DE CRÉDITO</i>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Status:</th>
                                    <td>
                                        @if($formapagamento->status == 1)
                                            <span class="label label-success" style="font-size:14px">Ativo</span>
                                        @elseif($formapagamento->status == 0)                                            
                                            <span class="label label-danger" style="font-size:14px">Inativo</span>
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
            
            <?php if ($formapagamento->tipo_pagamento == 1){ ?>
                <?php if (count($formapagamento->descontos_dinheiro) > 0): ?>

                  <hr/>
                  <div class="col-lg-12 col-md-12 col-xs-12">
                        <h2 class="text-blue">
                            <strong> Desconto:</strong>
                        </h2>
                    </div>
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <?php foreach ($formapagamento->descontos_dinheiro->sortByDesc('cod_desconto_dinheiro') as $desconto): 
                            
                            if($desconto->status == 1){
                            ?>
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                    Desconto vigente: 
                                    <span class="badge badge-primary badge-pill"><?php echo $desconto->valor_desconto ."<br>"; ?></span>
                                </li>
                            </ul>   
                        
                            <?php }elseif($desconto->status == 0){ ?>                         
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                    Desconto anterior: 
                                    <span class="badge badge-primary badge-pill"><?php echo $desconto->valor_desconto ."<br>"; ?></span>
                                </li>
                            </ul> 
                        
                            <?php }
                            endforeach;
                            ?>
                    </div> 

                <?php endif; ?>
            <?php } ?>
                  
           <!-- INICIO ESTRUTURA PARA CARTÃO --> 
           <?php if ($formapagamento->tipo_pagamento == 9 || $formapagamento->tipo_pagamento == 10){ ?>
                <?php if (count($formapagamento->cartoes) > 0): ?>

                    <hr/>
                    
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <h2 class="text-blue">
                            <i class="far fa-credit-card"></i> <strong> Cartões:</strong>
                        </h2>
                    </div>
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <?php foreach ($formapagamento->cartoes->sortByDesc('cod_cartao') as $cartaodebito): 
                            
                            if($cartaodebito->status == 1){
                            ?>
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-success">
                                    <strong> <i class="fas fa-signature"></i> Cartão: </strong><?php echo $cartaodebito->nome_cartao ."<br>"; ?> 
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong> Bandeira:</strong>
                                    <span class="badge badge-primary badge-pill"><?php echo $cartaodebito->bandeiras->nome_bandeira ."<br>"; ?></span>
                                </li>
                            </ul>     
                        
                            <?php }elseif($cartaodebito->status == 0){ ?>                         
                        
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-danger">
                                    <strong> <i class="fas fa-signature"></i> Cartão: </strong><?php echo $cartaodebito->nome_cartao ."<br/>"; ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong> Bandeira:</strong>
                                    <span class="badge badge-primary badge-pill"><?php echo $cartaodebito->bandeiras->nome_bandeira ."<br>"; ?></span>
                                </li>
                            </ul>  
                        
                            <?php }
                            endforeach;
                            ?>
                    </div> 

                <?php endif; ?>
            <?php } ?>       
                  
           <!-- FIM ESTRUTURA PARA CARTÃO DE DÉBITO --> 

        </div>
    </div>



</div>

@stop

@section('includes_no_body')

@stop
