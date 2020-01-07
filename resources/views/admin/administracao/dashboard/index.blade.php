@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Dashboard
@stop

@section('includes_no_head')

<!-- CARREGANDO Font Awesome CSS -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    
<!-- CARREGANDO bootstrap-progressbar CSS -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">

<!-- CARREGANDO bootstrap-daterangepicker CSS -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
    
@stop

@section('conteudo')
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
                  <div class="count"><?php echo number_format($total_pessoas,2,",",".");?></div>
                  <h3><span>Total </span> <span class="label label-warning">PESSOAS</span></h3>
                  <p>cadastrados</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-hospital"></i></div>
                  <div class="count"><?php echo $total_unidades; ?></div>
                  <h3><span>Total </span> <span class="label label-primary">UNIDADES</span></h3>
                  <p>cadastradas.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fas fa-people-carry"></i></div>
                  <div class="count"><?php echo $total_funcionarios; ?></div>
                  <h3><span>Total </span><span class="label label-success">FUNCIONÁRIOS</span></h3>
                  <p>cadastrados.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fas fa-user-md"></i></div>
                  <div class="count">179</div>
                  <h3><span>Total </span><span class="label label-info">MÉDICOS</span></h3>
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
                          <span>Total Sessions</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Sessions</span>
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
				<h2 class="label label-info" style="font-size:16px"><i class="fa fa-birthday-cake"></i> Aniversariantes de
                                <?php 
                                switch (date("m")) {
                                        case "01":    $mes = Janeiro;     break;
                                        case "02":    $mes = Fevereiro;   break;
                                        case "03":    $mes = Março;       break;
                                        case "04":    $mes = Abril;       break;
                                        case "05":    $mes = Maio;        break;
                                        case "06":    $mes = Junho;       break;
                                        case "07":    $mes = Julho;       break;
                                        case "08":    $mes = Agosto;      break;
                                        case "09":    $mes = Setembro;    break;
                                        case "10":    $mes = Outubro;     break;
                                        case "11":    $mes = Novembro;    break;
                                        case "12":    $mes = Dezembro;    break; 
                                 }                                 
                                 ?>
                                <?php echo $mes; ?></h2>				
				<div class="clearfix"></div>
			    </div>
			    <div class="x_content">
                                @if($cinco_usuarios->count()) 
                                    @foreach($seis_funcionarios_aniversariantes as $funNiver)
                                    <?php if(date('d',strtotime($funNiver->data_nascimento)) == date('d')){ ?>
                                    <article class="media event">
                                        <a class="pull-left date" style="background-color: #FF6347">
                                            <p class="month">                                            
                                            <?php 
                                                switch (date('m',strtotime($funNiver->data_nascimento))) {
                                                        case "01":    $mes = Janeiro;     break;
                                                        case "02":    $mes = Fevereiro;   break;
                                                        case "03":    $mes = Março;       break;
                                                        case "04":    $mes = Abril;       break;
                                                        case "05":    $mes = Maio;        break;
                                                        case "06":    $mes = Junho;       break;
                                                        case "07":    $mes = Julho;       break;
                                                        case "08":    $mes = Agosto;      break;
                                                        case "09":    $mes = Setembro;    break;
                                                        case "10":    $mes = Outubro;     break;
                                                        case "11":    $mes = Novembro;    break;
                                                        case "12":    $mes = Dezembro;    break; 
                                                 } ?>
                                            
                                            <?php echo $mes; ?>
                                            
                                            </p>
                                            <p class="day"><?php echo date('d',strtotime($funNiver->data_nascimento)); ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title text-dark-blue" href="#"><?php echo $funNiver->nome; ?></a>
                                            <p><span class="label label-warning">É HOJE ! DÊ OS PARABÉNS!</span></p>
                                            <p><i class="fas fa-birthday-cake text-warning"></i> <i class="fas fa-birthday-cake text-danger"></i> <i class="fas fa-birthday-cake text-dark-blue"></i></p>
                                        </div>
                                    </article>
                                   <?php }else if(date('d',strtotime($funNiver->data_nascimento)) >= date('d')){ ?>
                                    
                                    <article class="media event">
                                        <a class="pull-left date" style="background-color: #5cb85c">
                                            <p class="month">                                            
                                            <?php 
                                                switch (date('m',strtotime($funNiver->data_nascimento))) {
                                                        case "01":    $mes = Janeiro;     break;
                                                        case "02":    $mes = Fevereiro;   break;
                                                        case "03":    $mes = Março;       break;
                                                        case "04":    $mes = Abril;       break;
                                                        case "05":    $mes = Maio;        break;
                                                        case "06":    $mes = Junho;       break;
                                                        case "07":    $mes = Julho;       break;
                                                        case "08":    $mes = Agosto;      break;
                                                        case "09":    $mes = Setembro;    break;
                                                        case "10":    $mes = Outubro;     break;
                                                        case "11":    $mes = Novembro;    break;
                                                        case "12":    $mes = Dezembro;    break; 
                                                 } ?>
                                            <?php echo $mes; ?>                                            
                                            </p>
                                            <p class="day"><?php echo date('d',strtotime($funNiver->data_nascimento)); ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo  strtoupper($funNiver->nome); ?></a>
                                            <p>PROX. ANIVERSARIANTE</p>
                                        </div>
                                    </article>
                                    
                                    <?php }else if(date('d',strtotime($funNiver->data_nascimento)) < date('d')){ ?>
                                    
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month">                                            
                                            <?php 
                                                switch (date('m',strtotime($funNiver->data_nascimento))) {
                                                        case "01":    $mes = Janeiro;     break;
                                                        case "02":    $mes = Fevereiro;   break;
                                                        case "03":    $mes = Março;       break;
                                                        case "04":    $mes = Abril;       break;
                                                        case "05":    $mes = Maio;        break;
                                                        case "06":    $mes = Junho;       break;
                                                        case "07":    $mes = Julho;       break;
                                                        case "08":    $mes = Agosto;      break;
                                                        case "09":    $mes = Setembro;    break;
                                                        case "10":    $mes = Outubro;     break;
                                                        case "11":    $mes = Novembro;    break;
                                                        case "12":    $mes = Dezembro;    break; 
                                                 } ?>
                                            <?php echo $mes; ?>                                            
                                            </p>
                                            <p class="day"><?php echo date('d',strtotime($funNiver->data_nascimento)); ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="#"><?php echo  strtoupper($funNiver->nome); ?></a>
                                            <p><p>PROX. ANIVERSARIANTE</p></p>
                                        </div>
                                    </article>
                                    
                                    <?php } ?>
                                    @endforeach
                               @endif 
			    </div>
			</div>
                          
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                    <div class="x_title">
                        <h2>Planos <small>Mais procurados</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Menos procurados</a>
                                    </li>
                                    <li><a href="#">Mais populares</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h4>Clínica Rio de Janeiro</h4>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>Auto Gestão</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                        <span class="sr-only">90% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>990</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>ANS </span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
                                        <span class="sr-only">65% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>760</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>Gold RJ</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 43%;">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>433</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>Master RJ </span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                        <span class="sr-only">10% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>100</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>Basic RJ</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                        <span class="sr-only">5% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>50</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                <div class="x_title">
                  <h2>Device Usage</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Device</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Progress</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel fixed_height_320">
                    <div class="x_title">
                        <h2>Perfis <small>Configurações</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Configuração 1</a>
                                    </li>
                                    <li><a href="#">Configuração 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            <ul class="quick-list">
                                <li><i class="fa fa-line-chart"></i><a href="#">Master</a></li>
                                <li><i class="fa fa-thumbs-up"></i><a href="#">T.I</a></li>
                                <li><i class="fa fa-calendar-o"></i><a href="#">RH</a></li>
                                <li><i class="fa fa-cog"></i><a href="#">Administrativo</a></li>
                                <li><i class="fa fa-area-chart"></i><a href="#">Financeiro</a></li>
                            </ul>

                            <div class="sidebar-widget">
                                <h4>Profile Completion</h4>
                                <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                                <div class="goal-wrapper">
                                    <span id="gauge-text" class="gauge-value gauge-chart pull-left">0</span>
                                    <span class="gauge-value pull-left">%</span>
                                    <span id="goal-text" class="goal-value pull-right">100%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 widget_tally_box">
                <div class="x_panel">
                    <div class="x_title">
                        <?php
                        // Array com os dias da semana
                        $diasemana = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
                        // Aqui podemos usar a data atual ou qualquer outra data no formato Ano-mês-dia (2014-02-28)
                        $data = date('Y-m-d');
                        // Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
                        $diasemana_numero = date('w', strtotime($data));
                        ?>
                        <h2>Reflexão do dia <small><?php echo $diasemana[$diasemana_numero]; ?></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="bs-example" data-example-id="simple-jumbotron">
                            <div class="jumbotron">
                                <h1>Michael, Jordan!</h1>
                                <p>O Talento vence jogos, mas só o trabalho em equipe VENCE campeonatos!</p>
                            </div>
                        </div>

                    </div>
			  
                </div>
            </div>

            <!-- start of weather widget -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Clima de Hoje <small>Estações</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="temperature"><b>XXX</b>, xx:xx AM
                                    <span>F</span>
                                    <span><b>C</b>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="weather-icon">
                                    <span>
                                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                    </span>

                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="weather-text">
                                    <h2>Brasil
                                        <br><i>Céu com poucas núvens</i>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="weather-text pull-right">
                                <h3 class="degrees">23</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                        <div class="row weather-days">
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Seg</h2>
                                    <h3 class="degrees">25</h3>
                                    <span>
                                        <canvas id="clear-day" width="32" height="32">
                                        </canvas>

                                    </span>
                                    <h5>15
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Ter</h2>
                                    <h3 class="degrees">25</h3>
                                    <canvas height="32" width="32" id="rain"></canvas>
                                    <h5>12
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Qua</h2>
                                    <h3 class="degrees">27</h3>
                                    <canvas height="32" width="32" id="snow"></canvas>
                                    <h5>14
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Qui</h2>
                                    <h3 class="degrees">28</h3>
                                    <canvas height="32" width="32" id="sleet"></canvas>
                                    <h5>15
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Sex</h2>
                                    <h3 class="degrees">28</h3>
                                    <canvas height="32" width="32" id="wind"></canvas>
                                    <h5>11
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="daily-weather">
                                    <h2 class="day">Sab</h2>
                                    <h3 class="degrees">26</h3>
                                    <canvas height="32" width="32" id="cloudy"></canvas>
                                    <h5>10
                                        <i>km/h</i>
                                    </h5>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end of weather widget -->

            <div class="col-md-4 col-sm-6 col-xs-12">                
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Últimos acessos</h2>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="list-unstyled top_profiles scroll-view">
                        @if($cinco_usuarios->count()) 
                            @foreach($cinco_usuarios as $user)
                            <li class="media event">
                                <a class="pull-left border-aero profile_thumb">
                                    <img src="<?php
                                    if ($user->funcionarios->pessoa->foto == "") {
                                        $foto = "sem_foto.png";
                                    } else {
                                        $foto = $user->funcionarios->pessoa->foto;
                                    } echo asset('uploads/pessoas/' . $foto)
                                    ?>" class="ratio img-responsive img-circle">
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#"><?php echo $user->funcionarios->pessoa->nome; ?></a>
                                    <p><strong>Usuário. </strong><?php echo $user->usuario; ?></p>
                                    <p> <small>Ultimo login:<?php echo date('d/m/Y H:i:s', strtotime($user->ultimo_login)); ?></small>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        @endif                         
                         
                    </ul>
                     
                </div>
            </div>
        </div>
        <div class="row">
	    <div class="col-md-3 col-xs-12 widget widget_tally_box">
		<div class="x_panel ui-ribbon-container fixed_height_390">
		    <div class="ui-ribbon-wrapper">
			<div class="ui-ribbon">
			    Promoção
			</div>
		    </div>
		    <div class="x_title">
			<h2>Promoção mês da mulher</h2>
			<div class="clearfix"></div>
		    </div>
		    <div class="x_content">
			<img src="<?php echo asset('uploads/unidades/promocoes/anuncio.jpg') ?>" alt="..." class="img-responsive">
			<h4 class="name_title">Transvaginal</h4>
			
			<div class="divider"></div>
			<p>Para mais informações, ligue 38449480.</p>

		    </div>
		</div>
	    </div>
	    <div class="col-md-3 col-xs-12 widget widget_tally_box">
		<div class="x_panel ui-ribbon-container fixed_height_390">
		    <div class="ui-ribbon-wrapper">
			<div class="ui-ribbon">
			    Anúncio
			</div>
		    </div>
		    <div class="x_title">
			<h2>Segurança no trabalho</h2>
			<div class="clearfix"></div>
		    </div>
		    <div class="x_content">
			<img src="<?php echo asset('uploads/unidades/promocoes/abril_verde.jpg') ?>" alt="..." class="img-responsive">
			<h4 class="name_title">SMS</h4>
			
			<div class="divider"></div>
			<p>Para mais informações, ligue 38449480.</p>

		    </div>
		</div>
	    </div>
	    <div class="col-md-3 col-xs-12 widget widget_tally_box">
		<div class="x_panel ui-ribbon-container fixed_height_390">
		    <div class="ui-ribbon-wrapper">
			<div class="ui-ribbon">
			    Anúncio
			</div>
		    </div>
		    <div class="x_title">
			<h2>Segurança no trabalho</h2>
			<div class="clearfix"></div>
		    </div>
		    <div class="x_content">
			<img src="<?php echo asset('uploads/unidades/promocoes/ler_dort.jpg') ?>" alt="..." class="img-responsive">
			<h4 class="name_title">SMS</h4>
			
			<div class="divider"></div>
			<p>Para mais informações, ligue 38449480.</p>

		    </div>
		</div>
	    </div>

	    <div class="col-md-3 col-xs-12 widget widget_tally_box">
		<div class="x_panel fixed_height_390">
		    <div class="x_title">
			<h2>Funcionário do mês</h2>
			<div class="clearfix"></div>
		    </div>
		    <div class="x_content">

			<div class="flex">
			    <ul class="list-inline widget_profile_box">
				<li>
				    <a>
					<i class="fas fa-trophy"></i>
				    </a>
				</li>
				<li>
				    <img src="<?php echo asset('images/chuck_norris.jpg') ?>" alt="..." class="img-circle profile_img">
				</li>
				<li>
				    <a>
					<i class="fas fa-medal"></i>
				    </a>
				</li>
			    </ul>
			</div>

			<h3 class="name">Chuck Norris</h3>

			<div class="flex">
			    <ul class="list-inline count2">
				<li>
				    <h3>123</h3>
				    <span>Articles</span>
				</li>
				<li>
				    <h3>1234</h3>
				    <span>Followers</span>
				</li>
				<li>
				    <h3>123</h3>
				    <span>Following</span>
				</li>
			    </ul>
			</div>
			<p>
			    Carlos Ray "Chuck" Norris é um artista de artes marciais, ator, produtor de cinema, argumentista americano.
			</p>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>

@stop
@section('includes_no_body')
<!-- CARREGANDO FastClick JS-->
<script type="text/javascript" src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
<!-- CARREGANDO Chart.js JS -->
<script type="text/javascript" src="{{ asset('plugins/Chart.js/dist/Chart.min.js') }}"></script>
<!-- CARREGANDO jQuery Sparklines JS -->
<script type="text/javascript" src="{{ asset('plugins/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- CARREGANDO morris.js JS -->
<script type="text/javascript" src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
 <!-- CARREGANDO gauge.js JS -->
<script type="text/javascript" src="{{ asset('plugins/gauge.js/dist/gauge.min.js') }}"></script>
<!--CARREGANDO bootstrap-progressbar JS -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- CARREGANDO Skycons JS -->
<script type="text/javascript" src="{{ asset('plugins/skycons/skycons.js') }}"></script>
<!-- CARREGANDO Flot JS -->
<script type="text/javascript" src="{{ asset('plugins/Flot/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/Flot/jquery.flot.pie.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/Flot/jquery.flot.time.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/Flot/jquery.flot.stack.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/Flot/jquery.flot.resize.js') }}"></script>
<!-- CARREGANDO Flot plugins JS -->
<script type="text/javascript" src="{{ asset('plugins/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/flot.curvedlines/curvedLines.js') }}"></script>
 <!--CARREGANDO DateJS JS -->
<script type="text/javascript" src="{{ asset('plugins/DateJS/build/date.js') }}"></script>
<!-- CARREGANDO bootstrap-daterangepicker JS-->
<script type="text/javascript" src="{{ asset('plugins/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

@stop