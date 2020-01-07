@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Formas de Pagamento | Habilitar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/admin/administracao/formaspagamentos/formaspagamentos-habilitar.css'); ?>">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('formaspagamentos-habilitar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Habilitar Formas de pagamento</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <form method="POST" id="cadastro" name="cadastro" enctype="multipart/form-data">
                        <div id="avisoValidacao">
                            @if (count($errors) > 0)
                                <div class="col-xs-12">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-xs-12">
                            <div class="row"> <!-- INICIO DE OPÇÕES (FORMAS) -->
                                <div class="panel panel-default"> 
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Formas de pagamentos</div>                                
                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <div class="row">
                                               
                                                <a class="btn btn-app" id="btn_dinheiro">
                                                    <i class="far fa-money-bill-alt fa-2x"></i> <p><small>Dinheiro</small></p>
                                                </a>
                                               
                                                <a class="btn btn-app" id="btn_boleto">
                                                    <i class="fas fa-barcode fa-2x"></i> <p><small>Boleto</small></p>
                                                </a>

                                                <a class="btn btn-app" id="btn_cheque">
                                                    <i class="fas fa-money-check fa-2x"></i> <p><small>Cheque</small></p>
                                                </a>

                                                <a class="btn btn-app" id="btn_cheque_pre_datado">
                                                    <i class="fas fa-business-time fa-2x"></i> <p><small>Cheque Pré-Datado</small></p> 
                                                </a>

                                                <a class="btn btn-app" id="btn_transferencia">
                                                   <i class="fas fa-exchange-alt fa-2x"></i> <p><small>Transferência</small></p> 
                                                </a>

                                                <a class="btn btn-app" id="btn_deposito">
                                                   <i class="fas fa-piggy-bank fa-2x"></i> <p><small>Depósito</small></p>
                                                </a>
                                                
                                                <a class="btn btn-app" id="btn_cortesia">
                                                   <i class="fas fa-gift fa-2x"></i> <p><small>Cortesia</small></p>
                                                </a>
                                                
                                                <a class="btn btn-app" id="btn_convenio">
                                                   <i class="far fa-handshake fa-2x"></i> <p><small>Convênio</small></p>
                                                </a>
                                                
                                                <a class="btn btn-app" id="btn_debito">
                                                   <i class="fas fa-credit-card fa-2x"></i> <p><small>Débito</small></p>
                                                </a>
                                                
                                                <a class="btn btn-app" id="btn_credito">
                                                    <i class="far fa-credit-card fa-2x"></i> <p><small>Crédito</small></p>
                                                </a>
                                                
                                                <div class="col-sm-6 col-xs-12">                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </div>    
                                    </div>

                                  <br/>

                                </div>
                            </div> <!-- FIM DE OPÇÕES (FORMAS) -->
                            
                            
                            
                            <div class="row" id="dinheiro">  <!-- INICIO PANEL-DINHEIRO -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="far fa-money-bill-alt"></i> Dinheiro</div>
                                    							
                                    <div class="panel-body"><!-- INICIO PANEL-BODY -->                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) :                                                    
                                                if($formapagamento->tipo_pagamento == 1 && $formapagamento->status == 1){ ?>
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_dinheiro" id="checkbox_dinheiro" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Valor Desconto <span class="required-red">*</span></label>
                                                            <input type="text" class="form-control" name="valor_desconto_dinheiro" id="valor_desconto_dinheiro" placeholder="R$ 0,00" autocomplete="off" <?php if (!empty(old('valor_desconto_dinheiro'))) { ?>value="<?php echo old('valor_desconto_dinheiro'); ?>"<?php } ?>>
                                                        </div>
                                                    </div>
                                                
                                                <?php }elseif($formapagamento->tipo_pagamento == 1 && $formapagamento->status == 0){ ?>
                                                
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_dinheiro" id="checkbox_dinheiro" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Valor Desconto <span class="required-red">*</span></label>
                                                            <input type="text" class="form-control" disabled="disabled" name="valor_desconto_dinheiro" id="valor_desconto_dinheiro" placeholder="R$ 0,00" autocomplete="off" <?php if (!empty(old('valor_desconto_dinheiro'))) { ?>value="<?php echo old('valor_desconto_dinheiro'); ?>"<?php } ?>>
                                                        </div>
                                                    </div>
                                                <?php } 
                                                endforeach;
                                                ?>
                                            </div>
                                                     
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_dinheiro" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-DINHEIRO -->
                            
                            
                            <div class="row" id="boleto">  <!-- INICIO PANEL-BOLETO -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-barcode"></i> Boleto</div>
                                    							
                                    <div class="panel-body"> <!-- INICIO PANEL-BODY -->
                                    
                                        <div class="row">
                                            <div class="col-xs-12">                                            

                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) :      

                                                if($formapagamento->tipo_pagamento == 2 && $formapagamento->status == 1){ ?>    

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_boleto" id="checkbox_boleto" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                 <?php }elseif($formapagamento->tipo_pagamento == 2 && $formapagamento->status == 0){ ?>

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_boleto" id="checkbox_boleto" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>

                                                <?php }
                                                endforeach;
                                                ?>    


                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_boleto" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-BOLETO -->
                            
                            
                            <div class="row" id="cheque">  <!-- INICIO PANEL-CHEQUE -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-money-check"></i> Cheque</div>
                                    							
                                    <div class="panel-body"><!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) :      

                                                if($formapagamento->tipo_pagamento == 3 && $formapagamento->status == 1){ ?> 

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_cheque" id="checkbox_cheque" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                <?php }elseif($formapagamento->tipo_pagamento == 3 && $formapagamento->status == 0){ ?> 

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_cheque" id="checkbox_cheque" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>

                                                <?php }
                                                endforeach;
                                                ?>    

                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_cheque" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-CHEQUE -->
                            
                            
                            <div class="row" id="chequepredatado">  <!-- INICIO PANEL-CHEQUE PRÉ-DATADO -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-business-time"></i> Cheque Pré-datado</div>
                                    							
                                    <div class="panel-body"><!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">                                            
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) :      

                                                if($formapagamento->tipo_pagamento == 4 && $formapagamento->status == 1){ ?>
                                                
                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_chequepredatado" id="checkbox_chequepredatado" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>

                                                <?php }elseif($formapagamento->tipo_pagamento == 4 && $formapagamento->status == 0){ ?>
                                                
                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_chequepredatado" id="checkbox_chequepredatado" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>
                                                <?php }
                                                endforeach;
                                                ?> 
                                            </div> 
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_chequepredatado" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-CHEQUE-PRÉ-DATADO -->
                            
                            
                            
                            <div class="row" id="transferencia">  <!-- INICIO PANEL-TRANSFERÊNCIA -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-exchange-alt"></i> Transferência</div>
                                    							
                                    <div class="panel-body"><!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">    
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) :
                                                if($formapagamento->tipo_pagamento == 5 && $formapagamento->status == 1){ ?>  


                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_transferencia" id="checkbox_transferencia" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                <?php }elseif($formapagamento->tipo_pagamento == 5 && $formapagamento->status == 0){ ?> 


                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_transferencia" id="checkbox_transferencia" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                <?php }
                                                endforeach;
                                                ?> 
                                            </div>     
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_transferencia" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-TRANSFERÊNCIA -->
                            
                            
                            <div class="row" id="deposito">  <!-- INICIO PANEL-DEPÓSITO -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-piggy-bank"></i> Depósito</div>
                                    							
                                    <div class="panel-body"><!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">    
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) : 
                                                if($formapagamento->tipo_pagamento == 6 && $formapagamento->status == 1){ ?>                                             

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_deposito" id="checkbox_deposito" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>                                            

                                                <?php }elseif($formapagamento->tipo_pagamento == 6 && $formapagamento->status == 0){ ?>  

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_deposito" id="checkbox_deposito" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>

                                                <?php }
                                                endforeach;
                                                ?>
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_deposito" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-DEPÓSITO -->
                            
                            <div class="row" id="cortesia">  <!-- INICIO PANEL-CORTESIA -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="fas fa-gift"></i> Cortesia</div>
                                    							
                                    <div class="panel-body"> <!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                
                                            <?php
                                            foreach ($formaspagamentos as $formapagamento) : 
                                            if($formapagamento->tipo_pagamento == 7 && $formapagamento->status == 1){ ?> 

                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_cortesia" id="checkbox_cortesia" checked="cheked" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>


                                            <?php }elseif($formapagamento->tipo_pagamento == 7 && $formapagamento->status == 0){ ?> 


                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_cortesia" id="checkbox_cortesia" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>


                                            <?php }
                                            endforeach;
                                            ?>    


                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_cortesia" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-CORTESIA -->
                            
                            <div class="row" id="convenio">  <!-- INICIO PANEL-CONVÊNIO -->
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"> <i class="far fa-handshake"></i> Convênio</div>
                                    							
                                    <div class="panel-body"> <!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <?php
                                                foreach ($formaspagamentos as $formapagamento) : 
                                                if($formapagamento->tipo_pagamento == 8 && $formapagamento->status == 1){ ?>

                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_convenio" id="checkbox_convenio" checked="checked" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                <?php }elseif($formapagamento->tipo_pagamento == 8 && $formapagamento->status == 0){ ?>


                                                        <div class="form-group">
                                                            <div class="">
                                                                <label>
                                                                    <input type="checkbox" class="js-switch" name="checkbox_convenio" id="checkbox_convenio" value="on" /> Desabilitar / Habilitar
                                                                </label>
                                                            </div>
                                                        </div>


                                                <?php }
                                                endforeach;
                                                ?> 
                                            </div>    
                                        </div>
                                        
                                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                            <button type="submit" id="salvar_convenio" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                            <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                        </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-CONVÊNIO -->
                            
                            
                            <div class="row" id="debito">  <!-- INICIO PANEL-DEBITO -->                                
                               						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->                                    
                                <div class="panel-heading"><i class="fas fa-credit-card"></i> Cartões de débito</div>
                                
                                <div class="panel-body"> <!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <?php
                                            foreach ($formaspagamentos as $formapagamento) : 
                                            if($formapagamento->tipo_pagamento == 9 && $formapagamento->status == 1){ ?>

                                                <div class="col-xs-12">                                                
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_debito" id="checkbox_debito" checked="checked" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>                                                                                               
                                                </div>

                                            <?php }elseif($formapagamento->tipo_pagamento == 9 && $formapagamento->status == 0){ ?>

                                                <div class="col-xs-12">                                                
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_debito" id="checkbox_debito" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>                                                                                               
                                                </div>                                            

                                            <?php }
                                            endforeach;
                                            ?>     
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <?php
                                        foreach ($formaspagamentos as $formapagamento) : 
                                        if($formapagamento->tipo_pagamento == 9 && $formapagamento->status == 1){ ?>
                                        
                                        <div class="col-md-12 col-xs-12" id="aviso_btn_debito" style="display: none;">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                    Para habilitar o botão e adicionar cartão de débito será necessário habilitar essa forma de pagamento mudando a chave acima.
                                                </li>
                                            </ul>                        
                                        </div> 
                                        
                                        <!-- DIV ONDE APARECE FORM ADD -->
                                        <div class="col-sm-6 div_cartao_debito"></div> 
                                        
                                        <div class="clearfix"></div>
                                        <br/>
                                        <button id="btn_add_cartao_debito" type="button" class="btn btn-info btn-lg">
                                            <i class="fa fa-plus-circle"></i> Adicionar novo cartão
                                        </button>
                                        
                                        
                                        
                                     <?php }elseif($formapagamento->tipo_pagamento == 9 && $formapagamento->status == 0){ ?>    
                                        
                                        <div class="col-md-12 col-xs-12" id="aviso_btn_debito">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                    Para habilitar o botão e adicionar cartão de débito será necessário habilitar essa forma de pagamento mudando a chave acima.
                                                </li>
                                            </ul>                        
                                        </div> 
                                        
                                        <!-- DIV ONDE APARECE FORM ADD -->
                                        <div class="col-sm-6 div_cartao_debito"></div> 
                                        
                                        <br/>
                                            <div class="clearfix"></div>
                                        <br/>
                                        
                                        <button id="btn_add_cartao_debito" type="button" class="btn btn-info btn-lg" disabled="disabled">
                                            <i class="fa fa-plus-circle"></i> Adicionar novo cartão
                                        </button>
                                        
                                        
                                    <?php }
                                    endforeach;
                                    ?>  
                                        
                                    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="salvar_debito" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                        <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                    </div>
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                                
                            </div> <!-- FIM PANEL-DEBITO -->
                            
                            
                            
                            <div class="row" id="credito"> <!-- INICIO PANEL-CRÉDITO -->                                
                                						
                                <div class="panel panel-default"> <!-- INICIO PANEL-DEFAULT -->
                                    
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Cartões de crédito</div>  
                                    
                                    <div class="panel-body"> <!-- INICIO PANEL-BODY -->
                                        
                                        <div class="row">
                                            <?php
                                            foreach ($formaspagamentos as $formapagamento) : 
                                            if($formapagamento->tipo_pagamento == 10 && $formapagamento->status == 1){ ?>

                                                <div class="col-xs-12">                                                
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_credito" id="checkbox_credito" checked="checked" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>                                                                                               
                                                </div>

                                            <?php }elseif($formapagamento->tipo_pagamento == 10 && $formapagamento->status == 0){ ?>

                                                <div class="col-xs-12">                                                
                                                    <div class="form-group">
                                                        <div class="">
                                                            <label>
                                                                <input type="checkbox" class="js-switch" name="checkbox_credito" id="checkbox_credito" value="on" /> Desabilitar / Habilitar
                                                            </label>
                                                        </div>
                                                    </div>                                                                                               
                                                </div>                                            

                                            <?php }
                                            endforeach;
                                            ?>     
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        
                                        <?php
                                        foreach ($formaspagamentos as $formapagamento) : 
                                        if($formapagamento->tipo_pagamento == 10 && $formapagamento->status == 1){ ?>
                                        
                                        <div class="col-md-12 col-xs-12" id="aviso_btn_credito" style="display: none;">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                    Para habilitar o botão e adicionar cartão de crédito será necessário habilitar essa forma de pagamento mudando a chave acima.
                                                </li>
                                            </ul>                        
                                        </div> 
                                        
                                        <!-- DIV ONDE APARECE FORM DE SUB CATEGORIA FINANCEIRA -->
                                        <div class="col-sm-6 div_cartao_credito"></div> 
                                        
                                        <div class="clearfix"></div>
                                        <br/>
                                        <button id="btn_add_cartao_credito" type="button" class="btn btn-info btn-lg">
                                            <i class="fa fa-plus-circle"></i> Adicionar novo cartão
                                        </button>
                                        
                                     <?php }elseif($formapagamento->tipo_pagamento == 10 && $formapagamento->status == 0){ ?>    
                                        
                                        <div class="col-md-12 col-xs-12" id="aviso_btn_credito">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                    Para habilitar o botão e adicionar cartão de crédito será necessário habilitar essa forma de pagamento mudando a chave acima.
                                                </li>
                                            </ul>                        
                                        </div> 
                                        
                                        <!-- DIV ONDE APARECE FORM DE SUB CATEGORIA FINANCEIRA -->
                                        <div class="col-sm-6 div_cartao_credito"></div> 
                                        
                                        <br/>
                                            <div class="clearfix"></div>
                                        <br/>
                                        
                                        <button id="btn_add_cartao_credito" type="button" class="btn btn-info btn-lg" disabled="disabled">
                                            <i class="fa fa-plus-circle"></i> Adicionar novo cartão
                                        </button>
                                        
                                        
                                    <?php }
                                    endforeach;
                                    ?>
                                        
                                    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" id="salvar_credito" class="btn btn-success pull-right salvar"><i class="far fa-save"></i> Salvar</button>
                                        <a class="btn btn-default pull-right" href="{{ url('admin/painel/formaspagamentos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                    </div>    
                                        
                                    </div> <!-- FIM PANEL-BODY -->
                                    
                                </div> <!-- FIM PANEL-DEFAULT -->
                                
                            </div> <!-- FIM PANEL-CRÉDITO -->
                                                   
                            <!-- LINHA -->
                            
                            <div id="msg_processando">
                                <div id="txt_msg_processando">
                                    <i class="fa fa-exchange"></i> PROCESSANDO...
                                </div>
                            </div>
                        </div>
               </form>        
            </div>
        </div>
    </div>
</div>    
</div>    

@stop

@section('includes_no_body')
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript">

// Abre $(document).ready     
$(document).ready(function () {

    /*::: NEUTRALIZAÇÃO DA FUNÇÃO SUBMIT DO FORM :::*/
    $('#cadastro').submit(function () {
        return false;
    }); 
    
    /*::: FUNÇÃO PARA ESCONDER SEÇÃO :::*/
    function esconder() {        
        $('#dinheiro').hide();
        $('#boleto').hide();
        $('#cheque').hide();
        $('#chequepredatado').hide();
        $('#transferencia').hide();
        $('#deposito').hide();
        $('#cortesia').hide();
        $('#convenio').hide();
        $('#credito').hide();
        $('#debito').hide();
    }
    
    // Iniciazo.. 
    esconder();
    
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA DINHEIRO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
    
   $('#btn_dinheiro').click(function() {
        $('#dinheiro').show('fast');
        $('#boleto').hide('fast');
        $('#cheque').hide('fast');
        $('#chequepredatado').hide('fast');
        $('#transferencia').hide('fast');
        $('#deposito').hide();
        $('#cortesia').hide();
        $('#convenio').hide();
        $('#credito').hide('fast');
        $('#debito').hide('fast');
    });
    
    // verificação em check button dinheiro 
    document.getElementById('checkbox_dinheiro').onclick = function() {

        // is hazard checkbox checked?
        var checkButtonDinheiro = this.checked; // true or false

            if (checkButtonDinheiro) { // checkButtonDinheiro checkbox checked

                $('#valor_desconto_dinheiro').maskMoney();
                $('#valor_desconto_dinheiro').prop("disabled", false);

            } else { // checkButtonDinheiro not checked

                $('#valor_desconto_dinheiro').val('');
                $('#valor_desconto_dinheiro').prop("disabled", true);
            }                
    }
    
    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR DINHEIRO :::
     *****************************************************/

    $('#salvar_dinheiro').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_dinheiro = $('#checkbox_dinheiro:checked').val();  
        var valor_desconto_dinheiro = $('#valor_desconto_dinheiro').val();  
      
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-dinheiro-ajax') }}",
            data: {
                "checkbox_dinheiro": checkbox_dinheiro,                
                "valor_desconto_dinheiro": valor_desconto_dinheiro                
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_desconto_dinheiro_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o valor de desconto para dinheiro!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
               
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento dinheiro foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR DINHEIRO
    
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA BOLETO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_boleto').click(function() {
            $('#boleto').show('fast');
            $('#dinheiro').hide('fast');
            $('#cheque').hide('fast');
            $('#chequepredatado').hide('fast');
            $('#transferencia').hide('fast');
            $('#deposito').hide();
            $('#cortesia').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        });
        
    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR BOLETO :::
     ******************************************************/

    $('#salvar_boleto').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_boleto = $('#checkbox_boleto:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-boleto-ajax') }}",
            data: {
                "checkbox_boleto": checkbox_boleto                
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                
                // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento boleto foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR BOLETO
    
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA CHEQUE ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_cheque').click(function() {
            $('#cheque').show('fast');
            $('#dinheiro').hide('fast');
            $('#boleto').hide('fast');
            $('#chequepredatado').hide('fast');
            $('#transferencia').hide('fast');
            $('#deposito').hide();
            $('#cortesia').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        });

    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR CHEQUE :::
     ******************************************************/

    $('#salvar_cheque').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_cheque = $('#checkbox_cheque:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-cheque-ajax') }}",
            data: {
                "checkbox_cheque": checkbox_cheque                
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento cheque foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR CHEQUE

/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA CHEQUE PRÉ-DATADO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_cheque_pre_datado').click(function() {
            $('#chequepredatado').show('fast');
            $('#dinheiro').hide('fast');
            $('#boleto').hide('fast');
            $('#cheque').hide('fast');
            $('#transferencia').hide('fast');
            $('#deposito').hide();
            $('#cortesia').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        }); 
        
     /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR CHEQUE PRÉ-DATADO :::
     ******************************************************/

    $('#salvar_chequepredatado').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_chequepredatado = $('#checkbox_chequepredatado:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-chequepredatado-ajax') }}",
            data: {
                "checkbox_chequepredatado": checkbox_chequepredatado                
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento cheque pré-datado foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR CHEQUE PRÉ-DATADO        
        
        
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA TRANSFERÊNCIA ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_transferencia').click(function() {
            $('#transferencia').show('fast');
            $('#dinheiro').hide('fast');
            $('#boleto').hide('fast');
            $('#cheque').hide('fast');
            $('#chequepredatado').hide('fast');
            $('#deposito').hide();
            $('#cortesia').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        }); 
        
    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR TRANSFERÊNCIA :::
     ******************************************************/

    $('#salvar_transferencia').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_transferencia = $('#checkbox_transferencia:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-transferencia-ajax') }}",
            data: {
                "checkbox_transferencia": checkbox_transferencia                
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento transferência foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR TRANSFERÊNCIA
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA DEPÓSITO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_deposito').click(function() {
            $('#deposito').show();
            $('#dinheiro').hide('fast');
            $('#boleto').hide('fast');
            $('#cheque').hide('fast');
            $('#chequepredatado').hide('fast');
            $('#transferencia').hide('fast');
            $('#cortesia').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        });
        
     /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR DEPÓSITO :::
     ******************************************************/

    $('#salvar_deposito').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_deposito = $('#checkbox_deposito:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-deposito-ajax') }}",
            data: {
                "checkbox_deposito": checkbox_deposito                
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento depósito foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR DEPÓSITO
        
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA CORTESIA ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/

       $('#btn_cortesia').click(function() {
            $('#cortesia').show();
            $('#dinheiro').hide('fast');
            $('#boleto').hide('fast');
            $('#cheque').hide('fast');
            $('#chequepredatado').hide('fast');
            $('#transferencia').hide('fast');
            $('#deposito').hide();
            $('#convenio').hide();
            $('#credito').hide('fast');
            $('#debito').hide('fast');
        });
        
        
    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR CORTESIA :::
     ******************************************************/

    $('#salvar_cortesia').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_cortesia = $('#checkbox_cortesia:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-cortesia-ajax') }}",
            data: {
                "checkbox_cortesia": checkbox_cortesia               
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento cortesia foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR CORTESIA 
        
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA CONVÊNIO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
    $('#btn_convenio').click(function() {
         $('#convenio').show();
         $('#dinheiro').hide('fast');
         $('#boleto').hide('fast');
         $('#cheque').hide('fast');
         $('#chequepredatado').hide('fast');
         $('#transferencia').hide('fast');
         $('#deposito').hide();
         $('#cortesia').hide();
         $('#credito').hide('fast');
         $('#debito').hide('fast');
     });
 
    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR CONVÊNIO :::
     ******************************************************/

    $('#salvar_convenio').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Part. variáveis 
        var checkbox_convenio = $('#checkbox_convenio:checked').val();  
        
        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-convenio-ajax') }}",
            data: {
                "checkbox_convenio": checkbox_convenio               
                            
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
               // ::: Checagem de retorno :::
                if (response.status == 'acao_ja_realizada') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Esta ação já foi realizada!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento convênio foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível habilitar a forma de pagamento. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR CONVÊNIO 
    
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA DÉBITO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
   
        $('#btn_debito').click(function() {
                $('#debito').show('fast');
                $('#dinheiro').hide('fast');
                $('#boleto').hide('fast');
                $('#cheque').hide('fast');
                $('#chequepredatado').hide('fast');
                $('#transferencia').hide('fast');
                $('#deposito').hide();
                $('#cortesia').hide();
                $('#convenio').hide();
                $('#credito').hide('fast');
        });
        
    // verificação em check button debito
    document.getElementById('checkbox_debito').onclick = function() {

        var checkButtonDebito = this.checked; // true or false

            if (checkButtonDebito) { // checkButtonDebito checkbox checked

                $('#btn_add_cartao_debito').prop("disabled", false);
                $('#aviso_btn_debito').hide();

            } else { // checkButtonDebito not checked

                $('#aviso_btn_debito').show('fast');
                $('.div_cartao_debito').empty().append();
                $('#btn_add_cartao_debito').prop("disabled", true);
            }                
    }
    
    /*::: INICIO AÇÃO NO BOTÃO ADICIONAR (APPEND) :::*/
    $('#btn_add_cartao_debito').click(function () {

        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';
        conteudo += '<div class="row div_cartao_debito_add">'; // Inicio linha global (row) 
        
        conteudo += '<div class="row">'; // Inicio primeira linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Nome do cartão: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" name="nome_cartao_debito[]" class="form-control" min="1" id="nome_cartao_debito" autocomplete="off"/>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim primeira linha (row)
        
        conteudo += '<div class="row">'; // Inicio segunda linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Bandeira: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control cod_bandeira_debito" name="cod_bandeira_debito[]" id="cod_bandeira_debito"></select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim segunda linha (row)


        conteudo += '<button type="button" id="remover_cartao_debito" class="deletar_cartao_debito btn btn-danger pull-right"><i class="fa fa-times-circle"></i> Remover</button>';
        
        conteudo += '</div>'; // Fim linha global (row)
        
        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_cartao_debito');
        
        $.ajax({
            url: "{{ url('admin/painel/bandeiras/buscar-bandeiras-debito-ajax') }}",
           // data: {'cod_tabela': cod_tabela},
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // Limpando antes
                $(".cod_bandeira_debito").html('');
                $(".cod_bandeira_debito").append('<option value="">Selecione..</option>');
                
                $(response).each(function (index, value) {                    
                    $(".cod_bandeira_debito").append("<option value='" + value.cod_bandeira + "'>" + value.nome_bandeira + "</option>");
                });
            },
            error: function (response) {
                
            }
        });
       

    }); /*::: FIM AÇÃO NO BOTÃO ADICIONAR (APPEND) :::*/

    /*::: AÇÃO NO BOTÃO REMOVER  :::*/
    $('.div_cartao_debito').on('click', '.deletar_cartao_debito', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_cartao_debito_add').remove();
    });
    
     /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR DÉBITO :::
     ******************************************************/

    $('#salvar_debito').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');
        
        var checkbox_debito = $('#checkbox_debito:checked').val(); 
        // Part. Arrays
        var cartao_debito_pai = new Array();
        var cartao_debito_filho;
        var cartao_debito_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_cartao_debito > div.div_cartao_debito_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            cartao_debito_filho = new Array(
                    $('#nome_cartao_debito', this).val(),
                    $('#cod_bandeira_debito', this).val()
                    );

            // Coloco o Array gerado agora dentro do Array pai
            cartao_debito_pai.push(cartao_debito_filho);

            // Limpo variavel para futuras utilizações
            cartao_debito_filho = null;

        });

        // Apos converto Array para JSON
        cartao_debito_em_json = JSON.stringify(cartao_debito_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-debito-ajax') }}",
            data: {
                "checkbox_debito": checkbox_debito,  
                "cartao_debito_em_json": cartao_debito_em_json
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // ::: Checagem de retorno :::
                if (response.status == 'nome_cartao_debito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome do cartão de débito',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'cod_bandeira_debito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, selecione uma bandeira!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'total_cartao_debito_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro 
                    $.toast({
                        heading: 'Por favor, adicione um cartão de débito!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
               
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento cartão de débito foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível prosseguir. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR DÉBITO
    
/*******************************************************************************************************************************************************
========================================================================================================================================================
 ##### ----- ESTRUTURA PARA CRÉDITO ----- ##########
========================================================================================================================================================        
*******************************************************************************************************************************************************/
    
        $('#btn_credito').click(function() {
                $('#credito').show('fast');
                $('#dinheiro').hide('fast');
                $('#boleto').hide('fast');
                $('#cheque').hide('fast');
                $('#chequepredatado').hide('fast');
                $('#transferencia').hide('fast');
                $('#deposito').hide();
                $('#cortesia').hide();
                $('#convenio').hide();
                $('#debito').hide('fast');
        });
        
    // verificação em check button credito
    document.getElementById('checkbox_credito').onclick = function() {

        // is hazard checkbox checked?
        var checkButtonCredito = this.checked; // true or false

            if (checkButtonCredito) { // checkButtonCredito checkbox checked

                $('#btn_add_cartao_credito').prop("disabled", false);
                $('#aviso_btn_credito').hide();

            } else { // checkButtonCredito not checked

                $('#aviso_btn_credito').show('fast');
                $('.div_cartao_credito').empty().append();
                $('#btn_add_cartao_credito').prop("disabled", true);
            }                
    }
    
    /*::: INICIO AÇÃO NO BOTÃO ADICIONAR (APPEND) :::*/
    $('#btn_add_cartao_credito').click(function () {

        // Prenchendo variável de conteúdo dinâmico
        var conteudo = '';
        conteudo += '<div class="row div_cartao_credito_add">'; // Inicio linha global (row) 
        
        conteudo += '<div class="row">'; // Inicio primeira linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Nome do cartão: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" name="nome_cartao_credito[]" class="form-control" min="1" id="nome_cartao_credito" autocomplete="off"/>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim primeira linha (row)
        
        conteudo += '<div class="row">'; // Inicio segunda linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Bandeira: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control cod_bandeira_credito" name="cod_bandeira_credito[]" id="cod_bandeira_credito"></select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim segunda linha (row)


        conteudo += '<button type="button" id="remover_cartao_credito" class="deletar_cartao_credito btn btn-danger pull-right"><i class="fa fa-times-circle"></i> Remover</button>';
        
        conteudo += '</div>'; // Fim linha global (row)
        
        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_cartao_credito');
        
        $.ajax({
            url: "{{ url('admin/painel/bandeiras/buscar-bandeiras-credito-ajax') }}",
           // data: {'cod_tabela': cod_tabela},
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                // Limpando antes
                $(".cod_bandeira_credito").html('');
                $(".cod_bandeira_credito").append('<option value="">Selecione..</option>');
                
                $(response).each(function (index, value) {                    
                    $(".cod_bandeira_credito").append("<option value='" + value.cod_bandeira + "'>" + value.nome_bandeira + "</option>");
                });
            },
            error: function (response) {
                
            }
        });
       

    }); /*::: FIM AÇÃO NO BOTÃO ADICIONAR (APPEND) :::*/

    /*::: AÇÃO NO BOTÃO REMOVER  :::*/
    $('.div_cartao_credito').on('click', '.deletar_cartao_credito', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_cartao_credito_add').remove();
    });
    
     /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR CRÉDITO :::
     ******************************************************/

    $('#salvar_credito').on('click', function (e) {

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');
        
        var checkbox_credito = $('#checkbox_credito:checked').val(); 
        // Part. Arrays
        var cartao_credito_pai = new Array();
        var cartao_credito_filho;
        var cartao_credito_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_cartao_credito > div.div_cartao_credito_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            cartao_credito_filho = new Array(
                    $('#nome_cartao_credito', this).val(),
                    $('#cod_bandeira_credito', this).val()
                    );

            // Coloco o Array gerado agora dentro do Array pai
            cartao_credito_pai.push(cartao_credito_filho);

            // Limpo variavel para futuras utilizações
            cartao_credito_filho = null;

        });

        // Apos converto Array para JSON
        cartao_credito_em_json = JSON.stringify(cartao_credito_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento-credito-ajax') }}",
            data: {
                "checkbox_credito": checkbox_credito,  
                "cartao_credito_em_json": cartao_credito_em_json
            },
            beforeSend: function () {

                // Mostra mensagem processando...
                $('#msg_processando').show();

                // Reseta todos os toast
                $.toast().reset('all');

            },
            success: function (response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // ::: Checagem de retorno :::
                if (response.status == 'nome_cartao_credito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome do cartão de crédito',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'cod_bandeira_credito_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, selecione uma bandeira!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'total_cartao_credito_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro 
                    $.toast({
                        heading: 'Por favor, adicione um cartão de crédito!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
               
                if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Parabéns! A ação na forma de pagamento cartão de crédito foi efetivada com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/formaspagamentos/habilitar-forma-pagamento")}}';
                        }
                    });                    

                }

            },
            complete: function (response) {
                // Nothing here
            },
            error: function (xhr, status, error) {
                
                alert('Não foi possível prosseguir. Tente novamente mais tarde!');
            }
        });

    }); // FECHA AÇÃO NO BOTÃO SALVAR CRÉDITO
    
    
    
}); // FECHA $(document).ready


</script>
@stop
