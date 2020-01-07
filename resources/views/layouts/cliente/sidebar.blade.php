<!-- INICIO NAV TITLE -->
<div class="navbar nav_title" style="border: 0;">
    <a href="{{ url('/') }}" class="site_title">
        <img src="{{ asset('images/logo.jpg') }}" id="logo" class="img-responsive height-100">
    </a>
</div>
<!-- FIM NAV TITLE -->
<div class="clearfix"></div>

<!-- INICIO SIDEBAR MENU -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <?php $uri1 = Request::segment(1); ?>
    <!-- INICIO MENU SECTION -->
    <div class="menu_section">
        <!-- INICIO UL SIDE MENU -->
        <ul class="nav side-menu">
            
            @if($uri1 == "" || $uri1 == "convenios" || $uri1 == "tabelas" || $uri1 == "" || $uri1 == "planos" || $uri1 == "unidades" || $uri1 == "funcionarios" || $uri1 == "empresas" || $uri1 == "associados" || $uri1 == "salas_espera" || $uri1 == "consultorios" || $uri1 == "dependentes" || $uri1 == "produtos" || $uri1 == "especialidades" || $uri1 == "medicos" || $uri1 == "bloqueios" || $uri1 == "logs")
                <li class="active">
            @else
                <li>
            @endif
                <a>
                    <i class="fa fa-id-card"></i> Administrativo <span class="fa fa-chevron-down"></span>
                </a>
                @if($uri1 == "" || $uri1 == "convenios" || $uri1 == "tabelas" || $uri1 == "" || $uri1 == "planos" || $uri1 == "unidades" || $uri1 == "funcionarios" || $uri1 == "empresas" || $uri1 == "associados" || $uri1 == "salas_espera" || $uri1 == "consultorios" || $uri1 == "dependentes" || $uri1 == "produtos" || $uri1 == "especialidades" || $uri1 == "medicos" || $uri1 == "bloqueios" || $uri1 == "logs")
                    <ul class="nav child_menu" style="display:block">
                @else
                    <ul class="nav child_menu">
                @endif
                    <li <?php if($uri1 == ""){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Unidade") || $permissoes->TemPermissao("Cadastrar_Unidade") || $permissoes->TemPermissao("Alterar_Unidade") || $permissoes->TemPermissao("Excluir_Unidade") || $permissoes->TemPermissao("Upload_Unidade")) { ?>
                        <li <?php if($uri1 == "unidades"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/unidades');?>"><i class="fa fa-home"></i> Unidades</a></li>
                    <?php } ?>
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Funcionario") || $permissoes->TemPermissao("Cadastrar_Funcionario") || $permissoes->TemPermissao("Alterar_Funcionario") || $permissoes->TemPermissao("Excluir_Funcionario") || $permissoes->TemPermissao("Upload_Funcionario")) { ?>
                        <li <?php if($uri1 == "funcionarios"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/funcionarios');?>"><i class="fa fa-id-card-o"></i> Funcionários</a></li>
                    <?php } ?>
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Empresa") || $permissoes->TemPermissao("Cadastrar_Empresa") || $permissoes->TemPermissao("Alterar_Empresa") || $permissoes->TemPermissao("Excluir_Empresa") || $permissoes->TemPermissao("Upload_Empresa")) { ?>
                        <li <?php if($uri1 == "empresas"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/empresas');?>"><i class="fa fa-building-o"></i> Empresas</a></li>
                    <?php } ?>
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Cliente") || $permissoes->TemPermissao("Cadastrar_Cliente") || $permissoes->TemPermissao("Alterar_Cliente") || $permissoes->TemPermissao("Excluir_Cliente") || $permissoes->TemPermissao("Upload_Cliente") || $permissoes->TemPermissao("Visualizar_Dependente") || $permissoes->TemPermissao("Cadastrar_Dependente") || $permissoes->TemPermissao("Alterar_Dependente") || $permissoes->TemPermissao("Excluir_Dependente") || $permissoes->TemPermissao("Upload_Dependente")) { ?>
                        <li <?php if($uri1 == "associados" || $uri1 == "dependentes"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/associados');?>"><i class="fa fa-group"></i> Clientes</a></li>
                    <?php } ?>
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Tabela") || $permissoes->TemPermissao("Cadastrar_Tabela") || $permissoes->TemPermissao("Alterar_Tabela") || $permissoes->TemPermissao("Excluir_Tabela") || $permissoes->TemPermissao("Importar_Tabela")) { ?>
                        <li <?php if($uri1 == "tabelas"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/tabelas');?>"><i class="fa fa-table"></i> Tabelas</a></li>
                    <?php } ?>

                    <!-- <li <?php //if($uri1 == "produtos"){ echo "class='current-page'"; }?>><a href="<?php //echo url('/produtos');?>"><i class="fa fa-wrench"></i> Produtos/Serviços</a></li> -->
                    
                    <?php if($permissoes->TemPermissao("Visualizar_Especialidade") || $permissoes->TemPermissao("Cadastrar_Especialidade") || $permissoes->TemPermissao("Alterar_Especialidade") || $permissoes->TemPermissao("Excluir_Especialidade") || $permissoes->TemPermissao("Vincular_Especialidade")) { ?>
                        <li <?php if($uri1 == "especialidades"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/especialidades');?>"><i class="fa fa-list-alt"></i> Especialidades Médicas</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Medico") || $permissoes->TemPermissao("Cadastrar_Medico") || $permissoes->TemPermissao("Alterar_Medico") || $permissoes->TemPermissao("Excluir_Medico") || $permissoes->TemPermissao("Upload_Medico") || $permissoes->TemPermissao("Vincular_Medico")) { ?>
                        <li <?php if($uri1 == "medicos"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/medicos');?>"><i class="fa fa-plus"></i> Médicos</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Convenio")  || $permissoes->TemPermissao("Cadastrar_Convenio") || $permissoes->TemPermissao("Alterar_Convenio") || $permissoes->TemPermissao("Excluir_Convenio")) { ?>
                        <li <?php if($uri1 == "convenios"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/convenios');?>"><i class="fa fa-star"></i> Convenios</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Plano") || $permissoes->TemPermissao("Cadastrar_Plano") || $permissoes->TemPermissao("Alterar_Plano") || $permissoes->TemPermissao("Excluir_Plano") || $permissoes->TemPermissao("Migrar_Plano") || $permissoes->TemPermissao("Vincular_Plano") || $permissoes->TemPermissao("Clonar_Plano")) { ?>
                        <li <?php if($uri1 == "planos"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/planos');?>"><i class="fa fa-bookmark"></i> Planos</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Sala") || $permissoes->TemPermissao("Cadastrar_Sala") || $permissoes->TemPermissao("Alterar_Sala") || $permissoes->TemPermissao("Excluir_Sala")) { ?>
                        <li <?php if($uri1 == "salas_espera"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/salas_espera');?>"><i class="fa fa-inbox"></i> Salas de Espera</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Consultorio") || $permissoes->TemPermissao("Cadastrar_Consultorio") || $permissoes->TemPermissao("Alterar_Consultorio") || $permissoes->TemPermissao("Excluir_Consultorio")) { ?>
                        <li <?php if($uri1 == "consultorios"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/consultorios');?>"><i class="fa fa-star-o"></i> Consultórios</a></li>
                    <?php } ?>
                    
                    <!-- Sem permissão ainda -->
                    <li <?php if($uri1 == "vendedores"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/vendedores');?>"><i class="fa fa-user"></i> Vendedores</a></li>

                    <!-- Sem permissão ainda -->
                    <li <?php if($uri1 == "categorias"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/categorias');?>"><i class="fa fa-server"></i> Categorias</a></li>

                    <!-- Sem permissão ainda -->
                    <li <?php if($uri1 == "favorecidos"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/favorecidos');?>"><i class="fa fa-handshake-o"></i> Favorecidos</a></li>

                    <?php if($permissoes->TemPermissao("Visualizar_Feriado") || $permissoes->TemPermissao("Cadastrar_Feriado") || $permissoes->TemPermissao("Alterar_Feriado") || $permissoes->TemPermissao("Excluir_Feriado")) { ?>
                        <li <?php if($uri1 == "feriados"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/feriados');?>"><i class="fa fa-calendar"></i> Feriados</a></li>
                    <?php } ?>

                    <?php if($permissoes->TemPermissao("Visualizar_Perfil") || $permissoes->TemPermissao("Cadastrar_Perfil") || $permissoes->TemPermissao("Alterar_Perfil") || $permissoes->TemPermissao("Excluir_Perfil")) { ?>
                        <li <?php if($uri1 == "perfis"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/perfis');?>"><i class="fa fa-unlock-alt"></i> Perfis de Usuário</a></li>
                    <?php } ?>

                     <li <?php if($uri1 == "formas_pagamentos"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/formas_pagamentos');?>"><i class="fa fa-dollar"></i> Formas de Pagamento</a></li>
                     
                     
                    <!-- Sem permissão ainda Teste Bloqueio Não está funcionando-->    
                    <?php if($permissoes->TemPermissao("Visualizar_Bloqueio") || 
                            $permissoes->TemPermissao("Cadastrar_Bloqueio") || 
                            $permissoes->TemPermissao("Alterar_Bloqueio") || 
                            $permissoes->TemPermissao("Excluir_Bloqueio")) { ?>
                        <li <?php if($uri1 == "bloqueios"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/bloqueios');?>"><i class="fa fa-ban"></i> Bloqueios</a></li>
                    <?php } ?>
                    
                     <!--Sem permissão ainda Teste Log-->
                     <li <?php if($uri1 == "logs"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/logs');?>"><i class="fa fa-history"></i> Log</a></li>
                                         
                </ul>
            </li>
            @if($uri1 == "dashboard_atendimento" || $uri1 == "agenda" || $uri1 == "orcamentos" || $uri1 == "carteirinhas" || $uri1 == "atendimentos")
                <li class="active">
            @else
                <li>
            @endif
                <a>
                    <i class="fa fa-calendar"></i> Agendamento <span class="fa fa-chevron-down"></span>
                </a>
                @if($uri1 == "dashboard_atendimento")
                    <ul class="nav child_menu" style="display:block">
                @else
                    <ul class="nav child_menu">
                @endif
                    <li <?php if($uri1 == "dashboard_agendamento"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/dashboard_agendamento');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ul>
            </li>
            @if($uri1 == "agenda" || $uri1 == "orcamentos" || $uri1 == "carteirinhas" || $uri1 == "atendimentos")
                <li class="active">
            @else
                <li>
            @endif
                <a>
                    <i class="fa fa-id-badge"></i> Atendimento <span class="fa fa-chevron-down"></span>
                </a>
                @if($uri1 == "dashboard_atendimento" || $uri1 == "agenda" || $uri1 == "orcamentos" || $uri1 == "carteirinhas" || $uri1 == "atendimentos")
                    <ul class="nav child_menu" style="display:block">
                @else
                    <ul class="nav child_menu">
                @endif
                    <li <?php if($uri1 == "dashboard_atendimento"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/dashboard_atendimento');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li <?php if($uri1 == "orcamentos"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/orcamentos');?>"><i class="fa fa-dollar"></i> Orçamentos</a></li>
                    <li <?php if($uri1 == "carteirinhas"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/carteirinhas');?>"><i class="fa fa-address-card-o"></i> Carteirinhas</a></li>
                </ul>
            </li>
            @if($uri1 == "dashboard_caixa")
                <li class="active">
            @else
                <li>
            @endif
                <a>
                    <i class="fa fa-money"></i> Caixa <span class="fa fa-chevron-down"></span>
                </a>
                @if($uri1 == "dashboard_caixa")
                    <ul class="nav child_menu" style="display:block">
                @else
                    <ul class="nav child_menu">
                @endif
                    <li <?php if($uri1 == "dashboard_caixa"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/dashboard_caixa');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ul>
            </li>
            @if($uri1 == "dashboard_medico")
                <li class="active">
            @else
                <li>
            @endif
                <a>
                    <i class="fa fa-plus"></i> Médico <span class="fa fa-chevron-down"></span>
                </a>
                @if($uri1 == "dashboard_medico")
                    <ul class="nav child_menu" style="display:block">
                @else
                    <ul class="nav child_menu">
                @endif
                    <li <?php if($uri1 == "dashboard_medico"){ echo "class='current-page'"; }?>><a href="<?php echo url('admin/painel/dashboard_medico');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                </ul>
            </li>
        </ul>
        <!-- FIM UL SIDE MENU -->
    </div>
    <!-- FIM MENU SECTION -->
</div>
<!-- FIM SIDEBAR MENU -->