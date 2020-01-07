@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Visualizar Inativa
@stop

@section('includes_no_head')

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('especialidades-visualizar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Visualizar Especialidade</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
            
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- Coluna -->
                    <div class="col-md-12 col-xs-12">

                        <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">Dados Gerais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="width:180px">Nome: </th>
                                <td><span class="letra-azul-claro">{{ $especialidade->nome_especialidade }}</span></td>
                            </tr>
                            <tr>
                                <th style="width:180px">Sexos Permitidos: </th>
                                <td><span class="letra-azul-claro">@if ($especialidade->sexo_especialidade == 1) Apenas Homens @endif @if ($especialidade->sexo_especialidade == 2) Apenas Mulheres @endif @if ($especialidade->sexo_especialidade == 3) Ambos @endif</span></td>
                            </tr>                                                                
                            <tr>
                                <th style="width:180px">Idade mínima: </th>
                                <td>
                                    <span class="letra-azul-claro">
                                    <?php 
                                    echo $especialidade->idade_minima;
                                                                                
                                    switch ($especialidade->periodicidade_minima) {
                                        case 1:
                                            echo " dia(s)";        
                                        break;
                                    
                                        case 2:
                                            echo " mês(es)";        
                                        break;
                                    
                                        case 3:
                                            echo " ano(s)";        
                                        break;

                                        default:
                                             echo "";
                                        break;
                                    }                                                   
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:180px">Idade máxima: </th>
                                <td>
                                    <span class="letra-azul-claro">
                                    <?php 
                                    echo $especialidade->idade_maxima;
                                                                                
                                    switch ($especialidade->periodicidade_maxima) {
                                        case 1:
                                            echo " dia(s)";        
                                        break;
                                    
                                        case 2:
                                            echo " mês(es)";        
                                        break;
                                    
                                        case 3:
                                            echo " ano(s)";        
                                        break;

                                        default:
                                             echo ""; 
                                        break;
                                    }        
                                    ?>
                                    </span>
                                </td>
                            </tr>                                                                
                            <tr>
                                <th style="width:180px">Agendamento: </th>
                                <td><span class="letra-azul-claro">@if ($especialidade->agendamento == 1) Sim @else Não @endif</span></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                </div>
                <!-- FIM LINHA -->

                <hr style="margin-top: 0px; margin-bottom: 8px;" />
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- Coluna -->
                    <div class="col-md-12 col-xs-12">

                        <h2><strong> Unidades que atendem :</strong></h2>

                    </div> 

                </div>
                <!-- FIM LINHA -->

                <?php
                // Verifico se existem unidades vinculadas
                if (count($unidades) > 0) {
                ?>

                    <!-- INICIO LINHA -->
                    <div class="row">

                        <!-- Coluna -->
                        <div class="col-md-12 col-xs-12">
                            
                            <?php foreach ($unidades as $u) : ?>

                                <div style="font-size: 14px; margin-bottom: 15px;">
                                    <span class="label label-default" style="padding: 7px;"><?php echo mb_strtoupper($u->nome_unidade); ?></span>
                                </div>
                            
                            <?php endforeach; ?>

                        </div> 

                    </div>
                    <!-- FIM LINHA -->

                <?php
                } else { // Caso não existam unidades vinculadas
                ?>

                    <!-- INICIO LINHA -->
                    <div class="row">

                        <!-- Coluna -->
                        <div class="col-md-12 col-xs-12">

                            <i class="letra-vermelho-claro">Esta especialidade atualmente não é atendida em nenhuma unidade.</i>

                        </div> 

                    </div>
                    <!-- FIM LINHA -->

                <?php
                }
                ?>

                <hr style="margin-top: 10px; margin-bottom: 8px;" />
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- Coluna -->
                    <div class="col-md-12 col-xs-12">

                        <h2><strong> Médicos que atendem :</strong></h2>

                    </div> 

                </div>
                <!-- FIM LINHA -->

                <?php
                // Verifico se existem medicos vinculados
                if (count($medicos) > 0) {
                ?>

                    <!-- INICIO LINHA -->
                    <div class="row">

                        <!-- Coluna -->
                        <div class="col-md-12 col-xs-12">
                            
                            <?php foreach ($medicos as $m) : ?>

                                <div style="font-size: 14px; margin-bottom: 15px;">
                                    <span class="label label-primary" style="padding: 7px;"><?php echo mb_strtoupper($m->nome); ?></span>
                                </div>
                            
                            <?php endforeach; ?>

                        </div> 

                    </div>
                    <!-- FIM LINHA -->

                <?php
                } else { // Caso não existam médicos vinculados
                ?>

                    <!-- INICIO LINHA -->
                    <div class="row">

                        <!-- Coluna -->
                        <div class="col-md-12 col-xs-12">

                            <i class="letra-vermelho-claro">Esta especialidade atualmente não é atendida por nenhum médico.</i>

                        </div> 

                    </div>
                    <!-- FIM LINHA -->

                <?php
                }
                ?>

                <div class="clearfix"></div>

                <br /><br />

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- Coluna -->
                    <div class="col-md-12 col-xs-12">
                        <div align="center">
                        <a href="<?php echo URL::previous(); ?>" class="btn btn-default">
                            <i class="fas fa-arrow-circle-left"></i> Voltar
                        </a>
                        </div>
                    </div>

                </div>
                <!-- FIM LINHA -->
				
            </div>
		</div>
	</div>
        
</div>

@stop

@section('includes_no_body')

<style>
td span {
    line-height: 0px;
}
</style>

@stop
