@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Vendedores | Vizualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('vendedores-visualizar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Visualizar Vendedor</h3>
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
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <?php if (!empty($vendedor->foto)) { ?>
                                        <img src="{{asset('uploads/pessoas/' . $vendedor->foto)}}" alt="{{$vendedor->foto}}" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                        <?php } else { ?>
                                        <img src="{{asset('images/sem_foto.jpg')}}" alt="sem foto" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                        <?php } ?>
                                    </td>                                    
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Nome: </th>
                                    <td>{{ $vendedor->nome }}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">CPF: </th>
                                    <td>
                                        <!-- Adicionando mascara no cpf -->
                                        <?php
                                            $parte_um = substr($vendedor->cpf,0,3);
                                            $parte_dois = substr($vendedor->cpf,3,3);
                                            $parte_tres = substr($vendedor->cpf,6,3);
                                            $parte_quatro = substr($vendedor->cpf,9,2);
                                            echo $monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Data de Nacimento: </th>
                                    <td><?php 
                                            if($vendedor->data_nascimento != ""){
                                                echo date('d/m/Y', strtotime($vendedor->data_nascimento));
                                            }    
                                        ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Sexo: </th>
                                    <td>
                                        <?php 
                                            
                                            switch($vendedor->sexo){
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
                                            switch($vendedor->estado_civil){
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
                                <tr>
                                    <th style="width:10px">Cobrador: </th>
                                    <td>
                                        @if($vendedor->cobrador == 1)
                                            <span class="label label-success" style="font-size:14px">SIM</span>
                                        @else
                                            <span class="label label-danger" style="font-size:14px">NÃO</span>
                                        @endif
                                        
                                    </td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Contatos do Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Email: </th>
                                    <td>{{ $vendedor->email }}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td>
                                        <!-- Adicionando mascara no telefone -->
                                        <?php
                                        
                                            if($vendedor->telefone !=""){
                                                $parte_um = substr($vendedor->telefone,0,2);
                                                $parte_dois = substr($vendedor->telefone,2,4);
                                                $parte_tres = substr($vendedor->telefone,6,10);
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
                                        
                                            if($vendedor->celular !=""){
                                                $parte_um = substr($vendedor->celular,0,2);
                                                $parte_dois = substr($vendedor->celular,2,5);
                                                $parte_tres = substr($vendedor->celular,7,9);
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
                                            if($vendedor->cep !=""){
                                                $parte_um = substr($vendedor->cep,0,5);
                                                $parte_dois = substr($vendedor->cep,5,8);
                                                echo $monta_cep = "$parte_um - $parte_dois";
                                            }
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td>{{ $vendedor->nome_estado}}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                     <td>{{ $vendedor->nome_cidade}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Logradouro: </th>
                                     <td>{{ $vendedor->logradouro}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Número: </th>
                                     <td>{{ $vendedor->numero}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Complemento: </th>
                                     <td>{{ $vendedor->complemento}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Bairro: </th>
                                     <td>{{ $vendedor->bairro}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Financeiras</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Unidade(s): </th>
                                        <td>
                                            
                                            <?php
                                            foreach($vendedor->unidades as $unidade): 
                                            if (in_array($unidade->cod_unidade, $vendedor->unidades()->where('funcionarios_unidades.status',1)->pluck('funcionarios_unidades.cod_unidade')->toArray())) {
                                            ?>
                                                    <?php echo $unidade->nome_unidade; ?>.

                                               <?php 
                                            }
                                               endforeach; 
                                            ?>
                                            
                                        </td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Perfil de vendedor: </th>
                                     <td>
                                        <?php 
                                        switch ($historico_comissao->perfil_funcionario) {
                                            case 0:
                                             echo "Não é vendedor";
                                            break;

                                            case 1:
                                             echo "Vendedor Interno";
                                            break;

                                            case 2:
                                             echo "Vendedor Externo";
                                            break;

                                            case 3:
                                             echo "Vendedor de Televendas";
                                            break;
                                        
                                            default:
                                                echo "";
                                            break;    
                                        }
                                        ?>    
                                    </td>
                                </tr>                                
                                <tr>
                                    <th style="width:10px">Comissão: </th>
                                        <td>
                                            <?php
                                                switch($historico_comissao->tipo_comissao){
                                                    
                                                    case 1:
                                                        echo "R$ ". $historico_comissao->valor_comissao;
                                                    break;    
                                                
                                                    case 2:
                                                       echo $historico_comissao->valor_comissao. " (%)";
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
                    
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações de Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Usuário: </th>
                                    <td>{{$vendedor->usuario}}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Senha: </th>
                                    <td>***</td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>    

                <div class="col-xs-12">
                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/vendedores/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                </div>

            </div>    
        </div>
    </div>
</div>    
@stop
