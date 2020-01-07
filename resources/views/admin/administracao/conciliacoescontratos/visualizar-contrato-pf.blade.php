@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Conciliações | Contratos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/linhadotempo.css'); ?>" />
  
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('conciliacao-contrato-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <?php if ($contrato->status_conciliacao == 0) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_vermelho">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Esta conciliação já foi reprovada</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>

                <?php if ($contrato->status_conciliacao == 1) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_verde">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Esta conciliação já foi aprovada</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>

                <?php if ($contrato->status_conciliacao == 2) { ?>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Este cadastro está em pré-ativação e aguardando movimentação</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <?php } ?>




                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#aba_1" id="tab_1">Dados Gerais</a></li> 
                            <li><a data-toggle="tab" href="#aba_2" id="tab_2">Arquivos do Contrato</a></li>
                            <li><a data-toggle="tab" href="#aba_3" id="tab_3">Linha do Tempo</a></li>
                        </ul>

                    </div>

                </div>
                <!-- FIM LINHA -->

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO COLUNA -->
                    <div class="col-xs-12">

                        <!-- INICIO CONTEUDO DAS ABAS -->
                        <div class="tab-content tab_content_customizado">

                            <!-- ###### INICIO ABA 1 ############################# -->
                            <div id="aba_1" class="tab-pane fade in active">
                                
                                <!-- ##################### INICIO CAIXA INFORMAÇÕES BÁSICAS ################ -->
                                <div class="panel panel-info">
                                    <div class="panel-heading clearfix">INFORMAÇÕES BÁSICAS</div>
                                    <div class="panel-body">
                                    
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-3 col-xs-12">
                                                
                                                <label class="control-label">Status</label> <br />
                                                <?php 
                                                if ($contrato->status == 1) {

                                                    echo '<span class="label label-success" style="font-size: 14px;">';
                                                    echo 'ATIVO';
                                                    echo '</span>';

                                                } else {

                                                    echo '<span class="label label-danger" style="font-size: 14px;">';
                                                    echo 'CANCELADO';
                                                    echo '</span>';

                                                }
                                                ?>

                                            </div>

                                            <div class="form-group col-md-3 col-xs-12">
                                                
                                                <label class="control-label">Nº do contrato</label> <br />
                                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pf; ?></span>

                                            </div>

                                            <div class="form-group col-md-3 col-xs-12">
                                                
                                                <label class="control-label">Data de inclusão</label> <br />
                                                <span class="letra-azul-claro"><?php echo date('d/m/Y H:i:s', strtotime($contrato->data_inclusao)); ?></span>

                                            </div>

                                            <div class="form-group col-md-3 col-xs-12">
                                                
                                                <label class="control-label">Primeiro pagamento</label> <br />
                                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->primeiro_vencimento)); ?></span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->

                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Vendedor</label> <br />
                                                <span class="letra-azul-claro"><?php echo $vendedor->pessoa->nome; ?></span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->

                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Origem da conciliação</label> <br />
                                                <span class="letra-azul-claro">
                                                    <?php
                                                    switch ($contrato->origem_conciliacao) {
                                                        case 0:
                                                            echo 'Nenhum';
                                                        break;

                                                        case 1:
                                                            echo 'E-commerce';
                                                        break;

                                                        case 2:
                                                            echo 'Venda Interna';
                                                        break;

                                                        case 3:
                                                            echo 'Venda Externa';
                                                        break;

                                                        case 4:
                                                            echo 'Televendas';
                                                        break;
                                                    }
                                                    ?>
                                                </span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->
                                        
                                        <?php if ($contrato->status == 0) { ?>
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Data de cancelamento</label> <br />
                                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_cancelamento_contrato)); ?></span>

                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Motivo do cancelamento</label> <br />
                                                <span class="letra-azul-claro">
                                                    <?php
                                                    switch ($contrato->motivo_cancelamento) {
                                                        case 1:
                                                            echo 'Outros';
                                                        break;

                                                        case 2:
                                                            echo 'Insatisfação com o SAC';
                                                        break;

                                                        case 3:
                                                            echo 'Dificuldade Financeira';
                                                        break;

                                                        case 4:
                                                            echo 'Descontentamento com o atendimento';
                                                        break;

                                                        case 5:
                                                            echo 'Especialidade não disponível nas unidades';
                                                        break;

                                                        case 6:
                                                            echo 'Descontentamento com o médico';
                                                        break;

                                                        case 7:
                                                            echo 'Difícil acesso';
                                                        break;

                                                        case 8:
                                                            echo 'Infraestrutura da clínica';
                                                        break;

                                                        case 9:
                                                            echo 'Mudança';
                                                        break;

                                                        case 10:
                                                            echo 'Óbito';
                                                        break;
                                                    }
                                                    ?>
                                                </span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->

                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Descrição do motivo de cancelamento</label> <br />
                                                <span class="letra-azul-claro">
                                                    <?php echo (!empty($contrato->descricao_motivo_cancelamento)) ? $contrato->descricao_motivo_cancelamento : '-'; ?>
                                                </span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->
                                    <?php } ?>

                                    <?php if ($contrato->data_conciliacao != '') { ?>
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Data da conciliação</label> <br />
                                                <span class="letra-azul-claro">
                                                    <?php echo date('d/m/Y H:i:s', strtotime($contrato->data_conciliacao)); ?>
                                                </span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->
                                    <?php } ?>

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA INFORMAÇÕES BÁSICAS ################### --> 

                                <!-- ##################### INICIO CAIXA DADOS DO PLANO ##################### -->
                                <div class="panel panel-info">
                                    <div class="panel-heading clearfix">DADOS DO PLANO</div>
                                    <div class="panel-body">
                                        
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Convênio</label> <br />
                                                <span class="letra-azul-claro"><?php echo $contrato->planos->convenios->nome_convenio; ?></span>

                                            </div>

                                            <div class="form-group col-md-6 col-xs-12">
                                                
                                                <label class="control-label">Plano</label> <br />
                                                <span class="letra-azul-claro"><?php echo $contrato->planos->nome_plano; ?></span>    

                                            </div>     

                                        </div> 
                                        <!-- FIM LINHA -->  

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA DADOS DO PLANO ######################## -->   

                                <!-- ##################### INICIO CAIXA CONFIGURAÇÕES DE COBRANÇA ################ -->
                                <div class="panel panel-info">
                                    <div class="panel-heading clearfix">CONFIGURAÇÕES DE COBRANÇA</div>
                                    <div class="panel-body">
                                        
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Tipo de cobrança</label> <br />
                                                <span class="letra-azul-claro">
                                                <?php 
                                                switch ($contrato->tipo_cobranca) {
                                                    case 'unidade':
                                                        echo 'Pagar na unidade';
                                                    break;

                                                    case 'boleto':
                                                        echo 'Boleto';
                                                    break;

                                                    case 'cobrador':
                                                        echo 'Cobrador';
                                                    break;
                                                } 
                                                ?>
                                                </span>

                                            </div>

                                        </div> 
                                        <!-- FIM LINHA -->
                                        
                                        <?php if ($contrato->tipo_cobranca == 'cobrador') { ?>
                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Cobrador</label> <br />
                                                <span class="letra-azul-claro"><?php echo $cobrador->pessoa->nome; ?></span>

                                            </div>

                                        </div> 
                                        <!-- FIM LINHA -->
                                        <?php } ?>
                                        
                                        <?php if ($contrato->tipo_cobranca == 'boleto') { ?>
                                        <!-- INICIO LINHA -->
                                        <div class="row">

                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Cobrar taxa de boleto ?</label> <br />
                                                <span class="letra-azul-claro"><?php echo ($contrato->cobrar_taxa_boleto == 1) ? 'Sim' : 'Não'; ?></span>

                                            </div>

                                        </div> 
                                        <!-- FIM LINHA -->
                                        <?php } ?>

                                        <!-- INICIO LINHA -->
                                        <div class="row">
                                            
                                            <div class="form-group col-md-4 col-xs-12">
                                                
                                                <label class="control-label">Cobrar por inclusão de dependente ?</label> <br />
                                                <span class="letra-azul-claro"><?php echo ($contrato->cobrar_inclusao_dependente == 1) ? 'Sim' : 'Não'; ?></span>

                                            </div>

                                            <div class="form-group col-md-4 col-xs-12">
                                                
                                                <label class="control-label">Cobrar taxa por consulta ?</label> <br />
                                                <span class="letra-azul-claro"><?php echo ($contrato->cobrar_taxa_consulta == 1) ? 'Sim' : 'Não'; ?></span>

                                            </div>

                                            <div class="form-group col-md-4 col-xs-12">
                                                
                                                <label class="control-label">Validade contratual (meses)</label> <br />
                                                <span class="letra-azul-claro"><?php echo $contrato->validade_contratual_meses; ?></span>

                                            </div>

                                        </div> 
                                        <!-- FIM LINHA --> 

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA CONFIGURAÇÕES DE COBRANÇA ################### --> 

                                <!-- ##################### INICIO CAIXA MEMBROS DO CONTRATO ###################### -->
                                <div class="panel panel-info">
                                    <div class="panel-heading clearfix">MEMBROS ATUAIS DO CONTRATO</div>
                                    <div class="panel-body">
                                    
                                        <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td style="width: 2%;">&nbsp;</td>
                                                <td>Carteirinha</td>
                                                <td>CPF</td>
                                                <td>Nome</td>
                                                <td>Data de Inclusão</td>
                                                <td>Vínculo</td>
                                                <td style="width: 2%;">&nbsp;</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            // Checo se existem membros ativos para exibir
                                            if (count($membros_ativos) > 0) { 
                                            ?>

                                                <?php
                                                // Faço loop pelos membros
                                                foreach ($membros_ativos as $mem) :

                                                    // Busco dados da Pessoa Fisica relacionada ao Membro
                                                    $pessoa_fisica = drclub\models\Pessoa_fisica::where('cod_pessoa_fisica', '=', $mem->cod_pessoa_fisica)->first();
                                                ?>

                                                    <tr <?php if ($mem->vinculo == 3 || $mem->vinculo == 2) { ?>class="success"<?php } ?>>
                                                        <td>
                                                            <?php if ($mem->vinculo == 3 || $mem->vinculo == 2) { ?>
                                                            <i class="fas fa-star" style="color: #d8cc24; font-size: 17px;"></i>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?php echo (!empty($mem->numero_contrato_membro)) ? $mem->numero_contrato_membro : '-'; ?></td>
                                                        <td><?php echo (!empty($pessoa_fisica->clientes->pessoa->cpf)) ? $pessoa_fisica->clientes->pessoa->cpf : '-'; ?></td>
                                                        <td><?php echo mb_strtoupper($pessoa_fisica->clientes->pessoa->nome); ?></td>
                                                        <td>
                                                            <?php 
                                                            if (!empty($mem->data_inicio)) {
                                                                echo date('d/m/Y', strtotime($mem->data_inicio)); 
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?>   
                                                        </td>
                                                        <td>
                                                            <b>
                                                            <?php 
                                                            switch ($mem->vinculo) {
                                                                case 1:
                                                                    echo 'MEMBRO';
                                                                break;

                                                                case 2:
                                                                    echo 'MEMBRO E RESP. FINANCEIRO';
                                                                break;

                                                                case 3:
                                                                    echo 'RESP. FINANCEIRO';
                                                                break;
                                                            }
                                                            ?>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar Perfil do Membro" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-pessoa-fisica/'. Crypt::encrypt($pessoa_fisica->clientes->cod_pessoa)); ?>">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                        </td>
                                                    </tr> 

                                                <?php
                                                endforeach;
                                                ?>

                                            <?php
                                            } else {
                                            ?>

                                                <tr>
                                                    <td colspan="6">Não há registros para serem exibidos</td>
                                                </tr>

                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA MEMBROS DO CONTRATO ######################## -->  
                                
                                <?php 
                                // Caso a conciliação esteja AGUARDANDO ou REPROVADA
                                if ($contrato->status_conciliacao == 2 || $contrato->status_conciliacao == 0) { 
                                ?>

                                    <!-- INICIO LINHA --> 
                                    <div class="row" style="margin-top: 30px;">
                                        
                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO EDITAR -->
                                            <a class="btn btn-block btn-info" id="btn_editar" href="<?php echo url('admin/painel/conciliacaovendas/editar-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-edit"></i> Editar Contrato
                                            </a>    

                                        </div>

                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO GERENCIAR MEMBROS -->
                                            <a class="btn btn-block btn-dark" id="btn_gerenciar_membros" href="<?php echo url('admin/painel/conciliacaovendas/gerenciar-membros-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-users"></i> Gerenciar Membros
                                            </a>    

                                        </div>

                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO CONCILIAR CONTRATO -->
                                            <a class="btn btn-block btn-success" id="btn_conciliar_contrato" href="<?php echo url('admin/painel/conciliacaovendas/conciliar-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-exchange-alt"></i> Conciliar Contrato
                                            </a>    

                                        </div>

                                    </div>  
                                    <!-- FIM LINHA -->     
                                    
                                    <!-- INICIO LINHA --> 
                                    <div class="row" style="margin-top: 8px;">

                                        <!-- Coluna -->
                                        <div class="col-md-6 col-xs-12">

                                            <!-- BOTÃO IMPRIMIR CONTRATO -->
                                            <a class="btn btn-block btn-default" id="btn_imprimir_contrato" href="javascript:void(null);">
                                                <i class="fa fa-print"></i> Imprimir Contrato
                                            </a>    

                                        </div>  

                                        <!-- Coluna -->
                                        <div class="col-md-6 col-xs-12">

                                            <!-- BOTÃO IMPRIMIR CONTRATO -->
                                            <a class="btn btn-block btn-primary" id="btn_email_contrato" href="javascript:void(null);">
                                                <i class="far fa-envelope"></i> Encaminhar Contrato por E-mail
                                            </a>    

                                        </div>  

                                    </div>  
                                    <!-- FIM LINHA --> 

                                <?php 
                                // Caso contrário
                                } else { 
                                ?>

                                    <!-- INICIO LINHA --> 
                                    <div class="row" style="margin-top: 30px;">
                                    
                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO CONCILIAR CONTRATO -->
                                            <a class="btn btn-block btn-success" id="btn_conciliar_contrato" href="<?php echo url('admin/painel/conciliacaovendas/conciliar-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-exchange-alt"></i> Conciliar Contrato
                                            </a>    

                                        </div>
                                        
                                    </div>  
                                    <!-- FIM LINHA --> 

                                <?php 
                                }  
                                ?> 

                            </div>
                            <!-- ###### FIM ABA 1 ############################# -->





                            <!-- ###### INICIO ABA 2 ########################## -->
                            <div id="aba_2" class="tab-pane fade">
                                
                                <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        <br />

                                        Arquivos relacionados ao contrato, como cópias assinadas de documentos. <br /><br />

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12 col-xs-12">
                                    
                                        <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome do Arquivo</th>
                                                <th>Descrição do Arquivo</th>
                                                <th class="text-center">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">EM BREVE</td>
                                            </tr>
                                        </tbody>
                                        </table>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12 col-xs-12">

                                        <!-- BOTÃO UPLOAD DE ARQUIVOS -->
                                        <a class="btn btn-md btn-terciary" id="btn_upload_arquivos" href="javascript:void(null);">
                                            <i class="fas fa-upload"></i> Upload de Arquivos
                                        </a>

                                    </div>

                                </div>

                            </div>
                            <!-- ###### FIM ABA 1 ############################# -->

                                             



                            <!-- ###### INICIO ABA 2 ########################## -->
                            <div id="aba_3" class="tab-pane fade">
                                
                                <?php
                                // Checo se existem logs
                                if (count($logs_contrato) > 0) {
                                ?>

                                    <!-- INICIO CAIXA DO FILTRO -->
                                    <div class="box_caixa_filtro">

                                        <!-- INICIO LINHA --> 
                                        <div class="row">               

                                            <div class="form-group col-md-12 col-xs-12">
                                                
                                                <label class="control-label">Data do evento</label>
                                                <input type="text" id="data_evento_busca" name="data_evento_busca" class="form-control input-sm" autocomplete="off" placeholder="00/00/0000" />
                                                                                                              
                                            </div>

                                        </div>  
                                        <!-- FIM LINHA --> 

                                        <!-- INICIO LINHA --> 
                                        <div class="row">   

                                            <div class="form-group col-md-12 col-xs-12">

                                                <a class="btn btn-md btn-primary pull-right btn_buscar_lt" href="javascript:void(null);">
                                                    <i class="fas fa-search"></i> Filtrar
                                                </a>

                                                <a class="btn btn-md btn-danger pull-right btn_resetar_lt" href="javascript:void(null);">
                                                    <i class="fa fa-times-circle"></i> Resetar Filtro
                                                </a>

                                            </div>
                                           
                                        </div>  
                                        <!-- FIM LINHA -->  

                                    </div>
                                    <!-- FIM CAIXA DO FILTRO -->

                                    <br />

                                    <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                    <div class="box_alerta_carregando" style="display: none;">
                                        Processando...
                                    </div>
                                    <!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                   
                                    <!-- INICIO CAIXA DE ALERTA DE ERRO -->
                                    <div class="box_alerta_erro" style="display: none; margin-bottom: 10px;"></div>
                                    <!-- FIM CAIXA DE ALERTA DE ERRO -->
                                    
                                    <!-- Div de titulo da timeline -->
                                    <div class="titulo_ultimos_eventos" style="margin-bottom: 15px; margin-left: 2%;"><h3>Últimos Eventos</h3></div>
                                    
                                    <!-- Div para mostrar quantidade de registros encontrados -->
                                    <div id="qtd-linha-do-tempo" style="margin-bottom: 15px; margin-left: 2%;"></div>
                                        
                                    <!-- Timeline -->
                                    <div class="timeline" id="linha-do-tempo">                                                                        
                                        
                                        <!-- Line component -->
                                        <div class="line text-muted timeline-always"></div>

                                        <!-- Separator -->
                                        <div class="separator text-muted timeline-always"></div>
                                        <!-- /Separator -->
                                        
                                        <?php 
                                        foreach ($logs_contrato as $lc) :                                                
                                        ?>
                                            
                                            <!-- Panel -->
                                            <article class="panel panel-primary">

                                                <!-- Icon -->
                                                <div class="panel-heading icon">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                                <!-- /Icon -->

                                                <!-- Heading -->
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">&nbsp;</h4>
                                                </div>
                                                <!-- /Heading -->

                                                <!-- Body -->
                                                <div class="panel-body">

                                                    <!--Informação da caixa-->
                                                    <?php echo $lc->mensagem; ?>

                                                </div>
                                                <!-- /Body -->

                                                <!-- Footer -->
                                                <div class="panel-footer">
                                                    <small><?php echo date('d/m/Y H:i:s', strtotime(str_replace('/', '-', $lc->created_at))); ?></small>
                                                </div>
                                                <!-- /Footer -->

                                            </article>
                                            <!-- /Panel -->

                                        <!-- Separator -->
                                        <div class="separator text-muted"></div>
                                        <!-- /Separator -->

                                        <?php
                                        endforeach;
                                        ?>

                                    </div>
                                    <!-- /Timeline -->

                                <?php
                                } else {
                                ?>
                                    
                                    <br /><br />

                                    <h2 class="text-danger">Não existem eventos para esta linha do tempo.</h2>
                                    
                                    <br /><br />

                                <?php
                                }
                                ?>

                            </div>
                            <!-- ###### FIM ABA 2 ############################# -->

                        </div>
                        <!-- FIM CONTEUDO DAS ABAS -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->

            </div>
        </div>
    </div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Ativação de plugin datepicker no campo data
    $('#data_evento_busca').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
        weekStart: 0,
        startDate: '-120y',
        endDate: '0d',
        todayHighlight: true,
        autoclose: true
    });



    // Aplicando função no botão BUSCAR (LINHA TEMPO)
    $(document).on('click', '.btn_buscar_lt', function(event) {
    
        event.preventDefault();
        
        // Limpando div de erros
        $('.box_alerta_erro').html('');

        // Limpando linha do tempo
        $('#linha-do-tempo').html('');

        // Limpando qtd linha do tempo
        $('#qtd-linha-do-tempo').html('');

        // Oculta div
        $('.titulo_ultimos_eventos').hide();
        
        // Capto valores dos campos
        var data_evento_busca = $('#data_evento_busca').val();
                
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/conciliacaovendas/buscar-linha-tempo-pf'); ?>",
            data: { 
                "data_evento_busca": data_evento_busca,
                "cod_contrato_pessoa_fisica_plano": "<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>"
            },
            beforeSend: function() {
                
                // Revela DIV
                $('.box_alerta_carregando').show();

                // Oculta div
                $('.box_alerta_erro').hide();
                
            },    
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                    
                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV DE ERRO
                    $('.box_alerta_erro').append('<h4>Atenção</h4>');
                    $('.box_alerta_erro').append(response.erro);
                    $('.box_alerta_erro').show();                     

                } else if (response.status == 'sucesso') {
                    
                    var linha_tempo = response.linha_tempo;
                    
                    // INSERINDO A LINHA DO TEMPO DINAMICAMENTE
                    $('#qtd-linha-do-tempo').append('<small>Registros encontrados: ' + response.qtd_linha_tempo + ' </small>');
                    $('#linha-do-tempo').append(linha_tempo);
                    
                }      

            },
            complete: function(response) {
                
                // Oculta DIV
                $('.box_alerta_carregando').hide(); 
                
            },
            error: function(response, thrownError) {
                // Revela DIV DE ERRO
                $('.box_alerta_erro').append('<h4>Atenção</h4>');
                $('.box_alerta_erro').append('Não foi possivel localizar dados com as informações fornecidas.');
                $('.box_alerta_erro').show();
            }
        }); 
                
    });



    // Aplicando função no botão RESETAR (LINHA TEMPO)
    $(document).on('click', '.btn_resetar_lt', function(event) {

        event.preventDefault();
        
        // Limpando div de erros
        $('.box_alerta_erro').html('');

        // Limpando linha do tempo
        $('#linha-do-tempo').html('');

        // Limpando qtd linha do tempo
        $('#qtd-linha-do-tempo').html('');

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/conciliacaovendas/resetar-linha-tempo-pf'); ?>",
            data: { 
                "cod_contrato_pessoa_fisica_plano": "<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>"
            },
            beforeSend: function() {
                
                // Revela DIV
                $('.box_alerta_carregando').show();

                // Oculta div
                $('.box_alerta_erro').hide();
                
            },    
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);
                    
                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV DE ERRO
                    $('.box_alerta_erro').append('<h4>Atenção</h4>');
                    $('.box_alerta_erro').append(response.erro);
                    $('.box_alerta_erro').show();                     

                } else if (response.status == 'sucesso') {
                    
                    // Limpo todos os campos dentro da div
                    limpar_campos_dentro_div('.box_caixa_filtro');

                    // Recebo resposta
                    var linha_tempo = response.linha_tempo;
                    
                    // INSERINDO A LINHA DO TEMPO DINAMICAMENTE
                    $('#linha-do-tempo').append(linha_tempo);

                    // Revela DIV
                    $('.titulo_ultimos_eventos').show();
                    
                }      

            },
            complete: function(response) {
                
                // Oculta DIV
                $('.box_alerta_carregando').hide(); 
                
            },
            error: function(response, thrownError) {
                // Revela DIV DE ERRO
                $('.box_alerta_erro').append('<h4>Atenção</h4>');
                $('.box_alerta_erro').append('Não foi possivel localizar dados com as informações fornecidas.');
                $('.box_alerta_erro').show();
            }
        });

    });

}); 	
</script>

@stop