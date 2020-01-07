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
              
                <div class="row">
               
                    <div class="col-lg-6 col-xs-12">
                 
                        <table class="table table-striped table-bordered">
                   
                            <thead>
                     
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Favorecido</th>
                                </tr>
                                
                          
                            </thead>
                          
                            <tbody>
                             
                                <tr>
                                
                                    <td class="text-center" colspan="2">
                                     
                                        <img src="{{asset('uploads/pessoas/'.$pessoa->foto)}}" alt="{{$pessoa->foto}}" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                    </td>   
                                    
                                </tr>
                                
                                <tr>
                                   
                                    <th style="width:10px">Nome: </th>
                                   
                                    <td>{{ $pessoa->nome }}</td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">CPF: </th>
                                    
                                    <td>
                                        
                                        <!-- Adicionando mascara no cpf -->
                                        <?php
                                            $parte_um = substr($pessoa->cpf,0,3);
                                            $parte_dois = substr($pessoa->cpf,3,3);
                                            $parte_tres = substr($pessoa->cpf,6,3);
                                            $parte_quatro = substr($pessoa->cpf,9,2);
                                            echo $monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                        ?>  
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Data de Nacimento: </th>
                                    
                                    <td>
                                        <?php 
                                    
                                            if($pessoa->data_nascimento != ""){
                                                echo date('d/m/Y', strtotime(str_replace('/', '-', $pessoa->data_nascimento)));
                                            }    
                                        ?>
                                        
                                    </td>
                                    
                                </tr>
                                
                                <tr>
                                    
                                    <th style="width:10px">Sexo: </th>
                                    
                                    <td>
                                        <?php 
                                            
                                            switch($pessoa->sexo){
                                                case 1:
                                                 echo "MASCULINO";
                                                break;

                                                case 2:
                                                 echo "FEMININO";
                                                break;

                                                default:
                                                    echo "";
                                                break;    
                                            }
                                   
                                        ?>
                                        
                                    </td>
                                    
                                </tr>
                                
                                
                                <tr>
                                    
                                    <th style="width:10px">Estado Civil: </th>
                                    
                                     <td>
                                         
                                        <?php 
                                            switch($pessoa->estado_civil){
                                                case 1:
                                                 echo "SOLTEIRO";
                                                break;

                                                case 2:
                                                 echo "CASADO";
                                                break;

                                                case 3:
                                                 echo "VIÚVO";
                                                break;

                                                case 4:
                                                    echo "DIVORCIADO";
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
                        
                        <table class="table table-striped table-bordered">
                        
                            <thead>
                          
                                <tr>
                           
                                    <th colspan="2"><i class="fas fa-user"></i> Contatos do Favorecido</th>
                                    
                                </tr>
                           
                            </thead>
                           
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Email: </th>
                                    <td>{{ $pessoa->email_pessoa }}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td>
                                        <!-- Adicionando mascara no telefone -->
                                        <?php
                                        
                                            if($pessoa->telefone !=""){
                                                $parte_um = substr($pessoa->telefone,0,2);
                                                $parte_dois = substr($pessoa->telefone,2,4);
                                                $parte_tres = substr($pessoa->telefone,6,10);
                                                echo $monta_telefone = "($parte_um) $parte_dois - $parte_tres";
                                            }
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Celular: </th>
                                    <td>
                                        <!-- Adicionando mascara no celular -->
                                        <?php
                                        
                                            if($pessoa->celular != ""){
                                                $parte_um = substr($pessoa->celular,0,2);
                                                $parte_dois = substr($pessoa->celular,2,5);
                                                $parte_tres = substr($pessoa->celular,7,9);
                                                echo $monta_celular = "($parte_um) $parte_dois - $parte_tres";
                                            }
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">CEP: </th>
                                    <td>
                                        <!-- Adicionando mascara no CEP -->
                                        <?php
                                            if($pessoa->cep !=""){
                                                $parte_um = substr($pessoa->cep,0,5);
                                                $parte_dois = substr($pessoa->cep,5,8);
                                                echo $monta_cep = "$parte_um - $parte_dois";
                                            }
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td>{{ $pessoa->cidades->estados->nome_estado}}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                     
                                    <td>{{ $pessoa->cidades->nome_cidade}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Logradouro: </th>
                                     
                                    <td>{{ $pessoa->logradouro}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Número: </th>
                                     
                                    <td>{{ $pessoa->numero}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Complemento: </th>
                                     
                                    <td>{{ $pessoa->complemento}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Bairro: </th>
                                     
                                    <td>{{ $pessoa->bairro}}</td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                   
                    </div>
         
             
                
                    <div class="col-lg-6 col-xs-12">

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
                                            
                                            <?php foreach($categoria_financeira as $c_f): ?>
                                            <li class="list-group-item"><?php echo $c_f->nome_sub_categoria_financeira; ?></li>
                                            <?php endforeach; ?>
                                            
                                        </ul>
                                       
                                    </td>

                                </tr>

                            </tbody>


                        </table>

                    </div>
                    
                </div>    
                
                <div class="col-xs-12">
                    
                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/favorecidos/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                    
                </div>

            </div>    
        </div>
    </div>
</div>    
@stop
