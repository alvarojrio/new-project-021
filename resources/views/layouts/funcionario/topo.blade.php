<!-- INICIO NAV MENU -->
<div class="nav_menu">

    <!-- INICIO NAV -->
    <nav>

        <!-- DIV TOOGLE (Abre / Fecha Sidebar) -->
        <div class="nav toggle"><a id="menu_toggle"><i class="fas fa-bars"></i></a></div>

        <!-- INICIO UL PAI -->
        <ul class="nav navbar-nav navbar-right">

            <!-- INICIO DROPDOWN DE PERFIL -->
            <li class="">                
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo (!empty(Auth::guard('funcionario')->user()->funcionarios->pessoa->foto)) ? asset('uploads/pessoas/' . Auth::guard('funcionario')->user()->funcionarios->pessoa->foto) : asset('images/sem_foto.jpg'); ?>" alt="" />
                    <?php echo Auth::guard('funcionario')->user()->usuario; // para nome: Auth::guard('admin')->user()->funcionarios->pessoa->nome; ?>
                    <span class="fas fa-angle-down"></span>
                </a>

                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li class="visible-xs" style="margin-bottom: 15px;">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="far fa-hospital"></span> <?php echo Session::get('nome-unidade-em-uso'); ?>  <i class="fas fa-angle-down" aria-hidden="true"></i>
                            <?php $obj_unidades = app('unidades-que-tenho-acesso'); ?>
                        </a>
                        <?php if (!empty($obj_unidades)) { ?>
                        <ul class="dropdown-submenu">
                            <?php 
                            foreach ($obj_unidades as $uh) : 
                            ?>
                                <li <?php if ($uh->cod_unidade == Session::get('codigo-unidade-em-uso')) { ?>class="active"<?php } ?>><a href="<?php echo url('funcionario/trocar-unidade/' . \Crypt::encrypt($uh->cod_unidade)); ?>"><?php echo $uh->nome_unidade; ?></a></li>
                            <?php 
                            endforeach; 
                            ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <li><a href="javascript:;"><i class="fa fa-user pull-right"></i> Meu Perfil</a></li>
                    <li><a href="javascript:;"><i class="fa fa-cog pull-right"></i> Configurações</a></li>
                    <li><a href="<?php echo URL::route('funcionario-logout'); ?>"><i class="fas fa-sign-out-alt pull-right"></i> Sair do sistema</a></li>
                </ul>
            </li>
            <!-- FIM DROPDOWN DE PERFIL -->


            <!-- INICIO DROPDOWN DE ESCOLHA DA UNIDADE -->
            <li class="hidden-xs">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="far fa-hospital"></span> <?php echo Session::get('nome-unidade-em-uso'); ?>  <i class="fas fa-angle-down" aria-hidden="true"></i>
                    <?php $obj_unidades = app('unidades-que-tenho-acesso'); ?>
                </a>
                <?php if (!empty($obj_unidades)) { ?>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <?php 
                    foreach ($obj_unidades as $uh) : 
                    ?>
                        <li <?php if ($uh->cod_unidade == Session::get('codigo-unidade-em-uso')) { ?>class="active"<?php } ?>><a href="<?php echo url('funcionario/trocar-unidade/' . \Crypt::encrypt($uh->cod_unidade)); ?>"><?php echo $uh->nome_unidade; ?></a></li>
                    <?php 
                    endforeach; 
                    ?>
                </ul>
                <?php } ?>
            </li>
            <!-- FIM DROPDOWN DE ESCOLHA DA UNIDADE -->

        </ul>
        <!-- FIM UL PAI -->

    </nav>
    <!-- FIM NAV -->
    
</div>
<!-- INICIO NAV MENU -->