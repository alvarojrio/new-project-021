

<?php $__env->startSection('titulo_pagina'); ?>
barcos | Dashboard 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_head'); ?>

<!-- CARREGANDO Font Awesome CSS -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/font-awesome/css/font-awesome.min.css')); ?>">
    
<!-- CARREGANDO bootstrap-progressbar CSS -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>">

<!-- CARREGANDO bootstrap-daterangepicker CSS -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<!-- 
::: TESTE :::
<h1 class="text-center">Bem vindo ao painel do Admin T.I </h1> -->

<!-- INICIO PÁGINA DASHBOARD -->
<div class="container" role="main">
    <div class="">
        
        <!--<div class="row top_tiles" style="margin: 10px 0;">
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Total </span> <span class="label label-warning">USUÁRIOS</span>
                <h2><?php // echo $total_usuarios; ?></h2>               
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Total </span> <span class="label label-primary">UNIDADES</span> <span>cadastradas</span>
                <h2><?php // echo $total_unidades; ?> </h2>               
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Total </span><span class="label label-success">FUNCIONÁRIOS</span> <span>cadastrados</span>
                <h2><?php // echo $total_funcionarios; ?></h2>               
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile">
                <span>Total </span><span class="label label-info">MÉDICOS</span> <span>cadastrados</span>
                <h2><?php // echo $total_medicos; ?></h2>               
            </div>
        </div>-->
        
         <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fas fa-users"></i></div>
                  <div class="count">900</div>
                  <h3><span>Total </span> <span class="label label-warning">PESSOAS</span></h3>
                  <p>cadastrados</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-hospital"></i></div>
                  <div class="count">90</div>
                  <h3><span>Total </span> <span class="label label-primary">PRODUTOS</span></h3>
                  <p>cadastradas.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fas fa-people-carry"></i></div>
                  <div class="count">90</div>
                  <h3><span>Total </span><span class="label label-success">FATURAS</span></h3>
                  <p>cadastrados.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fas fa-user-md"></i></div>
                  <div class="count">179</div>
                  <h3><span>Total </span><span class="label label-info">FUNCIONÁRIO</span></h3>
                  <p>cadastrados.</p>
                </div>
              </div>
            </div>
        
        <br />

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Vendas <small>Progresso semanal</small></h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <div class="demo-container" style="height:280px">
                        <div id="chart_plot_02" class="demo-placeholder"></div>
                      </div>
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Total de clientes</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total faturas fechadas</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total total de aberta</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    </div>

                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div>
                      <div class="x_panel">
			    <div class="x_title">
				
			    </div>
			</div>
                          
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


      
       
           


        </div>
      


    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('includes_no_body'); ?>
<!-- CARREGANDO FastClick JS-->
<script type="text/javascript" src="<?php echo e(asset('plugins/fastclick/lib/fastclick.js')); ?>"></script>
<!-- CARREGANDO Chart.js JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/Chart.js/dist/Chart.min.js')); ?>"></script>
<!-- CARREGANDO jQuery Sparklines JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>
<!-- CARREGANDO morris.js JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/raphael/raphael.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/morris.js/morris.min.js')); ?>"></script>
 <!-- CARREGANDO gauge.js JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/gauge.js/dist/gauge.min.js')); ?>"></script>
<!--CARREGANDO bootstrap-progressbar JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
<!-- CARREGANDO Skycons JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/skycons/skycons.js')); ?>"></script>
<!-- CARREGANDO Flot JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/Flot/jquery.flot.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/Flot/jquery.flot.pie.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/Flot/jquery.flot.time.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/Flot/jquery.flot.stack.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/Flot/jquery.flot.resize.js')); ?>"></script>
<!-- CARREGANDO Flot plugins JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/flot.curvedlines/curvedLines.js')); ?>"></script>
 <!--CARREGANDO DateJS JS -->
<script type="text/javascript" src="<?php echo e(asset('plugins/DateJS/build/date.js')); ?>"></script>
<!-- CARREGANDO bootstrap-daterangepicker JS-->
<script type="text/javascript" src="<?php echo e(asset('plugins/moment/min/moment.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.administracao.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/admin/index.blade.php ENDPATH**/ ?>