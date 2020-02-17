<!-- INICIO NAV TITLE -->


<div class="navbar nav_title" align="center" style="border: 0;">
    <a href="{{ url('/admin/painel') }}" class="site_title">
        <img src="{{ asset('images/logotipo_clinicariodejaneiro_hide.png') }}" id="logo" class="img-responsive height-100">
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
            
            <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> <span class="texto-menu">Início</span> </a></li>

           
            <li>
                <a><i class="far fa-handshake"></i> <span class="texto-menu">Eventos</span> <span class="fas fa-chevron-down navegacao-chevron"></span></a>
                

                <ul class="nav child_menu">
                    <li><a href="<?php echo url('/evento/listar'); ?>"> <span class="far fa-handshake"></span> Listar Eventos</a></li>
                   
                </ul>
            </li>


        </ul>

    </div>
    <!-- FIM MENU SECTION -->

</div>
<!-- FIM SIDEBAR MENU -->