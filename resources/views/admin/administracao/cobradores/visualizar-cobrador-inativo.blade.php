@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Cobradores | Vizualizar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('cobradores-inativo-visualizar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Visualizar Cobrador</h3>
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
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Cobrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <?php if (empty($funcionario->pessoa->foto)) { ?>
                                        <img src="{{ asset('images/sem_foto.jpg') }}" alt="foto do cobrador" width="150px" height="150px" class="img-thumbnail" />
                                        <?php } else { ?>
                                        <img src="{{ asset('uploads/pessoas/' . $cobrador->foto) }}" alt="{{$cobrador->foto}}" width="200px" height="200px" class="img-thumbnail" />
                                        <?php } ?>
                                    </td>                                    
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Nome: </th>
                                    <td>{{ $cobrador->nome }}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">CPF: </th>
                                    <td>
                                        <!-- Adicionando mascara no cpf -->
                                        <?php
                                            $parte_um = substr($cobrador->cpf,0,3);
                                            $parte_dois = substr($cobrador->cpf,3,3);
                                            $parte_tres = substr($cobrador->cpf,6,3);
                                            $parte_quatro = substr($cobrador->cpf,9,2);
                                            echo $monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Data de Nacimento: </th>
                                    <td><?php 
                                            if($cobrador->data_nascimento != ""){
                                                echo date('d/m/Y', strtotime(str_replace('/', '-', $cobrador->data_nascimento)));
                                            }    
                                        ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Sexo: </th>
                                    <td>
                                        <?php 
                                            
                                            switch($cobrador->sexo){
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
                                            switch($cobrador->estado_civil){
                                                case 1:
                                                 echo "SOLTEIRO (A)";
                                                break;

                                                case 2:
                                                 echo "CASADO (A)";
                                                break;

                                                case 3:
                                                 echo "VIÚVO (A)";
                                                break;

                                                case 4:
                                                    echo "DIVORCIADO (A)";
                                                break;
                                            
                                                default:
                                                    echo "";
                                                break;    
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Vendedor: </th>
                                    <td>
                                        @if($cobrador->vendedor == 1)
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
                                    <th colspan="2"><i class="fas fa-user"></i> Contatos do Cobrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Email: </th>
                                    <td>{{ $cobrador->email }}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td>
                                        <!-- Adicionando mascara no telefone -->
                                        <?php
                                        
                                            if($cobrador->telefone !=""){
                                                $parte_um = substr($cobrador->telefone,0,2);
                                                $parte_dois = substr($cobrador->telefone,2,4);
                                                $parte_tres = substr($cobrador->telefone,6,10);
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
                                        
                                            if($cobrador->celular != ""){
                                                $parte_um = substr($cobrador->celular,0,2);
                                                $parte_dois = substr($cobrador->celular,2,5);
                                                $parte_tres = substr($cobrador->celular,7,9);
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
                                            if($cobrador->cep !=""){
                                                $parte_um = substr($cobrador->cep,0,5);
                                                $parte_dois = substr($cobrador->cep,5,8);
                                                echo $monta_cep = "$parte_um - $parte_dois";
                                            }
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td>{{ $cobrador->nome_estado}}</td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                     <td>{{ $cobrador->nome_cidade}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Logradouro: </th>
                                     <td>{{ $cobrador->logradouro}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Número: </th>
                                     <td>{{ $cobrador->numero}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Complemento: </th>
                                     <td>{{ $cobrador->complemento}}</td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Bairro: </th>
                                     <td>{{ $cobrador->bairro}}</td>
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
                                            foreach($cobrador->unidades as $unidade): 
                                            if (in_array($unidade->cod_unidade, $cobrador->unidades()->where('funcionarios_unidades.status',1)->pluck('funcionarios_unidades.cod_unidade')->toArray())) {
                                            ?>
                                                    <?php echo $unidade->nome_unidade; ?>.

                                               <?php 
                                            }
                                               endforeach; 
                                            ?>
                                            
                                        </td>
                                </tr>                                
                                <tr>
                                    <th style="width:10px">Comissão: </th>
                                        <td>
                                            <?php
                                                switch($historico_comissao->tipo_comissao){
                                                    
                                                    case 1:
                                                        echo "R$ " .$historico_comissao->valor_comissao;
                                                    break;    
                                                
                                                    case 2:
                                                       echo $historico_comissao->valor_comissao. " (%)";
                                                    break;    
                                                
                                                    default:
                                                        echo "-";
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
                                    <td>{{$cobrador->usuario}}</td>
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
                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/cobradores/') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                </div>

            </div>    
        </div>
    </div>
</div>    
@stop
