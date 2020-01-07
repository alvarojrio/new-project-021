@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Procedimentos | Visualizar
@stop

@section('includes_no_head')

<style type="text/css">
.tabela-de-historicos th {
    background-color: #2A3F54;
    color: white;
} 
</style>

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-visualizar-procedimento', $tabelas) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Procedimento</h3>
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
                        
                        <h2>Dados Gerais</h2>

                        <table class="table table-striped table-bordered">
                        <tbody>
                            <?php if (!empty($procedimentos->codigo)) { ?>
                            <tr>
                                <th style="width:180px">Código:</th>
                                <td><?php echo $procedimentos->codigo; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->codigo_interno)) { ?>
                            <tr>
                                <th style="width:180px">Código Interno:</th>
                                <td><?php echo $procedimentos->codigo_interno; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th style="width:180px">Descrição:</th>
                                <td><span class="text-primary"><b><?php echo mb_strtoupper($procedimentos->descricao); ?></b></span></td>
                            </tr>
                            <?php if (!empty($procedimentos->categorias->descricao)) { ?>
                            <tr>
                                <th style="width:180px">Categoria:</th>
                                <td><?php echo $procedimentos->categorias->descricao; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->sinonimo)) { ?>
                            <tr>
                                <th style="width:180px">Sinônimo:</th>
                                <td><?php echo $procedimentos->sinonimo; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->sexo)) { ?>
                            <tr>
                                <th style="width:180px">Sexo:</th>
                                <td>
                                    <?php 
                                    if ($procedimentos->sexo == 1) {
                                        echo 'Masculino'; 
                                    } elseif ($procedimentos->sexo == 2) {
                                        echo 'Feminino';
                                    } elseif ($procedimentos->sexo == 3) {
                                        echo 'Ambos';
                                    }
                                    ?>    
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->capitulo)) { ?>
                            <tr>
                                <th style="width:180px">Capítulo:</th>
                                <td><?php echo $procedimentos->capitulo; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->grupo)) { ?>
                            <tr>
                                <th style="width:180px">Grupo:</th>
                                <td><?php echo $procedimentos->grupo; ?></td>
                            </tr>
                            <?php } ?>
                            <?php if (!empty($procedimentos->subgrupo)) { ?>
                            <tr>
                                <th style="width:180px">Sub-Grupo:</th>
                                <td><?php echo $procedimentos->subgrupo; ?></td>
                            </tr>   
                            <?php } ?>    
                            <tr>
                                <th style="width:180px">Deflator:</th>
                                <td><?php echo $procedimentos->deflator; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Honorários:</th>
                                <td><?php echo $procedimentos->honorarios; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Auxiliares:</th>
                                <td><?php echo $procedimentos->auxiliares; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Incidência:</th>
                                <td><?php echo $procedimentos->incidencia; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">CH Total:</th>
                                <td><?php echo $procedimentos->ch_total; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Porte Anastésico:</th>
                                <td><?php echo $procedimentos->porte_anastesico; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Custo Operacional:</th>
                                <td><?php echo $procedimentos->custo_operacional; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Filme m2:</th>
                                <td><?php echo $procedimentos->filme_m2; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">CRR:</th>
                                <td><?php echo $procedimentos->crr; ?></td>
                            </tr>                      
                            <tr>
                                <th style="width:180px">CH:</th>
                                <td><?php echo $procedimentos->ch; ?></td>
                            </tr>
                        </tbody>
                        </table>

                    </div>

                </div>
                <!-- FIM LINHA -->

                

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-xs-12">

                        <h2>Valores</h2>

                        <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th style="width:180px">Valor de Custo:</th>
                                <td><?php echo (!empty($procedimentos->valor_custo)) ? 'R$ ' . $procedimentos->valor_custo : '-'; ?></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Valor de Venda:</th>
                                <td><?php echo (!empty($procedimentos->valor_venda)) ? 'R$ ' . $procedimentos->valor_venda : '-'; ?></td>
                            </tr>
                        </tbody>
                        </table>

                    </div>

                </div>
                <!-- FIM LINHA -->
                


                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-xs-12">
                        
                        <h2>Histórico de Valores</h2>
                        
                        <table class="table table-striped table-bordered tabela-de-historicos">
                        <thead>
                            <th>Data de Inicio</th>
                            <th>Data de Fim</th>                            
                            <th>Valor CH</th>
                            <th>Valor Filme</th>
                            <th>Valor Custo</th>
                            <th>Valor Venda</th>
                            <th>Margem de Lucro (%)</th>                            
                        </thead>

                        <tbody>

                            <?php
                            // Checo se existe histórico
                            if (count($historicos_deste_procedimento) > 0) {
                            ?>

                                <?php
                                // Faço loop pelo histórico de valores
                                foreach ($historicos_deste_procedimento as $hp) :

                                    // Verifica se a data de inicio é MAIOR que hoje para aplicar cor diferente ao texto
                                    if (!empty($hp->data_inicio)) {
                                        if (drclub\Biblioteca\FuncoesGlobais::dataMaiorQue($hp->data_inicio, date('Y-m-d'))) {

                                            // Estilo para data futura
                                            $estilo_por_tempo = 'style="color: #e28636;"';

                                        } elseif (drclub\Biblioteca\FuncoesGlobais::dataIgual($hp->data_inicio, date('Y-m-d')) and empty($hp->data_fim)) {

                                            // Estilo para data de hoje
                                            $estilo_por_tempo = 'style="color: #68c477;"';

                                        } else {

                                            // Estilo para data passada
                                            $estilo_por_tempo = 'style="color: #648fba;"';

                                        }
                                    }
                                ?>  

                                    <tr>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo (!empty($hp->data_inicio)) ? date('d/m/Y', strtotime($hp->data_inicio)) : '-'; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo (!empty($hp->data_fim)) ? date('d/m/Y', strtotime($hp->data_fim)) : '-'; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo $hp->valor_ch; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo $hp->valor_filme; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo 'R$ ' . $hp->valor_custo; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>><?php echo (!empty($hp->valor_venda)) ? 'R$ ' . $hp->valor_venda : '-'; ?></td>
                                        <td <?php echo $estilo_por_tempo; ?>>
                                            <?php 
                                            // Checo se valores utilizados no cálculo foram definidos na base
                                            if (!empty($hp->valor_custo) and $hp->valor_custo != 0 and !empty($hp->valor_venda)) {

                                                // Efetuo cálculo da margem de lucro (lucro real)
                                                // FORMULA: ((VALOR_VENDA * 100) / VALOR_CUSTO) - 100
                                                $calculo_margem = (($hp->valor_venda * 100) / $hp->valor_custo) - 100;

                                                // Exibo resultado do cálculo, arredondado e com duas casas depois da virgula
                                                echo round($calculo_margem, 2) . '%';

                                            } elseif (!empty($hp->valor_custo) and $hp->valor_custo == 0 and !empty($hp->valor_venda)) { // Caso o valor_venda tenha sido definido e o valor_custo tenha sido definido e seja igual a 0 (zero)

                                                // Efetuo cálculo da margem de lucro (lucro real)
                                                // FORMULA: (VALOR_VENDA * 100)
                                                $calculo_margem = ($hp->valor_venda * 100);

                                                // Exibo resultado do cálculo, arredondado e com duas casas depois da virgula
                                                echo round($calculo_margem, 2) . '%';

                                            } else {

                                                // Variavel da margem de lucro
                                                $calculo_margem = '-';

                                                // Exibo valor
                                                echo $calculo_margem;

                                            }

                                            // Limpo variavel
                                            unset($calculo_margem);
                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                    // Limpo variaveis
                                    unset($estilo_futuro);

                                endforeach;
                                ?>

                            <?php
                            } else {
                            ?>

                                Não existem registros para serem exibidos.

                            <?php
                            }
                            ?>

                        </tbody>
                        </table>

                    </div>

                </div>
                <!-- FIM LINHA -->



                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <hr />

                    <div class="col-md-6 col-xs-12">
                        <div align="center" style="margin-top: 10px;">
                            <a href="<?php echo URL::previous(); ?>" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                        </div>
                    </div>

                </div>
                <!-- FIM LINHA -->

            </div>
        </div>
    </div>

</div>

@stop