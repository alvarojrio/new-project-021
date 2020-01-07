@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos | Agenda
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/fullcalendar-3.9/css/fullcalendar_customizado.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('medicos-gerenciar-agenda') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Agenda Médica</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
       
                <!-- INICIO LINHA -->
                <div class="row">
                <?php 
                $i =0;
                if(count($unidades) > 0){ 
                        
                    foreach($unidades as $u): 
                ?>          
                    <div class="x_panel" id="painel_bloco<?php echo $u->cod_unidade; ?>">
                        <input type="hidden" name="painel<?php echo $i; ?>" id="painel<?php echo $i; ?>" value="<?php echo $i; ?>" />
                        <!-- INICIO LINHA -->
                        <div class="row">

                                <div class="col-md-12 col-xs-12">

                                    <h4><b>Médico: {{$medico->pessoa->nome}}</b></h4>
                                    <input type="hidden" id="nome_medico<?php echo $i; ?>" name="nome_medico<?php echo $i; ?>" value="<?php echo $medico->pessoa->nome; ?>">
                                    <input type="hidden" id="medico<?php echo $i; ?>" name="medico<?php echo $i; ?>" value="<?php echo $medico->cod_medico; ?>">
                                    <hr/>
                                </div>

                        </div>


                        <!-- INICIO LINHA -->   
                        <div class="row">
                            

                                        <div class="form-group col-md-4 col-xs-12">

                                                <label class="control-label">Unidade<span class="required-red"> *</span></label>
                                                <input type="text" class="form-control input-sm" id="nome_unidade<?php echo $i; ?>" name="nome_unidade<?php echo $i; ?>" readonly="readonly" value="<?php echo $u->nome_unidade; ?>">
                                                <input type="hidden" id="unidade<?php echo $i; ?>" name="unidade<?php echo $i; ?>" value="<?php echo $u->cod_unidade; ?>">
                                        </div>
                                        
                            <?php
                            
                                // Variavel utilizada para verificar se o medico já inicio um evento na unidade
                                $verifica = 0;                    
                                foreach($agendas as $agenda):
                            
                                    // Se agenda pertence a unidade 
                                    if($agenda->cod_unidade == $u->cod_unidade){ 
                                    
                                        
                                        $verifica = 1; 
                                        
                                    ?>  
                            
                                        <input type="hidden" class="form-control input-sm" name="cod_agenda<?php echo $i; ?>" id="cod_agenda<?php echo $i; ?>" placeholder="00/00/0000" autocomplete="off" value="<?php echo $agenda->cod_agenda; ?>">
                            
                                        <div class="form-group col-md-2 col-xs-12">
                                                          
                                                <label class="control-label">Data início<span class="required-red"> *</span></label>
                                                <input type="text" class="form-control input-sm" name="data_inicio<?php echo $i; ?>" id="data_inicio<?php echo $i; ?>" placeholder="00/00/0000" autocomplete="off" value="<?php echo date('d/m/Y', strtotime(str_replace('/', '-', $agenda->data_inicio)))?>">

                                        </div>

                                        <div class="form-group col-md-2 col-xs-12">

                                                <label class="control-label">Data fim</label>
                                                <input type="text" class="form-control input-sm" name="data_fim<?php echo $i; ?>" id="data_fim<?php echo $i; ?>" placeholder="00/00/0000" autocomplete="off" value="<?php if($agenda->data_final != "0000-00-00" && $agenda->data_final != NULL){echo date('d/m/Y', strtotime(str_replace('/', '-', $agenda->data_final))); }?>">

                                        </div>

                                        <div class="form-group col-md-3 col-xs-12">

                                                <label class="control-label">Tempo médio da consulta</label>
                                                <input type="text" class="form-control input-sm" name="tempo_medio<?php echo $i; ?>" id="tempo_medio<?php echo $i; ?>" value="{{ $agenda->tempo_medio_consulta }}">

                                        </div>
                                        
                                        <div class="form-group col-md-1 col-xs-12">
                                            
                                            <label class="control-label col-xs-12">-</label>
                                            <button class="btn btn-sm btn-info col-xs-12">Alterar</button>

                                        </div>
                            <?php
                                
                                    }
                                    
                                endforeach;
                                
                                if($verifica == 0){ ?>
                                  
                                       <div class="form-group col-md-2 col-xs-12">
                                                        
                                                <label class="control-label">Data início<span class="required-red"> *</span></label>
                                                <input type="text" class="form-control input-sm" name="data_inicio<?php echo $i; ?>" id="data_inicio<?php echo $i; ?>" placeholder="00/00/0000" autocomplete="off" value=""/>

                                        </div>

                                        <div class="form-group col-md-2 col-xs-12">

                                                <label class="control-label">Data fim</label>
                                                <input type="text" class="form-control input-sm" name="data_fim<?php echo $i; ?>" id="data_fim<?php echo $i; ?>" placeholder="00/00/0000" autocomplete="off" value="" />

                                        </div>

                                        <div class="form-group col-md-3 col-xs-12">

                                                <label class="control-label">Tempo médio da consulta</label>
                                                <input type="text" class="form-control input-sm" name="tempo_medio<?php echo $i; ?>" id="tempo_medio<?php echo $i; ?>" value="{{ $agenda->tempo_medio }}" />

                                        </div> 
                                        
                                        
                            <?php }
                            
                            ?>   

                        </div>
                        <!-- FIM LINHA -->

                        <!-- INICIO LINHA -->   
                        <div class="row">

                            <div class="col-md-12 col-xs-12">

                                <div class='calendario' name="calendario<?php echo $i; ?>" id="calendario<?php echo $i; ?>">
                                
                                    <div class="table-responsive">
                                        <table style="width: 100%;">
                                            <thead >
                                                <tr>
                                                    <th style="width:5%"><i class="glyphicon glyphicon-time"></i></th>
                                                    <th style="width:13.571%">DOM</th>
                                                    <th style="width:13.571%">SEG</th>
                                                    <th style="width:13.571%">TER</th>
                                                    <th style="width:13.571%">QUA</th>
                                                    <th style="width:13.571%">QUI</th>
                                                    <th style="width:13.571%">SEX</th>
                                                    <th style="width:13.571%">SÁB</th>
                                                </tr>        
                                            </thead>
                                            
                                            <tbody>
                                                <tr class="bloco-manha">
                                                    <td class="manha">M<br/>A<br/>N<br/>H<br/>Ã</td>
                                                    
                                                    <!-- MANHÃ DOMINGO -->
                                                        <td class="domingo manha fechada">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="domingo_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 1 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_domingo_manha = 1.1;  // Bloquear domingo / manhã
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                
                                                                                    <?php foreach($especialidades_horarios_agendas as $especialidade_horario_agenda){
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            echo $especialidade_horario_agenda->nome;
                                                                                    ?>      
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="text" name="cod_especialidade_editar<?php echo $i; ?>" id="cod_especialidade_editar<?php echo $i; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Idade Minima --
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i; ?>" id="idade_minima_editar<?php echo $i; ?>"" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i; ?>"" id="idade_maxima_editar<?php echo $i; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                    <?php        
                                                                                           
                                                                                        }
                                                                                        
                                                                                    }?>
                                                                                
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden" name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="text" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="text" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar" id="limite_atendimento_editar" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    <!-- Permite encaixe -->
                                                                                    <input type="text" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden" name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="agenda_horario_editar<?php echo $i; ?>" id="agenda_horario_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha<?php echo $i; ?>" id="horario_distribuicao_senha<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                      <!-- Tipo valor -->
                                                                                      <input type="hidden" name="" id="" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">
                                                                                      
                                                                                      <!-- Valor Tipo Valor -->
                                                                                      <input type="hidden" name="" id="" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                    endforeach;   
                                                                                    ?>    
                                                                                    
                                                                                      
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden" name="" id="" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden" name="" id="" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    endforeach;    
                                                                                    ?>
                                                                                      
                                                                                </div>
                                                                        <?php
                                                                                
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM DOMINGO -->    
                                                        
                                                    <!-- MANHÃ SEGUNDA -->
                                                        <td class="segunda manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="segunda_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 2 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_segunda_manha = 2.1;  // Bloquear segunda / manhã    
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden" name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden" name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden" name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden" name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden" name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden" name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM SEGUNDA -->
                                                        
                                                    <!-- MANHÃ TERÇA -->
                                                        <td class="terca manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="terca_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 3 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_terca_manha = 3.1;  // Bloquear terça / manhã 
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM TERÇA -->
                                                    
                                                    
<!--------------------------------------------------------------------------------------------------------------------------- -->                                            
                                                    
                                                    
                                                    <!-- MANHÃ QUARTA -->
                                                        <td class="quarta manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="quarta_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 4 && $agenda_horario->periodo == 'manhã'){
                                                                                
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_quarta_manha = 4.1;  // Bloquear quarta / manhã 
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM QUARTA -->


                                                    
<!-- ------------------------------------------------------------------------------------------------------------------->



                                                    <!-- MANHÃ QUINTA -->
                                                        <td class="quinta manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="quinta_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 5 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_quinta_manha = 5.1;  // Bloquear quinta / manhã 
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM QUINTA -->
                                                    
                                                    
                                                    
<!-- ---------------------------------------------------------------------------------------------------------------- -->                                                    
                                                    
                                                    
                                                    
                                                    <!-- MANHÃ SEXTA -->
                                                        <td class="sexta manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="sexta_manha" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 6 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_sexta_manha = 6.1;  // Bloquear sexta / manhã
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FINHA SEXTA    
                                                    
                                                    
<!-- ---------------------------------------------------------------------------------------------------------------- -->                                                    
                                                    
                                                    
                                                    <!-- MANHÃ SÁBADO -->
                                                        <td class="sabado manha aberta btn_calendario<?php echo $i; ?>">
                                                            <input type="hidden" name="dia_semana" id="dia_semana" value="sabado_manha" />
                                                            <?php 
                                                               // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 7 && $agenda_horario->periodo == 'manhã' && $agenda_horario->status == 1){
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_sabado_manha = 7.1;  // Bloquear sabado / manhã
                                                                                $ordem = 1; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                    <!-- FIM SÁBADO -->    
                                                </tr>
                                                
                                                
<!-- FIM BLOCO MANHÃ --------------------------------------------------------------------------------------------- -->


<!-- INICIO BLOCO TARDE ------------------------------------------------------------------------------------------------- -->                                                
                                                
                                                
                                                <tr class="bloco-tarde">
                                                    <td class="tarde">T<br/>A<br/>R<br/>D<br/>E</td>
                                                        
                                                        <!-- TARDE DOMINGO -->
                                                        <td class="domingo tarde fechada">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="domingo_tarde" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 1 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
//                                                                               
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_domingo_tarde = 1.2;  // Bloquear domingo / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM DOMINGO -->
                                                        
                                                        
<!-- ------------------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        <!-- TARDE SEGUNDA -->
                                                        <td class="segunda tarde aberta btn_calendario<?php echo $i; ?>">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="segunda_tarde" />
                                                            <?php 
                                                               // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 2 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
                                                                                 
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_segunda_tarde = 2.2;  // Bloquear segunda / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM SEGUNDA -->
                                                        
                                                        
<!-- ---------------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        <!-- TARDE TERÇA -->
                                                        <td class="terca tarde aberta btn_calendario<?php echo $i; ?>">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="terca_tarde" />
                                                            <?php 
                                                                
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 3 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
                                                                                 
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_terca_tarde = 3.2;  // Bloquear terca / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM TERÇA -->
                                                        
                                                        
<!-- -------------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        <!-- TARDE QUARTA -->
                                                        <td class="quarta tarde aberta btn_calendario<?php echo $i; ?>">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="quarta_tarde" />
                                                            <?php 
                                                                 // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 4 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
                                                                                 
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_quarta_tarde = 4.2;  // Bloquear quarta / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM QUARTA -->
                                                        
                                                        
<!-- --------------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        
                                                        <!-- TARDE QUINTA -->
                                                        <td class="quinta tarde aberta btn_calendario<?php echo $i; ?>">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="quinta_tarde" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 5 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
//                                                                               
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_quinta_tarde = 5.2;  // Bloquear quinta / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM QUINTA -->
                                                        
                                                        
<!-- --------------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        <!-- TARDE SEXTA -->
                                                        <td class="sexta tarde aberta btn_calendario<?php echo $i; ?>">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="sexta_tarde" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 6 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
                                                                                    
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_sexta_tarde = 6.2;  // Bloquear sexta / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                     <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM SEXTA -->
                                                        
                                                        
<!-- ---------------------------------------------------------------------------------------------------------- -->                                                        
                                                        
                                                        
                                                        <!-- TARDE SABADO -->
                                                        <td class="sabado tarde fechada">
                                                           <input type="hidden" name="dia_semana" id="dia_semana" value="sabado_tarde" />
                                                            <?php 
                                                                // Rodo agenda de cada unidade
                                                                foreach($agendas as $agenda):
                                                                    
                                                                    // Se agenda pertence a unidade 
                                                                    if($agenda->cod_unidade == $u->cod_unidade){
                                                                       
                                                                        // Rodo todos os dias da semana para verificar qual tem evento
                                                                        foreach($agenda->horarios_agendas as $agenda_horario):
                                                                            
                                                                            
                                                                            if($agenda_horario->dia == 7 && $agenda_horario->periodo == 'tarde' && $agenda_horario->status == 1){
                                                                                
                                                                                // Bloquear o dia nas outras unidades, o bloqueio está sendo feito no javascript
                                                                                $boquear_dia_sabado_tarde = 7.2;  // Bloquear sabado / tarde
                                                                                $ordem = 2; // manhã
                                                                                
                                                                                ?>
                                                                                <!-- 
                                                                                    Para gerar um identificador único para poder capturar os dados para alterar usei os seguintes variaveis
                                                                                    $i, Contador
                                                                                    $u->cod_unidade, Codigo da únidade
                                                                                    $agenda_horario->dia, Dia da semana (1 = Domingo; 2 = Segunda; 3 = Terça; 4 = Quarta; 5 = Quinta; 6 = Sexta)
                                                                                    $ordem, 1 (manhã)
                                                                                -->
                                                                                     
                                                                                
                                                                                
                                                                                <div id="<?php echo $i."".$u->cod_unidade."".$agenda_horario->dia."".$ordem; ?>" class='caixa-evento'>
                                                                                    
                                                                              <?php 
                                                                              
                                                                                    $e = 0;     
                                                                                        
                                                                              
                                                                                    foreach($especialidades_horarios_agendas as $especialidade_horario_agenda):
                                                                                        
                                                                                        if($especialidade_horario_agenda->cod_horario_agenda == $agenda_horario->cod_horario_agenda){
                                                                                            
                                                                                            
                                                                                            echo $especialidade_horario_agenda->nome. "<br/>";
                                                                                            
                                                                                            
                                                                                    ?>     
                                                                                    
                                                                                    
                                                                                            <!-- Cod Especialidade -->
                                                                                            <input type="hidden" name="cod_especialidade_editar<?php echo $i."".$e; ?>" id="cod_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->cod_especialidade; ?>">
                                                                                            
                                                                                            <!-- Nome Especialidade -->
                                                                                            <input type="hidden" name="nome_especialidade_editar<?php echo $i."".$e; ?>" id="nome_especialidade_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->nome; ?>">
                                                                                            
                                                                                            <!-- Idade Minima -->
                                                                                            <input type="hidden" name="idade_minima_editar<?php echo $i."".$e; ?>" id="idade_minima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_minima_especialidades_horarios; ?>">
                                                                                            
                                                                                            <!-- Idade máxima -->
                                                                                            <input type="hidden" name="idade_maxima_editar<?php echo $i."".$e; ?>" id="idade_maxima_editar<?php echo $i."".$e; ?>" value="<?php echo $especialidade_horario_agenda->idade_maxima_especialidades_horarios; ?>">
                                                                                            
                                                                                            
                                                                                            
                                                                                    <?php 
                                                                                    
                                                                                    
                                                                                            $e = $e + 1;
                                                                                           
                                                                                        }
                                                                                        
                                                                                      
                                                                                        
                                                                                    endforeach;
                                                                                    
                                                                                    $total_especialidade = $e;    
                                                                                    
                                                                                    
                                                                                    ?>
                                                                                    
                                                                                            
                                                                                        
                                                                                    <br/>
                                                                                    Entrada: <?php echo substr($agenda_horario->horario_entrada, 0, -3); ?>
                                                                                    <br/>
                                                                                    Saída: <?php echo substr($agenda_horario->horario_saida, 0, -3); ?>
                                                                                    <br/>
                                                                                    
                                                                                    <?php
                                                                                    if($agenda_horario->horario_distribuicao_senha === "00:00:00"){
                                                                                        echo "<br/>Agendamento";
                                                                                    }else{
                                                                                        echo"<br/>Distribuir senhas às: ". substr($agenda_horario->horario_distribuicao_senha, 0, -3);
                                                                                    }
                                                                                    ?>
                                                                                
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_especialidade_editar<?php echo $i; ?>" id="total_especialidade_editar<?php echo $i; ?>" value="<?php echo $total_especialidade; ?>" />
                                                                                    
                                                                                
                                                                                    <!-- cod_unidade -->
                                                                                    <input type="hidden" name="cod_unidade_editar<?php echo $i; ?>" id="cod_unidade_editar<?php echo $i; ?>" value="<?php echo $agenda->cod_unidade; ?>">
                                                                                    
                                                                                    <!-- ordem usado na geracao de codigo unico para caixa_de_evento-->
                                                                                    <input type="hidden" name="ordem_editar<?php echo $i; ?>" id="ordem_editar<?php echo $i; ?>" value="<?php echo $ordem; ?>">
                                                                                    
                                                                                    <!-- Dia da semana -->
                                                                                    <input type="hidden" name="dia_semana_editar<?php echo $i; ?>" id="dia_semana_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->dia; ?>">
                                                                                
                                                                                
                                                                                    <!-- nome_unidade -->
                                                                                    <input type="hidden"  name="nome_unidade_editar<?php echo $i; ?>" id="nome_unidade_editar<?php echo $i; ?>" value="<?php echo $u->nome_unidade; ?>">
                                                                                
                                                                                
                                                                                    <!-- TABELA HORARIOS_AGENDAS ---------------------------------------------------------------------------- -->

                                                                                    <!-- cod_horario_agenda -->
                                                                                    <input type="hidden" name="cod_horario_agenda_editar<?php echo $i; ?>" id="cod_horario_agenda_editar<?php echo $i; ?>" value="<?php echo Crypt::encrypt($agenda_horario->cod_horario_agenda); ?>">
                                                                                
                                                                                
                                                                                    <!-- horario entrada -->
                                                                                    <input type="hidden" name="horario_entrada_editar<?php echo $i; ?>" id="horario_entrada_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_entrada; ?>">
                                                                                
                                                                                
                                                                                    <!-- horario saida -->
                                                                                    <input type="hidden" name="horario_saida_editar<?php echo $i; ?>" id="horario_saida_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_saida; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Limite de atendimento -->
                                                                                    <input type="hidden" name="limite_atendimento_editar<?php echo $i; ?>" id="limite_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->limite_atendimentos; ?>">
                                                                                
                                                                                    
                                                                                    <!-- Tipo atendimento -->
                                                                                    <input type="hidden" name="tipo_atendimento_editar<?php echo $i; ?>" id="tipo_atendimento_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->tipo_atendimento; ?>">
                                                                                
                                                                                     <!-- Permite encaixe -->
                                                                                    <input type="hidden" name="btn_permite_encaixe_editar<?php echo $i; ?>" id="btn_permite_encaixe_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->permite_encaixe; ?>">
                                                                                
                                                                                
                                                                                    <!-- Qtd de encaixe -->
                                                                                    <input type="hidden"  name="quantidade_encaixes_editar<?php echo $i; ?>" id="quantidade_encaixes_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->quantidade_encaixes; ?>">
                                                                                
                                                                                
                                                                                    <!-- Distribuir a senha -->
                                                                                    <input type="hidden" name="horario_distribuicao_senha_editar<?php echo $i; ?>" id="horario_distribuicao_senha_editar<?php echo $i; ?>" value="<?php echo $agenda_horario->horario_distribuicao_senha; ?>">
                                                                                    
                                                                                    
                                                                                
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTE_TIPO_VALOR ------------------------------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_reajustes_tipo_valor = $agenda_horario->historicos_de_reajustes_tipo_valor->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                
                                                                                    $hrt = 0; 
                                                                                    
                                                                                    foreach($historicos_reajustes_tipo_valor as $historico_reajuste_tipo_valor):
                                                                                        
                                                                                    ?> 
                                                                                    
                                                                                        <!-- Tipo valor -->
                                                                                        <input type="hidden"  name="tipo_valor_editar<?php echo $i."".$hrt; ?>" id="tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->tipo_valor; ?>">

                                                                                        <!-- Valor Tipo Valor -->
                                                                                        <input type="hidden"  name="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" id="valor_tipo_valor_editar<?php echo $i."".$hrt; ?>" value="<?php echo $historico_reajuste_tipo_valor->valor_tipo_valor; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrt = $hrt + 1;
                                                                                    
                                                                                    endforeach;
                                                                                    
                                                                                    $total_historicos_reajustes_tipo_valor = $hrt;
                                                                                    
                                                                                    ?>    
                                                                                    
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" id="total_historicos_reajustes_tipo_valor<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_tipo_valor; ?>" />      
                                                                                    
                                                                                        
                                                                                      
                                                                                    <!-- TABELA HISTORICOS_DE_REAJUSTES_PACIENTES_EXCEDENTES -------------------------------- -->
                                                                      
                                                                                    <?php 

                                                                                    $historicos_de_reajustes_pacientes_excedentes = $agenda_horario->historicos_de_reajustes_pacientes_excedentes->where('cod_horario_agenda', $agenda_horario->cod_horario_agenda);
                                                                                    
                                                                                    $hrp = 0; 
                                                                                    
                                                                                    foreach($historicos_de_reajustes_pacientes_excedentes as $historico_reajuste_paciente_excedente):
                                                                                        
                                                                                    ?>      
                                                                                      <!-- Paciente Excedentes -->
                                                                                      <input type="hidden"  name="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="btn_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->pacientes_excedentes; ?>">
                                                                                      
                                                                                      <!-- Valor Pacientes -->
                                                                                      <input type="hidden"  name="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" id="valor_pacientes_excedentes_editar<?php echo $i."".$hrp; ?>" value="<?php echo $historico_reajuste_paciente_excedente->valor_pacientes_excedentes; ?>">
                                                                               
                                                                                    <?php
                                                                                    
                                                                                        $hrp = $hrp + 1;
                                                                                    
                                                                                    endforeach;  
                                                                                    
                                                                                    $total_historicos_reajustes_pacientes_excedentes = $hrp
                                                                                    
                                                                                    ?>
                                                                                      
                                                                                    <!-- total_especialidades -->
                                                                                    <input type="hidden" name="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" id="total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>" value="<?php echo $total_historicos_reajustes_pacientes_excedentes; ?>" />      
                                                                                      
                                                                                </div>    
                                                                        <?php
                                                                        
                                                                            }
                                                                            
                                                                        endforeach;
                                                                    }
                                                                    
                                                                endforeach;
                                                            ?>
                                                        </td>
                                                        <!-- FIM TARDE -->
                                                </tr>
                                                
                                            </tbody>
                                            
                                        </table>
                                        
                                    </div>
                                
                                </div>
                                
                            </div>

                        </div>
                        <!-- FIM LINHA -->
                </div>         
    
        <?php
                    $i = $i+1;
                    endforeach;   
                } 
        ?>
                </div>
                <!-- FIM LINHA -->
            </div>     
        </div>
    </div>

</div>


<!-- INICIO JANELA MODAL PARA CADASTRAR UM EVENTO -->
<div class="modal fade" id="modal_cadastrar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <div class="modal-header">
                
                <!-- INICIO LINHA -->
                
                <div class="row">
                    
                    <!-- Espaço para exibição de erros de validação -->
                    <div id="avisoValidacao">
                        <div class="col-xs-12">
                            <div class="alert alert-danger msg_erro" style="display: none;"></div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- FIM LINHA -->
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h4 class="modal-title"> <i class="glyphicon glyphicon-time"></i> Horários | <small><input type="text" readonly="readonly" id="dia_semana" style="border: 0;"></small></h4>
                    </div>    
            
                </div>    
            
                
                <!-- FIM LINHA -->
            </div>
            
            <!-- MODAL -->
            <div class="modal-body">
                
                    <input type="hidden" readonly="readonly" class="form-control" id="painel" name="painel" value="painel">
                    <input type="hidden" readonly="readonly" class="form-control" id="nome_medico" name="nome_medico" value="nome_medico">
                    <input type="hidden" readonly="readonly" class="form-control" id="medico" name="medico" value="medico">
                    <input type="hidden" readonly="readonly" class="form-control" id="unidade" name="unidade" value="unidade">
                    <input type="hidden" readonly="readonly" class="form-control" id="cod_agenda" name="cod_agenda" value="cod_agenda">
                    <input type="hidden" readonly="readonly" class="form-control" id="data_inicio" name="data_inicio" value="data_inicio">
                    <input type="hidden" readonly="readonly" class="form-control" id="data_fim" name="data_fim" value="data_fim">
                    <input type="hidden" readonly="readonly" class="form-control" id="tempo_medio" name="tempo_medio" value="tempo_medio">
                    <input type="hidden" readonly="readonly" class="form-control" id="num_dia_semana" name="num_dia_semana" value="num_dia_semana">
                    
                    <!-- inicio linha -->
                    <div class="row">
                         
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">

                            <label for="Unidade">Unidade <span class="required-red"> *</span></label> 
                            <input type="text" readonly="readonly" class="form-control" id="nome_unidade" name="nome_unidade" value="nome_unidade" />

                        </div>  
                        
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">

                            <label for="Turno" >Turno <span class="required-red"> *</span></label>

                            <select class="form-control" name="turno" id="turno" required="required" disabled="disabled" readonly="readonly">
                                <option value="1">Manhã</option>
                                <option value="2">Tarde</option>
                            </select>
                                    
                        </div>
                 
                    </div>
                    <!-- Fim da linha -->    
                        
                    <!-- inicio linha -->
                    <div class="row">
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="horario inicio">Hora Início <span class="required-red"> *</span></label>
                            <input type="text" id="horario_inicio" name="horario_inicio" class="form-control" placeholder="00:00" autocomplete="off" value="{{ old('horario_inicio') }}" />
                            
                        </div> 
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="horario fim">Hora Fim <span class="required-red"> *</span></label>
                            <input type="text" id="horario_fim" name="horario_fim" class="form-control" placeholder="00:00" autocomplete="off" value="{{ old('horario_fim') }}" />
                            
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            
                            <label for="consultorio">Consultório <span class="required-red" id="obrigatorio_op"> *</span></label>
                            <select class="form-control" name="cod_consultorio" id="cod_consultorio" required="required">
                                
                                   <!-- option inserido dinamicamente via javascript -->   
                                    
                             </select>
                            
                        </div>
           
                    </div>
                    <!-- Fim da linha -->
                    
                    <!-- inicio linha -->
                    <div class="row">

                       <div class="form-group col-lg-12 col-md-12 col-xs-12">
                           
                            <label for="Especialidade" class="control-label">Especialidade <span class="required-red"> *</span></label>
                            
                            <select class="form-control select2_multiple" name="especialidades[]" id="especialidades" style="width: 100%;" multiple required="required">
                               
                            <!-- option inserido dinamicamente via javascript -->
                                        
                            </select>
                         
                       </div> 

                    </div>
                    <!-- Fim da linha --> 
                    
                    <!-- inicio linha -->
                    <div class="row">    
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="Idade mínima">Idade mínima </label>
                            <input type="text" class="form-control" id="idade_minima" name="idade_minima" />
                            
                        </div>
                       
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="Idade máxima">Idade máxima </label>
                            <input type="text" class="form-control" id="idade_maxima" name="idade_maxima" />
                            
                        </div> 
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            
                            <label for="por plantão">Por Plantão </label> <input type="radio" name="btn_por_plantao_por_paciente" id="btn_por_plantao_por_paciente" value="1" />
                            <label for="por paciente">ou Paciente </label></label> <input type="radio" name="btn_por_plantao_por_paciente" id="btn_por_plantao_por_paciente" value="2" /> <span class="required-red"> *</span> 
                            <input type="text" class="form-control" id="por_plantao_por_paciente" name="por_plantao_por_paciente"  placeholder="R$ 0,00" />
                            
                        </div>
                        
                    </div>
                    <!-- Fim da linha -->
                    
                    <!-- inicio linha -->
                    <div class="row">    
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="limite de atendimento">Limite de Atendimento <span class="required-red"> *</span> </label>
                            <input type="number" class="form-control" id="limite_atendimento" name="limite_atendimento" min="0" max="100" />
                            
                        </div> 
                        
                         <div class="form-group col-lg-3 col-md-3 col-xs-12">

                             <label for="Atendimento" class="control-label">Atendimento <span class="required-red"> *</span></label>

                             <select class="form-control" name="atendimento" id="atendimento" required="required">

                                <option value="1">Ordem de chegada</option>
                                <option value="2">Agendamento</option>

                             </select>

                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            
                            <label for="Distribuir senha">Distribuir senhas às? <span class="required-red" id="obrigatorio_op"> *</span></label>
                            <input type="text" class="form-control" id="horario_destribuir_senha" name="horario_destribuicao_senha" />
                            
                        </div>
                        
                    </div>
                    <!-- Fim da linha -->
                    
                    <!-- inicio linha -->
                    <div class="row">

                        <div class="form-group col-lg-6 col-md-6 col-xs-6">
                            
                            <label for="permite paciente excedentes">Permite Excedentes ?</label>  <input type="checkbox" id="btn_paciente_excedente" name="btn_paciente_excedente" value="1" />
                            <input type="text" class="form-control" disabled="disabled" id="excedentes" name="excedentes"  placeholder="R$ 0,00" />
                            
                        </div>
                        
                   
                        <div class="form-group col-lg-6 col-md-6 col-xs-6">
                            
                            <label for="permite encaixes">Permite Encaixes ? </label> <input type="checkbox" id="btn_permite_encaixe" name="btn_permite_encaixe" value="1" />
                            <input type="number" class="form-control" id="encaixe" name="encaixe" disabled="disabled" min="0" max="100"  />
          
                        </div>
    
                    </div>
                    <!-- fim linha -->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default close_modal" data-dismiss="modal">Fechar</button>
                        <button type="button" id="btn_salvar" class="btn btn-ms btn-success"> <i class="far fa-save"></i> Salvar </button>
                    </div>
                    
                    <div id="teste"></div>
                 
	    </div> 
            
        </div>
    </div>
</div>
<!-- FIM JANELA MODAL CADASTRAR EVENTO -->


<!-- INICIO JANELA MODAL PARA EDITAR UM EVENTO -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
            <div class="modal-header">
                
                <!-- INICIO LINHA -->
                
                <div class="row">
                    
                    <!-- Espaço para exibição de erros de validação -->
                    <div id="avisoValidacao">
                        <div class="col-xs-12">
                            <div class="alert alert-danger msg_erro" style="display: none;"></div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- FIM LINHA -->
                
                <!-- INICIO LINHA -->
                
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h4 class="modal-title"> <i class="glyphicon glyphicon-time"></i> Horários | <small><input type="text" readonly="readonly" id="dia_semana_dinamico" style="border: 0;"></small></h4>
                    </div>    
            
                </div>    
                           
                <!-- FIM LINHA -->
            </div>
            
            <!-- MODAL -->
            <div class="modal-body">
                    
                    <!-- Cod horario Agenda -->
                    <input type="hidden" readonly="readonly" class="form-control" id="cod_horario_agenda_dinamico" name="cod_horario_agenda_dinamico" value="cod_agenda_dinamico">
     
                    <!-- inicio linha -->
                    <div class="row">
                         
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">

                            <label for="Unidade">Unidade <span class="required-red"> *</span></label> 
                            <input type="text" readonly="readonly" class="form-control" id="nome_unidade_dinamico" name="nome_unidade_dinamico" value="nome_unidade_dinamico" />

                        </div> 
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">

                            <label for="Turno" >Turno <span class="required-red"> *</span></label>

                            <select class="form-control" name="turno_dinamico" id="turno_dinamico" required="required" disabled="disabled" readonly="readonly">
                                <option value="1">Manhã</option>
                                <option value="2">Tarde</option>
                            </select>
                                    
                        </div>
                       
                    </div>
                    <!-- Fim da linha -->    
                        
                    <!-- inicio linha -->
                    <div class="row">
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="horario inicio">Hora Início <span class="required-red"> *</span></label>
                            <input type="text" id="horario_inicio_dinamico" name="horario_inicio_dinamico" class="form-control" placeholder="00:00" autocomplete="off" value="horario_inicio_dinamico" />
                            
                        </div> 
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="horario fim">Hora Fim <span class="required-red"> *</span></label>
                            <input type="text" id="horario_fim_dinamico" name="horario_fim_dinamico" class="form-control" placeholder="00:00" autocomplete="off" value="horario_fim_dinamico" />
                            
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            
                            <label for="consultorio">Consultório <span class="required-red" id="obrigatorio_op"> *</span></label>
                            <select class="form-control" name="cod_consultorio_dinamico" id="cod_consultorio_dinamico" required="required">

                                <!-- option inserido dinamicamente via javascript -->  

                             </select>
                            
                        </div>
           
                    </div>
                    <!-- Fim da linha -->
                    
                    <!-- inicio linha -->
                    <div class="row">

                       <div class="form-group col-lg-12 col-md-12 col-xs-12">
                           
                            <label for="Especialidade" class="control-label">Especialidade <span class="required-red"> *</span></label>
                            
                            <select class="form-control select2_multiple" name="especialidades_dinamico[]" id="especialidades_dinamico" style="width: 100%;" multiple required="required">
                               
                            <?php
                                foreach($especialidades as $e):
                            ?>
                                <option value="<?php echo $e->cod_especialidade; ?>"><?php echo $e->nome; ?></option>
                                
                                
                            <?php 
                                endforeach;
                            ?>
                                        
                            </select>
                         
                       </div> 

                    </div>
                    <!-- Fim da linha --> 
                    
                    <!-- inicio linha -->
                    <div class="row">    
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="Idade mínima">Idade mínima </label>
                            <input type="text" class="form-control" id="idade_minima_dinamico" name="idade_minima_dinamico" value="idade_minima_dinamico" />
                            
                        </div>
                       
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="Idade máxima">Idade máxima </label>
                            <input type="text" class="form-control" id="idade_maxima_dinamico" name="idade_maxima_dinamico" value="idade_minima_dinamico" />
                            
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12" id="tipo_valor_editar">
                            
                            <label for="por plantão">Por Plantão </label> <input type="radio" name="btn_por_plantao_por_paciente_dinamico" id="btn_por_plantao_por_paciente_dinamico" value="1" />
                            <label for="por paciente">ou Paciente </label></label> <input type="radio" name="btn_por_plantao_por_paciente_dinamico" id="btn_por_plantao_por_paciente_dinamico" value="2" /> <span class="required-red"> *</span> 
                            <input type="text" class="form-control" id="por_plantao_por_paciente_dinamico" name="por_plantao_por_paciente_dinamico"  placeholder="R$ 0,00" value="por_plantao_por_paciente_dinamico" />
                            
                        </div>
                        
                    </div>
                    <!-- Fim da linha -->
                    
                    <!-- inicio linha -->
                    <div class="row">    
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12">
                            
                            <label for="limite de atendimento">Limite de Atendimento <span class="required-red"> *</span> </label>
                            <input type="number" class="form-control" id="limite_atendimento_dinamico" name="limite_atendimento_dinamico" min="0" max="100" value="limite_atendimento_dinamico" />
                            
                        </div> 
                        
                        <div class="form-group col-lg-3 col-md-3 col-xs-12" id="caixa_atendimento_editar">

                             <label for="Atendimento" class="control-label">Atendimento <span class="required-red"> *</span></label>

                             <select class="form-control" name="atendimento_dinamico" id="atendimento_dinamico" required="required">

                                <option value="1">Ordem de chegada</option>
                                <option value="2">Agendamento</option>

                             </select>

                        </div>
                        
                        <div class="form-group col-lg-6 col-md-6 col-xs-12">
                            
                            <label for="Distribuir senha">Distribuir senhas às? <span class="required-red" id="obrigatorio_op"> *</span></label>
                            <input type="text" class="form-control" id="horario_distribuir_senha_dinamico" name="horario_distribuir_senha_dinamico" value="horario_distribuir_senha_dinamico" />
                            
                        </div>
                        
                    </div>
                    <!-- Fim da linha -->
                    
                    
                    <!-- inicio linha -->
                    <div class="row">

                        <div class="form-group col-lg-6 col-md-6 col-xs-6" id="caixa_btn_paciente_excedente">
                            
                            <label for="permite paciente excedentes">Permite Excedentes ?</label>  <input type="checkbox" id="btn_paciente_excedente_dinamico" name="btn_paciente_excedente_dinamico" value="1" />
                            <input type="text" class="form-control" disabled="disabled" id="excedentes_dinamico" name="excedentes_dinamico"  placeholder="R$ 0,00" />
                            
                        </div>
                        
                   
                        <div class="form-group col-lg-6 col-md-6 col-xs-6" id="caixa_btn_permite_encaixe">
                            
                            <label for="permite encaixes">Permite Encaixes ? </label> <input type="checkbox" id="btn_permite_encaixe_dinamico" name="btn_permite_encaixe" value="1" />
                            <input type="number" class="form-control" id="qtd_encaixe_dinamico" name="qtd_encaixe_dinamico" disabled="disabled" min="0" max="100"  value="qtd_encaixe_dinamico" />
                            
                        </div>
    
                    </div>
                    <!-- fim linha -->
              
                    
                    <!-- inicio linha -->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default close_modal" data-dismiss="modal"> Fechar </button>
                        <button type="button" id="btn_inativar_dinamico"  class="btn btn-sm btn-danger" ><i class="fas fa-power-off"></i> Inativar </button>
                        <button type="button" id="btn_salvar_dinamico" class="btn btn-sm btn-success"><i class="far fa-save"></i> Salvar </button>
                    </div>
                    
                    <div id="teste"></div>
                 
	    </div> 
            
        </div>
    </div>
</div>
<!-- FIM JANELA MODAL EDITAR EVENTO -->

@stop

@section('includes_no_body')
  
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>   
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script> 
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskMoney.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/js/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar-3.9/locale/pt-br.js') }}"></script>
<script src="{{ asset('plugins/timepicker/picker.js') }}"></script>
<script src="{{ asset('plugins/timepicker/picker.date.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script type="text/javascript" src="<?php echo asset('js/limpar_campos_dentro_div.js'); ?>"></script>
<script type="text/javascript">



$("#especialidades, #especialidades_dinamico").select2({
  placeholder: "Selecione",
  allowClear: true
});


$(document).ready(function() {

$(".close_modal").on('click', function(){
    window.location.reload();
});

/* Habilitando os campos disabled que foram setados --------------------------*/
$("#btn_paciente_excedente, #btn_paciente_excedente_dinamico").on('click', function(){
  
    document.getElementById('excedentes').value = '';
    document.getElementById('excedentes_dinamico').value = '';
   
    if( $("#btn_paciente_excedente, #btn_paciente_excedente_dinamico").is(":checked") ){
        $("#excedentes, #excedentes_dinamico").prop('disabled' ,false);
        $("#excedentes, #excedentes_dinamico").focus();
    }else{
        $("#excedentes, #excedentes_dinamico").prop('disabled' ,true);    
    }
        
});

//$("#btn_paciente_excedente_editar").on('click', function(){
//   
//   
//    if( $("#btn_paciente_excedente_editar").is(":checked") ){
//       
//        // Coloco o valor salvo na variavel no campo input text
//        $("#excedentes_editar").prop('disabled' ,false); 
//        $("#excedentes_editar").focus();
//    }else{
//        
//        $("#excedentes_editar").prop('disabled' ,true); 
//        
//    }
//        
//});

$("#btn_permite_encaixe, #btn_permite_encaixe_dinamico").on('click', function(){
   
    document.getElementById('encaixe').value = '';
    document.getElementById('qtd_encaixe_dinamico').value = '';
   
    if( $("#btn_permite_encaixe, #btn_permite_encaixe_dinamico").is(":checked") ){
        $("#encaixe, #qtd_encaixe_dinamico").prop('disabled' ,false);
        $("#encaixe, #qtd_encaixe_dinamico").focus();
    }else{
        $("#encaixe, #qtd_encaixe_dinamico").prop('disabled' ,true); 
    }
        
});

//$("#btn_permite_encaixe_editar").on('click', function(){
//   
//   
//    if( $("#btn_permite_encaixe_editar").is(":checked") ){
//        $("#encaixe_editar").prop('disabled' ,false);
//        $("#encaixe_editar").focus();
//    }else{
//        $("#encaixe_editar").prop('disabled' ,true); 
//    }
//        
//});


$("#atendimento, #atendimento_dinamico").on('change', function(){
    
    document.getElementById('horario_destribuir_senha').value = '';
    document.getElementById('horario_distribuir_senha_dinamico').value = '';
    
    op = $("#atendimento").val();
    op_dinamico = $("#atendimento_dinamico").val();

    if(op == 1){
        
        
        $("#obrigatorio_op").show();
        $("#horario_destribuir_senha").prop('disabled' ,false);
        $("#horario_destribuir_senha").focus(); 
        
    
    }else if(op == 2){
       
       
        
        $("#obrigatorio_op").hide(); 
        $("#horario_destribuir_senha").prop('disabled' ,true); 
        
        
    }
    
    
    if(op_dinamico == 1){
        
  
        $("#obrigatorio_op").show();
        $("#horario_distribuir_senha_dinamico").prop('disabled' ,false);
        $("#horario_distribuir_senha_dinamico").focus(); 
        
    
    }else if(op_dinamico == 2){
 
        
        $("#obrigatorio_op").hide(); 
        $("#horario_distribuir_senha_dinamico").prop('disabled' ,true); 
        
        
    }
        
});


<?php
    $i =0;
    if(count($unidades) > 0){ 

        foreach($unidades as $u):
?>
            
            /* REMOVIDO * /
                Bloquear de dias da semana
                Caso alguma unidade já tenha criado um evento automaticamente não 
                poderá criar outro evento no mesmo dia e turno em outra unidade
            */ 
            
            
            // DEFININDO MASCARAS DINAMICAMENTE //
            
            // Campo Data início
            $("#data_inicio<?php echo $i; ?>").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                startDate: '0d',
                language: 'pt-BR'   
            });

            // Campo Data Fim
            $("#data_fim<?php echo $i; ?>").datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                startDate: '0d',
                language: 'pt-BR'   
            });
            
            // Campo Tempo Médio
            $('#tempo_medio<?php echo $i; ?>').timepicker({
                timeFormat: 'HH',
                interval: 60,
                minTime: '10',
                maxTime: '0pm',
                defaultTime: '0',
                startTime: '00:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                showSeconds: false,
                showMeridian: false,
                minuteStep: 1
            });
            // FIM MASCARAS //
            /*==============================================================*/  
           
   
           
            // Função chamada ao clicar dentro de uma celula do calendário
            $('.btn_calendario<?php echo $i; ?>').on('click', function(){
                
                // Verificando se existe evento
                var evento = $(this).children('.caixa-evento').size();
                
                // Se evento = 0 abro o modal cadastrar; Se evento = 1 abro modal Editar
                if(evento == 0){
                   
                    // Por padrão os campos são desabilitados
                    $("#excedentes").prop('disabled' ,true);
                    $("#encaixe").prop('disabled' ,true);
                   
                    // Limpo todos os campos dentro do modal cadastrar'
                    $("#horario_inicio").val("0:00");
                    $("#horario_fim").val("0:00");
                    $("#especialidades")[0].selectedIndex = -1;
                    $("li.select2-selection__choice").remove(); // Remove a classe que usada mascara de multiplos select
                    $("#idade_minima").val("");
                    $("#idade_maxima").val("");
                    $("input[type=radio]").attr('checked', false);
                    $("#por_plantao_por_paciente").val("");
                    $("#limite_atendimento").val("");
                    $("#atendimento").val(1);
                    $("#horario_destribuir_senha").val("0:00");
                    $("input[type=checkbox]").attr('checked', false);
                    $("#excedentes").val("");
                    $("#encaixe").val("");
                    
                    
                    /*=========================================================*/
                        // Declarando as variaveis 

                        var painel =$('#painel<?php echo $i; ?>').val();; // recebe numero do calendario clicado
                        var nome_medico = $('#nome_medico<?php echo $i; ?>').val(); // recebe id do medico
                        var medico = $('#medico<?php echo $i; ?>').val(); // recebe id do medico
                        var nome_unidade = $('#nome_unidade<?php echo $i; ?>').val();  // recebe o nome da unidade
                        var unidade = $('#unidade<?php echo $i; ?>').val(); // recebe id da unidade
                        var cod_agenda = $('#cod_agenda<?php echo $i; ?>').val(); // recebe id da agenda caso já tenha um evento criado no calendario da unidade selecionada
                        var data_inicio = $('#data_inicio<?php echo $i; ?>').val(); // recebe a data inicio que o medico ira começar a trabalhar
                        var data_fim = $('#data_fim<?php echo $i; ?>').val(); // recebe a data fim que o medico ira começar a trabalhar
                        var tempo_medio = $('#tempo_medio<?php echo $i; ?>').val(); // recebe o tempo medio de cada consulta
                        var dia_semana = $(this).closest("td").find('input#dia_semana').val(); // Recebe o dia da semana do input mais proximo do click

                        // Faço um requisão ajax para saber quais as especialidades que o medico atende está vinculada a unidade 
                        $.ajax({
                            cache: false,
                            type: "POST",
                            url: "<?php echo url('admin/painel/medicos/filtro-especialidades-medico-vinculada-unidade-ajax'); ?>",
                            data: { 
                                "cod_unidade": unidade,
                                "cod_medico": medico,
                                'filtro': 'para_cadastrar'
                            },
                            beforeSend: function() { 

                                // Executa antes do envio

                            },
                            success: function(response) {

                                // Convertendo resposta para objeto javascript
                                var response = JSON.parse(response);
                             
                               
                                // Checo retorno
                                if (response.status == 'erro') {
                                    
                                  // Declaro variaveis e ganto que estão vazias
                                  var option_especialidades = "";
                                  
                                  // Recebo a variável
                                  option_especialidades = response.option_especialidades;
                                 
                                  // Limpo possiveis select option
                                  $("#modal_cadastrar select#especialidades").html("");
                                  
                                  // Incluir option dentro select especialidade no modal cadastrar
                                  $("#modal_cadastrar select#especialidades").append(option_especialidades);
                                    
                                } else if (response.status == 'sucesso') {
                                  
                                  // Declaro variaveis e garanto que estão vazias
                                  var option_especialidades = "";
                                  var option_consultorios = "";
                                  
                                  // Recebo a variável
                                  option_especialidades = response.option_especialidades;
                                  option_consultorios = response.option_consultorios;
                                 
                                  // Limpo possiveis select option
                                  $("#modal_cadastrar select#especialidades").html("");
                                  $("#modal_cadastrar select#cod_consultorio").html("");
                                  
                                  // Incluir option dentro select especialidade no modal cadastrar
                                  $("#modal_cadastrar select#especialidades").append(option_especialidades);
                                  $("#modal_cadastrar select#cod_consultorio").append(option_consultorios);
                                    
                                }

                            },
                           
                        });

                        /*===========================================================*/
                        // ** CAMPOS OBRIGATÓRIOS
                        // calendário, unidade, nome_unidade, data_inicio, dia_semana 

                        // verificando se os campos obrigatórios estão preenchidos

                        if(medico.length === 0 || nome_medico.length === 0){
                            alert("Informe o Médico"); // Este campo é preenchido pelo sistema
                            return false;
                        }
                
                        if(painel.length === 0){
                            alert("Informe o painel"); // Este campo é preenchido pelo sistema
                            return false;
                        }

                        if(unidade.length === 0 || nome_unidade.length === 0){
                            alert("Informe a unidade"); // Este campo é preenchido pelo sistema
                            return false;
                        }

                        if(dia_semana.length === 0){
                            alert("Informe o dia da semana"); // Este campo é preenchido pelo sistema
                            return false;
                        }

                        if(data_inicio.length === 0){
                            alert("Informe a Data Início"); // Este campo é preenchido pelo usuário
                            return false;
                        }

                        // FIM DA VERIFICAÇÕES DOS CAMPOS OBRIGATÓRIOS
                        /*===========================================================*/


                        //alert(dia_semana);
                        switch(dia_semana){

                            // BLOCO MANHÃ

                            case "domingo_manha":
                                dia_semana = "Domingo";
                                num_dia_semana = 1;
                                turno = 1; // manhã
                            break;

                            case "segunda_manha":
                               dia_semana = "Segunda";
                               num_dia_semana = 2;
                               turno = 1; // manhã
                            break;

                            case "terca_manha":
                                dia_semana = "Terça";
                                num_dia_semana = 3;
                                turno = 1; // manhã
                            break;

                            case "quarta_manha":
                                dia_semana = "Quarta";
                                num_dia_semana = 4;
                                turno = 1; // manhã
                            break;

                            case "quinta_manha":
                                dia_semana = "Quinta";
                                num_dia_semana = 5;
                                turno = 1; // manhã
                            break;

                            case "sexta_manha":
                                dia_semana = "Sexta";
                                num_dia_semana = 6;
                                turno = 1; // manhã
                            break;

                            case "sabado_manha":
                                dia_semana = "Sabado";
                                num_dia_semana = 7;
                                turno = 1; // manhã
                            break;


                            // BLOCO TARDE

                            case "domingo_tarde":
                                dia_semana = "Domingo";
                                num_dia_semana = 1;
                                turno = 2; // tarde
                            break;

                            case "segunda_tarde":
                                dia_semana = "Segunda";
                                num_dia_semana = 2;
                                turno = 2; // tarde
                            break;

                            case "terca_tarde":
                                dia_semana = "Terça";
                                num_dia_semana = 3;
                                turno = 2; // tarde
                            break;

                            case "quarta_tarde":
                                dia_semana = "Quarta";
                                num_dia_semana = 4;
                                turno = 2; // tarde
                            break;

                            case "quinta_tarde":
                                dia_semana = "Quinta";
                                num_dia_semana = 5;
                                turno = 2; // tarde
                            break;

                            case "sexta_tarde":
                                dia_semana = "Sexta";
                                num_dia_semana = 6;
                                turno = 2; // tarde
                            break;

                            case "sabado_tarde":
                                dia_semana = "Sabado";
                                num_dia_semana = 7;
                                turno = 2; // tarde
                            break;

                            default:
                                alert("Infome um dia da semana");
                                return false;
                            break;
                        }
                     
                        /*----------------------------------------------------*/
                        // Campos que irão popular o modal dinamicamente

                        $('#modal_cadastrar #painel').val(painel);
                        $('#modal_cadastrar #nome_medico').val(nome_medico);
                        $('#modal_cadastrar #medico').val(medico);
                        $('#modal_cadastrar #turno').val(turno);
                        $('#modal_cadastrar #cod_agenda').val(cod_agenda);
                        $('#modal_cadastrar #dia_semana').val(dia_semana);
                        $('#modal_cadastrar #num_dia_semana').val(num_dia_semana);
                        $('#modal_cadastrar #nome_unidade').val(nome_unidade);
                        $('#modal_cadastrar #unidade').val(unidade);
                        $('#modal_cadastrar #data_inicio').val(data_inicio);
                        $('#modal_cadastrar #data_fim').val(data_fim);
                        $('#modal_cadastrar #tempo_medio').val(tempo_medio);
                        $('#modal_cadastrar').modal('show');
                     
                     
                     
                     
                     
                }else if(evento == 1){
                     
                    /* CAIXA_DE_EVENTO_EDITAR */

                    // Variaveis para identificar o id da caixa de evento e assim pegar os input mais próximos 
                    var cod_unidade = $("#cod_unidade_editar<?php echo $i; ?>").val()
                    var cod_medico = $("#medico<?php echo $i; ?>").val()

                    var dia_semana = $(this).closest("td").find('input#dia_semana').val(); // Recebe o dia da semana do input mais proximo do click
                    var ordem = "";                  
                    
                    switch(dia_semana){
                        case "domingo_manha": dia_semana = 1; ordem = 1 ; dia_semna_extenso = "Domingo";break;
                        
                        case "segunda_manha": dia_semana = 2; ordem = 1; dia_semna_extenso = "Segunda"; break;
                        
                        case "terca_manha": dia_semana = 3; ordem = 1; dia_semna_extenso = "Terça"; break;
                        
                        case "quarta_manha": dia_semana = 4; ordem = 1; dia_semna_extenso = "Quarta"; break;
                        
                        case "quinta_manha": dia_semana = 5; ordem = 1; dia_semna_extenso = "Quinta"; break;
                        
                        case "sexta_manha": dia_semana = 6; ordem = 1; dia_semna_extenso = "Sexta"; break;
                        
                        case "sabado_manha": dia_semana = 7; ordem = 1; dia_semna_extenso = "Sábado"; break;
                        
                        /* FIM BLOCO MANHÃ ------------------------------------------------------------------*/
                        
                        case "domingo_tarde": dia_semana = 1; ordem = 2; dia_semna_extenso = "Domingo"; break;
                        
                        case "segunda_tarde": dia_semana = 2; ordem = 2; dia_semna_extenso = "Segunda"; break;
                        
                        case "terca_tarde": dia_semana = 3; ordem = 2; dia_semna_extenso = "Terça"; break;
                        
                        case "quarta_tarde": dia_semana = 4; ordem = 2; dia_semna_extenso = "Quarta"; break;
                        
                        case "quinta_tarde": dia_semana = 5; ordem = 2; dia_semna_extenso = "Quinta"; break;
                        
                        case "sexta_tarde": dia_semana = 6; ordem = 2; dia_semna_extenso = "Sexta"; break;
                        
                        case "sabado_tarde": dia_semana = 7; ordem = 2; dia_semna_extenso = "Sábado"; break;    
                    }
                     
                    
                    // Faço um requisão ajax para saber quais as especialidades que o medico atende está vinculada a unidade 
                    $.ajax({
                        cache: false,
                        type: "POST",
                        url: "<?php echo url('admin/painel/medicos/filtro-especialidades-medico-vinculada-unidade-ajax'); ?>",
                        data: { 
                            "cod_unidade": cod_unidade,
                            "cod_medico": cod_medico,
                            'filtro': 'para_alterar',
                            'dia_semana': dia_semana,
                            'periodo': ordem
                        },
                        beforeSend: function() { 

                            // Executa antes do envio

                        },
                        success: function(response) {

                            // Convertendo resposta para objeto javascript
                            var response = JSON.parse(response);
                           
                            // Checo retorno
                            if (response.status == 'erro') {

                              // Declaro variaveis e ganto que estão vazias
                              var option_especialidades = "";

                              // Recebo a variável
                              option_especialidades = response.option_especialidades;
                              option_consultorios = response.option_consultorios;

                              // Limpo possiveis select option
                              $("#modal_editar select#especialidades_dinamico").html("");

                              // Incluir option dentro select especialidade no modal cadastrar
                              $("#modal_editar select#especialidades_dinamico").append(option_especialidades);
                              $("#modal_editar select#cod_consultorio_dinamico").append(option_consultorios);

                            } else if (response.status == 'sucesso') {

                              // Declaro variaveis e ganto que estão vazias
                              var option_especialidades = "";

                              // Recebo a variável
                              option_especialidades = response.option_especialidades;
                                option_consultorios = response.option_consultorios;

                              // Limpo possiveis select option
                              $("#modal_editar select#especialidades_dinamico").html("");

                              // Incluir option dentro select especialidade no modal cadastrar
                              $("#modal_editar select#especialidades_dinamico").append(option_especialidades);
                              $("#modal_editar select#cod_consultorio_dinamico").append(option_consultorios);

                            }

                        },

                    });

                    
                    /*--------------------------------------------------------*/
                    // Campos que irão popular o modal editar dinamicamente
                    
                    var cod_horario_agenda_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#cod_horario_agenda_editar<?php echo $i; ?>").val();
                    //alert(cod_horario_agenda_editar); return false;
                             
                    var nome_unidade_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#nome_unidade_editar<?php echo $i; ?>").val();
                    //alert(nome_unidade_editar); return false;
           
                    var horario_inicio_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#horario_entrada_editar<?php echo $i; ?>").val();
                    //alert(horario_inicio_editar); return false;
                    
                    var horario_fim_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#horario_saida_editar<?php echo $i; ?>").val();
                    //alert(horario_fim_editar); return false;
                    
                    var total_especialidade_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#total_especialidade_editar<?php echo $i; ?>").val();
                    //alert(total_especialidade_editar); return false;
                    
                   
                    for(e = 0; e < total_especialidade_editar; e++){

                      var idade_minima_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#idade_minima_editar<?php echo $i; ?>" + e).val();

                      var idade_maxima_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#idade_maxima_editar<?php echo $i; ?>" + e).val();

                      var cod_especialidade_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#cod_especialidade_editar<?php echo $i; ?>" + e).val();

                      //var nome_especialidade_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#nome_especialidade_editar<?php echo $i; ?>" + e).val();

                      $('#especialidades_dinamico option[value="' + cod_especialidade_editar + '"]').attr({ selected : "selected" });
                      
                    }
                    
                    var total_historicos_reajustes_tipo_valor = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#total_historicos_reajustes_tipo_valor<?php echo $i; ?>").val();
                    //alert(total_historicos_reajustes_tipo_valor); return false;
                    
                    for(e = 0; e < total_historicos_reajustes_tipo_valor; e++){
                         
                        var btn_por_plantao_por_paciente = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#tipo_valor_editar<?php echo $i; ?>" + e).val();
                        var valor_por_plantao_por_paciente = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#valor_tipo_valor_editar<?php echo $i; ?>" + e).val();
                        //alert(btn_por_plantao_por_paciente); return false;
                    
                    }
                    
                    var total_historicos_reajustes_pacientes_excedentes = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#total_historicos_reajustes_pacientes_excedentes<?php echo $i; ?>").val();
                    //alert(total_historicos_reajustes_pacientes_excedentes); return false;
                    
                    var limite_atendimento_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#limite_atendimento_editar<?php echo $i; ?>").val();
                    //alert(limite_atendimento_editar); return false;
                    
                    var tipo_atendimento_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#tipo_atendimento_editar<?php echo $i; ?>").val();
                    //alert(tipo_atendimento_editar); return false;
                    
                    var horario_distribuicao_senha_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#horario_distribuicao_senha_editar<?php echo $i; ?>").val();
                    //alert(horario_distribuicao_senha_editar); return false;
                    
                    var btn_permite_encaixe_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#btn_permite_encaixe_editar<?php echo $i; ?>").val();
                    //alert(btn_permite_encaixe_editar); return false;
                    
                    var quantidade_encaixes_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#quantidade_encaixes_editar<?php echo $i; ?>").val();
                    //alert(quantidade_encaixes_editar); return false;
                    
                    
                    $('#modal_editar #dia_semana_dinamico').val(dia_semna_extenso);
                   
                   
                    $('#modal_editar #cod_horario_agenda_dinamico').val(cod_horario_agenda_editar);
                   
                   
                    if(ordem == 1){

                    
                        $("#modal_editar #turno_dinamico option[value='1']").attr({ selected : "selected" });
                          

                    }else if(ordem == 2){

                    
                        $("#modal_editar #turno_dinamico option[value='2']").attr({ selected : "selected"});


                    }
                    
                    
                    $('#modal_editar #nome_unidade_dinamico').val(nome_unidade_editar);
                    

                    $('#modal_editar #horario_inicio_dinamico').val(horario_inicio_editar);
                    
                    
                    $('#modal_editar #horario_fim_dinamico').val(horario_fim_editar);
              
                      
                    $('#modal_editar #idade_minima_dinamico').val(idade_minima_editar);


                    $('#modal_editar #idade_maxima_dinamico').val(idade_maxima_editar);

                    //alert(btn_por_plantao_por_paciente);
                    if(btn_por_plantao_por_paciente == 1){


                          $("#modal_editar #tipo_valor_editar input[value=1]").attr('checked', true);
                          

                    }else if(btn_por_plantao_por_paciente == 2){

                    
                          $("#modal_editar #tipo_valor_editar input[value=2]").attr('checked', true);
                          

                    }
                    
         
                    $("#modal_editar #por_plantao_por_paciente_dinamico").val(valor_por_plantao_por_paciente);
                    

                    $("#modal_editar #limite_atendimento_dinamico").val(limite_atendimento_editar);

                   
                    // Limpando o campo horario_distribuir_senha_dinamico
                    $('#modal_editar #horario_distribuir_senha_dinamico').val("");
                    
                    // 1 = ordem de chegada; 2 = agendamento
                    if(tipo_atendimento_editar == 1){
                        
                        $("#modal_editar #atendimento_dinamico option[value=1]").attr('selected', true);
                        $("#modal_editar #horario_distribuir_senha_dinamico").prop('disabled', false);
                        $('#modal_editar #horario_distribuir_senha_dinamico').val(horario_distribuicao_senha_editar);
                          
                    }else if(tipo_atendimento_editar == 2){
                        
                       
                        $("#modal_editar #atendimento_dinamico option[value=2]").attr('selected', 'selected');
                        $('#modal_editar #horario_distribuir_senha_dinamico').val("");
                        $("#modal_editar #horario_distribuir_senha_dinamico").prop('disabled', 'disabled');
                          
                          
                    }
                    

                    //  Verificando se o campo checkbox Permitir excedentes foi setado
                    //alert(total_historicos_reajustes_pacientes_excedentes);
                    var e;
                    for(e = 0; e < total_historicos_reajustes_pacientes_excedentes; e++){
                      var btn_pacientes_excedentes_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#btn_pacientes_excedentes_editar<?php echo $i; ?>" + e).val();
                      //alert(btn_pacientes_excedentes_editar); return false;
                      if(btn_pacientes_excedentes_editar == 1){
                          // excedentes_dinamico
                          $("#modal_editar #caixa_btn_paciente_excedente #btn_paciente_excedente_dinamico").prop('checked', true);
                          $("#modal_editar #caixa_btn_paciente_excedente #excedentes_dinamico").prop('disabled' ,false);
                          var valor_pacientes_excedentes_editar = $("#<?php echo $i; ?>"+ cod_unidade + dia_semana + ordem ).closest(".caixa-evento").find("#valor_pacientes_excedentes_editar<?php echo $i; ?>" + e).val();
                          //alert(valor_pacientes_excedentes_editar);
                      }

                    }
                    
                    $('#modal_editar #excedentes_dinamico').val(valor_pacientes_excedentes_editar);
                    
                
                  
                    //  Verificando se o campo checkbox Permitir encaixe foi setado
                    if(btn_permite_encaixe_editar == 1){
                   
                        // excedentes_dinamico
                        $("#modal_editar #caixa_btn_permite_encaixe #btn_permite_encaixe_dinamico").prop('checked', true);
                        $("#modal_editar #caixa_btn_permite_encaixe #qtd_encaixe_dinamico").prop('disabled' ,false);
                        $('#modal_editar #qtd_encaixe_dinamico').val(quantidade_encaixes_editar);
                        
                    }
               
                    


                   
                    $('#modal_editar').modal('show');
                    
                }
                
        
                /* DEFININDO MASCARAS ----------------------------------------*/

                // Campo Horário Início dentro do modal 
                $("#horario_inicio, #horario_inicio_dinamico").timepicker({
                    timeFormat: 'HH',
                    interval: 60,
                    minTime: '10',
                    maxTime: '0pm',
                    defaultTime: '0',
                    startTime: '00:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true,
                    showSeconds: false,
                    showMeridian: false,
                    minuteStep: 1
                });

                // Campo Horário Fim dentro do modal
                $("#horario_fim, #horario_fim_dinamico").timepicker({
                    timeFormat: 'HH',
                    interval: 60,
                    minTime: '10',
                    maxTime: '0pm',
                    defaultTime: '0',
                    startTime: '00:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true,
                    showSeconds: false,
                    showMeridian: false,
                    minuteStep: 1
                });
    
                $('#horario_destribuir_senha, #horario_distribuir_senha_dinamico').timepicker({
                    timeFormat: 'HH',
                    interval: 60,
                    minTime: '10',
                    maxTime: '0pm',
                    defaultTime: '0',
                    startTime: '00:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true,
                    showSeconds: false,
                    showMeridian: false,
                    minuteStep: 1
                });
                
                /* FIM DAS MASCARAS ------------------------------------------*/
                
            });
            
            
<?php
        
            $i = $i+1;
            endforeach; 
        } 
?> 

                                                                    
        // Função chamada ao clicar botão salvar do modal
        $('#btn_salvar').on('click', function(e) {  
      
            // Previne ação default do elemento
            e.preventDefault();

            // Apaga Toast que estejam abertos
            $.toast().reset('all');

            // Limpo e oculto div de erros
            $('.msg_erro').html('');
            $('.msg_erro').hide();

            // =================================================================
            // *** Declaração de variaveis ***
            
            // campos utilizados apenas na view {não são gravados no banco}
            var nome_unidade = $("#nome_unidade").val();
            
            var msg_erro_validacao_automatica = "";
            var msg_erro_validacao = "";
            
            // Campos será armazenados na tabela AGENDAS
            var painel = $('#painel').val(); // cod do medico 
            
            var nome_medico = $('#nome_medico').val(); // cod do medico 
            
            var medico = $('#medico').val(); // cod do medico 
            
            var unidade = $('#unidade').val(); // cod da unidade
            
            var cod_agenda = $('#cod_agenda').val(); // Só existirar um codigo, se o calendario da unidade já tiver um evento cadastrado
            
            var data_inicio = $('#data_inicio').val();
           
            var data_fim = $('#data_fim').val();
             
            var tempo_medio = $('#tempo_medio').val();
            
            if(tempo_medio == " " || tempo_medio == "" || "0:00"){
                tempo_medio = "";
            }
           
            //var dia_semana = $('#dia_semana').val();
            
            
            var num_dia_semana = $('#num_dia_semana').val();
           
            
            var horario_inicio = $('#horario_inicio').val();
           
            
            var horario_fim = $('#horario_fim').val();
            
            var cod_consultorio = $('#cod_consultorio').val();
            
            var turno = $("#turno option:selected").val();
            
            var cods_especilidades = new Array;
           
            // Loop por todas as option selecionado de especialidades 
            $('#especialidades > option:selected').each(function() {
                cods_especilidades.push( $(this).val() );
            });
            
            // Converto Array para JSON
            cods_especialidades = JSON.stringify(cods_especilidades, null, 2); 
            //console.log(cods_especialidades); 
  
            var idade_minima = $("#idade_minima").val();
    
            var idade_maxima = $("#idade_maxima").val();
            
            var btn_por_plantao_por_paciente = $("input[name='btn_por_plantao_por_paciente']:checked").val();
             
            
            var por_plantao_por_paciente = $('#por_plantao_por_paciente').val();
         
            var limite_atendimento = $('#limite_atendimento').val();
            
            var atendimento = $('#atendimento').val();
            
            var horario_destribuir_senha = $('#horario_destribuir_senha').val();
         
            var btn_paciente_excedente = $("input[name='btn_paciente_excedente']:checked").val();
            var excedentes = $('#excedentes').val();
            
            
            var btn_permite_encaixe = $("input[name='btn_permite_encaixe']:checked").val();
            var encaixe = $('#encaixe').val();
           
  
            /*===========================================================*/
            // ** CAMPOS OBRIGATÓRIOS
   
      
            // Este campo é preenchido pelo sistema automaticamente
            if(medico.length === 0 || nome_medico.length === 0){
                
               msg_erro_validacao_automatica = 1;
           
            }
            
            // Este campo é preenchido pelo sistema automaticamente
            if(unidade.length === 0 || cod_agenda === 0){
                
                
                msg_erro_validacao_automatica = 1;
               
            }
      
            // Este campo é preenchido pelo sistema automaticamente
            if(num_dia_semana.length === 0 || turno.length === 0){
                
                
                msg_erro_validacao_automatica = 1;
                
                
            }
            
            // verifico se todos os campos de preenchimento automatico foram realmente preenchidos
            if(msg_erro_validacao_automatica == 1){
                
                $('.msg_erro').append("Não foi possível efetuar o cadastro, tente novamente!");
       
                // Revela DIV
                $('.msg_erro').show();
                return false;
            }
            
            
           
            // Este campo é preenchido pelo usuário
            if(data_inicio.length === 0){
                
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe a Data Início. <br/>";
                
            }
            
           
            
            // Este campo é preenchido pelo usuário
            if(horario_inicio == "" || horario_inicio == "0:00"){
      
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o horário início. <br/>";
       
            }
            
            
            // Este campo é preenchido pelo usuário
            if(horario_fim == "" || horario_fim == "0:00"){
  
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o horário fim. <br/>";
     
            }
            
            // Este campo é preenchido pelo usuário
            if(cod_consultorio == 0){
  
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o consultório. <br/>";
     
            }
            
            // Este campo é preenchido pelo usuário
            if(cods_especilidades.length === 0){
  
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe ao menos uma especialidade. <br/>";
     
            }
       
           
           if(btn_por_plantao_por_paciente != 1 && btn_por_plantao_por_paciente != 2 ){
               
               msg_erro_validacao = msg_erro_validacao + "Por favor, informe por plantão ou paciente. <br/>";
               
           }
           
            // Este campo é preenchido pelo usuário
            if(por_plantao_por_paciente.length === 0){
               
               
               
                if(btn_por_plantao_por_paciente == 1){
                    
                    
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por plantão. <br/>";
                    
                    
                }else if(btn_por_plantao_por_paciente == 2){
                   
                  
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por paciente. <br/>";
                   
                }
               
               
            }
        
            // Este campo é preenchido pelo usuário
            if(limite_atendimento.length === 0){
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o limite de atendimento. <br/>"; 
            }
            
            
            // Este campo é preenchido pelo usuário
            if(atendimento.length === 0){
                
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o atendimento. <br/>";
                
            }else if(atendimento == 1){
                
                
                if(horario_destribuir_senha == "" || horario_destribuir_senha == "0:00"){
                
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o horário de início da distribuição das senhas. <br/>";
                    
                    
                }
            }
            
           
            if(btn_paciente_excedente == 1){
                
                if(excedentes.length == ""){
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por excedente(s). <br/>"; 
                }
                
                
            }
            
            
            if(btn_permite_encaixe == 1){
                
                if(encaixe.length == ""){
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe a quantidade de encaixe permitido. <br/>"; 
                }
                
                
            }
            
            
            if(msg_erro_validacao != ""){
                
                // Volto até o topo da tela para chamar a atenção
                $('.modal').animate({ scrollTop: 0 }, 'fast'); 
                
                $('.msg_erro').append( msg_erro_validacao );
                // Revela DIV
                $('.msg_erro').show();
                
                
                return false;
            
            
            }else{
                
                
                // Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();
                
                
            }
 
            //return false; 
            // Requisição ajax
            $.ajax({
                cache: false,
                type: "POST",
                url: "<?php echo url('admin/painel/medicos/cadastrar-horario-agenda-medico'); ?>",
                data: { 
                    
                    'painel' : painel,
                    'cod_medico' : medico,
                    'nome_unidade' : nome_unidade,
                    'nome_medico' : nome_medico,
                    'cod_unidade' : unidade,
                    'cod_agenda' : cod_agenda,
                    'data_inicio' : data_inicio,
                    'data_fim' : data_fim,
                    'tempo_medio_consulta' : tempo_medio,
                    'num_dia_semana' : num_dia_semana,
                    'horario_inicio' : horario_inicio,
                    'horario_fim' : horario_fim,
                    'cod_consultorio' : cod_consultorio,
                    'turno' : turno,
                    'especialidades' : cods_especilidades,
                    'idade_minima' : idade_minima,
                    'idade_maxima' : idade_maxima,
                    'btn_por_plantao_por_paciente' : btn_por_plantao_por_paciente,
                    'por_plantao_por_paciente' : por_plantao_por_paciente,
                    'limite_atendimento' : limite_atendimento,
                    'btn_paciente_excedente' : btn_paciente_excedente,
                    'excedentes' : excedentes,
                    'btn_permite_encaixe' : btn_permite_encaixe,
                    'encaixe' : encaixe,
                    'atendimento' : atendimento,
                    'horario_destribuir_senha' : horario_destribuir_senha
          
                },
                beforeSend: function() { 

                    // Limpa valor da DIV
                    $('.msg_erro').html('');

                    // Oculta DIV
                    $('.msg_erro').hide();
                    
                    // Configura a variável enviando
                    //enviando_formulario = true;

                    // Adiciona o atributo desabilitado no botão
                    $('#btn_salvar').attr('disabled', true);

                    // Modifica o texto do botão
                    $('#btn_salvar').val('Enviando...');

                    // Remove o erro (se existir)
                    //$('.error').remove();

                },
                success: function(response) {
                    
                    // Convertendo resposta para objeto javascript
                    var response = JSON.parse(response);

                    // Checo retorno
                    if (response.status == 'erro') {

                        // Coloco mensagem dentro da div de erros
                        $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                        $('.msg_erro').append(response.erro);  

                        // Exibo div de erros
                        $('.msg_erro').show();  

                        // Volto até o topo da tela para chamar a atenção
                        $('html, body').animate({ scrollTop: 0 }, 'fast');                 

                    } else if (response.status == 'sucesso') {
                        
                        // FECHA O MODAL USADO PARA CADASTRAR EVENTO
                        $('#modal_cadastrar').modal('hide');
                                                
                        // Alerta sucesso
                        alert('Agenda(s) cadastrada(s) com sucesso.');
                        // Adiciona o atributo habilitado no botão
                        $('#btn_salvar').attr('disabled', false);
                        
                        
                        // Redireciono
                        window.location.replace("<?php echo url("admin/painel/medicos/gerenciar-agenda-medico"); ?>/" + response.cod_medico);

                    }

                },
                complete: function(response) {
                    
                },
                error: function(response, thrownError) {
                         
                }
            });
        });
        
        
        
        
        
        
        /* Função chamada ao clicar no salvar do modal aterar ----------------*/
        $('#btn_salvar_dinamico').on('click', function(e) {
            
            // Previne ação default do elemento
            e.preventDefault();

            // Apaga Toast que estejam abertos
            $.toast().reset('all');

            // Limpo e oculto div de erros
            $('.msg_erro').html('');
            $('.msg_erro').hide();

            // =================================================================
            // *** Declaração de variaveis ***
            
            // campos utilizados apenas na view {não são gravados no banco}
            //var nome_unidade = $("#nome_unidade").val(); ** remover **
            
            var msg_erro_validacao_automatica = "";
            var msg_erro_validacao = "";
            
            // Campos será armazenados na tabela AGENDAS
            //var painel = $('#painel').val(); // cod do medico  ** remover **
            
            //var nome_medico = $('#nome_medico').val(); // cod do medico  ** remover **
            
            //var medico = $('#medico').val(); // cod do medico  ** remover **
            
            //var unidade = $('#unidade').val(); // cod da unidade ** remover **
            
            //var cod_agenda = $('#cod_agenda').val(); ** remover ** // Só existirar um codigo, se o calendario da unidade já tiver um evento cadastrado
            
            //var data_inicio = $('#data_inicio').val(); ** remover **
           
            
            //var data_fim = $('#data_fim').val(); ** remover **
             
             
            //var tempo_medio = $('#tempo_medio').val(); ** remover **
            //if(tempo_medio == " " || tempo_medio == "" || "0:00"){
            //    tempo_medio = "";
            //}
           
            //var dia_semana = $('#dia_semana').val(); ** remover **
            
            
            //var num_dia_semana = $('#num_dia_semana').val(); ** remover **
           
            var cod_horario_agenda = $("#cod_horario_agenda_dinamico").val();
            //alert(cod_horario_agenda); return false;
            
            var cod_consultorio = $("#cod_consultorio_dinamico").val();
            //alert(cod_consultorio); return false;
            
            var horario_inicio = $('#horario_inicio_dinamico').val();
            //alert(horario_inicio); return false;
            
            var horario_fim = $('#horario_fim_dinamico').val();
            // alert(horario_fim); return false;
            
            // var turno = $("#turno option:selected").val(); ** remover **
            
            var cods_especilidades = new Array;
           
            // Loop por todas as option selecionado de especialidades 
            $('#especialidades_dinamico > option:selected').each(function() {
                cods_especilidades.push( $(this).val() );
            });
            
            // Converto Array para JSON
            cods_especialidades = JSON.stringify(cods_especilidades, null, 2); 
            //console.log(cods_especialidades); 
            //alert(cods_especialidades); return false;
    
    
            var idade_minima = $("#idade_minima_dinamico").val();
            //alert(idade_minima); return false;
    
    
            var idade_maxima = $("#idade_maxima_dinamico").val();
            //alert(idade_maxima); return false;
         
          
            var btn_por_plantao_por_paciente = $("input[name='btn_por_plantao_por_paciente_dinamico']:checked").val();
            //alert(btn_por_plantao_por_paciente); return false; 
         
           
            var por_plantao_por_paciente = $('#por_plantao_por_paciente_dinamico').val();
            //alert(por_plantao_por_paciente); return false;
         
            
            var limite_atendimento = $('#limite_atendimento_dinamico').val();
            //alert(limite_atendimento); return false;
            
            
            var atendimento = $('#atendimento_dinamico').val();
            //alert(atendimento); return false;
            
            
            var horario_distribuir_senha = $('#horario_distribuir_senha_dinamico').val();
            //alert(horario_distribuir_senha); return false;
            
            
            var btn_paciente_excedente_dinamico = $("input[name='btn_paciente_excedente_dinamico']:checked").val();
            //alert(btn_paciente_excedente_dinamico); return false;
            
            
            var excedentes_dinamico = $('#excedentes_dinamico').val();
            //alert(excedentes_dinamico); return false;
            
         
            var btn_permite_encaixe = $("input[name='btn_permite_encaixe']:checked").val();
            //alert(btn_permite_encaixe); return false;
           
           
            var qtd_encaixe_dinamico = $('#qtd_encaixe_dinamico').val();
            //alert(qtd_encaixe_dinamico); return false;
           
           
           
            /*===========================================================*/
            // ** CAMPOS OBRIGATÓRIOS
   
   
      
            // Este campo é preenchido pelo sistema automaticamente
//            if(medico.length === 0 || nome_medico.length === 0){
//                
//               msg_erro_validacao_automatica = 1;
//           
//            }
            
            // Este campo é preenchido pelo sistema automaticamente
//            if(unidade.length === 0 || cod_agenda === 0){
//                
//                
//                msg_erro_validacao_automatica = 1;
//               
//            }
      
            // Este campo é preenchido pelo sistema automaticamente
//            if(num_dia_semana.length === 0 || turno.length === 0){
//                
//                
//                msg_erro_validacao_automatica = 1;
//                
//                
//            }
            
            // verifico se todos os campos de preenchimento automatico foram realmente preenchidos
//            if(msg_erro_validacao_automatica == 1){
//                
//                $('.msg_erro').append("Não foi possível efetuar o cadastro, tente novamente!");
//       
//                // Revela DIV
//                $('.msg_erro').show();
//                return false;
//            }
            
            
           
            // Este campo é preenchido pelo usuário
//            if(data_inicio.length === 0){
//                
//                msg_erro_validacao = msg_erro_validacao + "Por favor, informe a Data Início. <br/>";
//                
//            }
            
           
            
            // Este campo é preenchido pelo usuário
            if(cod_consultorio == 0){
                
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o consultório. <br/>";
       
            }
            
            // Este campo é preenchido pelo usuário
            if(horario_inicio == "" || horario_inicio == "0:00"){
                
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o horário início. <br/>";
       
            }
            
            
            // Este campo é preenchido pelo usuário
            if(horario_fim == "" || horario_fim == "0:00"){
  
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o horário fim. <br/>";
     
            }
            
            // Este campo é preenchido pelo usuário
            if(cods_especilidades.length === 0){
  
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe ao menos uma especialidade. <br/>";
     
            }
       
           
            if(btn_por_plantao_por_paciente != 1 && btn_por_plantao_por_paciente != 2 ){

                msg_erro_validacao = msg_erro_validacao + "Por favor, informe por plantão ou paciente. <br/>";

            }
           
            // Este campo é preenchido pelo usuário
            if(por_plantao_por_paciente.length === 0){
               
               
               
                if(btn_por_plantao_por_paciente == 1){
                    
                    
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por plantão. <br/>";
                    
                    
                }else if(btn_por_plantao_por_paciente == 2){
                   
                  
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por paciente. <br/>";
                   
                }
               
            }
        

            // Este campo é preenchido pelo usuário
            if(limite_atendimento.length === 0){
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o limite de atendimento. <br/>"; 
            }
            
            
            // Este campo é preenchido pelo usuário
            if(atendimento.length === 0){
                
                msg_erro_validacao = msg_erro_validacao + "Por favor, informe o atendimento. <br/>";
                
            }else if(atendimento == 1){
                
                
                if(horario_destribuir_senha == "" || horario_destribuir_senha == "0:00"){
                
                    msg_erro_validacao = msg_erro_validacao + "Por favor informe, o horário de início da distribuição das senhas. <br/>";
                     
                }
            }
            
           
            if(btn_paciente_excedente_dinamico == 1){
                
                if(excedentes_dinamico.length == ""){
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe o valor por excedente(s). <br/>"; 
                }
                
                
            }
            
            
            if(btn_permite_encaixe == 1){
                
                if(encaixe.length == ""){
                    msg_erro_validacao = msg_erro_validacao + "Por favor, informe a quantidade de encaixe permitido. <br/>"; 
                }
                
            }
            
            
            if(msg_erro_validacao != ""){
                
                // Volto até o topo da tela para chamar a atenção
                $('.modal').animate({ scrollTop: 0 }, 'fast'); 
                
                $('.msg_erro').append( msg_erro_validacao );
                // Revela DIV
                $('.msg_erro').show();
                
                
                return false;
            
            
            }else{
                
                //Requisição ajax
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "<?php echo url('admin/painel/medicos/alterar-horario-agenda-medico'); ?>",
                    data: { 
                    
                    // tabela horarios agendas
                    'cod_horario_agenda' : cod_horario_agenda,
                    'cod_consultorio' : cod_consultorio,
                    'horario_inicio' : horario_inicio,
                    'horario_fim' : horario_fim,
                    'limite_atendimento' : limite_atendimento,
                    'atendimento' : atendimento,
                    'horario_distribuir_senha' : horario_distribuir_senha,
                    'btn_permite_encaixe' : btn_permite_encaixe,
                    'qtd_encaixe' : qtd_encaixe_dinamico,
                    
                    
                    // tabela historicos_de_reajustes_tipo_valor
                    'btn_por_plantao_por_paciente' : btn_por_plantao_por_paciente,
                    'por_plantao_por_paciente' : por_plantao_por_paciente,
                    
                    
                   
                    // tablea historicos_de_reajustes_pacientes_excedentes
                    'btn_paciente_excedente_dinamico' : btn_paciente_excedente_dinamico,
                    'excedentes_dinamico' : excedentes_dinamico,
                    
                    
                    // tablea historicos_de_reajustes_pacientes_excedentes
                    'btn_paciente_excedente' : btn_paciente_excedente_dinamico,
                    'excedentes_dinamico' : excedentes_dinamico,
                    
                    
                    // tabela especialidades_horarios_agendas
                    'especialidades' : cods_especilidades,
                    'idade_minima' : idade_minima,
                    'idade_maxima' : idade_maxima
                    
                    },
                    beforeSend: function() { 

                        // Executa antes do envio
                        
                         // Limpa valor da DIV
                        $('.msg_erro').html('');

                        // Oculta DIV
                        $('.msg_erro').hide();

                        // Configura a variável enviando
                        //enviando_formulario = true;

                        // Adiciona o atributo desabilitado no botão
                        $('#btn_salvar_dinamico').attr('disabled', true);

                        // Modifica o texto do botão
                        $('#btn_salvar_dinamico').val('Enviando...');

                        // Remove o erro (se existir)
                        //$('.error').remove();

                    },
                    success: function(response) {

                        // Convertendo resposta para objeto javascript
                        var response = JSON.parse(response);

                        // Checo retorno
                        if (response.status == 'erro') {

                            // Coloco mensagem dentro da div de erros
                            $('.msg_erro').append('<h4 class="pt-0">Alerta</h4>');
                            $('.msg_erro').append(response.erro);  

                            // Exibo div de erros
                            $('.msg_erro').show();  
                            
                            // Adiciona o atributo desabilitado no botão
                            $('#btn_salvar_dinamico').attr('disabled', false);

                            // Volto até o topo da tela para chamar a atenção
                            $('html, body').animate({ scrollTop: 0 }, 'fast');                 

                        } else if (response.status == 'sucesso') {

                            // FECHA O MODAL USADO PARA CADASTRAR EVENTO
                            $('#modal_cadastrar').modal('hide');
                        
                            // Alerta sucesso
                            alert('Agenda(s) cadastrada(s) com sucesso.');
                        
                            // Adiciona o atributo habilitado no botão
                            $('#btn_salvar_dinamico').attr('disabled', false);
                        
                            // Redireciono
                            window.location.replace("<?php echo url("admin/painel/medicos/gerenciar-agenda-medico"); ?>/" + response.cod_medico);

                        }

                    },
                    complete: function(response) {

                        // Executa ao completar envio

                    },
                    error: function(response, thrownError) {

                        // Faz algo se der erro
                        //console.log(thrownError)
                        
                        
                        // Adiciona o atributo habilitado no botão
                        $('#btn_salvar_dinamico').attr('disabled', true);

                        // Insiro mensagem de erro dentro da DIV
                        $('.msg_erro').append('Todos os campos com (*) são de preenchimentos obrigatórios.');

                        // Revela DIV
                        $('.msg_erro').show();

                    }
                });
                
                
                // Limpa valor da DIV
                $('.msg_erro').html('');

                // Oculta DIV
                $('.msg_erro').hide();
                
                return false;
            }
            
         
        });
        
        
        /* Função chamada ao clicar no inativar do modal aterar ----------------*/
        $('#btn_inativar_dinamico').on('click', function(e) {
           
            var cod_horario_agenda = $("#cod_horario_agenda_dinamico").val();
            //alert(cod_horario_agenda); return false;
            // Redireciono
            window.location.replace("<?php echo url("admin/painel/medicos/inativar-horario-agenda-medico"); ?>/" + cod_horario_agenda);
        
        });
                
                                 
}); // Fecha $(document).ready(function()
                

// Ativa máscara de dinheiro em campos
$('#por_plantao_por_paciente, #por_plantao_por_paciente_dinamico').maskMoney();
$('#excedentes, #excedentes_dinamico').maskMoney();
$('#encaixes').maskMoney();
</script>

@stop
