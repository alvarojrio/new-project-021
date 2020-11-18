<!-- INICIO NAV TITLE -->


<div class="navbar nav_title" align="center" style="border: 0;">
    <a href="<?php echo e(url('/admin/painel')); ?>" class="site_title">
        <img src="<?php echo e(asset('images/logotipo_clinicariodejaneiro_hide.png')); ?>" id="logo" class="img-responsive height-100">
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
            
            <li><a href="<?php echo url('/evento/listar'); ?>"><i class="fas fa-chevron-left"></i> <span class="texto-menu">Voltar</span> </a></li>

           
               <li><a href="<?php echo url('/evento/basico/'.$getMenu); ?>"><i class="fas fa-play"></i> <span class="texto-menu">Básico</span> </a></li>


               <li><a href="<?php echo url('/evento/detalhe/'.$getMenu); ?>"><i class="fas fa-book-open"></i> <span class="texto-menu">Detalhes</span> </a></li>


               <li><a href="<?php echo url('/evento/tickets/'.$getMenu); ?>"><i class="fas fa-ticket-alt"></i> <span class="texto-menu">Ingressos</span> </a></li>


               <li><a href="<?php echo url('/'); ?>"><i class="fas fa-money-check-alt"></i> <span class="texto-menu">Pagamentos</span> </a></li>




        </ul>

    </div>
    <!-- FIM MENU SECTION -->

</div>
<!-- FIM SIDEBAR MENU --><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/layouts/administracao/sidebar.blade.php ENDPATH**/ ?>