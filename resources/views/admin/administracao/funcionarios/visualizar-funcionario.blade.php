@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Funcionário | Visualizar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/linhadotempo.css'); ?>" />

@stop

@section('conteudo')

{!! Breadcrumbs::render('funcionarios-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Funcionário</h3>
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
                            <li><a data-toggle="tab" href="#aba_2" id="tab_3">Linha do Tempo</a></li>
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

                                    <!-- INICIO COLUNA ESQUERDA -->
                                    <div class="col-md-6 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa" style="min-height: 547px;">
                                            <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" colspan="2">
                                                            <?php if (empty($funcionario->pessoa->foto)) { ?>
                                                            <img src="{{ asset('images/sem_foto.jpg') }}" alt="foto do funcionário" width="150px" height="150px" class="img-thumbnail" />
                                                            <?php } else { ?>
                                                            <img src="{{ asset('uploads/pessoas/' . $funcionario->pessoa->foto) }}" alt="foto do funcionário" width="150px" height="150px" class="img-thumbnail" />
                                                            <?php } ?>
                                                        </td>                                    
                                                    </tr>
                                                    <tr>
                                                        <td style="width:150px"><b>Nome:</b> </td>
                                                        <td><?php echo mb_strtoupper($funcionario->pessoa->nome); ?></td>
                                                    </tr>                                    
                                                    <tr>
                                                        <td><b>CPF:</b> </td>
                                                        <td>
                                                            <!-- Adicionando máscara php ao cpf -->
                                                            <?php
                                                            $parte_um = substr($funcionario->pessoa->cpf,0,3);
                                                            $parte_dois = substr($funcionario->pessoa->cpf,3,3);
                                                            $parte_tres = substr($funcionario->pessoa->cpf,6,3);
                                                            $parte_quatro = substr($funcionario->pessoa->cpf,9,2);
                                                            echo $parte_um . '.' . $parte_dois . '.' . $parte_tres . '-' . $parte_quatro;
                                                            ?>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Data de Nacimento:</b> </td>
                                                        <td>
                                                            <?php 
                                                            echo (!empty($funcionario->pessoa->data_nascimento)) ? date('d/m/Y', strtotime(str_replace('/', '-', $funcionario->pessoa->data_nascimento))) : '-';   
                                                            ?>
                                                        </td>
                                                    </tr>                                    
                                                    <tr>
                                                        <td><b>Sexo:</b> </td>
                                                        <td>
                                                            <?php 
                                                            switch ($funcionario->pessoa->sexo) {
                                                                case 1:
                                                                    echo "Masculino";
                                                                break;

                                                                case 2:
                                                                    echo "Feminino";
                                                                break;

                                                                default:
                                                                    echo "-";
                                                                break;    
                                                            }
                                                            ?>                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Estado Civil:</b> </td>
                                                        <td>
                                                            <?php 
                                                            switch ($funcionario->pessoa->estado_civil) {
                                                                case 1:
                                                                    echo "Solteiro";
                                                                break;

                                                                case 2:
                                                                    echo "Casado";
                                                                break;

                                                                case 3:
                                                                    echo "Viúvo";
                                                                break;

                                                                case 4:
                                                                    echo "Divorciado";
                                                                break;

                                                                default:
                                                                    echo "";
                                                                break;    
                                                            }
                                                            ?>                                           
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>
                                    <!-- FIM COLUNA ESQUERDA -->

                                    <!-- INICIO COLUNA DIREITA -->
                                    <div class="col-md-6 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">ENDEREÇO</div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:10px"><b>CEP:</b> </td>
                                                        <td>
                                                            <?php echo $funcionario->pessoa->cep; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Estado:</b> </td>
                                                        <td> <?php echo $funcionario->pessoa->cidades->estados->nome_estado; ?></td>
                                                    </tr>                                    
                                                    <tr>
                                                        <td><b>Cidade:</b> </td>
                                                        <td><?php echo $funcionario->pessoa->cidades->nome_cidade; ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <td><b>Bairro:</b> </td>
                                                        <td><?php echo $funcionario->pessoa->bairro; ?></td>
                                                    </tr>                                   
                                                    <tr>
                                                        <td><b>Logradouro:</b> </td>
                                                        <td><?php echo $funcionario->pessoa->logradouro; ?></td>
                                                    </tr>  
                                                    <tr>
                                                        <td><b>Complemento:</b> </td>
                                                        <td><?php echo $funcionario->pessoa->complemento; ?></td>
                                                    </tr>                                   
                                                    <tr>
                                                        <td><b>Número:</b> </td>
                                                        <td><?php echo $funcionario->pessoa->numero; ?></td>
                                                    </tr> 
                                                </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">CONTATO</div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:10px"><b>Email:</b> </td>
                                                        <td><?php echo $funcionario->usuarios->email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Telefone:</b> </td>
                                                        <td>
                                                            <?php echo $funcionario->pessoa->telefone; ?>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Celular:</b> </td>
                                                        <td>
                                                            <?php echo $funcionario->pessoa->celular; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>
                                    <!-- FIM COLUNA DIREITA -->

                                </div>
                                <!-- FIM LINHA -->

                                <!-- INICIO LINHA -->
                                <div class="row">

                                    <!-- INICIO COLUNA ESQUERDA -->
                                    <div class="col-md-6 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">UNIDADES GERENCIÁVEIS</div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:10px"><b>Unidade(s):</b> </td>
                                                        <td>                                            
                                                            <?php
                                                            foreach ($funcionario->unidades as $unidade) :
                                                            ?> 

                                                                <?php
                                                                if (in_array($unidade->cod_unidade, $funcionario->unidades()->where('funcionarios_unidades.status',1)->pluck('funcionarios_unidades.cod_unidade')->toArray())) {
                                                                ?>

                                                                    <span class="label label-primary" style="font-size: 11px;">
                                                                        <?php echo $unidade->nome_unidade; ?>
                                                                    </span>

                                                                    <br /><br />

                                                                <?php 
                                                                }
                                                                ?>

                                                            <?php
                                                            endforeach;
                                                            ?>                                            
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>
                                    <!-- FIM COLUNA ESQUERDA -->

                                    <!-- INICIO COLUNA DIREITA -->
                                    <div class="col-md-6 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">INFORMAÇÕES DE LOGIN</div>
                                            <div class="panel-body">

                                                <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:150px"><b>Usuário:</b> </td>
                                                        <td><?php echo $funcionario->usuarios->usuario; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Senha:</b> </td>
                                                        <td>********</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Perfil de acesso:</b> </td>
                                                        <td><?php echo $funcionario->usuarios->roles->first()->display_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Painéis de acesso:</b> </td>
                                                        <td>
                                                            <?php
                                                            foreach ($funcionario->usuarios->paineis as $painel) :
                                                            ?> 

                                                                <?php
                                                                if (in_array($painel->cod_painel, $funcionario->usuarios->paineis()->where('paineis_usuarios.status',1)->pluck('paineis_usuarios.cod_painel')->toArray())) {
                                                                ?>

                                                                    <span class="label label-primary" style="font-size: 13px;"><?php echo $painel->nome_painel; ?></span>
                                                                    <br /><br />

                                                                <?php
                                                                }
                                                                ?>

                                                            <?php
                                                            endforeach;
                                                            ?>                                        
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>
                                    <!-- FIM COLUNA DIREITA -->

                                </div>
                                <!-- FIM LINHA -->

                                </div>
                                <!-- ###### FIM ABA 1 ############################# -->
                                
                                
                                
                                
                                
                                
                                <!-- ###### INICIO ABA 2 ########################## -->
                                <div id="aba_2" class="tab-pane fade">

                                    <?php
                                    // Checo se existem logs
                                    if (count($logs_funcionarios) > 0) {
                                    ?>

                                        <!-- INICIO CAIXA DO FILTRO -->
                                        <div class="box_caixa_filtro">

                                            <!-- INICIO LINHA --> 
                                            <div class="row">	                		

                                                <div class="form-group col-md-6 col-xs-12">

                                                    <label class="control-label">Módulo</label>
                                                    <select class="form-control input-sm" name="modulo_busca" id="modulo_busca">
                                                        <option value="">Selecione</option>
                                                        <option value="1">Agendamento</option>
                                                        <option value="2">Atendimento</option>
                                                        <option value="3">Cadastro</option>
                                                        <option value="4">Financeiro</option>
                                                        <option value="5">Médico</option>
                                                    </select>

                                                </div>

                                                <div class="form-group col-md-6 col-xs-12">

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
                                            foreach ($logs_funcionarios as $lf) : 
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
                                                        <h4 class="panel-title">
                                                        <?php 
                                                        switch ($lf->modulo) {
                                                            case 1:
                                                                echo 'agendamento';
                                                            break;

                                                            case 2:
                                                                echo 'atendimento';
                                                            break;

                                                            case 3:
                                                                echo 'cadastro';
                                                            break;

                                                            case 4:
                                                                echo 'financeiro';
                                                            break;

                                                            case 5:
                                                                echo 'médico';
                                                            break;
                                                        }
                                                        ?>
                                                        </h4>
                                                    </div>
                                                    <!-- /Heading -->

                                                    <!-- Body -->
                                                    <div class="panel-body">

                                                        <!--Informação da caixa-->
                                                        <?php echo $lf->mensagem; ?>

                                                    </div>
                                                    <!-- /Body -->

                                                    <!-- Footer -->
                                                    <div class="panel-footer">
                                                        <small><?php echo date('d/m/Y H:i:s', strtotime(str_replace('/', '-', $lf->created_at))); ?></small>
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
                
                <br>
                
                <!-- Botão para voltar -->
                <a class="btn btn-default pull-right" href="{{ url('admin/painel/funcionarios') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

            </div>    
        </div>
    </div>

</div>    

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
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
    
    
    // Aplicando função no botão BUSCAR (LINHA TEMPO FUNCIONÁRIOS)
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
        var modulo_busca = $('#modulo_busca').val();
        var data_evento_busca = $('#data_evento_busca').val();
                
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url('admin/painel/funcionarios/buscar-linha-tempo-funcionario'); ?>",
            data: { 
                "modulo_busca": modulo_busca,
                "data_evento_busca": data_evento_busca,
                "cod_funcionario": "<?php echo Crypt::encrypt($funcionario->cod_funcionario); ?>"
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
            url: "<?php echo url('admin/painel/funcionarios/resetar-linha-tempo-funcionario'); ?>",
            data: { 
                "cod_funcionario": "<?php echo Crypt::encrypt($funcionario->cod_funcionario); ?>"
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
