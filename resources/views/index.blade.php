<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>CMRJ - HOME</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="application-name" content="Clinica Rio de Janeiro" />
<meta name="author" content="Clinica Rio de Janeiro" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="google" value="notranslate" />
<meta name="dcterms.audience" content="Global" />
<meta name="dcterms.rights" content="(c) <?php echo date('Y'); ?> Clinica Rio de Janeiro" /> 

<!-- FAVICON --> 
<link rel="icon" href="<?php echo asset('images/favicon.ico'); ?>" />

<!-- :::::::: MAIN CSS :::::::: -->  

<!-- CARREGANDO Bootstrap CSS -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/bootstrap/dist/css/bootstrap.min.css'); ?>" />

<!-- CARREGANDO FONT AWESOME FREE CSS -->
<link media="all" type="text/css" rel="stylesheet" href="<?php echo asset('plugins/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css'); ?>" />

<!-- CSS INLINE -->
<style type="text/css">
body {
    background-color: #F7F7F7; 
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
}

h1 {
    font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
    font-size: 40px;
    padding: 20px 10px 30px 10px;
    text-align: center;
    text-transform: uppercase;
    text-rendering: optimizeLegibility;
}

.deepshd {
    color: #F7F7F7;
    background-color: #333;
    letter-spacing: .1em;
    text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 0 5px 0 #262626, 0 6px 0 #242424, 0 7px 0 #222, 0 8px 0 #202020, 0 9px 0 #1e1e1e, 0 10px 0 #1c1c1c, 0 11px 0 #1a1a1a, 0 12px 0 #181818, 0 13px 0 #161616, 0 14px 0 #141414, 0 15px 0 #121212, 0 22px 30px rgba(0, 0, 0, 0.9);
}

.separator {
    margin: 0px auto 0px auto;
    text-align:center;
    border-top: 1px solid #D8D8D8;
    margin-top: 10px;
    padding-top: 10px;
}

.title {
    font-size: 96px;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 20px;
    color:#333;
}

.bg-danger {
    background-color: #d41124;
    color:#ffffff; 
    padding-left: 2px;
    padding-right: 2px;
    padding-top: 2px;
    padding-bottom: 2px;
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    border: 3px solid rgba(255, 255, 255, 0.3);
    border-radius: 100%;
    color: #FFFFFF;
    height: 80px;
    margin: 0 auto -40px;
    position: relative;
    transition: all 0.3s ease-in-out 0s;
    width: 80px;
}

.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
}

.circle-tile-number {
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
    padding: 5px 0 15px;
}

.circle-tile-description {
    text-transform: uppercase;
    margin-bottom: 15px;
}

.circle-tile-footer {
    background-color: rgba(0, 0, 0, 0.1);
    color: rgba(255, 255, 255, 0.5);
    display: block;
    padding: 5px;
    transition: all 0.3s ease-in-out 0s;
}

.circle-tile-footer:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
}

.circle-tile-heading.dark-blue:hover {
    background-color: #2E4154;
}

.circle-tile-heading.green:hover {
    background-color: #138F77;
}

.circle-tile-heading.orange:hover {
    background-color: #DA8C10;
}

.circle-tile-heading.blue:hover {
    background-color: #2473A6;
}

.circle-tile-heading.red:hover {
    background-color: #CF4435;
}

.circle-tile-heading.purple:hover {
    background-color: #7F3D9B;
}

.tile-img {
    text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
}

.dark-blue {
    background-color: #34495E;
}

.green {
    background-color: #16A085;
}

.blue {
    background-color: #2980B9;
}

.orange {
    background-color: #F39C12;
}

.red {
    background-color: #E74C3C;
}

.purple {
    background-color: #8E44AD;
}

.dark-gray {
    background-color: #7F8C8D;
}

.gray {
    background-color: #95A5A6;
}

.light-gray {
    background-color: #BDC3C7;
}

.yellow {
    background-color: #F1C40F;
}

.text-dark-blue {
    color: #34495E;
}

.text-green {
    color: #16A085;
}

.text-blue {
    color: #2980B9;
}

.text-orange {
    color: #F39C12;
}

.text-red {
    color: #E74C3C;
}

.text-purple {
    color: #8E44AD;
}

.text-faded {
    color: rgba(255, 255, 255, 0.7);
}

hr {
    height: 4px;
    margin-left: 15px;
    margin-bottom:-3px;
}

.hr-warning {
    background-image: -webkit-linear-gradient(left, rgba(210,105,30,.8), rgba(210,105,30,.6), rgba(0,0,0,0));
}

.hr-success {
    background-image: -webkit-linear-gradient(left, rgba(15,157,88,.8), rgba(15, 157, 88,.6), rgba(0,0,0,0));
}

.hr-primary {
    background-image: -webkit-linear-gradient(left, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0));
}

.hr-danger{
    background-image: -webkit-linear-gradient(left, rgba(244,67,54,.8), rgba(244,67,54,.6), rgba(0,0,0,0));
}

.no-link:link {
    text-decoration: none;
    color:#ffffff;
}

.no-link:active {
    text-decoration: none;
    color:#ffffff;
}

.no-link:visited {
    text-decoration: none;
    color:#ffffff;
}

.no-link:hover {
    /*text-decoration: none;*/
    color:#ffffff;
    text-decoration: underline; 
}

.link-fake:link {
    cursor: default;
    text-decoration: none;
    color: #ffffff;
}

.link-fake:active {
    cursor: default;
    text-decoration: none;
    color: #ffffff;
}

.link-fake:visited {
    cursor: default;
    text-decoration: none;
    color: #ffffff;
}

.link-fake:hover {
    cursor: default;
    text-decoration: none;
    color: #ffffff;
}

.circle-tile-subdescription {
    color: #ffffff;
    font-size: 80%;
    margin-bottom: 15px;
    margin-left: 10px;
    min-height: 40px;
}
</style>

</head>
<body>

<div class="container">
    
    <h1 class="deepshd">FOLIA SHOP</h1>
        
    <div class="row center-block">
        <div class="col-sm-8">
        </div>
    </div>

    <br />
    
    <!-- INICIO LINHA -->
    <div class="row center-block">
        
        <!-- COLUNA -->
        <div class="col-sm-3">

            <!-- INICIO CAIXA -->
            <div class="circle-tile">
                <a href="javascript:void(null);" class="link-fake">
                    <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                    <div class="circle-tile-description text-faded">
                        <a href="javascript:void(null);" class="link-fake"> FUNCIONÁRIOS </a>
                    </div>
                    <div class="circle-tile-subdescription">Para membros da equipe funcionários</div>
                    <a class="circle-tile-footer" href=""> 
                        <b>ACESSAR</b> <i class="fa fa-chevron-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- FIM CAIXA -->

        </div>

       
        <!-- COLUNA -->             
        <!--<div class="col-sm-3">

            <div class="circle-tile">
                <a href="javascript:void(null);" class="link-fake">
                    <div class="circle-tile-heading red"><i class="fa fa-user fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content red">
                    <div class="circle-tile-description text-faded">
                        <a href="javascript:void(null);" class="no-link"> CLIENTES </a>
                    </div>
                    <div class="circle-tile-subdescription">Para os estimados clientes da clínica</div>
                    <a class="circle-tile-footer" href="<?php //echo route('cliente-login'); ?>">
                        <b>ACESSAR</b> <i class="fa fa-chevron-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>-->

             
    </div>
    <!-- FIM LINHA -->
    
    <!-- Div do rodapé -->
    <div class="separator">
        <div>
            <h5 style="font-size: 11px;"><strong>Clínicas Integradas</strong> <small class="label label-success" style="font-size: 10px;">RIO DE JANEIRO</small></h5>
            <p style="font-size: 11px;">© <?php echo date('Y'); ?> - Todos direitos reservados</p>
        </div>
    </div>

</body>
</html>
