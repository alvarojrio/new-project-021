<!-- INICIO CAIXA-PARA-HAMBURGER -->
<div class="caixa-para-hamburger">
	
	<!-- INICIO HAMBURGER -->
	<div class="hamburger">

		<button class="button hamburger__button js-menu__toggle">
			<span class="hamburger__label">Exibir</span>
		</button>

	</div>
	<!-- FIM HAMBURGER -->
	
	<!-- INICIO NAV.MENU -->
	<nav class="menu">
		
		<!-- INICIO UL.LIST.MENU__LIST -->
		<ul class="list menu__list" role="navigation">
			<!--<li class="menu__group">
				<a href="<?php //echo url('medico/painel/prontuarios/resumo/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Prontuário
				</a>
			</li>-->
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/ultimas-consultas/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Prontuário
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/queixa/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Queixa
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/medicamentos-em-uso/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Medicamentos em Uso
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/antecedentes/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Antecedentes
				</a>
			</li>			
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/vacinas/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Vacinas
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/exame-fisico/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Exame Físico
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/anamneses/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Anamneses
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/diagnostico/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Diagnóstico
				</a>
			</li>
			<li class="menu__group">
				<a href="<?php echo url('medico/painel/prontuarios/condutas/' . $codigo_subprontuario_crypt); ?>" class="link menu__link">
					Conduta
				</a>
			</li>
		</ul>
		<!-- FIM UL.LIST.MENU__LIST -->

	</nav>
	<!-- FIM NAV.MENU -->

</div>
<!-- FIM CAIXA-PARA-HAMBURGER -->