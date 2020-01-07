@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Médicos | Vizualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('medicos-visualizar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Visualizar Médico</h3>
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
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Básicas do Médico</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        <?php if (empty($medico->pessoa->foto)) { ?>
                                        <img src="{{ asset('images/sem_foto.jpg') }}" alt="foto do funcionário" width="150px" height="150px" class="img-thumbnail" />
                                        <?php } else { ?>
                                        <img src="{{ asset('uploads/pessoas/' . $medico->pessoa->foto) }}" alt="foto do médico" width="150px" height="150px" class="img-thumbnail" />
                                        <?php } ?>
                                    </td>                                    
                                </tr>
                                <tr>
                                    <th style="width:10px">Nome: </th>
                                    <td><?php echo $medico->pessoa->nome; ?></td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">CPF: </th>
                                    <td>
                                        <!-- Adicionando máscara php ao cpf -->
                                        <?php
                                            $parte_um = substr($medico->pessoa->cpf,0,3);
                                            $parte_dois = substr($medico->pessoa->cpf,3,3);
                                            $parte_tres = substr($medico->pessoa->cpf,6,3);
                                            $parte_quatro = substr($medico->pessoa->cpf,9,2);
                                            echo $monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                        ?>  
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Data de Nacimento: </th>
                                    <td>
                                        <?php 
                                            if($medico->pessoa->data_nascimento != ""){
                                                echo date('d/m/Y', strtotime(str_replace('/', '-', $medico->pessoa->data_nascimento)));
                                            }    
                                        ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Sexo: </th>
                                    <td>
                                        <?php 
                                            
                                            switch($medico->pessoa->sexo){
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
                                            switch($medico->pessoa->estado_civil){
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
                    </div>
                    
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Contatos do Médico</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Email: </th>
                                    <td> <?php echo $medico->usuarios->email; ?></td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Telefone: </th>
                                    <td>
                                        <!-- Adicionando mascara no telefone -->
                                         <?php echo $medico->pessoa->telefone; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Celular: </th>
                                    <td>
                                        <!-- Adicionando mascara no celular -->
                                         <?php echo $medico->pessoa->celular; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">CEP: </th>
                                    <td>
                                        <!-- Adicionando mascara no CEP -->
                                         <?php echo $medico->pessoa->cep; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Estado: </th>
                                    <td> <?php echo $medico->pessoa->cidades->estados->nome_estado; ?></td>
                                </tr>
                                
                                <tr>
                                    <th style="width:10px">Cidade: </th>
                                    <td> <?php echo $medico->pessoa->cidades->nome_cidade; ?></td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Logradouro: </th>
                                     <td> <?php echo $medico->pessoa->logradouro; ?></td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Número: </th>
                                     <td> <?php echo $medico->pessoa->numero; ?></td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Complemento: </th>
                                    <td> <?php echo $medico->pessoa->complemento; ?></td>
                                </tr>
                                
                                 <tr>
                                    <th style="width:10px">Bairro: </th>
                                    <td> <?php echo $medico->pessoa->bairro; ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-6 col-xs-12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><i class="fas fa-user"></i> Informações Adicionais</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th style="width:10px">Unidade(s): </th>
                                        <td>                                            
                                            <?php
                                                foreach($medico->unidades as $unidade): 
                                                if (in_array($unidade->cod_unidade, $medico->unidades()->where('medicos_unidades.vinculada',1)->where('medicos_unidades.status',1)->pluck('medicos_unidades.cod_unidade')->toArray())) {
                                                ?>
                                                        <?php echo $unidade->nome_unidade; ?>.

                                                   <?php 
                                                }
                                               endforeach;
                                            ?>                                            
                                        </td>
                                </tr>
                                <tr>
                                    <th style="width:10px">Especialidade(s): </th>
                                        <td>
                                            
                                            <?php
                                                foreach($medico->especialidades as $especialidade): 
                                                if (in_array($especialidade->cod_especialidade, $medico->especialidades()->where('medicos_especialidades.status',1)->pluck('medicos_especialidades.cod_especialidade')->toArray())) {
                                                ?>
                                                        <?php echo $especialidade->nome_especialidade; ?>.

                                                   <?php 
                                                }
                                               endforeach;
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
                                    <td>{{$medico->usuarios->usuario}}</td>
                                </tr>
                                
                              <!--  <tr>
                                    <th style="width:10px">Senha: </th>
                                    <td>***</td>
                                </tr> -->
                              
                            </tbody>
                        </table>
                    </div>
                </div>    

                <div class="col-xs-12">
                    <a class="btn btn-default pull-right" href="{{ url('admin/painel/medicos') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                </div>

            </div>    
        </div>
    </div>
</div>  
  
@stop
