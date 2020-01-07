@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Planos | Cadastrar
@stop

@section('includes_no_head')

<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@stop

@section('conteudo')

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Plano</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div id="avisoValidacao">
                        @if (count($errors) > 0)
                        <div class="col-xs-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-xs-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#dadoscadastrais" id="tab_dadoscadastrais">Dados cadastrais</a></li>
                            <li><a data-toggle="tab" href="#servicos" id="tab_servicos">Serviços</a></li>
                            <li><a data-toggle="tab" href="#carencias" id="tab_carencias">Carências</a></li>
                            <li><a data-toggle="tab" href="#historico" id="tab_historico">Histórico</a></li>
                        </ul>
                        
                        <!-- 
                            CÓDIGO PARA TESTAR ARRAY JAVASCRIPT
                            <pre id=whereToPrint></pre>
                            <br/>
                            <pre id=whereToPrintTwo></pre>
                        -->

                        <div class="clearfix" style="margin-bottom:20px"></div>
                        
                        <form method="POST" action="<?php echo url('admin/painel/planos/cadastrar-plano'); ?>" enctype="multipart/form-data">
                            
                            <div class="tab-content">
                                
                                <div id="dadoscadastrais" class="tab-pane fade in active">
                                    
                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Dados cadastrais:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Convênio <span class="required-red">*</span></label>
                                                    <select class="form-control" name="cod_convenio" id="cod_convenio">
                                                        <option value="">Selecione um convênio...</option>
                                                        @foreach($convenios as $convenio)
                                                            <option value="{{ $convenio->cod_convenio }}" <?php if (old('cod_convenio') == $convenio->cod_convenio){ echo "selected"; } ?>>{{ $convenio->nome_convenio }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Tabela <span class="required-red">*</span></label>
                                                    <select class="form-control" name="cod_tabela" id="cod_tabela">
                                                        <option value="1">RIO DE JANEIRO  - AMB 90</option>
                                                        <option value="2">RIO DE JANEIRO - CIEFAS</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Faturado?</label>
                                                    <select class="form-control" name="faturado" id="faturado">
                                                        <option value="1" <?php if (old('faturado') === 1 || old('faturado') == NULL){ echo "selected"; } ?>>Sim</option>
                                                        <option value="0" <?php if (old('faturado') === 0){ echo "selected";} ?>>Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nome <span class="required-red">*</span></label>
                                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ old('nome') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                 <div class="form-group">
                                                    <label class="control-label">Código</label>
                                                    <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Código" value="{{ old('codigo') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Data Inicio</label>
                                                    <input type="text" class="form-control datepicker" name="data_inicio" id="data_inicio" placeholder="Data Inicial da vigência Plano" value="{{ old('data_inicio') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="form-group">
                                                    <input type="radio" name="status" id="status_ativa" value="1" checked>
                                                    <label class="control-label">Pessoa Física</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="radio" name="status" id="status_inativa" value="0">
                                                    <label class="control-label">Pessoa Jurídica</label>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="clearfix"></div>
                                        <a onclick="clickTabServicos()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    
                                </div>
                                
                                <div id="servicos" class="tab-pane fade">
                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Serviços disponíveis no plano:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Cartão Fidelidade
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Agendamento online
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Carteirinha
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Ambulância
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Prontuário Eletrônico
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Boleto Online
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Noturno
                                        </div>
                                        <div class="col-md-2 col-xs-12">
                                            <input type="checkbox" value=""> Home Care
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br/>
                                        <h2>Cadastrar nova vigência</h2>
                                        
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label for="ex3">Faixa etária</label>
                                                <input type="text" id="ex3" class="form-control" placeholder=" ">
                                            </div>
                                            <div class="form-group">
                                                <label for="ex4">até</label>
                                                <input type="email" id="ex4" class="form-control" placeholder=" ">
                                            </div>
                                            <div class="form-group">
                                                <label for="ex4">Data início</label>
                                                <input type="email" id="ex4" class="form-control" placeholder=" ">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success pull-right"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <table class="table table-dark">
                                            <thead>
                                              <tr>
                                                <th scope="col">Faixa etária</th>
                                                <th scope="col">Serviço</th>
                                                <th scope="col">Individual</th>
                                                <th scope="col">Grupo</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Inativar</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">0 à 18 anos</th>
                                                <td>Cartão Fidelidade</td>
                                                <td>R$ 80,00</td>
                                                <td>R$ 45,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Carteirinha</td>
                                                <td>R$ 3,00</td>
                                                <td>R$ 3,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Noturno</td>
                                                <td>R$ 8,00</td>
                                                <td>R$ 7,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">19 à 35 anos</th>
                                                <td>Cartão Fidelidade</td>
                                                <td>R$ 80,00</td>
                                                <td>R$ 45,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Carteirinha</td>
                                                <td>R$ 3,00</td>
                                                <td>R$ 3,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Noturno</td>
                                                <td>R$ 8,00</td>
                                                <td>R$ 7,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">36 à 60 anos</th>
                                                <td>Cartão Fidelidade</td>
                                                <td>R$ 80,00</td>
                                                <td>R$ 45,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Carteirinha</td>
                                                <td>R$ 3,00</td>
                                                <td>R$ 3,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">&nbsp;</th>
                                                <td>Noturno</td>
                                                <td>R$ 8,00</td>
                                                <td>R$ 7,00</td>
                                                <td>01/06/2018</td>
                                                <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        
                                    </div>
                                    
                                    <div class="clearfix"></div>                                        
                                    <a onclick="clickTabCarencias()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                    <a onclick="clickTabDadosCadastrais()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                
                                </div>
                                
                                <div id="carencias" class="tab-pane fade">
                                    
                                    <div class="row">
                                        <h2><i class="fas fa-briefcase-medical"></i> Carências:
                                            <p><small>Os campos que possuem o caractér <span class="required-red">(*)</span> são de preenchimento obrigatório!</small></p>
                                        </h2>
                                        <br/>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Procedimento <span class="required-red">*</span></label>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                        <option value="1">Procedimento A</option>
                                                        <option value="1">Procedimento B</option>
                                                        <option value="1">Procedimento C</option>
                                                        <option value="1">Procedimento D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Carência <span class="required-red">*</span></label>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                        <option value="1">48h</option>
                                                        <option value="1">24h</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Desconto <span class="required-red">*</span></label>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                        <option value="">%</option>
                                                        <option value="">R$</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Valor <span class="required-red">*</span></label>
                                                    <input type="number" class="form-control" name="valor_desconto" id="valor_desconto" placeholder="0" value="{{ old('valor_desconto') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Data Início <span class="required-red">*</span></label>
                                                    <input type="text" class="form-control" name="valor_desconto" id="valor_desconto" placeholder="00/00/0000" value="{{ old('valor_desconto') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label">Periodicidade <span class="required-red">*</span></label>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                        <option value="">Diário</option>
                                                        <option value="">Semanal</option>
                                                        <option value="">Quinzenal</option>
                                                        <option value="">Mensal</option>
                                                        <option value="">Trimestral</option>
                                                        <option value="">Semestral</option>
                                                        <option value="">Anual</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- <div class="row">                                            
                                                <div class="col-md-2 pull-left">
                                                    <label class="control-label pull-left">Condição</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label pull-right ">Inadimplência</label>
                                                </div>
                                            </div> -->
                                        
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <p><label>Condição</label></p>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                        <option value="">1 ou mais pessoas no contrato</option>
                                                        <option value="">2 ou mais pessoas no contrato</option>
                                                        <option value="">3 ou mais pessoas no contrato</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <p><label>Inadimplência</label></p>
                                                    <label for="ex4">Dias</label>
                                                    <input type="email" id="ex4" size="3" class="form-control" placeholder=" ">
                                                </div>
                                                <div class="form-group">
                                                    <p><label for="ex4">&nbsp;</label></p>
                                                    <select class="form-control" name="procedimento" id="procedimento">
                                                            <option value="1">Anula desconto</option>
                                                            <option value="2">Manter desconto</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <p><label for="ex4">&nbsp;</label></p>
                                                    <button type="submit" class="btn btn-success pull-right"><i class="fas fa-plus"></i>Adicionar</button>
                                                </div>
                                            </div>
                                        
                                        <br/> <br/>    
                                                                                    
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Procedimento</th>
                                                        <th scope="col">Sinônimo</th>
                                                        <th scope="col">Carência</th>
                                                        <th scope="col">Desconto</th>
                                                        <th scope="col">Periodicidade</th>
                                                        <th scope="col">Condição</th>
                                                        <th scope="col">Inadimplente</th>
                                                        <th scope="col">Data</th>
                                                        <th scope="col">Valor</th>
                                                        <th scope="col">Editar</th>
                                                        <th scope="col">Inativar</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">Biópsia prostática - até  8 fragmentos</th>
                                                        <td>Biópsia prostática</td>
                                                        <td>3 parcelas</td>
                                                        <td>20%</td>
                                                        <td>Semestral</td>
                                                        <td>1 ou +</td>
                                                        <td>30 dias Anula Desconto</td>
                                                        <td>01/05/15</td>
                                                        <td>R$ 400,00</td>
                                                        <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                        <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">Colposcopia (cérvice uterina e vagina)</th>
                                                        <td>Colposcopia</td>
                                                        <td>3 parcelas</td>
                                                        <td>20%</td>
                                                        <td>Semestral</td>
                                                        <td>1 ou +</td>
                                                        <td>30 dias Anula Desconto</td>
                                                        <td>01/05/15</td>
                                                        <td>R$ 50,00</td>
                                                        <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                        <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">Hemoglobina, dosagem</th>
                                                        <td>Hemoglobina</td>
                                                        <td>48h</td>
                                                        <td>100%</td>
                                                        <td>Mensal</td>
                                                        <td>3 ou +</td>
                                                        <td>30 dias Anula Desconto</td>
                                                        <td>01/05/15</td>
                                                        <td>R$ 0,00</td>
                                                        <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                    <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">Células, pesquisa de células neoplásticas
                                                        (citologia oncótica) - pesquisa e/ou dosagem em Preventivo
                                                        líquidos orgânicos</th>
                                                        <td>Preventivo</td>
                                                        <td>3 parcelas</td>
                                                        <td>20%</td>
                                                        <td>Semestral</td>
                                                        <td>1 ou +</td>
                                                        <td>30 dias Anula Desconto</td>
                                                        <td>01/05/15</td>
                                                        <td>R$ 0,00</td>
                                                        <td><button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button></td>
                                                        <td><button type="submit" class="btn btn-danger"><i class="fas fa-power-off" aria-hidden="true"></i></button></td>
                                                      </tr>
                                                    </tbody>
                                                </table>
                                            
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                            <a onclick="clickTabHistorico()" class="btn btn-primary pull-right">Prosseguir <i class="fas fa-arrow-circle-right"></i></a>
                                            <a onclick="clickTabServicos()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                    </div>
                                    
                                </div>
                                
                                <div id="historico" class="tab-pane fade">
                                    <div class="row">
                                        <br/>
                                        <br/>
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Faixa etária</th>
                                                    <th scope="col">Serviço</th>
                                                    <th scope="col">Individual</th>
                                                    <th scope="col">Grupo</th>
                                                    <th scope="col">Período</th>
                                                    <th scope="col">Variação Ind.</th>
                                                    <th scope="col">Variação Fam</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <th scope="row">0 à 18 anos</th>
                                                    <td>Cartão Fidelidade</td>
                                                    <td>R$ 80,00</td>
                                                    <td>R$ 45,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>16,66%</td>
                                                    <td>14,26%</td>
                                                   <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Carteirinha</td>
                                                    <td>R$ 3,00</td>
                                                    <td>R$ 3,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>50%</td>
                                                    <td>50%</td>
                                                   </tr>
                                                  <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Noturno</td>
                                                    <td>R$ 8,00</td>
                                                    <td>R$ 7,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>15%</td>
                                                    <td>13,25</td>
                                                   </tr>
                                                  <tr>
                                                    <th scope="row">19 à 35 anos</th>
                                                    <td>Cartão Fidelidade</td>
                                                    <td>R$ 80,00</td>
                                                    <td>R$ 45,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>16,66%</td>
                                                    <td>14,26%</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Carteirinha</td>
                                                    <td>R$ 3,00</td>
                                                    <td>R$ 3,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>50%</td>
                                                    <td>50%</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Noturno</td>
                                                    <td>R$ 8,00</td>
                                                    <td>R$ 7,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>15%</td>
                                                    <td>13,25%</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">36 à 60 anos</th>
                                                    <td>Cartão Fidelidade</td>
                                                    <td>R$ 80,00</td>
                                                    <td>R$ 45,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>50%</td>
                                                    <td>50%</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Carteirinha</td>
                                                    <td>R$ 3,00</td>
                                                    <td>R$ 3,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>15%</td>
                                                    <td>13,25%</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>Noturno</td>
                                                    <td>R$ 8,00</td>
                                                    <td>R$ 7,00</td>
                                                    <td>01/06/2018</td>
                                                    <td>16,66%</td>
                                                    <td>14,26%</td>
                                                  </tr>
                                                </tbody>
                                            </table>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                    <a onclick="clickTabCarencias()" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
                                
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('includes_no_body')

<script type="text/javascript">
/*********************
# ->  MUDANÇA DE ABA *
*********************/ 
function clickTabDadosCadastrais() {
    $("#tab_dadoscadastrais").click();
} 
function clickTabServicos() {
    $("#tab_servicos").click();
} 
function clickTabCarencias() {
    $("#tab_carencias").click();
} 
function clickTabHistorico() {
    $("#tab_historico").click();
} 
</script>

@stop