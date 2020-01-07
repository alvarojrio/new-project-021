@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Clientes | Visualizar
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('css/linhadotempo.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-fisica-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Cliente Pessoa Física</h3>
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
                            <li><a data-toggle="tab" href="#aba_2" id="tab_2">Contratos</a></li>
                            <li><a data-toggle="tab" href="#aba_3" id="tab_3">Linha do Tempo</a></li>
                            <li><a data-toggle="tab" href="#aba_4" id="tab_4">Anotações</a></li>
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
                                        <div class="panel panel-default subpanel_pessoa" style="min-height: 609px;">
                                            <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                                            <div class="panel-body">
                                                
                                                <!-- INICIO LINHA -->
                                                <div class="row">
                                                    
                                                    <!-- Inicio Coluna da Foto -->
                                                    <div class="col-sm-4 col-xs-12 coluna_foto">
                                                        
                                                        <label class="control-label">Foto </label>

                                                        <div id="imagem" class="thumbnail preview-imagem" style="cursor: default;">
                                                            <?php
                                                            // Checo se existe foto para ser exibida
                                                            if (empty($pessoa['foto'])) {
                                                            ?>
                                                            <img id="thumb" class="img-responsive foto_thumb" src="<?php echo asset('images/sem_foto.jpg'); ?>" />
                                                            <?php
                                                            } else {
                                                            ?>
                                                            <img id="thumb" class="img-responsive foto_thumb" src="<?php echo asset('uploads/pessoas/' . $pessoa['foto']); ?>" />
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- Fim Coluna da Foto -->
                                                    
                                                    <!-- Inicio Coluna Dados Basicos -->
                                                    <div class="col-sm-8 col-xs-12">
                                                        
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                        
                                                                <label class="control-label">Nome</label>

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo mb_strtoupper($pessoa['nome']); ?></span>
                                                                                                                                                                                              
                                                            </div>

                                                        </div>
                                                        
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-sm-6 col-xs-12"> 

                                                                <label class="control-label">Data de Nascimento </label>

                                                                <br />
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php 
                                                                if (!empty($pessoa['data_nascimento'])) {
                                                                
                                                                    echo date('d/m/Y', strtotime($pessoa['data_nascimento'])); 

                                                                } else {
                                                        
                                                                    echo '-';

                                                                }
                                                                ?>
                                                                </span>

                                                            </div>
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-sm-6 col-xs-12">

                                                                <label class="control-label">Sexo </label>

                                                                <br />
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php 
                                                                if (!empty($pessoa['sexo'])) {

                                                                    echo ($pessoa['sexo'] == 1) ? 'Masculino' : 'Feminino';

                                                                } else {

                                                                    echo '-';

                                                                }
                                                                ?>
                                                                </span>

                                                            </div>

                                                        </div>

                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-6 col-xs-12">
                                                        
                                                                <label class="control-label">CPF </label> 

                                                                <br />
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php
                                                                if (!empty($pessoa['cpf'])) {

                                                                    // Exibe valor com máscara já adicionada
                                                                    echo drclub\Biblioteca\FuncoesGlobais::mascaraCpf($pessoa['cpf']);

                                                                } else {

                                                                    echo '-';

                                                                }
                                                                ?>
                                                                </span>
                                                        
                                                            </div>
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-6 col-xs-12">
                                                        
                                                                <label class="control-label">RG </label> 

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo (!empty($pessoa['rg'])) ? drclub\Biblioteca\FuncoesGlobais::mascaraRg($pessoa['rg']) : '-'; ?></span>                                        
                                                                                                                              
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- Fim Coluna Dados Basicos -->
                                                
                                                </div>
                                                <!-- FIM LINHA -->

                                                <!-- INICIO LINHA -->
                                                <div class="row">

                                                    <!-- Inicio Coluna Complemento Dados Basicos -->
                                                    <div class="col-sm-12 col-xs-12 complemento_dados_basicos">
                                                                                            
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-sm-6 col-xs-12">

                                                                <label class="control-label">Estado Civil </label>

                                                                <br />
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php
                                                                if (!empty($pessoa['estado_civil'])) {

                                                                    switch ($pessoa['estado_civil']) {
                                                                        case 1:
                                                                            echo "Solteiro(a)";
                                                                        break;
                                                                    
                                                                        case 2:
                                                                            echo "Casado(a)";
                                                                        break;
                                                                        
                                                                        case 3:
                                                                            echo "Viúvo(a)";
                                                                        break;
                                                                        
                                                                        case 4:
                                                                            echo "Divorciado(a)";
                                                                        break;
                                                                    }

                                                                } else {

                                                                    echo '-';

                                                                }
                                                                ?>
                                                                </span>
                                                                
                                                            </div>

                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-6 col-xs-12">
                                                        
                                                                <label class="control-label">Certidão de Nascimento</label>

                                                                <br />

                                                                <span class="letra-azul-claro"><?php echo (!empty($pessoa['matricula_certidao_nascimento'])) ? $pessoa['matricula_certidao_nascimento'] : '-'; ?></span>  
                                                                
                                                            </div>

                                                        </div>
                                                        
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                        
                                                                <label class="control-label">Nome da Mãe</label> 
                                                                
                                                                <br />
                                                                
                                                                <span class="letra-azul-claro"><?php echo (!empty($pessoa['filiacao_mae'])) ? $pessoa['filiacao_mae'] : '-'; ?></span>   
                                                                
                                                            </div>

                                                        </div>
                                                        
                                                        <!-- Linha -->
                                                        <div class="row">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                        
                                                                <label class="control-label">Nome do Pai</label> 
                                                                
                                                                <br />
                                                                
                                                                <span class="letra-azul-claro"><?php echo (!empty($pessoa['filiacao_pai'])) ? $pessoa['filiacao_pai'] : '-'; ?></span>
                                                                
                                                            </div>

                                                        </div>
                                                        
                                                        <!-- Linha -->
                                                        <div class="row linha_deficiencia">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-4 col-xs-12">
                                                                
                                                                <label class="control-label">Deficiente ? </label>
                                                                
                                                                <br />
                                                                
                                                                <span class="letra-azul-claro"><?php echo ($pessoa['deficiente'] == 1) ? 'Sim' : 'Não'; ?></span>
                                                                
                                                            </div>

                                                        </div>
                                                        
                                                        <?php
                                                        // Antes de exibir os tipos de deficiências, checo se a pessoa foi marcada como deficiente
                                                        if ($pessoa['deficiente'] == 1) {
                                                        ?>

                                                        <!-- Linha -->
                                                        <div class="row linha_deficiencia">
                                                            
                                                            <!-- Coluna -->
                                                            <div class="form-group col-md-12 col-xs-12">
                                                                
                                                                <label class="control-label">Tipos de Deficiências</label>

                                                                <br />  
                                                                
                                                                <span class="letra-azul-claro">
                                                                <?php
                                                                // Checo se existe uma lista de deficiências
                                                                if (count($pessoa['tipos_deficiencias']) > 0) {

                                                                    // Faço loop pelos tipos
                                                                    foreach ($pessoa['tipos_deficiencias'] as $tde) :

                                                                        // Exibo o nome da deficiência, deixando a primeira letra maiuscula com ucfirst()
                                                                        echo '- ' . ucfirst($tde['nome_deficiencia']) . '<br />';

                                                                    endforeach;

                                                                }
                                                                ?>
                                                                </span>

                                                            </div>

                                                        </div>

                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                    <!-- Fim Coluna Complemento Dados Basicos -->

                                                </div>
                                                <!-- FIM LINHA -->

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
                                                                                            
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">
                                                    
                                                        <label class="control-label">CEP </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['cep'])) ? $pessoa['cep'] : '-'; ?></span>  
                                                        
                                                    </div>
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-sm-6 col-xs-12">

                                                        <label class="control-label">Estado </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['estado'])) ? $pessoa['estado'] : '-'; ?></span> 

                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-sm-6 col-xs-12">

                                                        <label class="control-label">Cidade </label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['cidade'])) ? $pessoa['cidade'] : '-'; ?></span> 

                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">
                                                    
                                                        <label class="control-label">Bairro </label> 
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['bairro'])) ? $pessoa['bairro'] : '-'; ?></span> 
                                                                                                                      
                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-12 col-xs-12">
                                                    
                                                        <label class="control-label">Logradouro </label> 
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['logradouro'])) ? $pessoa['logradouro'] : '-'; ?></span>                                                 
                                                                                                                      
                                                    </div>

                                                </div>
                                                
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-8 col-xs-12">
                                                    
                                                        <label class="control-label">Complemento</label>
                                                        
                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['complemento'])) ? $pessoa['complemento'] : '-'; ?></span> 
                                                        
                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-4 col-xs-12">
                                                        
                                                        <label class="control-label">Número</label>

                                                        <br />

                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['numero'])) ? $pessoa['numero'] : '-'; ?></span> 
                                                        
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">CONTATO</div>
                                            <div class="panel-body">
                                                
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-12 col-xs-12">
                                                        
                                                        <label class="control-label">E-mail</label>

                                                        <br />

                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['email'])) ? $pessoa['email'] : '-'; ?></span> 
                                                        
                                                    </div>

                                                </div>

                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-4 col-xs-12">
                                                        
                                                        <label class="control-label">Telefone</label>

                                                        <br />
                                                        
                                                        <span class="letra-azul-claro">
                                                        <?php
                                                        if (!empty($pessoa['telefone'])) {
                                                            
                                                            // Exibe valor com máscara já adicionada
                                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($pessoa['telefone']);

                                                        } else {

                                                            echo '-';

                                                        }
                                                        ?>
                                                        </span>
                                                        
                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-4 col-xs-12">
                                                        
                                                        <label class="control-label">Celular</label>

                                                        <br />
                                                        
                                                        <span class="letra-azul-claro">
                                                        <?php
                                                        if (!empty($pessoa['celular'])) {

                                                            // Exibe valor com máscara já adicionada
                                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($pessoa['celular']);

                                                        } else {

                                                            echo '-';

                                                        }
                                                        ?>
                                                        </span>
                                                        
                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-4 col-xs-12">
                                                        
                                                        <label class="control-label">Celular 2</label>

                                                        <br />
                                                        
                                                        <span class="letra-azul-claro">
                                                        <?php
                                                        if (!empty($pessoa['celular_2'])) {

                                                            // Exibe valor com máscara já adicionada
                                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($pessoa['celular_2']);

                                                        } else {

                                                            echo '-';

                                                        }
                                                        ?>
                                                        </span>
                                                        
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default subpanel_pessoa_b">
                                            <div class="panel-heading">INFORMAÇÕES DE LOGIN</div>
                                            <div class="panel-body">
                                                
                                                <!-- Linha -->
                                                <div class="row">
                                                    
                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">

                                                        <label class="control-label">Usuário </label>
                                                        
                                                        <br />

                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['usuario'])) ? $pessoa['usuario'] : '-'; ?></span>
                                                        
                                                    </div>

                                                    <!-- Coluna -->
                                                    <div class="form-group col-md-6 col-xs-12">

                                                        <label class="control-label">Senha </label>

                                                        <br />
                                                        
                                                        <span class="letra-azul-claro"><?php echo (!empty($pessoa['usuario'])) ? '******' : '-'; ?></span>
                                                        
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>
                                    <!-- FIM COLUNA DIREITA -->

                                </div>
                                <!-- FIM LINHA -->  

                                <!-- INICIO LINHA --> 
                                <div class="row">
                                    
                                    <div class="col-md-12 col-xs-12">

                                        <!-- INICIO PANEL -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">ARQUIVOS</div>
                                            <div class="panel-body">
                                                
                                                <div class="row">

                                                    <div class="col-md-12 col-xs-12">
                                                        Arquivos relacionados a pessoa, como comprovante de residência e cópia de documentos. <br /><br />
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12 col-xs-12">

                                                        @if (count($cliente->arquivos_clientes))

                                                            <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nome do Arquivo</th>
                                                                    <th>Descrição do Arquivo</th>
                                                                    <th class="text-center">Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($cliente->arquivos_clientes as $arquivo)
                                                                <tr>
                                                                    <td>{{ $arquivo->arquivo }}</td>
                                                                    <td>{{ $arquivo->descricao_arquivo }}</td>
                                                                    <td class="text-center"><a href="{{ url(app('prefixo') . '/painel/clientes/pessoafisica/download-arquivo/' . Crypt::encrypt($arquivo->cod_arquivo_cliente)) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            </table>

                                                        @else

                                                            <span class="letra-vermelho-claro">Não existem arquivos para esta pessoa.</span> <br /><br />

                                                        @endif

                                                    </div>

                                                </div>
                                                
                                                <!-- BOTÃO UPLOAD DE ARQUIVOS -->
                                                <a class="btn btn-md btn-terciary" id="btn_upload_arquivos" href="javascript:void(null);">
                                                    <i class="fas fa-upload"></i> Upload de Arquivos
                                                </a> 

                                            </div>
                                        </div>
                                        <!-- FIM PANEL -->

                                    </div>

                                </div> 
                                <!-- FIM LINHA -->  
                                
                                <!-- INICIO LINHA --> 
                                <div class="row" style="margin-top: 30px;">
                                    
                                    <!-- Coluna -->
                                    <div class="col-md-4 col-xs-12">

                                        <!-- BOTÃO EDITAR -->
                                        <a class="btn btn-md btn-info" id="btn_editar_pessoa" href="javascript:void(null);">
                                            <i class="fa fa-edit"></i> Editar Pessoa
                                        </a>    

                                    </div>

                                </div>  
                                <!-- FIM LINHA -->                        

                            </div>
                            <!-- ###### FIM ABA 1 ############################# -->

                                             



                            <!-- ###### INICIO ABA 2 ########################## -->
                            <div id="aba_2" class="tab-pane fade">
                                
                                <?php
                                // Caso existam contratos do tipo PF
                                if (count($contrato_pfs) > 0) {
                                ?>

                                    <h2>Contratos Pessoa Física</h2>

                                    Contratos firmados diretamente entre a clínica e o cliente. <br /><br />

                                    <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Nº do Contrato</td>
        								    <td>Data de Criação</td>
        								    <td>Data de Cancelamento</td>
                                            <td>Vinculo</td>
                                            <td>Membro Ativo?</td>
                                            <td>Contrato Ativo?</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php
                                        if (count($contrato_pfs) > 0) {
                                        ?>

                                            @foreach ($contrato_pfs as $contrato_pf)

                                                <?php
                                                // Checo se o contrato está ativo e se o membro está ativo dentro dele. Então fornece variaveis para sinalizar esta informação na tabela.
                                                if ($contrato_pf->status_contrato == 1) {
                                                    $eh_contrato_ativo = 1;
                                                } else {
                                                    $eh_contrato_ativo = 0;
                                                }

                                                if ($contrato_pf->status_membro == 1) {
                                                    $eh_membro_ativo = 1;
                                                } else {
                                                    $eh_membro_ativo = 0;
                                                }
                                                ?>
                                                                                                                            
                								<tr <?php if ($eh_contrato_ativo == 1 and $eh_membro_ativo == 1) { ?>class="success"<?php } ?>>        
                                                    <td><?php echo $contrato_pf->numero_contrato_pf; ?></td>
                									<td><?php echo date('d/m/Y', strtotime($contrato_pf->data_inclusao)); ?></td>
                									<td>
                                                        <?php 
                                                        if (!empty($contrato_pf->data_cancelamento_contrato) and $contrato_pf->data_cancelamento_contrato != '0000-00-00') {
                                                            echo date('d/m/Y', strtotime($contrato_pf->data_cancelamento_contrato)); 
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        <?php 
                                                        switch ($contrato_pf->vinculo) {
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
                                                        <?php if ($eh_membro_ativo == 0) { ?>                                                                                 
                                                            <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                        <?php } elseif ($eh_membro_ativo == 1) { ?>
                                                            <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($eh_contrato_ativo == 0) { ?>                                                                                 
                                                            <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                        <?php } elseif ($eh_contrato_ativo == 1) { ?>
                                                            <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                        <?php } ?>
                                                    </td>                                                
                                                    <td>
                                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar Contrato" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/visualizar/' .  Crypt::encrypt($contrato_pf->cod_contrato_pessoa_fisica_plano)); ?>">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                									</td>                                                                            
                								</tr>
                                            
                                            @endforeach

                                        <?php
                                        } else {
                                        ?>
                                            
                                            <tr>
                                                <td colspan="7">
                                                    Não há registros para serem exibidos.
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    
                                    </tbody>
                                    </table>

                                <?php
                                }
                                ?>

                                <?php
                                // Caso existam contratos do tipo PJ
                                if (count($contrato_pjs) > 0) {
                                ?>

                                    <h2>Contratos Pessoa Jurídica</h2>

                                    Contratos firmados entre a clínica e uma empresa, beneficiando os funcionários da empresa. <br /><br />

                                    <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Nº do Contrato</td>
                                            <td>Data de Criação</td>
                                            <td>Data de Cancelamento</td>
                                            <td>Vinculo</td>
                                            <td>Membro Ativo?</td>
                                            <td>Contrato Ativo?</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <?php
                                        if (count($contrato_pjs) > 0) {
                                        ?>

                                            @foreach ($contrato_pjs as $contrato_pj)

                                                <?php
                                                // Checo se o contrato está ativo e se o membro está ativo dentro dele. Então fornece variaveis para sinalizar esta informação na tabela.
                                                if ($contrato_pj->status_contrato == 1) {
                                                    $eh_contrato_ativo = 1;
                                                } else {
                                                    $eh_contrato_ativo = 0;
                                                }

                                                if ($contrato_pj->status_membro == 1) {
                                                    $eh_membro_ativo = 1;
                                                } else {
                                                    $eh_membro_ativo = 0;
                                                }
                                                ?>
                                                                                                                            
                                                <tr <?php if ($eh_contrato_ativo == 1 and $eh_membro_ativo == 1) { ?>class="success"<?php } ?>>        
                                                    <td><?php echo $contrato_pj->numero_contrato_pj; ?></td>
                                                    <td><?php echo date('d/m/Y', strtotime($contrato_pj->data_inclusao)); ?></td>
                                                    <td>
                                                        <?php 
                                                        if (!empty($contrato_pj->data_cancelamento_contrato) and $contrato_pj->data_cancelamento_contrato != '0000-00-00') {
                                                            echo date('d/m/Y', strtotime($contrato_pj->data_cancelamento_contrato)); 
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        <?php 
                                                        switch ($contrato_pj->vinculo) {
                                                            case 1:
                                                                echo 'MEMBRO';
                                                            break;

                                                            case 2:
                                                                echo 'SUBMEMBRO';
                                                            break;
                                                        }
                                                        ?>
                                                        </b>
                                                    </td>
                                                    <td>
                                                        <?php if ($eh_membro_ativo == 0) { ?>                                                                                 
                                                            <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                        <?php } elseif ($eh_membro_ativo == 1) { ?>
                                                            <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($eh_contrato_ativo == 0) { ?>                                                                                 
                                                            <i class="fas fa-times" style="color: #f44242; font-size: 17px;"></i>
                                                        <?php } elseif ($eh_contrato_ativo == 1) { ?>
                                                            <i class="fas fa-check" style="color: #4ec458; font-size: 17px;"></i>
                                                        <?php } ?>
                                                    </td>                                                
                                                    <td>
                                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar Contrato" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoajuridica/visualizar/' .  Crypt::encrypt($contrato_pj->cod_contrato_pessoa_juridica_plano)); ?>">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>                                                                            
                                                </tr>
                                            
                                            @endforeach

                                        <?php
                                        } else {
                                        ?>
                                            
                                            <tr>
                                                <td colspan="7">
                                                    Não há registros para serem exibidos.
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    
                                    </tbody>
                                    </table>

                                <?php
                                }
                                ?>
                        
                                <?php
                                // Caso NÃO existam contratos do tipo PF e do tipo PJ
                                if (count($contrato_pfs) == 0 and count($contrato_pjs) == 0) {
                                ?>

                                    <br /><br />

                                    <h2 class="text-danger">Não existem contratos para esta pessoa.</h2>
                                    
                                    <br /><br />

                                <?php
                                }
                                ?>

                            </div>
                            <!-- ###### FIM ABA 2 ############################# -->



                            


                            <!-- ###### INICIO ABA 3 ########################## -->
                            <div id="aba_3" class="tab-pane fade">
                                
                                <?php
                                // Checo se existem logs
                                if (count($logs_clientes) > 0) {
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
                                        foreach ($logs_clientes as $lc) : 
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
                                                    switch ($lc->modulo) {
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

                                Breve

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
        var modulo_busca = $('#modulo_busca').val();
        var data_evento_busca = $('#data_evento_busca').val();
                
        // Requisição ajax
        $.ajax({
            cache: false,
            type: "POST",
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/buscar-linha-tempo'); ?>",
            data: { 
                "modulo_busca": modulo_busca,
                "data_evento_busca": data_evento_busca,
                "cod_cliente": "<?php echo Crypt::encrypt($cliente->cod_cliente); ?>"
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
            url: "<?php echo url(app('prefixo') . '/painel/clientes/pessoafisica/resetar-linha-tempo'); ?>",
            data: { 
                "cod_cliente": "<?php echo Crypt::encrypt($cliente->cod_cliente); ?>"
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