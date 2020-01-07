@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Perfis de Usuário | Visualizar
@stop

@section('includes_no_head')

@stop

@section('conteudo')

{!! Breadcrumbs::render('perfis-visualizar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Visualizar Perfil</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- INICIO LINHA -->
                <div class="row">

                    <!-- INICIO COLUNA -->
                    <div class="col-md-12 col-xs-12">
                        
                        <!-- INICIO PANEL -->
                        <div class="panel panel-default subpanel_pessoa">
                            <div class="panel-heading">INFORMAÇÕES BÁSICAS</div>
                            <div class="panel-body">
                                
                                <!-- INICIO LINHA -->
                                <div class="row">
                                    
                                    <div class="form-group col-md-12 col-xs-12">

                                        <label class="control-label">Nome</label> <br />
                                        <span class="letra-azul-claro"><?php echo $perfil->display_name; ?></span>

                                    </div>

                                </div>
                                <!-- FIM LINHA -->

                                <!-- INICIO LINHA -->
                                <div class="row">
                                    
                                    <div class="form-group col-md-12 col-xs-12">

                                        <label class="control-label">Descrição</label> <br />
                                        <span class="letra-azul-claro"><?php echo $perfil->description; ?></span>

                                    </div>

                                </div>
                                <!-- FIM LINHA -->

                            </div>
                        </div>
                        <!-- FIM PANEL -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->

            

                <!-- INICIO LINHA -->
                <div class="row" style="margin-top: 10px;">

                    <!-- INICIO COLUNA -->
                    <div class="col-md-12 col-xs-12">
                        
                        <!-- INICIO PANEL -->
                        <div class="panel panel-default subpanel_pessoa">
                            <div class="panel-heading">PERMISSÕES <small>(<?php echo $total_permissoes_do_perfil; ?> / <?php echo $total_permissoes; ?> permissões)</small> </div>
                            <div class="panel-body">
                                
                                <!-- INICIO LINHA -->
                                <div class="row"> 

                                    <?php
                                    // Contador
                                    $i = 1;

                                    // Faço loop pelas seções das permissões
                                    foreach ($secoes as $s) : 
                                    ?>

                                        <!-- INICIO COLUNA -->
                                        <div class="form-group col-sm-6 col-xs-12">
                                            
                                            <!-- INICIO PANEL -->
                                            <div class="panel panel-info">
                                                <div class="panel-heading clearfix" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
                                                    <span data-toggle="collapse" href="#collapse<?php echo $i; ?>"><?php echo mb_strtoupper($s->secao); ?></span>
                                                    <span class="pull-right">
                                                        <a data-toggle="collapse" href="#collapse<?php echo $i; ?>">
                                                            <i class="fas fa-chevron-down"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse muda-collapse">

                                                    <div class="panel-body">
                                                        
                                                        <?php
                                                        // Busco permissões do perfil atual relacionados a seção atual
                                                        $permissoes_do_perfil = DB::table('permission_role AS pr')
                                                                                  ->leftJoin('permissions AS p', 'p.id', '=', 'pr.permission_id')
                                                                                  ->where('p.secao', '=', $s->secao)
                                                                                  ->where('pr.role_id', '=', $perfil->id)
                                                                                  ->pluck('p.id');
                                                        ?>

                                                        <?php
                                                        // Checo se o perfil têm permissões desta seção
                                                        if (count($permissoes_do_perfil) > 0) {
                                                        ?>

                                                            <?php
                                                            // Busco permissões da seção atual
                                                            $permissoes = drclub\models\Permission::where('secao', '=', $s->secao)->get();

                                                            // Faço loop pelas permissões
                                                            foreach ($permissoes as $p) :
                                                            ?>
                                                                
                                                                <?php
                                                                // Checo se o id da permissão consta no array de permissões atuais do perfil
                                                                if (in_array($p->id, $permissoes_do_perfil)) {
                                                                ?>

                                                                    <?php echo $p->display_name; ?> <br />
                                                                    <b>Descrição:</b> <i><?php echo (!empty($p->description)) ? $p->description : '-'; ?></i>

                                                                    <br /><br />

                                                                <?php
                                                                }
                                                                ?>

                                                            <?php
                                                            endforeach;
                                                            ?>

                                                        <?php
                                                        } else {
                                                        ?>

                                                            O perfil não possui permissões desta seção.

                                                        <?php
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- FIM PANEL -->

                                        </div>
                                        <!-- FIM COLUNA -->

                                        <?php
                                        // Checo se é o fim da linha, sendo que cada linha só deverá conter 2 panels
                                        if ($i % 2 == 0) {
                    
                                            echo '</div>';
                                            echo '<!-- FIM LINHA -->';
                                            echo '<!-- INICIO LINHA -->';
                                            echo '<div class="row">';
                                            
                                        }
                                        ?>

                                    <?php
                                        // Incremento contador
                                        $i++;

                                        // Limpo variaveis
                                        unset($permissoes);
                                        unset($permissoes_do_perfil);

                                    endforeach;
                                    ?>

                                </div> 
                                <!-- FIM LINHA -->

                            </div>
                        </div>
                        <!-- FIM PANEL -->

                    </div>
                    <!-- FIM COLUNA -->

                </div>
                <!-- FIM LINHA -->
                
                <br />

                <a class="btn btn-default pull-right" href="{{ url('admin/painel/perfis') }}"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

            </div>    
        </div>
    </div>

</div>    

@stop

@section('includes_no_body')

<script type="text/javascript" src="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.js'); ?>"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

$(document).ready(function() {

    /*********************************************
     #
     # Modifica o icone dos paineis .muda-collapse de acordo com o status atual deles
     # 
    **********************************************/ 
    $('.muda-collapse').on('show.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    });

    $('.muda-collapse').on('hide.bs.collapse', function () {
        // Troco o icone
        $(this).siblings('.panel-heading').find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    });

});
</script>

@stop
