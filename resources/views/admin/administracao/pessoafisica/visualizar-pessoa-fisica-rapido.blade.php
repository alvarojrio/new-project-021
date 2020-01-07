@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
    
@stop



<!-- ### CONTEUDO DA PAGINA ### -->

<!-- INICIO LINHA -->
<div class="row">
    
    <!-- INICIO COLUNA -->
    <div class="col-xs-12">

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

    </div>
    <!-- FIM COLUNA -->

</div>
<!-- FIM LINHA -->

<div class="clearfix"></div>



@section('includes_no_body')

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    // Nothing for now   

});
</script>

@stop