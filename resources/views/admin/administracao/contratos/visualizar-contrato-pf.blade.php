@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contratos | Visualizar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/linhadotempo.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" />

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-fisica-contrato-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Contrato Pessoa Física</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#aba_1" id="tab_1">Dados Gerais</a></li>
                            <li><a data-toggle="tab" href="#aba_4" id="tab_4">Mensalidades</a></li>
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
                                <div class="panel panel-default">
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

                                                } elseif ($contrato->status == 2) {

                                                    echo '<span class="label label-warning" style="font-size: 14px;">';
                                                    echo 'AGUARDANDO PAGAMENTO';
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
                                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_inclusao)); ?></span>

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

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA INFORMAÇÕES BÁSICAS ################### -->

                                <!-- ##################### INICIO CAIXA DADOS DO PLANO ##################### -->
                                <div class="panel panel-default">
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
                                <div class="panel panel-default">
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

                                                <label class="control-label">Validade contratual (meses)</label> <br />
                                                <span class="letra-azul-claro"><?php echo $contrato->validade_contratual_meses; ?></span>

                                            </div>

                                            <div class="form-group col-md-4 col-xs-12">

                                                <label class="control-label">Cobrar por inclusão de dependente ?</label> <br />
                                                <span class="letra-azul-claro"><?php echo ($contrato->cobrar_inclusao_dependente == 1) ? 'Sim' : 'Não'; ?></span>

                                            </div>

                                            <div class="form-group col-md-4 col-xs-12">

                                                <label class="control-label">Cobrar taxa por consulta ?</label> <br />
                                                <span class="letra-azul-claro"><?php echo ($contrato->cobrar_taxa_consulta == 1) ? 'Sim' : 'Não'; ?></span>

                                            </div>

                                        </div>
                                        <!-- FIM LINHA -->

                                    </div>
                                </div>
                                <!-- ##################### FIM CAIXA CONFIGURAÇÕES DE COBRANÇA ################### -->

                                <!-- ##################### INICIO CAIXA MEMBROS DO CONTRATO ###################### -->
                                <div class="panel panel-default">
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
                                                    <td>&nbsp;</td>
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

                                                        <tr <?php if ($mem->vinculo == 3 || $mem->vinculo == 2) { ?>class="success" <?php } ?>>
                                                            <td>
                                                                <?php if ($mem->vinculo == 3 || $mem->vinculo == 2) { ?>
                                                                    <i class="fas fa-star" style="color: #d8cc24; font-size: 17px;"></i>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo (!empty($mem->numero_contrato_membro)) ? $mem->numero_contrato_membro : '-'; ?></td>
                                                            <td><?php echo (!empty($pessoa_fisica->clientes->pessoa->cpf)) ? drclub\Biblioteca\FuncoesGlobais::mascaraCpf($pessoa_fisica->clientes->pessoa->cpf) : '-'; ?></td>
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
                                                                <?php
                                                                switch ($mem->status) {
                                                                    case 1:
                                                                        echo '<span class="label label-success">ATIVO</span>';
                                                                    break;

                                                                    case 2:
                                                                        echo '<span class="label label-warning">AGUARDANDO PAGAMENTO</span>';
                                                                    break;

                                                                    case 3:
                                                                        echo '<span class="label label-info">AGUARDANDO CARÊNCIA</span>';
                                                                    break;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar Perfil do Membro" href="<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/visualizar/' . Crypt::encrypt($pessoa_fisica->clientes->cod_pessoa)); ?>">
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

                                <!-- INICIO LINHA -->
                                <div class="row" style="margin-top: 30px;">
                                    
                                    <?php if ($contrato->status == 0) { ?>
                                        
                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO EDITAR -->
                                            <a class="btn btn-block btn-info disabled" id="btn_editar" style="cursor: not-allowed !important;" href="javascript:void(null);">
                                                <i class="fa fa-edit"></i> Editar Contrato
                                            </a>

                                        </div>

                                    <?php } else { ?>

                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO EDITAR -->
                                            <a class="btn btn-block btn-info" id="btn_editar" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/editar/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-edit"></i> Editar Contrato
                                            </a>

                                        </div>

                                    <?php } ?>

                                    <?php if ($contrato->status == 0) { ?>
                                        
                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO GERENCIAR MEMBROS -->
                                            <a class="btn btn-block btn-dark disabled" id="btn_gerenciar_membros" style="cursor: not-allowed !important;" href="javascript:void(null);">
                                                <i class="fa fa-users"></i> Gerenciar Membros
                                            </a>

                                        </div>
                                        
                                    <?php } else { ?>

                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO GERENCIAR MEMBROS -->
                                            <a class="btn btn-block btn-dark" id="btn_gerenciar_membros" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/gerenciar-membros/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-users"></i> Gerenciar Membros
                                            </a>

                                        </div>

                                    <?php } ?>

                                    <?php if ($contrato->status == 0) { ?>
                                        
                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO REATIVAR CONTRATO -->
                                            <a class="btn btn-block btn-success" id="btn_reativar_contrato" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/reativar/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-power-off"></i> Reativar Contrato
                                            </a>

                                        </div>

                                    <?php } else { ?>

                                        <!-- Coluna -->
                                        <div class="col-md-4 col-xs-12">

                                            <!-- BOTÃO CANCELAR CONTRATO -->
                                            <a class="btn btn-block btn-danger" id="btn_cancelar_contrato" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/cancelar/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                                                <i class="fa fa-power-off"></i> Cancelar Contrato
                                            </a>

                                        </div>

                                    <?php } ?>

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
                            <!-- ###### FIM ABA 2 ############################# -->





                            <!-- ###### INICIO ABA 3 ########################## -->
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
                                    <div class="titulo_ultimos_eventos" style="margin-bottom: 15px; margin-left: 2%;">
                                        <h3>Últimos Eventos</h3>
                                    </div>

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
                                                    <!-- <i class="glyphicon glyphicon-plus"></i>-->
                                                    <i class="fas fa-notes-medical"></i>
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
                            <!-- ###### FIM ABA 3 ############################# -->






                            <!-- ###### INICIO ABA 4 ########################## -->
                            <div id="aba_4" class="tab-pane fade">

                                <div class="row">

                                    <div class="col-md-12 col-xs-12 col-das-mensalidades">

                                        <br />

                                        Mensalidades relacionadas a este contrato. <br /><br />

                                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
                                        <div class="table-responsive">

                                        </div>
                                        <!-- FIM DIV.TABLE-RESPONSIVE -->

                                    </div>

                                </div>

                            </div>
                            <!-- ###### FIM ABA 4 ############################# -->

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




<!-- INICIO DIV DA MENSAGEM 'PROCESSANDO' -->
<div id="msg_processando">
    <div id="loading_spinner_processando">
        <img src="<?php echo asset('images/loading_spinner.gif'); ?>" alt="processando" />
    </div>
</div>
<!-- FIM DIV DA MENSAGEM 'PROCESSANDO' -->

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/date-eu.js'); ?>"></script>

<script type="text/javascript">
//======================================================================
// Não é possivel utilizar comandos do Laravel dentro de um arquivo JS externo, então guardamos a URL numa variavel JS global
// Estas variaveis tem que ser declaradas antes do arquivo JS que irá utilizá-las
//======================================================================
// Requisições para rotas normais
var UrlBuscarMensalidadesContrato = '<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/buscar-mensalidades'); ?>';
</script>

<script type="text/javascript">
$.ajaxSetup({
    cache: false
});

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
            url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/buscar-linha-tempo'); ?>",
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
            url: "<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/resetar-linha-tempo'); ?>",
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



    /************************************
        #
        # Aplicando função na aba #ABA_4
        # Carrega uma Datatable com a lista de mensalidades do contrato
        # 
    *************************************/
    $(document).on('click', '#tab_4', function(e) {

        // Apago HTML da tabela, garantindo que tudo começará zerado
        $('#aba_4 .col-das-mensalidades .table-responsive').empty();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: UrlBuscarMensalidadesContrato,
            data: {
                "cod_contrato_pessoa_fisica_plano": <?php echo $contrato->cod_contrato_pessoa_fisica_plano; ?>
            },
            beforeSend: function() {

                // Revela div #msg_processando
                $('#msg_processando').show();

            },
            success: function(response) {

                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status_requisicao == 'erro') {

                    // Colocando HTML dentro da variavel
                    var html_temp = '';
                    html_temp +=
                        '<h2>Atenção</h2>' +
                        '<br />' +
                        '<span class="letra-vermelho-claro">Não foram encontrados mensalidades para este contrato.';

                    // Exibo mensagem sinalizando que nada foi encontrado
                    $('#aba_4 .col-das-mensalidades .table-responsive').append(html_temp);

                } else if (response.status_requisicao == 'sucesso') {

                    // Colocando HTML dentro da variavel
                    var html_temp = '';
                    html_temp +=
                        '<table class="table table-striped table-hover table-bordered" id="tabela_mensalidades_contrato">' +
                        '<thead>' +
                        '<tr>' +
                        '<th>Competência</th>' +
                        '<th>Status</th>' +
                        '</tr>' +
                        '</thead>' +
                        '</table>';

                    // Adiciona html da tabela
                    $('#aba_4 .col-das-mensalidades .table-responsive').append(html_temp);

                    // Tabela de dados
                    mensalidades_contrato = $('#tabela_mensalidades_contrato').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response.dados,
                        stateSave: false,
                        deferRender: false,
                        info: true,
                        ordering: true,
                        paging: true,
                        searching: true,
                        autoWidth: false,
                        pageLength: 15,
                        lengthMenu: [
                            [15, 25, 50, 100, 150, 200],
                            [15, 25, 50, 100, 150, 200]
                        ],
                        pagingType: "full_numbers",
                        language: {
                            "emptyTable": "Não foram encontrados registros",
                            "zeroRecords": "Não há registros para exibir",
                            "processing": "Reunindo dados",
                            "loadingRecords": "Carregando...",
                            "lengthMenu": "Mostrar _MENU_ itens por página",
                            "search": "Buscar:",
                            "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
                            "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
                            "infoFiltered": " (filtrado de _MAX_ registros)",
                            "paginate": {
                                "first": "<<",
                                "previous": "<",
                                "next": ">",
                                "last": ">>"
                            }
                        },
                        order: [[0, "asc"]],
                        columns: [{
                                "data": "competencia",
                                "name": "competencia",
                                "type": "date-eu",
                                "width": "50%",
                                "searchable": true,
                                "sortable": false
                            },
                            {
                                "data": "status",
                                "name": "status",
                                "width": "50%",
                                "searchable": true,
                                "sortable": false
                            }
                        ],
                        "fnDrawCallback": function(oSettings) {

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip({ container: 'body' });

                        }
                    });

                }

            },
            complete: function(response) {

                // Oculta div #msg_processando
                $('#msg_processando').hide();

            },
            error: function(response, thrownError) {

                // Colocando HTML dentro da variavel
                var html_temp = '<br /><span class="letra-vermelho-claro">Houve um erro na requisição das mensalidades.</span><br /><br />';

                // Exibo mensagem sinalizando que nada foi encontrado
                $('#aba_4 .col-das-mensalidades .table-responsive').append(html_temp);

            }
        });

    }).on('dblclick', function(e) {

        // Prevenindo propagação de eventos 'doubleclick'
        e.stopPropagation();
        e.preventDefault();
        return false;

    });

});
</script>

@stop