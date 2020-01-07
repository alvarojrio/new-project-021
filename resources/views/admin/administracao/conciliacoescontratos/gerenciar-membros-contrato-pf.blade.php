@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Conciliações | Contratos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('conciliacao-gerenciar-membros-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Gerenciar Membros do Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12 text-center" style="margin-top: 7px; margin-bottom: 7px;">
                        
                        <div class="box_alerta_amarelo">

                            <h4 style="margin: 0 auto; margin-top: 0px;">Este cadastro está em pré-ativação</h4>

                        </div>

                    </div>

                </div>
                <!-- FIM LINHA -->



                <!-- Input onde são guardados JSON de serviços relacionados ao plano do contrato -->
                <input type="hidden" id="servicos_do_plano" name="servicos_do_plano" />

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nº do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pf; ?></span>
                            </div>

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Data de inclusão do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_inclusao)); ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-xs-12">

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#aba_1" id="tab_1">Membros Ativos</a></li> 
                            <li><a data-toggle="tab" href="#aba_2" id="tab_2">Membros Inativos</a></li>
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
                                
                                <!-- INICIO LINHA -->
                                <div class="row">
                                    
                                    <div class="col-md-12 col-xs-12" style="margin-top: 7px; margin-bottom: 7px;">
                                        
                                        <div class="box_alerta_amarelo">

                                            <h4 style="margin-top: 0px;"><i class="far fa-lightbulb"></i> Dica</h4>
                                            
                                            - Membros que possuem o <b>vínculo</b> RESP. FINANCEIRO não podem ser removidos do contrato até que outro membro seja escolhido para tomar seu lugar.

                                        </div>

                                    </div>

                                </div>
                                <!-- FIM LINHA -->

                                <!-- INICIO LINHA -->
                                <div class="row">
                                    
                                    <!-- Espaço para exibição de erros de validação -->
                                    <div id="avisoValidacao" role="alert">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger msg_erro_gerencia_membro" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <!-- Espaço para exibição de mensagens de sucesso -->
                                    <div id="avisoValidacao" role="alert">
                                        <div class="col-xs-12">
                                            <div class="alert alert-success msg_sucesso_cadastrar" style="display: none;"></div>
                                        </div>
                                    </div>

                                </div>
                                <!-- FIM LINHA -->

                                <?php 
                                // Checo se existem membros ativos para exibir
                                if (count($membros_ativos) > 0) { 
                                ?>

                                    <!-- INICIO DIV #espaco_caixa_membros -->
                                    <div id="espaco_caixa_membros" style="margin-top: 10px;">

                                        <!-- INICIO DIV .row_espaco_caixa_membros -->
                                        <div class="row row_espaco_caixa_membros">
                                        
                                            <?php
                                            // Faço loop pelos membros
                                            foreach ($membros_ativos as $mem) :

                                                // Busco dados da Pessoa Fisica relacionada ao Membro
                                                $pessoa_fisica = drclub\models\Pessoa_fisica::where('cod_pessoa_fisica', '=', $mem->cod_pessoa_fisica)->first();

                                                // Pego o FetchMode original
                                                $fetchMode = DB::getFetchMode();
                                                
                                                // Altero temporariamente o FetchMode
                                                DB::setFetchMode(\PDO::FETCH_ASSOC);
                                                
                                                // Busco serviços selecionados para o Membro
                                                $servicos_selecionados = DB::table('pessoa_fisica_servicos_pessoa_fisica')
                                                                           ->where('status', '=', 1)
                                                                           ->where('cod_pessoa_fisica', '=', $pessoa_fisica->cod_pessoa_fisica)
                                                                           ->where('cod_contrato_pessoa_fisica_plano', '=', $contrato->cod_contrato_pessoa_fisica_plano)
                                                                           ->pluck('cod_servico_pessoa_fisica');

                                                // Retorno ao FetchMode original
                                                DB::setFetchMode($fetchMode);
                                            ?>

                                                <!-- INICIO DIV .caixa_membro -->
                                                <div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="<?php echo $pessoa_fisica->clientes->cod_pessoa; ?>">

                                                    <input type="hidden" id="cod_membro" name="cod_membro" class="codigo_membro" value="<?php echo Crypt::encrypt($mem->cod_membro); ?>" />
                                                    <input type="hidden" id="cod_cliente" name="cod_cliente" class="codigo_cliente" value="<?php echo Crypt::encrypt($pessoa_fisica->clientes->cod_cliente); ?>" />
                                                
                                                    <div class="x_panel tile" style="border-color: #73879C;">
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">Carteirinha: </label>
                                                            <div class="col-md-8 col-xs-12">
                                                                <span class="letra-azul-claro">
                                                                <?php 
                                                                if ($mem->vinculo != 3) {
                                                                    echo (!empty($mem->numero_contrato_membro) ? $mem->numero_contrato_membro : '-');
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?>   
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">CPF: </label>
                                                            <div class="col-md-8 col-xs-12"><span class="letra-azul-claro"><?php echo (!empty($pessoa_fisica->clientes->pessoa->cpf)) ? $pessoa_fisica->clientes->pessoa->cpf : '-'; ?></span></div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">Nome: </label>
                                                            <div class="col-md-8 col-xs-12"><span class="letra-azul-claro membro_nome"><?php echo $pessoa_fisica->clientes->pessoa->nome; ?></span></div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">Sexo: </label>
                                                            <div class="col-md-8 col-xs-12">
                                                                <span class="letra-azul-claro">
                                                                    <?php
                                                                    if ($pessoa_fisica->clientes->pessoa->sexo == 1) { 
                                                                        echo 'Masculino';
                                                                    } elseif ($pessoa_fisica->clientes->pessoa->sexo == 2) {
                                                                        echo 'Feminino';
                                                                    } else {
                                                                        echo '-';
                                                                    }
                                                                    ?> 
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>
                                                            <div class="col-md-8 col-xs-12">
                                                                <span class="letra-azul-claro">
                                                                    <?php echo (!empty($pessoa_fisica->clientes->pessoa->data_nascimento)) ? date('d/m/Y', strtotime($pessoa_fisica->clientes->pessoa->data_nascimento)) : '-'; ?>   
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-4 col-xs-12">Vínculo:</label>
                                                            <div class="col-md-8 col-xs-12">
                                                                <select class="form-control input-sm" name="vinculo" id="vinculo">
                                                                    <option value="">Selecione</option>
                                                                    <option value="1" <?php if ($mem->vinculo == 1) { ?>selected="selected"<?php } ?>>Membro</option>
                                                                    <option value="2" <?php if ($mem->vinculo == 2) { ?>selected="selected"<?php } ?>>Membro e Resp. Financeiro</option>
                                                                    <option value="3" <?php if ($mem->vinculo == 3) { ?>selected="selected"<?php } ?>>Resp. Financeiro</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="control-label col-md-12 col-xs-12">Serviços:</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-xs-12">

                                                                <?php
                                                                // Faço loop por $servicos_pessoa_fisica
                                                                foreach ($servicos_pessoa_fisica as $spf) :
                                                                ?>
                                                                <input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="<?php echo $spf['cod_servico_pessoa_fisica']; ?>" <?php if (in_array($spf['cod_servico_pessoa_fisica'], $servicos_selecionados)) { ?>checked="checked"<?php } ?> />
                                                                <span class="letra-azul-claro"><?php echo $spf['nome_servico']; ?></span> <br />
                                                                <?php
                                                                endforeach;
                                                                ?>

                                                            </div>
                                                        </div>
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-md-6 col-xs-12">
                                                                <a class="btn btn-block btn-default btn_ver_membro" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-pessoa-fisica/'. Crypt::encrypt($pessoa_fisica->clientes->cod_pessoa)); ?>">
                                                                    <i class="fa fa-search"></i> Ver
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 col-xs-12">
                                                                <a class="btn btn-block btn-danger btn_inativa_membro" href="<?php echo url('admin/painel/conciliacaovendas/remover-membro-contrato-pf/' . Crypt::encrypt($mem->cod_membro)); ?>">
                                                                    <i class="fa fa-times-circle"></i> Inativar
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- FIM DIV .caixa_membro -->

                                            <?php
                                                unset($servicos_selecionados);
                                                unset($pessoa_fisica);

                                            endforeach;
                                            ?>

                                        </div>
                                        <!-- FIM DIV .row_espaco_caixa_membros -->

                                    </div>
                                    <!-- FIM DIV #espaco_caixa_membros -->

                                <?php
                                } else {
                                ?>
                                    
                                    <br /><br />

                                    <span style="font-size: 17px">Não há registros para serem exibidos.</span>

                                <?php
                                }
                                ?>
                                    
                                <div style="width: 180px; margin: 0 auto;">

                                    <!-- BOTÃO ATUALIZAR MEMBROS -->
                                    <a class="btn btn-lg btn-primary btn_atualizar_membros" href="javascript:void(null);">
                                        <i class="fa fa-edit"></i> Atualizar Membros
                                    </a>  

                                </div>

                                <hr />

                                <h2>Adicionando Membros</h2>

                                <!-- INICIO PANEL BUSCAR PESSOAS -->
                                <div class="panel panel-info panel_buscar_pessoas">
                                    <div class="panel-heading" data-toggle="collapse" href="#collapse1">
                                        <span data-toggle="collapse" href="#collapse1">Buscar Pessoa <small>(Clique para expandir)</small></span>
                                        <span class="pull-right">
                                            <a data-toggle="collapse" href="#collapse1">
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                        </span>
                                    </div>

                                    <div id="collapse1" class="panel-collapse collapse muda-collapse">

                                        <div class="panel-body">

                                            <!-- INICIO LINHA -->
                                            <div class="row">
                                                
                                                <div class="form-group col-md-2 col-xs-12">
                                                
                                                    <label class="control-label">CPF</label>
                                                    <input type="text" id="cpf_busca" name="cpf_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o CPF" />
                                                                                                                  
                                                </div>

                                                <div class="form-group col-md-8 col-xs-12">
                                                
                                                    <label class="control-label">Nome</label>
                                                    <input type="text" id="nome_busca" name="nome_busca" class="form-control input-sm" autocomplete="off" placeholder="Digite o Nome" />
                                                                                                                  
                                                </div>

                                                <div class="form-group col-md-2 col-xs-12">
                                                    
                                                    <label class="control-label">Data de Nascimento</label>
                                                    <input type="text" id="data_nascimento_busca" name="data_nascimento_busca" class="form-control input-sm" autocomplete="off" placeholder="00/00/0000" />
                                                                                                                  
                                                </div>

                                            </div>
                                            <!-- FIM LINHA -->

                                            <!-- INICIO LINHA -->
                                            <div class="row">

                                                <div class="form-group col-xs-12">
                                                
                                                    <a href="javascript:void(null);" class="btn btn-info pull-right btn_buscar_pf">
                                                        <i class="fas fa-search"></i> Buscar
                                                    </a>

                                                </div>

                                            </div>
                                            <!-- FIM LINHA -->

                                            <!-- INICIO CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->
                                            <div class="box_alerta_carregando" style="display: none;">
                                                Processando...
                                            </div>
                                            <!-- FIM CAIXA DE ALERTA DA MENSAGEM PROCESSANDO -->

                                            <!-- INICIO CAIXA DE ALERTA DE ERRO -->
                                            <div class="box_alerta_erro" style="display: none;">

                                                <h4>Atenção</h4>

                                                Não foi possivel localizar uma pessoa com as informações fornecidas. 

                                                <div class="clearfix"></div>

                                            </div>
                                            <!-- FIM CAIXA DE ALERTA DE ERRO -->

                                            <!-- INICIO PANEL RESULTADO DA BUSCA -->
                                            <div class="panel panel-default panel-resultado-busca-pf" style="display: none;">
                                                <div class="panel-heading">Resultado da Busca</div>
                                                <div class="panel-body">
                                                
                                                    <!-- INICIO DIV.TABLE-RESPONSIVE -->
                                                    <div class="table-responsive">
                                                            
                                                        <table class="minha_datatable_pf table table-striped table-hover table-bordered tabela">
                                                        <thead>
                                                        <tr>
                                                            <th>CPF</th>
                                                            <th>Nome</th>
                                                            <th>Data Nascimento</th>
                                                            <th>Contrato Atual</th>
                                                            <th>&nbsp;</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                        </thead>
                                                        </table>

                                                    </div>
                                                    <!-- FIM DIV.TABLE-RESPONSIVE -->

                                                </div>
                                            </div>
                                            <!-- FIM PANEL RESULTADO DA BUSCA -->

                                        </div>

                                    </div>
                                </div>
                                <!-- FIM PANEL BUSCAR PESSOAS -->


                                <!-- INICIO PANEL CADASTRAR PESSOAS -->
                                <div class="panel panel-info panel_cadastrar_pessoas">
                                    <div class="panel-heading" data-toggle="collapse" href="#collapse2">
                                        <span data-toggle="collapse" href="#collapse2">Cadastrar Pessoa <small>(Clique para expandir)</small></span>
                                        <span class="pull-right">
                                            <a data-toggle="collapse" href="#collapse2">
                                                <i class="fas fa-chevron-down"></i>
                                            </a>
                                        </span>
                                    </div>
                                    
                                    <div id="collapse2" class="panel-collapse collapse muda-collapse">
                                        <div class="panel-body">
                                            
                                            <!-- Renderizo View Component -->
                                            @render(drclub\Http\ViewComponents\CadastrarConciliacaoPessoaFisicaComponent::class, 'gerenciarmembros')

                                        </div>
                                    </div>
                                </div>
                                <!-- FIM PANEL CADASTRAR PESSOAS -->

                            </div>
                            <!-- ###### FIM ABA 1 ############################# -->





                            <!-- ###### INICIO ABA 2 ########################## -->
                            <div id="aba_2" class="tab-pane fade">
                            
                                <table class="table table-striped table-bordered tabela_membros_inativos">
                                <thead>
                                    <tr>
                                        <td>Carteirinha</td>
                                        <td>CPF</td>
                                        <td>Nome</td>
                                        <td>Data de Remoção</td>
                                        <td style="width: 2%;">&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php 
                                    if (count($membros_inativos) > 0) { 
                                    ?>

                                        <?php
                                        foreach ($membros_inativos as $memi) :

                                            // Busco dados da Pessoa Fisica relacionada ao Membro
                                            $pessoa_fisica = drclub\models\Pessoa_fisica::where('cod_pessoa_fisica', '=', $memi->cod_pessoa_fisica)->first();
                                        ?>

                                            <tr class="m_<?php echo $memi->pivot->cod_membro; ?> <?php if ($memi->pivot->vinculo == 3 || $memi->pivot->vinculo == 2) { ?>success<?php } ?>">
                                                <td><?php echo (!empty($memi->pivot->numero_contrato_membro)) ? $memi->pivot->numero_contrato_membro : '-'; ?></td>
                                                <td><?php echo (!empty($pessoa_fisica->clientes->pessoa->cpf)) ? $pessoa_fisica->clientes->pessoa->cpf : '-'; ?></td>
                                                <td><?php echo $pessoa_fisica->clientes->pessoa->nome; ?></td>
                                                <td>
                                                    <?php 
                                                    if (!empty($memi->pivot->data_fim)) {
                                                        echo date('d/m/Y', strtotime($memi->pivot->data_fim)); 
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>   
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-default" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-pessoa-fisica/'. Crypt::encrypt($pessoa_fisica->clientes->cod_pessoa)); ?>">
                                                        <i class="fas fa-search"></i> Ver
                                                    </a>
                                                </td>
                                            </tr> 

                                        <?php
                                            unset($pessoa_fisica);

                                        endforeach;
                                        ?>

                                    <?php
                                    } else {
                                    ?>

                                        <tr>
                                            <td colspan="5">Não há registros para serem exibidos</td>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </tbody>
                                </table>

                            </div>
                            <!-- ###### FIM ABA 2 ############################# -->

                        </div>
                        <!-- FIM CONTEUDO DAS ABAS -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->

                <br />

                <div style="width: 180px; margin: 0 auto;">

                    <!-- BOTÃO RETORNAR -->
                    <a class="btn btn-md btn-default" id="btn_retornar" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-contrato-pf/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                        <i class="fa fa-arrow-circle-left"></i> Retornar ao Contrato
                    </a> 

                </div>

            </div>
        </div>
    </div>

</div>


<!-- *******************
 #
 # INICIO MODAL CONFIRMAÇÃO DE ADIÇÃO DE MEMBRO
 # 
************************ -->
<div class="modal fade modal_confirma_adicao_membro" id="modalConfirmaAdicaoMembro">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
      
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="modal-title">Confirmar Inclusão de Membro</h2>
            </div>
                                                                            
            <div class="modal-body">
                
                <div class="row">
                    
                    <!-- Espaço para exibição de erros de validação -->
                    <div id="avisoValidacao">
                        <div class="col-xs-12">
                            <div class="alert alert-danger msg_erro_modal" style="display: none;"></div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <b>Nome:</b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <span class="nome_cliente_modal letra-azul-claro"></span>
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <b>Vínculo:</b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <select class="form-control input-sm" name="vinculo_modal" id="vinculo_modal">
                            <option value="">Selecione</option>
                            <option value="1">Membro</option>
                            <option value="2">Membro e Resp. Financeiro</option>
                            <option value="3">Resp. Financeiro</option>
                        </select>
                    </div>
                </div>

                <br />
                
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <b>Serviços:</b>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">

                        <?php
                        // Faço loop por $servicos_pessoa_fisica
                        foreach ($servicos_pessoa_fisica as $spf) :
                        ?>
                        <input class="form-check-input" type="checkbox" name="servicos_membro_modal[]" id="servicos_membro_modal" value="<?php echo $spf['cod_servico_pessoa_fisica']; ?>" />
                        <span class="letra-azul-claro"><?php echo $spf['nome_servico']; ?></span> <br />
                        <?php
                        endforeach;
                        ?>

                    </div>
                </div>

            </div>  
            <div class="modal-footer">

                <input type="hidden" id="cod_pessoa_modal" name="cod_pessoa_modal" />

                <a href="javascript:void(null);" class="btn btn-md btn-danger btn_cancelar_inclusao" data-dismiss="modal" aria-label="Close">Cancelar</a>
                <a href="javascript:void(null);" class="btn btn-md btn-success btn_confirmar_inclusao">Confirmar inclusão</a>

            </div>
      
        </div>
    </div>
</div>
<!-- *******************
 #
 # FIM MODAL CONFIRMAÇÃO DE ADIÇÃO DE MEMBRO
 # 
************************ -->

@stop

@section('includes_no_body_2')

<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
// Guardo serviços possiveis (em formato JSON) dentro de variavel javascript
var servicos_possiveis = '<?php echo json_encode($servicos_pessoa_fisica); ?>';

// Converto dados para objeto javascript
servicos_possiveis = JSON.parse(servicos_possiveis);

// Guardo codigo do contrato em gerenciamento dentro de variavel javascript
var contrato_sendo_gerenciado = '<?php echo \Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>';
</script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    /************************************
     #
     # Aplicando função no botão BUSCAR PESSOA
     # Busca pessoa através dos parametros informados e exibe resultado numa datatable gerada dinamicamente
     # 
    *************************************/ 
    $(document).on('click', '.btn_buscar_pf', function(event) {

        event.preventDefault();

        // Capto valores dos campos
        var cpf_busca = $('#cpf_busca').val();
        var nome_busca = $('#nome_busca').val();
        var data_nascimento_busca = $('#data_nascimento_busca').val();

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/conciliacaovendas/buscar-pessoa-fisica-para-contrato'); ?>",
            data: { 
                "cpf_busca": cpf_busca,
                "nome_busca": nome_busca,
                "data_nascimento_busca": data_nascimento_busca
            },
            beforeSend: function() { 

                // Oculta DIV
                $('.panel-resultado-busca-pf').hide();
                $('.box_alerta_erro').hide(); 
                $('.msg_erro_gerencia_membro').hide();
                $('.msg_sucesso_cadastrar').hide();

                // Limpo conteúdo das divs
                $('.msg_erro_gerencia_membro').html('');
                $('.msg_sucesso_cadastrar').html(''); 

                // Revela DIV
                $('.box_alerta_carregando').show(); 

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Revela DIV
                    $('.box_alerta_erro').show();                     

                } else {
                
                    // Tabela de dados
                    tabela_pf = $('.minha_datatable_pf').DataTable({
                        destroy: true, // Apaga datatable atual, se existir
                        data: response,                                        
                        stateSave: false,
                        deferRender: false,
                        info: true,
                        ordering: false,
                        paging: true,
                        searching: true,
                        autoWidth: false,
                        pageLength: 15,
                        lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
                        pagingType: "full_numbers",
                        language: {
                            "emptyTable": "Não foram encontrados registros",
                            "zeroRecords": "Não há registros para exibir",
                            "processing": "Reunindo dados",
                            "loadingRecords": "Carregando...",
                            "lengthMenu": "Mostrar _MENU_ itens por página",
                            "search": "Buscar:" ,
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
                        order: [[ 1, "asc" ]],
                        columns: [
                            { "data": "cpf", "name": "cpf", "width": "10%", "searchable": true, "sortable": true },
                            { "data": "nome", "name": "nome", "width": "33%", "searchable": true, "sortable": true },
                            { "data": "data_nascimento", "name": "data_nascimento", "width": "10%", "searchable": false, "sortable": true },
                            { "data": "situacao_contrato", "name": "situacao_contrato", "width": "13%", "searchable": true, "sortable": true },
                            { "data": "btn_ver_pessoa", "name": "btn_ver_pessoa", "width": "2%", "searchable": false, "sortable": false },
                            { "data": "btn_add_membro", "name": "btn_add_membro", "width": "2%", "searchable": false, "sortable": false }
                        ],
                        "fnDrawCallback": function(oSettings) { 

                            // Ativação de TOOLTIPS, se existirem
                            $('[data-toggle="tooltip"]').tooltip();

                        } 
                    });

                    // Revela DIV
                    $('.panel-resultado-busca-pf').show();

                }

            },
            complete: function(response) {
                // Revela DIV
                $('.box_alerta_carregando').hide(); 
            },
            error: function(response, thrownError) {
                // Nothing here
            }
        });

    });




    /************************************
     #
     # Aplicando função no botão ADICIONAR PESSOA COMO MEMBRO
     # Abre modal para confirmar inclusão da pessoa como membro, além de definir serviços e vinculo
     # 
    *************************************/ 
    $(document).on('click', '.btn_add_membro', function(e) {

        e.preventDefault();

        // Limpa valor da DIV
        $('.msg_erro_modal').html('');

        // Oculta DIV
        $('.msg_erro_modal').hide();

        // Limpo todos os campos dentro da div
        limpar_campos_dentro_div('#modalConfirmaAdicaoMembro');

        // Recupero CODIGO DO CLIENTE através de data-attribute no botão
        var codigo_da_pessoa = $(this).data('codigo-pessoa');

        // Recupero nome do cliente através de elemento span na mesma linha do botão
        var nome_do_cliente = $(this).closest('tr').find('.nome_cliente').text(); 

        // Checo se foi retornado / localizado um código de pessoa
        if (codigo_da_pessoa == '') {

            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Não foi possivel selecionar esta pessoa como membro. Aguarde alguns instantes e tente novamente ou atualize a página.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: 2000, // em milisegundos
                allowToastClose: true
            });

            return false;

        }

        // Checo se já existe uma caixa para esta pessoa na lista de membros
        if ($('#espaco_caixa_membros > .row').children('div[data-codigo-pessoa="' + codigo_da_pessoa + '"]').length > 0) {  
            
            // Mostra mensagem de erro
            $.toast({
                heading: 'Erro',
                text: 'Esta pessoa já foi inserida na lista de membros do contrato.',
                showHideTransition: 'fade',
                icon: 'error',
                position: 'top-right',
                hideAfter: 2000, // em milisegundos
                allowToastClose: true
            });

            return false;

        }

        // Coloco nome dentro do modal
        $('.nome_cliente_modal').html(nome_do_cliente);

        // Guardo código do cliente no input hidden do modal
        $('#cod_pessoa_modal').val(codigo_da_pessoa);

        // Exibe modal para confirmar inclusão de membro
        $('#modalConfirmaAdicaoMembro').modal('toggle');

    }); 




    /************************************
     #
     # Aplicando função no botão ADICIONAR PESSOA COMO MEMBRO
     # Busca no banco os dados da pessoa selecionada e cria uma DIV .caixa_membro para esta pessoa dentro da lista de membros
     # 
    *************************************/ 
    $(document).on('click', '.btn_confirmar_inclusao', function(e) {

        e.preventDefault();

        // Limpa valor da DIV
        $('.msg_erro_modal').html('');

        // Oculta DIV
        $('.msg_erro_modal').hide();

        // Resetando todos os possiveis Toast
        $.toast().reset('all');

        // Preparo informações para requisição
        var cod_pessoa_modal = $('#cod_pessoa_modal').val();
        var vinculo_modal = $('#vinculo_modal option:selected').val();
        var servicos_selecionados_modal = new Array; // Crio um array

        // Faço loop por possiveis checkboxes marcados
        $(this).closest('#modalConfirmaAdicaoMembro').find('input[name="servicos_membro_modal[]"]:checked').each(function() {
            servicos_selecionados_modal.push($(this).val());
        });

        // Checo se existem serviços possiveis para listar
        if (vinculo_modal == '') {

            // Coloco mensagem dentro da div de erros
            $('.msg_erro_modal').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_modal').append('Antes de prosseguir, você deve definir o vínculo desejado para o membro.');

            // Exibo div de erros
            $('.msg_erro_modal').show();

            return false;

        }

        // Converto Array para JSON
        servicos_selecionados_modal = JSON.stringify(servicos_selecionados_modal, null, 2); 

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/conciliacaovendas/incluir-membro-contrato-pf-ajax'); ?>",
            data: { 
                "cod_contrato_pessoa_fisica_plano": '<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>',
                "cod_pessoa": cod_pessoa_modal,
                "vinculo": vinculo_modal,
                "servicos_selecionados": servicos_selecionados_modal
            },
            beforeSend: function() { 
                // Nothing here
            },
            success: function(responseR) {
                
                // Convertendo resposta para objeto javascript
                var responseR = JSON.parse(responseR);

                // Checo retorno
                if (responseR.status == 'erro') {

                    // Coloco mensagem dentro da div de erros
                    $('.msg_erro_modal').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_modal').append(responseR.erro);

                    // Exibo div de erros
                    $('.msg_erro_modal').show();

                    return false;              

                } else if (responseR.status == 'sucesso') {

                    // Preenchendo variável de conteúdo dinâmico
                    var conteudo_caixa_membro = '';
                    conteudo_caixa_membro += '<div class="col-md-4 col-sm-4 col-xs-12 caixa_membro" data-codigo-pessoa="' + cod_pessoa_modal + '" style="display: none;">';
                    conteudo_caixa_membro += '<input type="hidden" id="cod_membro" name="cod_membro" class="codigo_membro" value="' + responseR.cod_membro_crypt + '" />';
                    conteudo_caixa_membro += '<input type="hidden" id="cod_cliente" name="cod_cliente" class="codigo_cliente" value="' + responseR.cod_cliente_crypt + '" />';
                    conteudo_caixa_membro += '<div class="x_panel tile" style="border-color: #73879C;">';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Carteirinha: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.carteirinha_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">CPF: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.cpf_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Nome: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro membro_nome">' + responseR.nome_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Sexo: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro">' + responseR.sexo_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Data Nasc.: </label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12"><span class="letra-azul-claro membro_nome">' + responseR.data_nascimento_pessoa + '</span></div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-4 col-xs-12">Vínculo:</label>';
                    conteudo_caixa_membro += '<div class="col-md-8 col-xs-12">';
                    conteudo_caixa_membro += '<select class="form-control input-sm" name="vinculo" id="vinculo">';
                    conteudo_caixa_membro += '<option value="">Selecione</option>';

                    if (responseR.vinculo_pessoa == 1) {
                        conteudo_caixa_membro += '<option value="1" selected="selected">Membro</option>';
                    } else {
                        conteudo_caixa_membro += '<option value="1">Membro</option>';
                    }

                    if (responseR.vinculo_pessoa == 2) {
                        conteudo_caixa_membro += '<option value="2" selected="selected">Membro e Resp. Financeiro</option>';
                    } else {
                        conteudo_caixa_membro += '<option value="2">Membro e Resp. Financeiro</option>';
                    }

                    if (responseR.vinculo_pessoa == 2) {
                        conteudo_caixa_membro += '<option value="3" selected="selected">Resp. Financeiro</option>';
                    } else {
                        conteudo_caixa_membro += '<option value="3">Resp. Financeiro</option>';
                    }

                    conteudo_caixa_membro += '</select>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<label class="control-label col-md-12 col-xs-12">Serviços:</label>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="row">';
                    conteudo_caixa_membro += '<div class="col-md-12 col-xs-12">';

                    // Faço loop pelos serviços possiveis
                    $.each(servicos_possiveis, function(chave, valor) {

                        // Checo se foram salvos serviços para o membro
                        if (responseR.servicos_salvos_pessoa != '') {

                            // Faço loop pelos serviços salvos
                            $.each(responseR.servicos_salvos_pessoa, function(chave2, valor2) {
                            
                                if (valor['cod_servico_pessoa_fisica'] == valor2) {
                                    
                                    conteudo_caixa_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor['cod_servico_pessoa_fisica'] + '" checked="checked" />';
                                    conteudo_caixa_membro += ' <span class="letra-azul-claro">' + valor['nome_servico'] + '</span> <br />';
                                
                                } else {
                                    
                                    conteudo_caixa_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor['cod_servico_pessoa_fisica'] + '" />';
                                    conteudo_caixa_membro += ' <span class="letra-azul-claro">' + valor['nome_servico'] + '</span> <br />';
                                
                                }

                            });

                        } else { // Caso não tenham sido salvos serviços, apenas exibe serviços possiveis do plano do contrato

                            conteudo_caixa_membro += '<input class="form-check-input" type="checkbox" name="servicos_membro[]" id="servicos_membro" value="' + valor['cod_servico_pessoa_fisica'] + '" />';
                            conteudo_caixa_membro += ' <span class="letra-azul-claro">' + valor['nome_servico'] + '</span> <br />';

                        }

                    });

                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';

                    conteudo_caixa_membro += '<div class="row" style="margin-top: 10px;">';
                    conteudo_caixa_membro += '<div class="col-md-6 col-xs-12">';
                    conteudo_caixa_membro += '<a class="btn btn-block btn-default btn_ver_membro" href="<?php echo url('admin/painel/conciliacaovendas/visualizar-pessoa-fisica'); ?>/' + responseR.cod_pessoa_crypt + '">';
                    conteudo_caixa_membro += '<i class="fa fa-search"></i> Ver';
                    conteudo_caixa_membro += '</a>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '<div class="col-md-6 col-xs-12">';
                    conteudo_caixa_membro += '<a class="btn btn-block btn-danger btn_inativa_membro" href="<?php echo url('admin/painel/conciliacaovendas/remover-membro-contrato-pf'); ?>/' + responseR.cod_membro_crypt + '">';
                    conteudo_caixa_membro += '<i class="fa fa-times-circle"></i> Inativar';
                    conteudo_caixa_membro += '</a>';
                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';

                    conteudo_caixa_membro += '</div>';
                    conteudo_caixa_membro += '</div>';

                    // Caso tenha sido retornado um cod_membro dentro da resposta da requisição
                    if (responseR.cod_membro != '') {

                        // Remove o membro da lista de inativos
                        $('.m_' + responseR.cod_membro).remove();

                        var total_linhas_tabela_inativos = $('.tabela_membros_inativos tbody tr').length;

                        // Caso não existam linhas dentro da tabela
                        if (total_linhas_tabela_inativos < 1) {

                            // Preenchendo variável de conteúdo dinâmico
                            var msg_tabela_inativos_vazia = '';
                            msg_tabela_inativos_vazia += '<tr>';
                            msg_tabela_inativos_vazia += '<td colspan="5">Não há registros para serem exibidos</td>';
                            msg_tabela_inativos_vazia += '</tr>';

                            // Adiciona mensagem de tabela vazia
                            $('.tabela_membros_inativos > tbody:last-child').append(msg_tabela_inativos_vazia);

                        }

                    }

                    // Oculta modal para confirmar inclusão de membro
                    $('#modalConfirmaAdicaoMembro').modal('toggle');

                    // Mostra mensagem de sucesso
                    $.toast({
                        heading: 'Sucesso',
                        text: 'Membro incluído com sucesso.',
                        showHideTransition: 'fade',
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: false, // em milisegundos
                        allowToastClose: true
                    });

                    // Adiciona nova caixa de membro (e uma pequena animação de fade)
                    $(conteudo_caixa_membro).appendTo('.row_espaco_caixa_membros').fadeIn('slow');

                    // Rola a página até o elemento criado
                    $('html, body').animate({
                        scrollTop: $('#espaco_caixa_membros .caixa_membro:last').offset().top
                    }, 50);

                    // Fecho collapse-panel
                    $('.panel_buscar_pessoas').find('.panel-collapse.in').collapse('hide');

                }

            },
            complete: function(response) {
                // Nothing here
            },
            error: function(response, thrownError) {

                // Mostra mensagem de erro
                $.toast({
                    heading: 'Erro',
                    text: 'Não foi possivel selecionar esta pessoa como membro.',
                    showHideTransition: 'fade',
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 2000, // em milisegundos
                    allowToastClose: true
                }); 

                return false; 

            }
        });

    }); 



    /**************************************************************************************
     #
     # Aplicando função no botão ALTERAR MEMBRO
     # Pega as informações de 'vinculo' e 'serviços' para atualizar o perfil do membro
     # 
    ***************************************************************************************/ 
    $(document).on('click', '.btn_atualizar_membros', function(e) {

        e.preventDefault();

        // Apaga Toast que estejam abertos
        $.toast().reset('all');

        // Limpo e oculto div de erros
        $('.msg_erro_gerencia_membro').html('');
        $('.msg_erro_gerencia_membro').hide();

        // Declaração de variaveis
        var form_gerencia_valido = true;
        var msg_erro_gerencia_membro;
        var ja_existe_rf = false;
        var membros_pai = new Array; // Crio um array
        var membros_filho = {}; // Crio um objeto
        var servicos_selecionados = new Array; // Crio um array

        // Loop por todas as CAIXAS DE MEMBROS
        $('.row_espaco_caixa_membros').children('.caixa_membro').each(function(i, v) {

            // Reuno os dados da caixa atual do loop e coloco num objeto javascript
            membros_filho['cod_membro'] = $('.codigo_membro', this).val();
            membros_filho['cod_cliente'] = $('.codigo_cliente', this).val();
            membros_filho['vinculo'] = $('#vinculo option:selected', this).val();

            // Faço loop por possiveis checkboxes marcados
            $(this).find('input[name="servicos_membro[]"]:checked').each(function() {
                servicos_selecionados.push($(this).val());
            });

            membros_filho['servicos_selecionados'] = (servicos_selecionados.length == 0) ? '' : servicos_selecionados; // Checo tamanho do array de serviços com o length

            /*
             ###########################################
             # INICIO VALIDAÇÃO EXTRA
             ###########################################
            */
            if (membros_filho['vinculo'].length === 0) {
                // Sinaliza erro
                form_gerencia_valido = false;
                // Monto mensagem de erro
                msg_erro_gerencia_membro = 'É necessário informar o VÍNCULO desejado para o membro <i>' + $(this).find('.membro_nome').html() + '</i>.';
                // Sai do loop
                return false;
            }

            if ((ja_existe_rf) && (membros_filho['vinculo'] == 2 || membros_filho['vinculo'] == 3)) {
                // Sinaliza erro
                form_gerencia_valido = false;
                // Monto mensagem de erro
                msg_erro_gerencia_membro = 'Mais de um membro foi selecionado como RESPONSÁVEL FINANCEIRO. Reveja os vínculos selecionados na lista de membros.';
                // Sai do loop
                return false;
            }
            /*
             ###########################################
             # FIM VALIDAÇÃO EXTRA
             ###########################################
            */

            // Coloco o Objeto filho dentro do Array pai
            membros_pai.push(membros_filho);

            // Checo se foi escolhido uma das duas opções envolvendo 'responsável financeiro'
            if (membros_filho['vinculo'] == 2 || membros_filho['vinculo'] == 3) {

                // Sinalizo que alguém foi escolhido como responsável financeiro
                ja_existe_rf = true;

            }

            // Limpo variaveis para futuras utilizações
            membros_filho = {};
            servicos_selecionados = new Array;

        }); // Fecho loop pelas caixas de membros

        // Checo se houve erro no preenchimento dos campos dos MEMBROS
        if (form_gerencia_valido == false) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_gerencia_membro').append(msg_erro_gerencia_membro);
            $('.msg_erro_gerencia_membro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Checo se a lista de membros foi definida
        if (membros_pai.length === 0) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_gerencia_membro').append('Antes de prosseguir, você precisa definir a lista de MEMBROS DO CONTRATO.');
            $('.msg_erro_gerencia_membro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Checo se pelo menos 1 pessoa foi definida como responsável financeiro
        if (ja_existe_rf == false) {

            // Coloco mensagem dentro da div de erros e exibo a div de erros
            $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
            $('.msg_erro_gerencia_membro').append('Antes de prosseguir, você precisa definir um RESPONSÁVEL FINANCEIRO na lista de MEMBROS DO CONTRATO.');
            $('.msg_erro_gerencia_membro').show();

            // Volto até o topo da tela para chamar a atenção
            $('html, body').animate({ scrollTop: 0 }, 'fast');  

            // Travo execução do resto da função
            return false;

        }

        // Converto Array para JSON
        membros_em_json = JSON.stringify(membros_pai, null, 2); 

        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/conciliacaovendas/alterar-membros-contrato-pf-ajax'); ?>",
            data: { 
                "membros_em_json": membros_em_json
            },
            beforeSend: function() { 

                // Limpa valor da DIV
                $('.msg_erro_gerencia_membro').html('');

                // Oculta DIV
                $('.msg_erro_gerencia_membro').hide();

            },
            success: function(response) {
                
                // Convertendo resposta para objeto javascript
                var response = JSON.parse(response);

                // Checo retorno
                if (response.status == 'erro') {

                    // Coloco mensagem dentro da div de erros e exibo a div de erros
                    $('.msg_erro_gerencia_membro').append('<h4 class="pt-0">Alerta</h4>');
                    $('.msg_erro_gerencia_membro').append(response.erro);
                    $('.msg_erro_gerencia_membro').show();  

                    // Volto até o topo da tela para chamar a atenção
                    $('html, body').animate({ scrollTop: 0 }, 'fast');              

                } else if (response.status == 'sucesso') {

                    // Mostra mensagem de sucesso
                    alert('Membros atualizados com sucesso.');

                    // Recarrega página
                    location.reload();

                }

            },
            complete: function(response) {
                // Soon
            },
            error: function(response, thrownError) {

                // Coloco mensagem dentro da div de erros e exibo a div de erros
                $('.msg_erro_gerencia_membro').append('Falha na requisição. Atualize a página e tente novamente.');
                $('.msg_erro_gerencia_membro').show();

                // Volto até o topo da tela para chamar a atenção
                $('html, body').animate({ scrollTop: 0 }, 'fast');

            }
        });

    });

});     
</script>

@stop