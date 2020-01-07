<!-- INICIO NAV TITLE -->
<div class="navbar nav_title" align="center" style="border: 0;">
    <a href="<?php echo url('/medico/painel'); ?>" class="site_title">
        <img src="<?php echo asset('images/logotipo_clinicariodejaneiro_hide.png'); ?>" id="logo" class="img-responsive height-100">
    </a>
</div>
<!-- FIM NAV TITLE -->

<div class="clearfix"></div>

<!-- INICIO SIDEBAR MENU -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    
    <!-- ESTRUTURA DE NAVEGAÇÃO DO PRONTUARIO PADRÃO -->
    @include('layouts.medico.prontuario.menu-prontuario')

</div>
<!-- FIM SIDEBAR MENU -->
