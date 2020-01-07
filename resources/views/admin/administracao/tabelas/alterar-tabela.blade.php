@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Tabelas | Alterar
@stop

@section('includes_no_head')

<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('tabelas-alterar') !!}

<div class="page-title">
	<div class="title_left">
		<h3>Alterar Tabela</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">

	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">

				<!-- INICIO LINHA -->
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
                        <!-- FIM DIV DE ERROS DE VALIDAÇÃO --> 

                </div>
                <!-- FIM LINHA -->

                      

				<form method="POST" action="<?php echo url('admin/painel/tabelas/alterar-tabela'); ?>">
                                                    
				
                
                <!-- INICIO LINHA -->
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-6">

                        <h2>Dados Gerais</h2>

                    </div>

                </div>
                <!-- FIM LINHA -->


                <!-- INICIO LINHA -->
                <div class="row">
                                                                                                                                                                            
                    <div class="form-group col-xs-12 col-sm-4">
						<label class="control-label">Nome <span class="required-red">*</span></label>
						<input type="text" class="form-control" name="nome_tabela" id="nome_tabela" placeholder="Nome" autocomplete="off" value="{{ $tabelas->nome_tabela }}">
					</div>

                    <div class="form-group col-xs-12 col-sm-4">
                        <label class="control-label">Tipo <span class="required-red">*</span></label>
                        <select class="form-control" id="tipo_tabela" name="tipo_tabela">
                            <option value="">Selecione um tipo...</option>
                            <option value="1" <?php if ($tabelas->tipo_tabela == 1) { echo "selected"; } ?>>Convênio</option>
                            <option value="2" <?php if ($tabelas->tipo_tabela == 2) { echo "selected"; } ?>>Particular</option>
                        </select>
                    </div>
                                                        
                    <div class="form-group col-xs-12 col-sm-4">
						<label class="control-label">Data Inicial <span class="required-red">*</span></label>
						<input type="text" class="form-control datepicker" name="data_inicial" id="data_inicial" placeholder="Data Inicial" autocomplete="off" value="<?php echo date('d/m/Y', strtotime($tabelas->data_inicial)); ?>">
					</div>     

                </div>
                <!-- FIM LINHA -->  



                <!-- INICIO LINHA -->
                <div class="row">                                                                 
                                                                                                                                              
                    <div id="div_configuracao_boleto">

                        <div class="form-group col-xs-12 col-sm-6">
                            <label class="control-label">Valor CH <span class="required-red"></span></label>
                            <input type="text" class="form-control" name="valor_ch" id="valor_ch" placeholder="0,00" <?php if (!empty(old('valor_ch'))) { ?>value="<?php echo old('valor_ch'); ?>"<?php } ?>>
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <label class="control-label">Valor Filme <span class="required-red"></span></label>
                            <input type="text" class="form-control" name="valor_filme" id="valor_filme" placeholder="R$ 00,00" <?php if (!empty(old('valor_filme'))) { ?>value="<?php echo old('valor_filme'); ?>"<?php } ?>>
                        </div>     

                    </div>
                        
                </div>
                <!-- FIM LINHA --> 



                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="col-md-12">

                        <br />

                        <a href="{{ url('admin/painel/procedimentos/cadastrar-procedimento/' .  Crypt::encrypt($tabelas->cod_tabela)) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Procedimento</a>
                                    
                        <a class="btn btn-info" href="{{ url('admin/painel/categorias') }}"><i class="fa fa-bars"></i> Gerenciar Categorias</a>                                          

                        <a href="{{ url('admin/painel/tabelas/definir-valores-procedimentos-ativos-tabela/' .  Crypt::encrypt($tabelas->cod_tabela)) }}" class="btn btn-success"><i class="fa fa-dollar-sign"></i> Definir Valores</a>

                        <br /><br />

                    </div>

                </div>
                <!-- FIM LINHA -->



                <!-- INICIO LINHA -->
                <div class="row">
                                                            
                    <div class="col-xs-12"> 

                        <h2>Lista de Procedimentos Ativos</h2>
                        
                        <!-- INICIO DIV.TABLE-RESPONSIVE -->
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered tabela">
                            <thead>
                            <tr>                                                        
                                <th>Código</th>
                                <th>Descrição</th>                                                        
                                <th>Custo R$</th>
                                <th>Venda R$</th>
                                <th>Categoria</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>                                                       
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0; ?>   

                            @foreach ($procedimentos as $procedimento)

                                <tr>  
                                    <td>{{ $procedimento->codigo }}</td>                                                        
                                    <td>{{ mb_strtoupper($procedimento->descricao) }}</td>
                                    <td>{{ $procedimento->valor_custo }}</td>
                                    <td>{{ $procedimento->valor_venda }}</td>
                                    <td><?php echo (!empty($procedimento->descricao_categoria)) ? $procedimento->descricao_categoria : '-'; ?></td>
                                 
                                    <td>
                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/procedimentos/visualizar-procedimento/'.  Crypt::encrypt($procedimento->cod_procedimento)) }}">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="{{ url('admin/painel/procedimentos/alterar-procedimento/'.   Crypt::encrypt($procedimento->cod_procedimento)) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar" href="{{ url('admin/painel/procedimentos/inativar-procedimento/'.   Crypt::encrypt($procedimento->cod_procedimento)) }}">
                                            <i class="fa fa-power-off"></i>
                                        </a>
                                    </td> 
                                </tr> 

                            @endforeach

                            </tbody>
                            </table>                       

                        </div>
                        <!-- FIM DIV.TABLE-RESPONSIVE -->

                    </div>

                </div>
                <!-- FIM LINHA -->
                                                                
                
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <div class="clearfix"></div>

                    <hr />

                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-pencil"></i> Salvar</button>
                        <input type="hidden" id="cod_tabela" name="cod_tabela" value="<?php echo $codigo_tabela; ?>" />
                        <a href="{{ url('admin/painel/tabelas/') }}" class="btn btn-default pull-right">Voltar</a>
                    </div>

                </div>
                <!-- FIM LINHA -->
                                                                                                                    
				</form>

			</div>
		</div>
	</div>

</div>

@stop

@section('includes_no_body')

<script type="text/javascript" src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

<script type="text/javascript">
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    weekStart: 0,
    endDate: '+5y',
    startDate: '0d',
    todayHighlight: true
});

function confirmaCampo(botao) {
    if ($(botao).parent().parent().find('input').val() != "") {
        $(botao).parent().parent().find('input').attr('readonly', true);
        $(botao).attr('onclick', 'removeCampo(this)').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-remove"></i>');

        var clone = $("#clone_div").clone().removeClass('hidden').removeAttr('id');

        $("#div_campos_adicionais").append(clone);
    }
    ;
}

function removeCampo(botao) {
    $(botao).parent().parent().parent().parent().remove();
}

/*
 # FUNÇÃO PARA HABILITAR/DESABILITAR CAMPO
 */
// Ao carregar Inicializo a função 
habilitarDesabilitarCampoConfiguracaoBoleto();

function habilitarDesabilitarCampoConfiguracaoBoleto() {
    var tipo_cobranca = $("#tipo_cobranca option:selected").val();
    if (tipo_cobranca == "unidade") {
        $("#div_configuracao_procedimentos").removeClass('hidden');
        $("#div_configuracao_boleto").addClass('hidden');

    } else if (tipo_cobranca == "boleto") {
        $("#div_configuracao_boleto").removeClass('hidden');
        $('#configuracao_boleto').prop("disabled", false);
        $("#div_configuracao_procedimentos").addClass('hidden');
    } else {
        $("#div_configuracao_boleto").addClass('hidden');
        $("#div_configuracao_procedimentos").addClass('hidden');
        $('#configuracao_boleto').prop("disabled", true);
        $('configuracao_boleto').val('');
    }
}

//Configuração da tabela
$(".tabela").DataTable({
    stateSave: false,
    "processing": true,
    "language": {
        "lengthMenu": "Mostrar _MENU_ itens por página",
        "zeroRecords": "Nenhum resultado encontrado",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Nenhum resultado disponível",
        "infoFiltered": "(filtrado de _MAX_ itens ao total)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sPrevious": "Anterior",
            "sNext": "Próxima"
        }
    },
    order: [[ 1, "asc" ]]
});
</script>

@stop