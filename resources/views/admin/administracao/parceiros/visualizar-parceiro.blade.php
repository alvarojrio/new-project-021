@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Parceiros | Visualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('parceiros-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Parceiro</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Dados Gerais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <img src="<?php if ($parceiro->logotipo == "") {
                                            $foto = "sem_foto.png";
                                        } else {
                                            $foto = $parceiro->logotipo;
                                        } echo asset('uploads/parceiros/logotipos/' . $foto) ?>" alt="Imagem" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                    </td>                                    
                                </tr>
                                <tr>
                                    <th style="width:180px">Nome: </th>
                                    <td>{{ $parceiro->nome_fantasia }}</td>
                                </tr>
                                <tr>
                                    <th style="width:180px">Razão social: </th>
                                    <td>{{ $parceiro->razao_social }}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    
                    
                    <hr/>
                    
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <h2 class="text-blue">
                            <strong> Unidades:</strong>
                        </h2>
                    </div>                    
                      
                    <?php if (count($parceiro->unidades_parceiros) > 0): ?>
                        
                        <?php foreach ($parceiro->unidades_parceiros as $parceirounidade): ?>
                        
                            <div class="col-lg-6 col-xs-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2"> <i class="fas fa-building"></i> Unidades do parceiro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th style="width:180px">Nome: </th>
                                            <td>{{ $parceirounidade->nome_unidade_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Atividade: </th>
                                            <td>{{ $parceirounidade->atividade_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">CNAE: </th>
                                            <td>{{ $parceirounidade->cnae }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Telefone: </th>
                                            <td>{{ $parceirounidade->telefone_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">E-mail: </th>
                                            <td>{{ $parceirounidade->email_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">CEP: </th>
                                            <td>{{ $parceirounidade->cep_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Logradouro: </th>
                                            <td>{{ $parceirounidade->logradouro_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Numero: </th>
                                            <td>{{ $parceirounidade->numero_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Complemento: </th>
                                            <td>{{ $parceirounidade->complemento_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Bairro: </th>
                                            <td>{{ $parceirounidade->bairro_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Latitude: </th>
                                            <td>{{ $parceirounidade->latitude_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Longitude: </th>
                                            <td>{{ $parceirounidade->longitude_parceiro }}</td>
                                        </tr>
                                        <tr>
                                            <?php if (count($parceirounidade->parceiros_faixas_horarios) > 0){ ?> 
                                            
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Dia da Semana</th>
                                                        <th scope="col">Horário início</th>
                                                        <th scope="col">Horário fim</th>                                             
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        foreach ($parceirounidade->parceiros_faixas_horarios as $parceirofaixahorario):
                                                            
                                                        if($parceirofaixahorario->dia_da_semana == 2){ ?> 
                                                          
                                                        <tr>
                                                            <th scope="row">Segunda-feira</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td>                                                   
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 3){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Terça-feira</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 4){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Quarta-feira</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 5){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Quinta-feira</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 6){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Sexta-feira</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 7){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Sábado</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>
                                                        
                                                        <?php }elseif($parceirofaixahorario->dia_da_semana == 1){ ?>
                                                        
                                                        <tr>
                                                            <th scope="row">Domingo</th>
                                                            <td><?php echo $parceirofaixahorario->horario_inicio; ?></td>
                                                            <td><?php echo $parceirofaixahorario->horario_fim; ?></td> 
                                                        </tr>

                                                        <?php } ?>
                                                        
                                                        <?php endforeach; ?>  
                                                     
                                                      
                                                    </tbody>
                                                </table>  
                                            <?php } ?>  
                                    
                                        </tr>
                                        <tr>
                                            <th style="width:180px">Procedimentos: </th>
                                            <td>
                                                <?php if (count($parceirounidade->parceiros_procedimentos) > 0){ ?>
                                                    
                                                    <?php foreach ($parceirounidade->parceiros_procedimentos as $parceiroprocedimento): ?>
                                                        <ul class="list-group">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-heading">
                                                                <?php echo $parceiroprocedimento->descricao ."<br>"; ?>
                                                            </li>
                                                        </ul>                        
                                                    <?php endforeach; ?> 
                                                
                                                <?php }else{ ?>
                                                    Ainda não há cadastro de procedimentos nesta unidade.
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    
                        <?php endforeach; ?>    
                        <?php endif; ?>   

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

@section('includes_no_body')

@stop
