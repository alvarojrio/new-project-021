@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contratos | Editar Vínculos
@stop

@section('includes_no_head')

<!-- CSS da página -->
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>" />
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>" />
    
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-fisica-editar-vinculos-contrato', $contrato) !!}

<div class="page-title">
    <div class="title_left">
        <h3>Editar Vínculos dos Membros do Contrato</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form id="frm_editar_vinculos" method="post" action="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/editar-vinculos'); ?>">

                <!-- ##################### INICIO CAIXA ################ -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <!-- INICIO LINHA -->
                        <div class="row">

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Nº do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo $contrato->numero_contrato_pf; ?></span>
                            </div>

                            <div class="form-group col-md-6 col-xs-12">
                                <label class="control-label">Data de inclusão do contrato</label> <br />
                                <span class="letra-azul-claro"><?php echo date('d/m/Y', strtotime($contrato->data_inclusao)); ?></span>
                            </div>

                        </div>
                        <!-- FIM LINHA -->

                    </div>
                </div>
                <!-- ##################### FIM CAIXA ################### -->
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        Utilize o formulário a seguir para efetuar alterações nos <span class="letra-azul-claro"><b>vínculos</b></span> dos membros deste contrato. Lembre-se de que apenas 1 membro pode possuir o vínculo <span class="letra-azul-claro"><b>RESP. FINANCEIRO</b></span>.

                    </div>

                </div>
                <!-- FIM LINHA -->

                <br />

                <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary">
                        <td>CPF</td>
                        <td>Nome</td>
                        <td>Vínculo</td>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    if (count($membros_ativos) > 0) { 
                    ?>

                        <?php
                        foreach ($membros_ativos as $mem) :

                            // Busco dados da Pessoa Fisica relacionada ao Membro
                            $pessoa_fisica = drclub\models\Pessoa_fisica::where('cod_pessoa_fisica', '=', $mem->cod_pessoa_fisica)->first();
                        ?>

                            <tr>
                                <td><?php echo (!empty($pessoa_fisica->clientes->pessoa->cpf)) ? $pessoa_fisica->clientes->pessoa->cpf : '-'; ?></td>
                                <td><?php echo $pessoa_fisica->clientes->pessoa->nome; ?></td>
                                <td>
                                    <select class="form-control input-sm" name="membro[<?php echo $mem->pivot->cod_membro; ?>]" id="membro[<?php echo $mem->pivot->cod_membro; ?>]">
                                        <option value="">SELECIONE</option>
                                        <option value="1" 
                                            <?php if (old('membro.' . $mem->pivot->cod_membro) == 1) { ?>
                                                selected="selected"
                                            <?php } elseif ($mem->pivot->vinculo == 1) { ?>
                                                selected="selected"
                                            <?php } ?>
                                        >
                                            MEMBRO
                                        </option>
                                        <option value="2" 
                                            <?php if (old('membro.' . $mem->pivot->cod_membro) == 2) { ?>
                                                selected="selected"
                                            <?php } elseif ($mem->pivot->vinculo == 2) { ?>
                                                selected="selected"
                                            <?php } ?>
                                        >
                                            MEMBRO E RESP. FINANCEIRO
                                        </option>
                                        <option value="3" 
                                            <?php if (old('membro.' . $mem->pivot->cod_membro) == 3) { ?>
                                                selected="selected"
                                            <?php } elseif ($mem->pivot->vinculo == 3) { ?>
                                                selected="selected"
                                            <?php } ?>
                                        >
                                            RESP. FINANCEIRO
                                        </option>
                                    </select>
                                </td>
                            </tr> 

                        <?php
                            unset($pessoa_fisica);

                        endforeach;
                        ?>

                    <?php
                    } else {
                    ?>

                        <tr>
                            <td colspan="3">Não há registros para serem exibidos</td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
                </table>

                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="form-group col-md-12 col-xs-12">
                        
                        <input type="hidden" id="cod_contrato_pessoa_fisica_plano" name="cod_contrato_pessoa_fisica_plano" value="<?php echo Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano); ?>" /> 

                        <!-- BOTÃO PARA ATUALIZAR VINCULOS -->
                        <button type="submit" id="btn_atualizar_vinculos" class="btn btn-md btn-success pull-right"><i class="fa fa-save"></i> Atualizar Vínculos</button>

                        <!-- BOTÃO RETORNAR -->
                        <a class="btn btn-md btn-danger pull-right" id="btn_retornar" href="<?php echo url(app('prefixo') . '/painel/contratos/pessoafisica/visualizar/' . Crypt::encrypt($contrato->cod_contrato_pessoa_fisica_plano)); ?>">
                            <i class="fa fa-arrow-circle-left"></i> Voltar
                        </a> 

                    </div>

                </div>
                <!-- FIM LINHA -->

                </form>

            </div>
        </div>
    </div>

</div>

@stop
