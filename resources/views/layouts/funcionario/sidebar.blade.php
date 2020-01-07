<!-- INICIO NAV TITLE -->
<div class="navbar nav_title" align="center" style="border: 0;">
    <a href="<?php echo url('/funcionario/painel'); ?>" class="site_title">
        <img src="<?php echo asset('images/logotipo_clinicariodejaneiro_hide.png'); ?>" id="logo" class="img-responsive height-100">
    </a>
</div>
<!-- FIM NAV TITLE -->

<div class="clearfix"></div>

<!-- INICIO SIDEBAR MENU -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    
    <!-- INICIO MENU SECTION -->
    <div class="menu_section">
        
        <!-- INICIO UL SIDE MENU -->
        <ul class="nav side-menu">
            
            <li><a href="<?php echo url('funcionario/painel'); ?>"><i class="fas fa-home"></i> <span class="texto-menu">Início</span> </a></li>

            <li>
                <a><i class="fas fa-headset"></i> <span class="texto-menu">Atendimento</span> <span class="fas fa-chevron-down navegacao-chevron"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php echo url('funcionario/painel/atendimento'); ?>"> <span class="fas fa-hands-helping"></span> Atender</a></li>
                    <li><a href="<?php echo url('funcionario/painel/orcamentos'); ?>"> <span class="fas fa-cart-plus"></span> Orçamentos</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fas fa-donate"></i> <span class="texto-menu">Caixa</span> <span class="fas fa-chevron-down navegacao-chevron"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#"> <span class="fas fa-tachometer-alt"></span> Dashboard</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fas fa-dollar-sign"></i> <span class="texto-menu">Financeiro</span> </a></li>

        </ul>

    </div>
    <!-- FIM MENU SECTION -->

</div>
<!-- FIM SIDEBAR MENU -->