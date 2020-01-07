<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo_pagina')</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="application-name" content="Clínicas Integradas Rio de Janeiro" />
    <meta name="author" content="CMRJ" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="google" value="notranslate" />
    <meta name="dcterms.audience" content="Global" />
    <meta name="dcterms.rights" content="(c) {{ date('Y') }} Dr.Club" /> 

    <!-- FAVICON --> 
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />   

    <!-- :::::::: MAIN CSS :::::::: -->    

    <!-- CARREGANDO Bootstrap CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" />

    <!-- CARREGANDO JQUERY UI CSS -->
    <!--<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.min.css') }}" />-->

    <!-- CARREGANDO FONT AWESOME FREE CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.3.1/css/all.min.css') }}" />

    <!-- CARREGANDO NPROGRESS CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/nprogress/nprogress.css') }}" />
    
    <!-- CARREGANDO ICHECK CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/iCheck/skins/square/green.css') }}" />
    
    <!-- CARREGANDO Switchery CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/switchery/dist/switchery.min.css') }}" />
    
    <!-- CARREGANDO TOASTR CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
    
    <!-- CARREGANDO BOOTSTRAP DATEPICKER -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker-1.6.4/css/bootstrap-datepicker.min.css') }}" />
    
    <!-- :::::::: MAIN JAVASCRIPT :::::::: -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- SCRIPTS E CSS CARREGADOS NO HEAD (ESPECIFICOS POR PAGINA) -->
    @yield('includes_no_head_2')
    @yield('includes_no_head')  

    <!-- CARREGANDO CUSTOM THEME CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.min.css') }}">

    <!-- PERSONALIZADO QUE JÁ EXISTIA (REVER?!?) -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">  

    <!-- CORREÇÕES NO CSS DO MENU -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/correcoes-menu-1.0.css') }}"> 
    
    <!-- CSS CUSTOMIZADO PARA BREADCRUMB -->
    <link type="text/css" rel="stylesheet" href="<?php echo asset('css/breadcrumb.customizado.css'); ?>">

    <style type="text/css">
    .nav_title {
        background-color: #dcdcdc;
    }
    </style>

</head>
<body class="nav-sm">

<noscript><h2>É necessário que seu navegador possua javascript habilitado para utilizar o sistema.</h2></noscript>

<!-- INICIO CONTAINER BODY -->
<div class="container body">

    <!-- INICIO MAIN CONTAINER -->
    <div class="main_container">

        <!-- INICIO LEFT COL -->
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layouts.administracao.sidebar')
            </div>
        </div>
        <!-- FIM LEFT COL -->

        <!-- INICIO TOP NAV -->
        <div class="top_nav">   
            @include('layouts.administracao.topo')
        </div>
        <!-- FIM TOP NAV -->
        
        <!-- INICIO RIGHT COL -->
        <div class="right_col" role="main" style="min-height: 550px;">

            @yield('conteudo')

        </div>
        <!-- FIM RIGHT COL -->

        <br />

        <!-- INICIO FOOTER -->
        <footer>
            <div class="text-center">
                @include('layouts.administracao.rodape')
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- FIM FOOTER -->
        
        @if(session('success') != null)
         <input type="hidden" id="toaster-success" value="{{ session('success') }}">
        @endif 

        @if(session('error') != null)
         <input type="hidden" id="toaster-error" value="{{ session('error') }}">
        @endif

        @if(session('warning') != null)
         <input type="hidden" id="toaster-warning" value="{{ session('warning') }}">
        @endif 

        @if(session('info') != null)
         <input type="hidden" id="toaster-info" value="{{ session('info') }}">
        @endif

    </div>
    <!-- FIM MAIN CONTAINER -->

</div>
<!-- FIM CONTAINER BODY -->

<!-- INICIO BOTÃO RETORNAR AO TOPO -->
<div id="back-top">
    <a href="#top"><i class="fa fa-chevron-up"></i></a>
</div>
<!-- FIM BOTÃO RETORNAR AO TOPO -->

<!-- :::::::: MAIN SCRIPTS (NECESSARIOS PARA TODAS AS PAGINAS) :::::::: -->

<!-- CARREGANDO LIBRARY JQUERY JS -->
<script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>

<!-- CARREGANDO BOOTSTRAP JS -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- CARREGANDO JQUERY UI JS -->
<!--<script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>-->

<!-- CARREGANDO BOOTSTRAP DATEPICKER -->
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker-1.6.4/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker-1.6.4/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>

<!-- ::::::: SCRIPTS CARREGADOS NO BODY (ESPECIFICOS POR PAGINA) :::::::: -->
@yield('includes_no_body_2')
@yield('includes_no_body')

<!-- CARREGANDO CUSTOM THEME JS -->
<script type="text/javascript" src="{{ asset('js/custom.min.js') }}"></script>

<!-- CARREGANDO TOASTR JS -->
<script type="text/javascript" src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<!-- CARREGANDO NPROGRESS JS -->
<script type="text/javascript" src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>

<!-- CARREGANDO ICHECK JS -->
<script type="text/javascript" src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- CARREGANDO Switchery JS -->
<script type="text/javascript" src="{{ asset('plugins/switchery/dist/switchery.min.js') }}"></script>

<script type="text/javascript">  
$.ajaxSetup ({cache: false});  


/*
 *
 * Funções customizadas
 *
 */

// Verifico o tamanho da tela e altero a classe atribuída ao body. Isso define se a sidebar será ou não exibida
function exibicao_sidebar_geral() {

    if ($(window).width() < 400) { 

        // Garante que a tag body só tenha a classe nav-md
        $('body').removeClass('nav-sm'); 
        $('body').addClass('nav-md'); 

    } else {

        // Garante que a tag body só tenha a classe nav-sm
        $('body').removeClass('nav-md'); 
        $('body').addClass('nav-sm');

    }

}

// Verifico o tamanho da tela e altero a imagem da logo que será exibida
function exibicao_logo_master() {

    if ($('body').hasClass('nav-md')) {

        $('#logo').attr('src', '{{ url("images/logotipo_clinicariodejaneiro_show.png") }}');

    } else if ($('body').hasClass('nav-sm')) {

        $('#logo').attr('src', '{{ url("images/logotipo_clinicariodejaneiro_hide.png") }}');

    }

}



/*
 *
 * Bloco que é executado quando a janela é REDIMENSIONADA
 *
 */
$(window).on('resize', function() {

    // Executa função de controle de exibição da sidebar
    exibicao_sidebar_geral();

    // Executa função de controle de exibição da logomarca
    exibicao_logo_master();

});



/*
 *
 * Bloco que é executado quando a janela é CARREGADA
 *
 */
$(document).ready(function() {

    // Executa função de controle de exibição da sidebar
    exibicao_sidebar_geral();

    // Executa função de controle de exibição da logomarca
    exibicao_logo_master();

    // Ativo ICheck em todos os cheboxes com esta classe
    $('.checkbox').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
    });

    // Ativo tooltip
    $('[data-tooltip="tooltip"]').tooltip({ container: 'body' });

    /** BEGIN BACK TO TOP **/
    $(function () {
        $("#back-top").hide();
    });
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
        
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    /** END BACK TO TOP **/

    // Mensagens de alerta
    if ($('#toaster-success').length > 0 && $('#toaster-success').val() != '') {
        toastr.success($('#toaster-success').val(), 'Sucesso!');
    };

    if ($('#toaster-error').length > 0 && $('#toaster-error').val() != '') {
        toastr.error($('#toaster-error').val(), 'Erro!');
    };

    if ($('#toaster-warning').length > 0 && $('#toaster-warning').val() != '') {
        toastr.warning($('#toaster-warning').val(), 'Atenção!');
    };

    if ($('#toaster-info').length > 0 && $('#toaster-info').val() != '') {
        toastr.info($('#toaster-info').val(), 'Info!');
    };

    $('a[data-toggle="tab"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Muda a imagem da logomarca de acordo com a classe da sidebar vinculada a tag body (nav-md ou nav-sm)
    $('#menu_toggle').click(function() {

        // Executa função de controle de exibição da logomarca
        exibicao_logo_master();

    });

});
</script>

</body>
</html>