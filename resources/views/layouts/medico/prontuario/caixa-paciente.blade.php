<!-- CAIXA DOS ERROS GERAIS DO PRONTUARIO -->
<div class="erro_prontuario_geral"></div>


<!-- INICIO CAIXA PACIENTE -->
<div class="text-white bg-success caixa-paciente caixa-paciente-verde">
	
	<!-- Inicio Linha -->
	<div class="row">

		<!-- Inicio Coluna Esquerda -->
		<div class="col-lg-1 col-md-2 col-sm-3 col-xs-4">

			<!-- Foto do Paciente -->
			<img src="<?php echo asset('uploads/pessoas/carol_danvers.jpg'); ?>" alt="foto do paciente" class="img-responsive prontuario_foto_paciente" />

		</div>
		<!-- Fim Coluna Esquerda -->
		


		<!-- Inicio Coluna Central -->
		<div class="col-lg-8 col-md-7 col-sm-9 col-xs-8">
			
			<!-- Dados do Paciente -->
			<h4><?php echo $dados_paciente['nome']; ?></h4>
			
			<div class="row">

				<div class="col-md-2 col-xs-4">
				<small>Carteirinha:</small> <br /> <?php echo $dados_paciente['carteirinha']; ?>
				</div>

				<div class="col-md-2 col-xs-4">
				<small>Sexo:</small> <br /> <?php echo $dados_paciente['sexo']; ?>
				</div>

				<div class="col-md-2 col-xs-4">
				<small>Idade:</small> <br /> <?php echo $dados_paciente['idade']; ?>
				</div>

				<div class="col-md-2 col-xs-4">
				<small>Peso:</small> <br /> <?php echo $dados_paciente['peso']; ?>
				</div>

				<div class="col-md-2 col-xs-4">
				<small>Altura:</small> <br /> <?php echo $dados_paciente['altura']; ?>
				</div>

			</div>

		</div>
		<!-- Fim Coluna Central -->
		


		<!-- Inicio Coluna Direita -->
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 linha-relogio-prontuario">
			
			<!-- Inicio Caixa do Relogio -->
			<div class="well well-md well-relogio">
				
				<span class="well-icone-relogio"><i class="far fa-clock"></i></span>
				<span class="well-horas"></span>

			</div>
			<!-- Fim Caixa do Relogio -->	

			<!-- Inicio Linha dos Botões de Controle do Relogio -->
			<div class="row">

				<div class="col-md-6 col-xs-6">

					<a class="btn btn-block btn-warning" id="btn_pausar_atendimento" href="javascript:void(null);">
						<i class="fa fa-pause"></i> Pausar
					</a>

				</div>

				<div class="col-md-6 col-xs-6">

					<a class="btn btn-block btn-danger" id="btn_finalizar_atendimento" href="javascript:void(null);">
						<i class="fa fa-stop"></i> Finalizar
					</a>

				</div>

			</div>
			<!-- Fim Linha dos Botões de Controle do Relogio -->

		</div>
		<!-- Fim Coluna Direita -->

	</div>
	<!-- Fim Linha -->

</div>
<!-- FIM CAIXA PACIENTE -->