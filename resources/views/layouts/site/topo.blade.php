<!-- INICIO NAV MENU -->
<div class="nav_menu">
    <!-- INICIO NAV -->
    <nav>
        <!-- DIV TOOGLE (Abre / Fecha Sidebar) -->
        <div class="nav toggle"><a id="menu_toggle"><i class="fa fa-bars"></i></a></div>
        <!-- INICIO UL PAI -->
        <ul class="nav navbar-nav navbar-right">
            <!-- INICIO DROPDOWN DE PERFIL -->
            <li class="">
                
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo asset('images/img.jpg');?>" alt=""><?php echo Auth::guard('cliente')->user()->usuario; ?>
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"><i class="fa fa-user pull-right"></i> Meu Perfil</a></li>
                    <li><a href="javascript:;"><i class="fa fa-cog pull-right"></i> Configurações</a></li>
                    <li><a href="<?php echo URL::route('cliente-logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Sair do sistema</a></li>
                </ul>
            </li>
            <!-- FIM DROPDOWN DE PERFIL -->
            <!-- INICIO DROPDOWN DE ESCOLHA DA UNIDADE -->
            <li class="">
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    << TODAS AS UNIDADES >>
                </a>
            </li>
            <!-- FIM DROPDOWN DE ESCOLHA DA UNIDADE -->
        </ul>
        <!-- FIM UL PAI -->
    </nav>
    <!-- FIM NAV -->
</div>
<!-- INICIO NAV MENU -->