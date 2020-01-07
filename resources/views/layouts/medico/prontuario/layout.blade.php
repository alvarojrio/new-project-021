@extends('layouts.medico.layout')

@push('stacks_no_head')

<!-- CSS da estrutura geral da página do prontuário -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/medico/prontuario/geral/estrutura.css'); ?>" />
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('css/medico/prontuario/geral/estrutura-responsivo.css'); ?>" />

@endpush

@section('conteudo')

@include('layouts.medico.prontuario.cabecalho')

<!-- INICIO ROW -->
<div class="row" style="margin-bottom: 8px;">

	<!-- INICIO COLUNA -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		
		@include('layouts.medico.prontuario.caixa-paciente')

	</div>
	<!-- FIM COLUNA -->

</div>
<!-- FIM ROW -->



<!-- INICIO ROW -->
<div class="row">
	
	<!-- INICIO COLUNA ESQUERDA -->
	<div class="col-md-9 col-sm-12 col-xs-12">

		<div class="x_panel x_panel_especial cx_conteudo_prontuario">

			@yield('conteudo_prontuario')

		</div>

	</div>
	<!-- FIM COLUNA ESQUERDA -->


	<!-- INICIO COLUNA DIREITA -->
	<div class="col-md-3 col-sm-12 col-xs-12">
		
		@include('layouts.medico.prontuario.sidebar-auxiliar')

	</div>
	<!-- FIM COLUNA DIREITA -->

</div>
<!-- FIM ROW -->




<!-- ESTRUTURA DE NAVEGAÇÃO DO PRONTUARIO ESPECIAL (APENAS PARA MOBILE) -->
@include('layouts.medico.prontuario.menu-prontuario-mobile')

@stop

@push('stacks_no_body')

<script type="text/javascript">
//======================================================================
// Não é possivel utilizar comandos PHP dentro de um arquivo JS externo, então guardamos URLs e VARIAVEIS PHP numa variavel JS global
// Estas variaveis tem que ser declaradas antes do arquivo JS que irá utilizá-las
//======================================================================
// Variaveis oriundas do PHP
var InicioSessaoSubProntuarioHora = '<?php echo $inicio_sessao_subprontuario[0]; ?>';
var InicioSessaoSubProntuarioMinuto = '<?php echo $inicio_sessao_subprontuario[1]; ?>';
var InicioSessaoSubProntuarioSegundo = '<?php echo $inicio_sessao_subprontuario[2]; ?>';
var UrlConfirmarFinalizacao = '<?php echo url('medico/painel/prontuarios/confirmar-finalizacao/' . $codigo_subprontuario_crypt); ?>';
</script>

<script type="text/javascript" src="<?php echo asset('plugins/moment-js-2.8.4/moment.min.js'); ?>"></script> <script type="text/javascript" src="<?php echo asset('plugins/jquery-stopwatch-countTimer/js/ez.countimer.js'); ?>"></script>

<script type="text/javascript" src="<?php echo asset('js/medico/prontuario/geral/definicoes-globais.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/medico/prontuario/geral/funcoes-customizadas.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/medico/prontuario/geral/acoes-em-eventos.js'); ?>"></script>

@endpush
