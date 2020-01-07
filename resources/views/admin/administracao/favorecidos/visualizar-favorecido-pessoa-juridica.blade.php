@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Favorecidos | Vizualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('favorecido-visualizar') !!}

<div class="page-title">
  
    <div class="title_left">
    
        <h3>Visualizar Favorecido</h3>
  
    </div>
    
</div>


<div class="clearfix"></div>

<div class="row">
    
    <div class="col-xs-12">
        
        <div class="x_panel">
           
            <div class="x_content">
              
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO COLUNA -->
                    <div class="col-lg-6 col-xs-12">
                 
                        <table class="table table-striped table-bordered">
                   
                            <thead>
                     
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Favorecido</th>
                                </tr>
                                
                          
                            </thead>
                          
                            <tbody>
                             
                                <tr>
                                    
                                    <th style="width:10px">Documento: </th>
                                
                                    <td colspan="2">
                                        <?php 
                                            
                                            if(count($arquivo_pessoa_juridica) > 0 ):
                                        
                                                foreach($arquivo_pessoa_juridica as $a_pj): 
                                        
                                        ?>
                                                <a href="{{asset('uploads/empresas/documentos/'.$a_pj->arquivo)}}" style="color:blue; text-decoration: underline" download><?php echo $a_pj->descricao_arquivo ?></a>
                                        <?php   
                                                endforeach;
                                                
                                            endif;    
                                        ?>
                                    </td>   
                                    
                                </tr>
                                
                                <tr>
                                   
                                    <th style="width:10px">Razão Social: </th>
                                   
                                    <td>{{ $pessoa_juridica->razao_social }}</td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Nome Fantasia: </th>
                                    
                                    <td>
                                        
                                        {{ $pessoa_juridica->nome_fantasia }}
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">CNPJ: </th>
                                    
                                    <td>
                                        
                                        <!-- Adicionando mascara no CNPJ -->
                                        <?php
                                        
                                            // Exibe valor com máscara já adicionada
                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraCnpj($pessoa_juridica->cnpj);
                                            
                                        ?>  
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Segmento: </th>
                                    
                                    <td>
                                        
                                        {{ $pessoa_juridica->segmento }}
                                        
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                            
                        
                        </table>
                        
                        
                   
                    </div>
                    <!-- FIM COLUNA -->
             
                    <!-- INICIO COLUNA -->
                    <div class="col-lg-6 col-xs-12">

                        <table class="table table-striped table-bordered">

                            <thead>

                                <tr>

                                    <th colspan="2"><i class="fas fa-user"></i> Contatos da Empresa</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td> 
                                        <?php
                                        if (!empty($pessoa_juridica->telefone_empresa)) {

                                            // Exibe valor com máscara já adicionada
                                            echo drclub\Biblioteca\FuncoesGlobais::mascaraTelefone($pessoa_juridica->telefone_empresa);

                                        } else {

                                            echo '-';

                                        }
                                        ?>  
                                    </td>
                                </tr>

                                <tr>
                                    <th style="width:10px">Email: </th>
                                    <td>
                                        <!-- Adicionando mascara no celular -->
                                        <?php

                                            echo $pessoa_juridica->email_empresa
                                        ?>  
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                    <!-- FIM COLUNA -->
                    
                </div>  
                <!-- FIM LINHA -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-lg-12 col-xs-12">
                        
                        <table class="table table-striped table-bordered">

                            <thead>

                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Categoria Favorecido</th>
                                </tr>


                            </thead>

                            <tbody>

                                <tr>

                                    <th style="width:10px">Categoria: </th>

                                    <td>
                                        
                                        <ul class="list-unstyled">
                                            
                                            <?php 
                                                
                                                if(count($categoria_financeira) > 0):
                                                    
                                                    foreach($categoria_financeira as $c_f): 
                                                    
                                            ?>
                                                    <li class="list-group-item"><?php echo $c_f->nome_sub_categoria_financeira; ?></li>
                                                    
                                            <?php   endforeach; 
                                            
                                                endif;;
                                            ?>
                                            
                                        </ul>
                                       
                                    </td>

                                </tr>

                            </tbody>


                        </table>
                      
                    </div>    
                    
                </div>
                <!-- FIM LINHA -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <!-- INICIO COLUNA -->
                    <div class="col-lg-12 col-xs-12">
                 
                        <table class="table table-striped table-bordered">
                   
                            <thead>
                     
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Pessoas de Contato da Empresa</th>
                                </tr>
                                
                          
                            </thead>
                          
                        <?php foreach($pessoas_juridica_contato as $p_j_c) : ?>   
                            
                            <tbody>
                             
                                <tr>
                                   
                                    <th style="width:10px">Nome: </th>
                                   
                                    <td>
                                        
                                        {{$p_j_c->nome}}
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Sexo: </th>
                                    
                                    <td>
                                        <?php 
                                        
                                            if($p_j_c->sexo == 1) { 
                                                
                                                echo "Masculino";
                                                
                                            } else if($p_j_c->sexo == 2) {
                                                
                                                echo "Feminino";
                                            }
                                        
                                        ?>
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Setor: </th>
                                    
                                    <td>
                                        
                                       {{$p_j_c->setor}}
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Email: </th>
                                    
                                    <td>
                                        
                                        {{$p_j_c->email}}
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Telefone 1: </th>
                                    
                                    <td>
                                        
                                        <?php 
                                            
                                            if($p_j_c->telefone1 > 0):
                                                 $parte_um = substr($p_j_c->telefone1,0,2);
                                                $parte_dois = substr($p_j_c->telefone1,2,5);
                                                $parte_tres = substr($p_j_c->telefone1,6,9);
                                                echo $monta_telefone = "($parte_um) $parte_dois - $parte_tres";
                                            endif;
                                              
                                        ?>    
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Telefone 2: </th>
                                    
                                    <td>
                                        
                                        <?php 
                                            
                                             if($p_j_c->telefone2 > 0):
                                                 $parte_um = substr($p_j_c->telefone2,0,2);
                                                $parte_dois = substr($p_j_c->telefone2,2,5);
                                                $parte_tres = substr($p_j_c->telefone2,6,9);
                                                echo $monta_telefone = "($parte_um) $parte_dois - $parte_tres";
                                            endif; 
                                        ?>
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th colspan="2"><hr/></th>
                                    
                                </tr>
                                
                            </tbody>
                            
                        <?php endforeach; ?>
                            
                        </table>
                        
                        
                   
                    </div>
                    <!-- FIM COLUNA -->
             
                    
                </div>  
                <!-- FIM LINHA -->
                
                
                <div class="col-xs-12">
                    
                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/favorecidos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                    
                </div>

            </div>    
        </div>
    </div>
</div>    
@stop
