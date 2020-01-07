@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Alterar
@stop

@section('includes_no_head')

<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/administracao/planos/planos-cadastrar.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('convenios-alterar-plano', $convenio) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Alterar Plano Auto Gestão</h3>
    </div>
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
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
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#dadoscadastrais" id="tab_dadoscadastrais">Dados cadastrais</a></li>
                            <li><a data-toggle="tab" href="#servicos" id="tab_servicos">Serviços</a></li>
                            <li><a data-toggle="tab" href="#carencias" id="tab_carencias">Carências</a></li>
                            <li><a data-toggle="tab" href="#modeloscarteirinhas" id="tab_modeloscarteirinhas">Modelo de Carteirinha</a></li>
                        </ul>
                        
                        <div class="clearfix" style="margin-bottom:20px"></div>

                        <!-- DIV ONDE SÃO CARREGADOS AVISOS DE VALIDAÇÃO -->
                        <div id="avisoValidacao"></div>    

                        <form method="POST" id="cadastro" name="cadastro" enctype="multipart/form-data">

                            <div class="tab-content">

                                <div id="dadoscadastrais" class="tab-pane fade in active">

                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Dados cadastrais:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <!-- INICIO DIV DADOS CADASTRAIS -->					
                                        <div class="col-xs-12"> 
                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">

                                                <div class="panel-heading"><i class="fas fa-briefcase-medical"></i> DADOS CADASTRAIS</div>

                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Convênio <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $plano->convenios->nome_convenio }}" name="nome_convenio" readonly="readonly" />
                                                            </div>                                                                
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                                <select class="form-control" name="cod_tabela" id="cod_tabela" disabled="disabled">
                                                                    <option value="{{ Crypt::encrypt($tabela->cod_tabela) }}">{{ $tabela->nome_tabela }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Faturado ? <span class="required-red">*</span></label>
                                                                <select class="form-control" name="faturado" id="faturado" disabled="disabled">
                                                                    <option value="1" <?php if ($plano->faturado == 1) { echo "selected";} ?>>>Sim</option>
                                                                    <option value="0" <?php if ($plano->faturado == 0) { echo "selected";} ?>>Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Nome do plano <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" name="nome_plano" id="nome_plano" placeholder="Nome do plano" value="{{ $plano->nome_plano }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Código</label>
                                                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ $plano->codigo }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Data Início <span class="required-red">*</span></label></label>
                                                                <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicial da vigência Plano" value="{{ date('d/m/Y', strtotime($plano->data_inicio)) }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <label class="control-label">Valor do plano <span class="required-red">*</span></label>
                                                            <div class="form-inline">
                                                                <input type="text" name="valor_plano_individual" id="valor_plano_individual" class="form-control pull-left money" placeholder="Valor Individual" size="14" value="{{ $plano->valor_mensal_individual }}" disabled="disabled">
                                                                <input type="text" name="valor_plano_grupo" id="valor_plano_grupo" class="form-control pull-right money" placeholder="Valor Grupo" size="14" value="{{ $plano->valor_mensal_grupo }}" disabled="disabled">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            
                                                            <label class="control-label">Tipo do plano <span class="required-red">*</span></label>
                                                            <div class="form-inline">                                                                
                                                                <?php if($plano->tipo_plano == 1) { ?>
                                                                
                                                                    <input type="radio" name="tipo_plano" class="tipo_plano" id="tipo_plano_pessoa_fisica" value="1" <?php if($plano->tipo_plano == 1){echo "checked"; } ?> disabled="disabled">
                                                                    <label class="control-label">Pessoa Física</label>
                                                                    
                                                                <?php }elseif($plano->tipo_plano == 2){ ?> 
                                                                    
                                                                    <input type="radio" name="tipo_plano" class="tipo_plano" id="tipo_plano_pessoa_juridica" value="2" <?php if($plano->tipo_plano == 2){echo "checked"; } ?> disabled="disabled">
                                                                    <label class="control-label">Pessoa Jurídica</label>
                                                                
                                                                <?php } ?>
                                                                    
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Máx. dias de inadimplência <span class="required-red">*</span></label>
                                                                <input type="text" class="form-control" name="cancelar_se_inadimplente" id="cancelar_se_inadimplente" placeholder="Máximo de dias" value="{{ old('cancelar_se_inadimplente') }}">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-xs-12">
                                                            <label class="control-label">Valor da inclusão por dependente <span class="required-red">*</span></label>
                                                            <div class="form-inline">
                                                                <input type="text" name="valor_inclusao_dependente_individual" id="valor_inclusao_dependente_individual" class="form-control pull-left" value="{{ $plano->valor_inclusao_dependente_individual }}" disabled="disabled" size="14">
                                                                <input type="text" name="valor_inclusao_dependente_grupo" id="valor_inclusao_dependente_grupo" class="form-control pull-right" value="{{ $plano->valor_inclusao_dependente_grupo }}" disabled="disabled" size="14" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <label class="control-label">Valor carteirinha <span class="required-red">*</span></label>
                                                            <div class="form-inline">
                                                                <input type="text" name="valor_carteirinha_individual" id="valor_carteirinha_individual" class="form-control pull-left" value="{{ $plano->valor_carteirinha_individual }}" disabled="disabled" size="14">
                                                                <input type="text" name="valor_carteirinha_grupo" id="valor_carteirinha_grupo" class="form-control pull-right" value="{{ $plano->valor_carteirinha_grupo }}" disabled="disabled" size="14" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                </div>
                                                <!-- FIM PANEL-BODY -->
                                            </div>
                                            <!-- FIM PANEL-DEFAULT -->  
                                            <div class="clearfix"></div>
                                            <a onclick="clickTabServicos()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                        <!-- FIM DIV DADOS CADASTRAIS -->
                                    </div>
                                </div>

                                <div id="servicos" class="tab-pane fade">

                                    <div class="row">                                        
                                        <h2><i class="fas fa-cubes"></i> Serviços:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>    
                                        <!-- INICIO DIV SERVIÇOS -->					
                                        <div class="col-xs-12">
                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><i class="fas fa-gift"></i> SERVIÇOS</div>
                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">
                                                    <div class="col-sm-12 div_servico">
                                                    
                                                        <?php 
                                                        if ($plano->tipo_plano == 1) { 
                                                        ?>        

                                                            @if($plano->faixas_etarias_planos->count())

                                                                @foreach($plano->faixas_etarias_planos->where('status', 1) as $faixa)
                                            
                                                                    <div class="col-sm-12 div_servico_add">

                                                                        @if($faixa->servicos_pessoa_fisica->count()) 
                                                                            
                                                                            <?php
                                                                            $array_servicos_selecionados = $faixa->servicos_pessoa_fisica->filter(function($item) {
                                                                                return $item->status == 1;
                                                                            })->pluck('cod_servico_possivel')->toArray();
                                                                            ?>

                                                                        @endif    

                                                                        <h2>De {{ $faixa->idade_inicial }} Até {{ $faixa->idade_final }} anos</h2>                                                                

                                                                        <?php foreach ($servicos as $servico) : ?>

                                                                            <div class="form-check">
                                                                                <input type="hidden" id="cod_faixa_etaria_plano" name="cod_faixa_etaria_plano" value="<?php echo $faixa->cod_faixa_etaria_plano; ?>" />
                                                                                <input type="checkbox" name="servicos[]" id="servicos" class="form-check-input checkbox_servicos" value="{{ $servico->cod_servico_possivel }}" <?php if (isset($array_servicos_selecionados)) { if (in_array($servico->cod_servico_possivel, $array_servicos_selecionados)){ echo "checked"; } } ?>>
                                                                                <label class="form-check-label" for="defaultCheck1"> {{ $servico->nome_servico }} </label>
                                                                            </div>

                                                                        <?php endforeach; ?>

                                                                        <?php 
                                                                        // destruindo ..
                                                                        unset($array_servicos_selecionados);  
                                                                        ?>

                                                                    <hr />

                                                                    </div> <!-- FIM DIV SERVIÇOS ADD -->

                                                                @endforeach
                                                                
                                                            @endif

                                                        <?php 
                                                        } elseif ($plano->tipo_plano == 2) { 
                                                        ?>                                                    
                                                            @if($plano->faixas_etarias_planos->count())

                                                                @foreach($plano->faixas_etarias_planos->where('status', 1) as $faixa)
                                            
                                                                    <div class="col-sm-12 div_servico_add">

                                                                        @if($faixa->servicos_pessoa_juridica->count()) 
                                                                            
                                                                            <?php
                                                                            $array_servicos_selecionados = $faixa->servicos_pessoa_juridica->filter(function($item) {
                                                                                return $item->status == 1;
                                                                            })->pluck('cod_servico_possivel')->toArray();
                                                                            ?>

                                                                        @endif    

                                                                        <h2>De {{ $faixa->idade_inicial }} Até {{ $faixa->idade_final }} anos</h2>                                                                

                                                                        <?php foreach ($servicos as $servico) : ?>

                                                                            <div class="form-check">
                                                                                <input type="hidden" id="cod_faixa_etaria_plano" name="cod_faixa_etaria_plano" value="<?php echo $faixa->cod_faixa_etaria_plano; ?>" />
                                                                                <input type="checkbox" name="servicos[]" id="servicos" class="form-check-input checkbox_servicos" value="{{ $servico->cod_servico_possivel }}" <?php if (isset($array_servicos_selecionados)) { if (in_array($servico->cod_servico_possivel, $array_servicos_selecionados)){ echo "checked"; } } ?>>
                                                                                <label class="form-check-label" for="defaultCheck1"> {{ $servico->nome_servico }} </label>
                                                                            </div>

                                                                        <?php endforeach; ?>

                                                                        <?php 
                                                                        // destruindo ..
                                                                        unset($array_servicos_selecionados);  
                                                                        ?>

                                                                    <hr />

                                                                    </div> <!-- FIM DIV SERVIÇOS ADD -->

                                                                @endforeach
                                                                
                                                            @endif


                                                        <?php 
                                                        } 
                                                        ?>
                                                    </div> 
                                                
                                                <div class="clearfix"></div>  

                                                </div> <!-- FIM PANEL-BODY -->
                                            </div> <!-- FIM PANEL-DEFAULT -->  
                                        
                                    </div> <!-- FIM DIV SERVIÇOS -->
                                    </div>

                                    <div class="clearfix"></div>                                        
                                    <a onclick="clickTabCarencias()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    <a onclick="clickTabDadosCadastrais()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                </div>

                                <div id="carencias" class="tab-pane fade">                                    

                                    <div class="row">
                                        <h2>
                                            <i class="fas fa-gift"></i> Carências:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <!-- INICIO DIV CARÊNCIAS -->					
                                        <div class="col-xs-12"> 
                                            <!-- INICIO PANEL-DEFAULT -->						
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><i class="fas fa-gift"></i> CARÊNCIAS</div>
                                                <!-- INICIO PANEL-BODY -->							
                                                <div class="panel-body">
                                                    
                                                    <!-- DIV ONDE APARECE FORM DE CARÊNCIA ANTERIORMENTE CADASTRADAS-->
                                                    <div class="col-sm-12 div_carencias_anteriormente_cadastradas">
                                                        
                                                    <?php if($plano->tipo_plano == 1) { ?>        

                                                        @if($plano->bonificacoes_pessoa_fisica->count())
                                                        
                                                            @foreach($plano->bonificacoes_pessoa_fisica->where('status',1) as $bpf)
                                                            
                                                                <div class="row div_carencias_bd">
                                                                    <div class="row">
                                                                        <div class="col-md-12">                                                                             
                                                                            <?php foreach ($bpf->procedimentos as $procedimento) : ?>                                                                            
                                                                                    <label class="label label-default"><?php echo $procedimento->descricao; ?></label>                                                                                
                                                                           <?php endforeach;?>                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <br/>

                                                                    <div class="row">
                                                                        
                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Carência: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="carencia[]" id="carencia" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="1" <?php if ($bpf->carencia == 1) { echo "selected";} ?>>Imediato</option>
                                                                                    <option value="2" <?php if ($bpf->carencia == 2) { echo "selected";} ?>>24h</option>
                                                                                    <option value="3" <?php if ($bpf->carencia == 3) { echo "selected";} ?>>48h</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <?php
                                                                                $i =0;
                                                                                foreach ($bpf->procedimentos as $p):
                                                                                    $i++;
                                                                                    if($i== 1){
                                                                                        $data_inicio_carencia =  $p->pivot->data_inicio;
                                                                                    }
                                                                                endforeach;
                                                                                ?>
                                                                                <label class="control-label">Data Início: <span class="required-red">*</span></label>
                                                                                <input type="text" type="text" name="data_inicio_carencia[]" id="data_inicio_carencia" class="form-control datepicker" placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($data_inicio_carencia)); ?>" disabled="disabled">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Tipo desconto: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="tipo_desconto[]" id="tipo_desconto" disabled="disabled">
                                                                                    <option value="">..</option>
                                                                                    <option value="1" <?php if ($bpf->tipo_desconto == 1) { echo "selected";} ?>>%</option>
                                                                                    <option value="2" <?php if ($bpf->tipo_desconto == 2) { echo "selected";} ?>>R$</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Valor desconto: <span class="required-red">*</span></label>
                                                                                <input type="text" class="form-control valor_desconto" id="valor_desconto" name="valor_desconto[]" placeholder="0,00" autocomplete="off" value="<?php echo $bpf->valor_desconto; ?>" disabled="disabled"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Periodicidade: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="periodicidade[]" id="periodicidade" disabled="disabled">
                                                                                    <option value="">Selecione..</option>
                                                                                    <option value="1" <?php if ($bpf->periodicidade == 1) { echo "selected";} ?>>Diário</option>
                                                                                    <option value="2" <?php if ($bpf->periodicidade == 2) { echo "selected";} ?>>Semanal</option>
                                                                                    <option value="3" <?php if ($bpf->periodicidade == 3) { echo "selected";} ?>>Quinzenal</option>
                                                                                    <option value="4" <?php if ($bpf->periodicidade == 4) { echo "selected";} ?>>Mensal</option>
                                                                                    <option value="5" <?php if ($bpf->periodicidade == 5) { echo "selected";} ?>>Trimestral</option>
                                                                                    <option value="6" <?php if ($bpf->periodicidade == 6) { echo "selected";} ?>>Semestral</option>
                                                                                    <option value="7" <?php if ($bpf->periodicidade == 7) { echo "selected";} ?>>Anual</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Qtd. parcelas quitadas: <span class="required-red">*</span></label>
                                                                                <input type="number" min="1" class="form-control quantidade_parcelas_quitadas" id="quantidade_parcelas_quitadas" name="quantidade_parcelas_quitadas[]" placeholder="0" autocomplete="off" value="<?php echo $bpf->quantidade_parcelas_quitadas; ?>" disabled="disabled"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Condição contratual: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="condicao_contratual[]" id="condicao_contratual" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="1" <?php if ($bpf->condicao_contratual == 1) { echo "selected";} ?>>1 ou 2 pessoas em contrato</option>
                                                                                    <option value="3" <?php if ($bpf->condicao_contratual == 3) { echo "selected";} ?>>3 ou mais pessoas</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Dias Inadimplente: <span class="required-red">*</span></label>
                                                                                <input type="number" min="1" name="dias_inadimplente[]" id="dias_inadimplente" size="3" class="form-control dias_inadimplente" placeholder="0" value="<?php echo $bpf->dias_inadimplente; ?>" disabled="disabled">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Se estiver Inadimplente: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="configuracao_inadimplencia[]" id="configuracao_inadimplencia" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="2" <?php if ($bpf->configuracao_inadimplencia == 2) { echo "selected";} ?>>Anular desconto</option>
                                                                                    <option value="1" <?php if ($bpf->configuracao_inadimplencia == 1) { echo "selected";} ?>>Manter desconto</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    <div class="form-group col-xs-4 col-xs-4 col-xs-4">
                                                                        <label class="control-label">Deseja Inativar? </label><br/>
                                                                        <input type="checkbox" name="inativar_carencia[]" id="inativar_carencia" class="form-check-input checkbox_inativar_carencia" value="{{ $bpf->cod_bonificacao_pessoa_fisica }}"> Sim
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <hr/>
                                                                
                                                            @endforeach
                                                        @endif


                                                    <?php }elseif($plano->tipo_plano == 2){ ?>    
                                                        
                                                       @if($plano->bonificacoes_pessoa_juridica->count())
                                                        
                                                            @foreach($plano->bonificacoes_pessoa_juridica->where('status',1) as $bpj)
                                                            
                                                                <div class="row div_carencias_bd">
                                                                    <div class="row">
                                                                        <div class="col-md-12">                                                                             
                                                                            <?php foreach ($bpj->procedimentos as $procedimento) : ?>                                                                            
                                                                                    <label class="label label-default"><?php echo $procedimento->descricao; ?></label>                                                                                
                                                                           <?php endforeach;?>                                                                            
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <br/>

                                                                    <div class="row">
                                                                        
                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Carência: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="carencia[]" id="carencia" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="1" <?php if ($bpj->carencia == 1) { echo "selected";} ?>>Imediato</option>
                                                                                    <option value="2" <?php if ($bpj->carencia == 2) { echo "selected";} ?>>24h</option>
                                                                                    <option value="3" <?php if ($bpj->carencia == 3) { echo "selected";} ?>>48h</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <?php
                                                                                $i =0;
                                                                                foreach ($bpj->procedimentos as $p):
                                                                                    $i++;
                                                                                    if($i== 1){
                                                                                        $data_inicio_carencia =  $p->pivot->data_inicio;
                                                                                    }
                                                                                endforeach;
                                                                                ?>
                                                                                <label class="control-label">Data Início: <span class="required-red">*</span></label>
                                                                                <input type="text" type="text" name="data_inicio_carencia[]" id="data_inicio_carencia" class="form-control datepicker" placeholder="00/00/0000" value="<?php echo date('d/m/Y', strtotime($data_inicio_carencia)); ?>" disabled="disabled">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Tipo desconto: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="tipo_desconto[]" id="tipo_desconto" disabled="disabled">
                                                                                    <option value="">..</option>
                                                                                    <option value="1" <?php if ($bpj->tipo_desconto == 1) { echo "selected";} ?>>%</option>
                                                                                    <option value="2" <?php if ($bpj->tipo_desconto == 2) { echo "selected";} ?>>R$</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Valor desconto: <span class="required-red">*</span></label>
                                                                                <input type="text" class="form-control valor_desconto" id="valor_desconto" name="valor_desconto[]" placeholder="0,00" autocomplete="off" value="<?php echo $bpj->valor_desconto; ?>" disabled="disabled"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Periodicidade: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="periodicidade[]" id="periodicidade" disabled="disabled">
                                                                                    <option value="">Selecione..</option>
                                                                                    <option value="1" <?php if ($bpj->periodicidade == 1) { echo "selected";} ?>>Diário</option>
                                                                                    <option value="2" <?php if ($bpj->periodicidade == 2) { echo "selected";} ?>>Semanal</option>
                                                                                    <option value="3" <?php if ($bpj->periodicidade == 3) { echo "selected";} ?>>Quinzenal</option>
                                                                                    <option value="4" <?php if ($bpj->periodicidade == 4) { echo "selected";} ?>>Mensal</option>
                                                                                    <option value="5" <?php if ($bpj->periodicidade == 5) { echo "selected";} ?>>Trimestral</option>
                                                                                    <option value="6" <?php if ($bpj->periodicidade == 6) { echo "selected";} ?>>Semestral</option>
                                                                                    <option value="7" <?php if ($bpj->periodicidade == 7) { echo "selected";} ?>>Anual</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Qtd. parcelas quitadas: <span class="required-red">*</span></label>
                                                                                <input type="number" min="1" class="form-control quantidade_parcelas_quitadas" id="quantidade_parcelas_quitadas" name="quantidade_parcelas_quitadas[]" placeholder="0" autocomplete="off" value="<?php echo $bpj->quantidade_parcelas_quitadas; ?>" disabled="disabled"/>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Condição contratual: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="condicao_contratual[]" id="condicao_contratual" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="1" <?php if ($bpj->condicao_contratual == 1) { echo "selected";} ?>>1 ou 2 pessoas em contrato</option>
                                                                                    <option value="3" <?php if ($bpj->condicao_contratual == 3) { echo "selected";} ?>>3 ou mais pessoas</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Dias Inadimplente: <span class="required-red">*</span></label>
                                                                                <input type="number" min="1" name="dias_inadimplente[]" id="dias_inadimplente" size="3" class="form-control dias_inadimplente" placeholder="0" value="<?php echo $bpj->dias_inadimplente; ?>" disabled="disabled">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3 col-xs-12">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Se estiver Inadimplente: <span class="required-red">*</span></label>
                                                                                <select class="form-control" name="configuracao_inadimplencia[]" id="configuracao_inadimplencia" disabled="disabled">
                                                                                    <option value="">Selecione..</option> 
                                                                                    <option value="1" <?php if ($bpj->configuracao_inadimplencia == 1) { echo "selected";} ?>>Anular desconto</option>
                                                                                    <option value="2" <?php if ($bpj->configuracao_inadimplencia == 2) { echo "selected";} ?>>Manter desconto</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    
                                                                    <div class="form-group col-xs-4 col-xs-4 col-xs-4">
                                                                        <label class="control-label">Deseja Inativar? </label><br/>
                                                                        <input type="checkbox" name="inativar_carencia[]" id="inativar_carencia" class="form-check-input checkbox_inativar_carencia" value="{{ $bpj->cod_bonificacao_pessoa_juridica }}"> Sim
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                                <hr/>
                                                                
                                                            @endforeach
                                                        @endif
                                                        
                                                    <?php } ?>     
                                                        
                                                    </div>
                                                    
                                                    <!-- DIV ONDE APARECE FORM DE CARÊNCIA -->
                                                    <div class="col-sm-12 div_carencia">
                                                        
                                                    </div>
                                                    
                                                    <br/>
                                                    <div class="clearfix"></div>

                                                    <button id="btn_add_carencia" type="button" class="btn btn-info btn-lg">
                                                        <i class="fa fa-plus-circle"></i> Adicionar nova regra
                                                    </button>

                                                </div>
                                                <!-- FIM PANEL-BODY -->
                                            </div>
                                            <!-- FIM PANEL-DEFAULT -->  
                                        </div>
                                        <!-- FIM DIV DADOS CARÊNCIAS -->

                                    </div>

                                    <div class="clearfix"></div>                                        
                                    <a onclick="clickTabModelosCarteirinhas()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    <a onclick="clickTabServicos()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                                </div>

                                <div id="modeloscarteirinhas" class="tab-pane fade">
                                    <div class="col-md-12 col-xs-12" id="aviso_carteirinha">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-info">
                                                Para visualizar os modelos de carteirinha, primeiro vá na aba dados cadastrais e marque o tipo do plano, ou seja, se o mesmo é do tipo PESSOA FÍSICA ou JURÍDICA.
                                            </li>
                                        </ul>                        
                                    </div> 
                                    <br/>
                                    
                                    <?php if($plano->tipo_plano == 1) { ?>
                                    <div class="card pf" id="modelo_carteirinha_pessoa_fisica">

                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 1  <input type="radio" class="form-group card" name="card" id="card" value="1" <?php if($plano->carteirinhas_template_pf->codigo_template == 1){echo "checked"; } ?>/>
                                            </div>

                                            <div class="card1">

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small>Plano</small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>    

                                        <!-- Fim modelo card 1 -->

                                        <!-- Inicio modelo card 2 -->

                                        <div class="caixa-modelo">
                                            <div class="caixa-opcao">
                                                Modelo 2 <input type="radio" class="form-group card" name="card" id="card" value="2" <?php if($plano->carteirinhas_template_pf->codigo_template == 2){echo "checked"; } ?>/>
                                            </div>
                                            <div class="card2">

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 2 -->

                                        <!-- Inicio modelo card 3 -->
                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 3 <input type="radio" class="form-group card" name="card" id="card" value="3" <?php if($plano->carteirinhas_template_pf->codigo_template == 3){echo "checked"; } ?>/>
                                            </div>

                                            <div class="card3">

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 3 -->

                                    </div>
                                    
                                    <?php }else if($plano->tipo_plano == 2) { ?> 

                                    <div class="card pj" id="modelo_carteirinha_pessoa_juridica">
                                        <!-- Inicio modelo de card 1 -->

                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 1  <input type="radio" class="form-group card" name="card" id="card" value="1" <?php if($plano->carteirinhas_template_pj->codigo_template == 1){echo "checked"; } ?>/>
                                            </div>

                                            <div class="card1">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>    

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>    

                                        <!-- Fim modelo card 1 -->

                                        <!-- Inicio modelo card 2 -->

                                        <div class="caixa-modelo">
                                            <div class="caixa-opcao">
                                                Modelo 2 <input type="radio" class="form-group card" name="card" id="card" value="2" <?php if($plano->carteirinhas_template_pj->codigo_template == 2){echo "checked"; } ?>/>
                                            </div>
                                            <div class="card2">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 2 -->

                                        <!-- Inicio modelo card 3 -->
                                        <div class="caixa-modelo">

                                            <div class="caixa-opcao">
                                                Modelo 3 <input type="radio" class="form-group card" name="card" id="card" value="3" <?php if($plano->carteirinhas_template_pj->codigo_template == 3){echo "checked"; } ?>/>
                                            </div>

                                            <div class="card3">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="caixa-foto">
                                                    <img src="{{asset('images/sem_foto.jpg')}}"/>
                                                </div>

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        <!-- Fim modelo card 3 -->

                                    </div>
                                    
                                    <?php } ?>


                                    <div class="clearfix"></div>                                        

                                    <!-- ::: ESTRUTURA PARA HISTORICO ::: -->
                                    <input type="hidden" id="cod_plano" name="cod_plano" value="<?php echo Crypt::encrypt($plano->cod_plano); ?>" />
                                    <!-- ::: NO FORGET OF TO DELETE ::: -->
                                    <button type="submit" id="salvar" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                    <a onclick="clickTabCarencias()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                    
                                    <!-- LINHA -->
                                    <div id="msg_processando">
                                        <div id="loading_spinner_processando">
                                            <img src="<?php echo asset('images/loading_spinner.gif'); ?>" alt="processando" />
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.maskMoney.min.js'); ?>"></script>
<script type="text/javascript">
/*****************************************
 # FUNÇÃO PARA BUSCAR PROCEDIMENTOS
*****************************************/
function buscarProcedimentosPorTabelaAjax() {
    // :: Reset Toast :: 
    $.toast().reset('all');
    
    var cod_tabela = $("#cod_tabela option:selected").val();
    $.ajax({
        url: "{{ url('admin/painel/procedimentos/buscar-procedimentos-por-tabela-ajax') }}",
        data: {'cod_tabela': cod_tabela},
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            // Limpando multiple selected 
            $(".cod_procedimento").html('');
            
            if(Object.keys(response).length > 0 ){                
                
                $(response).each(function (index, value) {

                    $(".cod_procedimento").append("<option value='" + value.cod_procedimento + "'>" + value.descricao + "</option>");

                });
            
            }else{
                
                    //alert(Object.keys(response).length);
                    $.toast({
                        heading: 'Não há procedimentos nesta tabela!',
                        text: 'Por favor, selecione uma tabela que contenha ao menos um procedimento ativo.',
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });
                    return false;
                
            }    

        },
        error: function (response) {
          alert('Não foi possível prosseguir. Tente novamente mais tarde!');
        }
    });
}

/****************************************
 # MUDANÇA DE ABA 
*****************************************/

function clickTabDadosCadastrais() {
    $("#tab_dadoscadastrais").click();
}
function clickTabServicos() {
    $("#tab_servicos").click();
}
function clickTabCarencias() {
    $("#tab_carencias").click();
}
function clickTabModelosCarteirinhas() {
    $("#tab_modeloscarteirinhas").click();
}

// Abre $(document).ready     
$(document).ready(function () {         
    
    /******************************************************
     ::: AÇÃO NO BOTÃO ADICIONAR CARÊNCIA (APPEND) :::
    ******************************************************/
    $('#btn_add_carencia').click(function () {

        var conteudo = '';
        conteudo += '<div class="row div_carencia_add">'; // Inicio linha global (row)

        conteudo += '<div class="row">'; // Inicio primeira linha (row)
        conteudo += '<div class="col-md-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Procedimento: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control cod_procedimento" name="cod_procedimento[]" id="cod_procedimento" multiple></select>';
        conteudo += '</div>';
        conteudo += '</div>';
        conteudo += '</div>'; // Fim primeira linha (row)

        conteudo += '<div class="row">'; // Inicio segunda linha (row)
        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Carência: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="carencia[]" id="carencia"><option value="">Selecione..</option> <option value="1">Imediato</option><option value="2">24h</option><option value="3">48h</option></select> ';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Data Início: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" type="text" name="data_inicio_carencia[]" id="data_inicio_carencia" class="form-control datepicker" placeholder="00/00/0000">';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Tipo desconto: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="tipo_desconto[]" id="tipo_desconto"><option value="">..</option> <option value="1">%</option><option value="2">R$</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Valor desconto: <span class="required-red">*</span></label>';
        conteudo += '<input type="text" class="form-control valor_desconto" id="valor_desconto" name="valor_desconto[]" placeholder="0,00" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Periodicidade: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="periodicidade[]" id="periodicidade"><option value="">Selecione..</option><option value="1">Diário</option><option value="2">Semanal</option><option value="3">Quinzenal</option><option value="4">Mensal</option><option value="5">Trimestral</option><option value="6">Semestral</option><option value="7">Anual</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-3 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Qtd. parcelas quitadas: <span class="required-red">*</span></label>';
        conteudo += '<input type="number" min="1" class="form-control quantidade_parcelas_quitadas" id="quantidade_parcelas_quitadas" name="quantidade_parcelas_quitadas[]" placeholder="0" autocomplete="off" />';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Condição contratual: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="condicao_contratual[]" id="condicao_contratual"><option value="">Selecione..</option> <option value="1">1 ou 2 pessoas em contrato</option><option value="3">3 ou mais pessoas</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-2 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Dias Inadimplente: <span class="required-red">*</span></label>';
        conteudo += '<input type="number" min="1" name="dias_inadimplente[]" id="dias_inadimplente" size="3" class="form-control dias_inadimplente" placeholder="0">';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '<div class="col-md-3 col-xs-12">';
        conteudo += '<div class="form-group">';
        conteudo += '<label class="control-label">Se estiver Inadimplente: <span class="required-red">*</span></label>';
        conteudo += '<select class="form-control" name="configuracao_inadimplencia[]" id="configuracao_inadimplencia"><option value="">Selecione..</option> <option value="2">Anular desconto</option><option value="1">Manter desconto</option></select>';
        conteudo += '</div>';
        conteudo += '</div>';

        conteudo += '</div>'; // Fim segunda linha (row)

        conteudo += '<button id="remover" type="button" class="deletar btn btn-danger btn-sm pull-right"><i class="fa fa-times-circle"></i> Remover</button>';
        conteudo += '</div>'; // Fim linha global (row)

        // Adiciono conteúdo dinâmico
        $(conteudo).appendTo('.div_carencia');

        // Função que não limmpa o append acima ao ser chamada 
        var cod_tabela = $("#cod_tabela option:selected").val();

        $.ajax({
            url: "{{ url('admin/painel/procedimentos/buscar-procedimentos-por-tabela-ajax') }}",
            data: {'cod_tabela': cod_tabela},
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                $(response).each(function (index, value) {
                    $(".cod_procedimento").append("<option value='" + value.cod_procedimento + "'>" + value.descricao + "</option>");
                });
            },
            error: function (response) {
               alert('Não foi possível prosseguir. Tente novamente mais tarde!'); 
            }
        });

        // Transformando selected in multiple select 
        $(".cod_procedimento").select2({
            placeholder: "Procedimentos",
            allowClear: true
        });

        // Função para append campo data 
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            weekStart: 0,
            startDate: 'today',
            todayHighlight: true
        });
    });

    /*::: AÇÃO NO BOTÃO REMOVER CARÊNCIA :::*/
    $('.div_carencia').on('click', '.deletar', function () {
        // Remove elemento table mais próximo do botão
        $(this).closest('.div_carencia_add').remove();
    });

    /*::: NEUTRALIZAÇÃO DA FUNÇÃO SUBMIT DO FORM :::*/
    $('#cadastro').submit(function () {
        return false;
    });

    /*****************************************************
     ::: AÇÃO NO BOTÃO SALVAR :::
     ******************************************************/

    $('#salvar').on('click', function (e) {        

        // Previne ação default do elemento
        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');
        
        /*****************************************************
        ::: PART. PLANO :::
        *****************************************************/
       
        var cod_plano = $('#cod_plano').val();
        var nome_plano = $('#nome_plano').val();
        var codigo = $('#codigo').val();
        var card = $(".card:checked").val();

        /*****************************************************
        ::: PART. SERVIÇOS :::
        ******************************************************/
    
        // Declaração de variaveis
        var servicos_pai = new Array();
        var servicos_filho;
        var complemento_servicos_filho = new Array();
        var servicos_selecionados;
        var servicos_em_json;
        var servico_nao_preenchido = false; // variavel utilizada para checar se houve erros

        // Loop por todas as caixas de informações 
        $('div.div_servico > div.div_servico_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            servicos_filho = new Array(
                        $('#cod_faixa_etaria_plano', this).val()
                    );

            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="servicos[]"]:checked').each(function () {

                // Reuno os dados dos serviços selecionados e coloco num Array
                servicos_selecionados = new Array(
                        $(this).val()
                        );

                // Coloco o Array gerado agora dentro do Array de complemento
                complemento_servicos_filho.push(servicos_selecionados);

                // Limpo variavel para futuras utilizações
                servicos_selecionados = null;

            });

            // Coloco o Array de complemento dentro do Array filho
            servicos_filho.push(complemento_servicos_filho);

            // Coloco o Array filho dentro do Array pai
            servicos_pai.push(servicos_filho);

            // Limpo variavel para futuras utilizações
            servicos_filho = null;
            complemento_servicos_filho = new Array();

        });

        // Checo se houve erro no preenchimento dos campos de valores de serviços
        if (servico_nao_preenchido) {

            // Mostra mensagem de erro
            $.toast({
                heading: 'Preenchimento incompleto!',
                text: 'Você deve informar o valor individual e o valor grupo de todos os serviços que selecionar.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });

            return false;

        }
        
        /********************************************************
        ::: PART. INATIVAR CARÊNCIAS SELECIONADAS ORIUNDAS DO BD 
        *********************************************************/
       
        var inativar_carencias_selecionadas_em_json;
        var inativar_carencias_selecionadas_filho = new Array();
        var inativar_carencias_selecionadas_pai = new Array();
        
        // Loop por todas as caixas de informações 
        $('div.div_carencias_anteriormente_cadastradas > div.div_carencias_bd').each(function () {

            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="inativar_carencia[]"]:checked').each(function () {

                // Reuno os dados das carencias bd selecionados e coloco num Array
                inativar_carencias_selecionadas_filho = new Array(
                        $(this).val()
                        );

            });

            // Coloco o Array filho dentro do Array pai
            inativar_carencias_selecionadas_pai.push(inativar_carencias_selecionadas_filho);
            inativar_carencias_selecionadas_filho = new Array();

        });
        
                
        /*****************************************************
        ::: PART. NOVAS CARÊNCIAS  
        ******************************************************/
       
        // Part. Arrays
        var carencias_pai = new Array();
        var carencias_filho;
        var carencias_em_json;

        // Loop por todas as caixas de informações 
        $('div.div_carencia > div.div_carencia_add').each(function () {

            // Reuno os dados da caixa atual do loop e coloco num Array
            carencias_filho = new Array(
                    $('#cod_procedimento', this).val(),
                    $('#carencia', this).val(),
                    $('#data_inicio_carencia', this).val(),
                    $('#tipo_desconto', this).val(),
                    $('#valor_desconto', this).val(),
                    $('#periodicidade', this).val(),
                    $('#quantidade_parcelas_quitadas', this).val(),
                    $('#condicao_contratual', this).val(),
                    $('#dias_inadimplente', this).val(),
                    $('#configuracao_inadimplencia', this).val()
                    );

            // Coloco o Array gerado agora dentro do Array pai
            carencias_pai.push(carencias_filho);

            // Limpo variavel para futuras utilizações
            carencias_filho = null;

        });

        // Converto Array para JSON
        servicos_em_json = JSON.stringify(servicos_pai);
        carencias_em_json = JSON.stringify(carencias_pai);
        inativar_carencias_selecionadas_em_json = JSON.stringify(inativar_carencias_selecionadas_pai);

        // Envio informações via ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "{{ url('admin/painel/planos/alterar-plano-ag-sequencial') }}",
            data: {
                "nome_plano": nome_plano,
                "codigo": codigo,
                "cod_plano": cod_plano,
                "carencias_em_json": carencias_em_json,
                "servicos_em_json": servicos_em_json,
                "inativar_carencias_selecionadas_em_json": inativar_carencias_selecionadas_em_json,
                "card": card
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

                if (response.status == 'nome_plano_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o nome do plano!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });
                }

                if (response.status == 'cod_procedimento_vazio') {

                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, selecione o procedimento!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'total_carencia_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();

                    // Mostra mensagem de erro 
                    $.toast({
                        heading: 'Por favor, adicione uma carência na aba carências!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                
                if (response.status == 'carencia_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro 
                    $.toast({
                        heading: 'Por favor, informe um valor no campo carência!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'data_inicio_carencia_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a data de início da carência',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'tipo_desconto_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o tipo de desconto!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'valor_desconto_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe o valor do desconto!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'periodicidade_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a periodicidade!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'quantidade_parcelas_quitadas_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a quantidade de parcelas quitadas!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'condicao_contratual_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe a condição contratual!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error', 
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'dias_inadimplente_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, informe os dias inadimplente!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'configuracao_inadimplencia_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, preencha o campo se estiver inadimplente!',
                        text: response.erro,
                        showHideTransition: 'fade',
                        icon: 'error',
                        position: 'top-right',
                        hideAfter: false,
                        allowToastClose: true
                    });

                }
                if (response.status == 'modelo_carteirinha_vazio') {
                    
                    // Oculta mensagem 'processando...
                    $('#msg_processando').hide();
                    
                    // Mostra mensagem de erro
                    $.toast({
                        heading: 'Por favor, na aba modelo de carteirinha escolha um modelo!',
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
                        heading: 'Atualizado com sucesso',
                        text: 'Plano atualizado com sucesso!',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 1500, // em milisegundos
                        allowToastClose: true,
                        afterHidden: function() {
                            window.location.href = '{{url("admin/painel/convenios/visualizar-convenio/". Crypt::encrypt($convenio->cod_convenio))}}';
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

    }); // FECHA AÇÃO NO BOTÃO ENCOMENDAR

    /*****************************************************
     ::: FUNÇÃO PARA ESCONDER DIV CARTEIRINHAS :::
     ******************************************************/
    function esconder() {

        $('#modelo_carteirinha_pessoa_juridica').hide();
        $('#modelo_carteirinha_pessoa_fisica').hide();
        $('#aviso_carteirinha').show();

    }
    <?php if($plano->tipo_plano == 1) { ?> 
        
        $('#modelo_carteirinha_pessoa_juridica').hide('fast');
        $('#modelo_carteirinha_pessoa_fisica').show('fast');
        $('#aviso_carteirinha').hide();

    <?php }elseif($plano->tipo_plano == 2){ ?>
    
        $('#modelo_carteirinha_pessoa_fisica').hide('fast');
        $('#modelo_carteirinha_pessoa_juridica').show('fast');
        $('#aviso_carteirinha').hide();
    
    
    <?php }elseif($plano->tipo_plano == null){ ?>
        
        esconder();
    
    <?php } ?>
    
/*::: ANIMAÇÃO DE EXIBIR/OCULTAR MODELOS DE CARTEIRINHAS (ATIVADAS ATRAVÉS DE RADIOBUTTONS) :::*/

    $('#tipo_plano_pessoa_fisica').click(function () {
        
        $('#modelo_carteirinha_pessoa_juridica').hide('fast');
        $('#modelo_carteirinha_pessoa_fisica').show('fast');
        $('#aviso_carteirinha').hide();
    });
    
    $('#tipo_plano_pessoa_juridica').click(function () {
        $('#modelo_carteirinha_pessoa_fisica').hide('fast');
        $('#modelo_carteirinha_pessoa_juridica').show('fast');
        $('#aviso_carteirinha').hide();
    });


}); // FECHA $(document).ready

/*****************************************
 ::: FUNÇÃO DATA :::
 *****************************************/
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    startDate: 'today',
    todayHighlight: true
});

/*******************************************************************************
 # MÁSCARA EM INTEIROS NA DIV CARÊNCIAS 
*******************************************************************************/
$(document).on('change', 'div.div_carencia > div.div_carencia_add', function () {
    
    // Mascaras em todos os campos R$ 
    $('.valor_desconto').maskMoney();
        
    $(".dias_inadimplente").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });

    $(".quantidade_parcelas_quitadas").keypress(function (e) {
        
        // :: Reset Toast :: 
        $.toast().reset('all');
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            // Mostra mensagem de erro
            $.toast({
                heading: 'Número inteiro!',
                text: 'Por favor, informe um número inteiro.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: false,
                allowToastClose: true
            });
            return false;
        }
    });

});

</script>
@stop