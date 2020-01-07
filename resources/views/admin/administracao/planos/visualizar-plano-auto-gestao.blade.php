@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Visualizar
@stop

@section('conteudo')

{!! Breadcrumbs::render('convenios-visualizar-plano-ans', $plano) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Plano Auto Gestão</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:180px">Convênio: </th>
                                    <td>{{ $plano->convenios->nome_convenio }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tabela: </th>
                                    <td>{{ $plano->tabelas->nome_tabela }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Nome do plano: </th>
                                    <td>{{ $plano->nome_plano }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Código: </th>
                                    <td>{{ $plano->codigo }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo do Plano</th>
                                    <td>
                                        @if($plano->tipo_plano == 1)
                                            <span class="label label-success" style="font-size:14px">PESSOA FÍSICA</span>
                                        @elseif($plano->tipo_plano == 2)
                                            <span class="label label-info" style="font-size:14px">PESSOA JURÍDICA</span>
                                        @elseif($plano->tipo_plano == 3)
                                            <span class="label label-warning" style="font-size:14px">ANS</span>
                                        @endif
                                         
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Possui Co-participação</th>
                                    <td>
                                        @if($plano->possui_co_participacao == 1)
                                            Sim
                                        @elseif($plano->possui_co_participacao == 0)
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Tipo Co-participação</th>
                                    <td>
                                        @if($plano->tipo_co_participacao == 1)
                                            Sim
                                        @elseif($plano->tipo_co_participacao == 0)
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Faturado?</th>
                                    <td>
                                        @if($plano->faturado == 1)
                                            Sim
                                        @else
                                            Não
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Data Inicial: </th>
                                    <td>{{ date('d/m/Y', strtotime($plano->data_inicio)) }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Data Final: </th>
                                    <td>{{ ($plano->data_fim != null) ? date('d/m/Y', strtotime($plano->data_fim)) : 'Indefinida' }}</td>
                                </tr>
                                <tr>
                                    <th>Valor Individual do plano: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_mensal_individual }}</td>
                                </tr>
                                
                                <tr>
                                    <th>Valor grupo do plano: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_mensal_grupo }}</td>
                                </tr>
                                <tr>
                                    <th>Valor individual carteirinha: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_carteirinha_individual }}</td>
                                </tr>
                                <tr>
                                    <th>Valor grupo carteirinha: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_carteirinha_grupo }}</td>
                                </tr>
                                <tr>
                                    <th>Valor individual inclusão de dependente: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_inclusao_dependente_individual }}</td>
                                </tr>
                                <tr>
                                    <th>Valor grupo inclusão de dependente: </th>
                                    <td>R$ {{ $preficicacao_plano->valor_inclusao_dependente_grupo }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>                    
                    
            <?php   if(count($procedimentos) > 0): ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                            <h2 class="page-header">Procedimentos</h2>
                                        
                        </div>
                    </div>
                
                    <div class="row">
                
            <?php 
                    $i = 1;
                    foreach ($procedimentos as $procedimento): ?>  
                
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <table class="col-lg-6 col-md-6 col-xs-12 table table-striped table-bordered">
                                    
                                    <tbody>

                                        <tr>
                                            <th style="width:180px">Nome: </th>
                                            <td><?php echo $procedimento->descricao; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Carência: </th>
                                            <td>
                                                    <?php 
                                                    
                                                        switch($procedimento->carencia){
                                                            case "1":
                                                                echo "Imediato";
                                                            break;
                                                        
                                                            case "2":
                                                                echo "24 horas";
                                                            break;
                                                        
                                                            case "3":
                                                                echo "48 horas";
                                                            break;
                                                        
                                                            default:
                                                                echo "Não informada";    
                                                            break;    
                                                        }
                                                        
                                                    ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Data início:</th>
                                            <td><?php echo date('d/m/Y', strtotime($procedimento->data_inicio)); ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width:180px">Valor venda</th>
                                            <td>R$ <?php echo $procedimento->valor_venda; ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width:180px">Tipo desconto: </th>
                                            <td>
                                                    <?php 
                                                        switch($procedimento->tipo_desconto){
                                                            case "0":
                                                                echo "Nenhum";
                                                            break;
                                                        
                                                            case "1":
                                                                echo "%";
                                                            break;
                                                        
                                                            case "2":
                                                                echo "R$";
                                                            break;
                                                        
                                                            default:
                                                                echo "Não informada";    
                                                            break;    
                                                        }
                                                        
                                                    ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width:180px">Valor desconto</th>
                                            <td><?php echo $procedimento->valor_desconto; ?></td>
                                        </tr>
                                        
                                         <tr>
                                            <th style="width:180px">Valor final</th>
                                            <td>R$ 
                                                <?php 
                                                        
                                                   
                                                        switch($procedimento->tipo_desconto){
                                                            case "0":
                                                                echo "Nenhum";
                                                            break;
                                                        
                                                            case "1":
                                                                echo $procedimento->valor_venda  - ($procedimento->valor_venda * ($procedimento->valor_desconto / 100)); 
                                                            break;
                                                        
                                                            case "2":
                                                                echo $procedimento->valor_venda - $procedimento->valor_desconto; 
                                                            break;
                                                        
                                                            default:
                                                                echo "Não informada";    
                                                            break;    
                                                        }
                                                  
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th style="width:180px">Periodicidade</th>
                                            <td>
                                                <?php 
                                                    switch ($procedimento->periodicidade) {
                                                        
                                                        case 1:
                                                            echo "Diário";
                                                        break;
                                                    
                                                        case 2:
                                                            echo "Semanal";
                                                        break;
                                                    
                                                        case 3:
                                                            echo "Quinzenal";
                                                        break;
                                                    
                                                        case 4:
                                                            echo "Mensal";
                                                        break;
                                                    
                                                        case 5:
                                                            echo "Trimestral";
                                                        break;
                                                    
                                                        case 6:
                                                            echo "Semestral";
                                                        break;
                                                    
                                                        case 7:
                                                            echo "Anual";
                                                        break;

                                                        default:
                                                            echo "Não informado";
                                                        break;
                                                    }
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Qtd de parcelas quitadas</th>
                                            <td><?php echo $procedimento->quantidade_parcelas_quitadas; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Condição contratual</th>
                                            <td>
                                                <?php 
                                                   
                                                    switch ($procedimento->condicao_contratual) {
                                                        case 1:
                                                            echo "uma pessoa no contrato";
                                                        break;
                                                    
                                                        case 2:
                                                            echo "Mais de uma pessoa no contrato";
                                                        break;

                                                        default:
                                                            echo "Não informado";
                                                        break;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Dias inadimplentes</th>
                                            <td><?php echo $procedimento->dias_inadimplente; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Se tiver inadimplentes</th>
                                            <td>
                                                <?php 
                                                   
                                                    switch ($procedimento->configuracao_inadimplencia) {
                                                        case 0:
                                                           echo "Não manter desconto";
                                                        break;
                                                    
                                                        case 1:
                                                            echo "Manter desconto";
                                                        break;

                                                        default:
                                                            echo "Não informado";
                                                        break;
                                                    }
                                                ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                    
                    
            <?php        
                    if($i % 2 == 0){
                        echo "</div> <div class = 'row'> ";
                       
                    } 
                    
                    $i = $i + 1;
                        endforeach;
            ?>
                         
               
            <?php    
                    endif;
            ?>
            
            <?php 
                    if(count($faixas_etaria_plano) > 0):
            ?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="page-header">Faixa Etária</h2>
                            </div>
                        </div>
            <?php    
                        foreach($faixas_etaria_plano as $f_etaria_plano): ?>
                    
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-xs-12">

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Serviços</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th style="width:180px">Faixa etária: </th>
                                                <td><?php echo "De ". $f_etaria_plano->idade_inicial ." até ". $f_etaria_plano->idade_final; ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width:180px">Data início: </th>
                                                <td><?php echo date('d/m/Y', strtotime(str_replace('/', '-', $f_etaria_plano->data_inicio))); ?></td>
                                            </tr>

                                            <tr>
                                                <th style="width:180px">Serviço(s) contemplado(s) </th>
                                                <td>

                                                    <?php   $linha = "";

                                                            foreach ($servicos as $servico):

                                                                if ($servico->cod_faixa_etaria_plano == $f_etaria_plano->cod_faixa_etaria_plano) :
                                                                    
                                                                    if (isset($servico->cod_servico_pessoa_fisica)) {

                                                                        $cod_servico = $servico->cod_servico_pessoa_fisica;

                                                                    } elseif (isset($servico->cod_servico_pessoa_juridica)) {

                                                                        $cod_servico = $servico->cod_servico_pessoa_juridica;

                                                                    }
                                                                    
                                                                    // Todas as vezes que o cod_serviço for diferente de linha abro uma nova UL
                                                                    // Todas as vezes que abro uma UL informo o nome do serviço
                                                                    // Todas as vezes que informo o nome do serviço informo o o valor individual e em grupo
                                                                    if ($cod_servico != $linha) { ?><ul class="list-group"><?php  
                                                                            
                                                                        echo "<li class='col-lg-4 list-group-item'>". $servico->nome_servico."</li>";
                                                                            
                                                                    }
                                                                    
                                                                    if($servico->ramificacao == 1){$ramificacao = "Individual";}else{$ramificacao = "Grupo";}
                                                                        
                                                                    echo "<li class='col-lg-4 list-group-item'>R$ ". $servico->valor_servico. " ". $ramificacao. "</li>";
                                                                    
                                                                    // Todas as vezes que o cod_serviço for igual de linha fecho uma nova UL    
                                                                    if($cod_servico == $linha){?></ul><?php }  
                                                                    
                                                                    // Armazeno o cod do serviço para pode saber se na proxima passagem do loop preciso abrir uma no UL ou não
                                                                                                  
                                                                    if(isset($servico->cod_servico_pessoa_fisica)){
                                                                         $linha = $servico->cod_servico_pessoa_fisica;
                                                                    }else if(isset($servico->cod_servico_pessoa_juridica)){
                                                                       $linha = $servico->cod_servico_pessoa_juridica;
                                                                    }
                                                                
                                                                endif;

                                                            endforeach; 
                                                    ?>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div> 
                    <?php        
                        endforeach;
                    endif;
                    ?>
                    
                    <div class="clearfix"></div>

                    <div class="col-xs-12">
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                    </div>
                </div>
                    
            </div>
        </div>
    </div>
</div>
@stop