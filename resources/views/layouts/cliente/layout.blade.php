@inject('permissoes','drclub\models\Permissoes')

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

    <!-- MAIN CSS -->
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/nprogress/nprogress.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/iCheck/skins/square/green.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.min.css') }}">

    <!-- MAIN JAVASCRIPT -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup ({cache: false});
    </script>

    <!-- SCRIPTS E CSS CARREGADOS NO HEAD (ESPECIFICOS POR PAGINA) -->
    @yield('includes_no_head')

    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/custom.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="nav-md">

<noscript><h2>É necessário que seu navegador possua javascript habilitado para utilizar o sistema.</h2></noscript>

<!-- INICIO CONTAINER BODY -->
<div class="container body">
    <!-- INICIO MAIN CONTAINER -->
    <div class="main_container">
        <!-- INICIO LEFT COL -->
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                @include('layouts.cliente.sidebar')
            </div>
        </div>
        <!-- FIM LEFT COL -->

        <!-- INICIO TOP NAV -->
        <div class="top_nav">   
            @include('layouts.cliente.topo')
        </div>
        <!-- FIM TOP NAV -->
        
        <!-- INICIO RIGHT COL -->
        <div class="right_col" role="main" style="min-height: 550px;">
          <?php
            $breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
            $breadcrumbs->setDivider(null);
            $breadcrumbs->setCssClasses('breadcrumb');
            $breadcrumbs->addCrumb('<i class="fa fa-home"></i>', url('/'));
            if (Request::segment(1)) {
              $breadcrumbs->addCrumb(ucfirst(str_replace('_', ' ', Request::segment(1))), url(Request::segment(1)));
            }else{
              $breadcrumbs->addCrumb("Dashboard", url('/'));
            }
            if (Request::segment(2)) {
              $breadcrumbs->addCrumb(ucfirst(str_replace('_', ' ', Request::segment(2))), url(Request::segment(1).'/'.Request::segment(2).'/'.Request::segment(3)));
            }

            echo $breadcrumbs->render();
          ?>
          @yield('conteudo')
        </div>

        <!-- FIM RIGHT COL -->
        <br />
        <!-- INICIO FOOTER -->
        <footer>
            <div class="text-center">
                @include('layouts.cliente.rodape')
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
 
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskMoney.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- SCRIPTS CARREGADOS NO BODY (ESPECIFICOS POR PAGINA) -->
@yield('includes_no_body')

<script>
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
</script>

<script type="text/javascript">
    $(".cep").mask('00000-000');
    $(".horario").mask('00:00:00');
    $(".celular").mask('(00) 00000-0000');
    $(".telefone").mask('(00) 0000-00000');
    $(".cpf").mask('000.000.000-00');
    $(".cnpj").mask('00.000.000/0000-00');
    $(".dinheiro").maskMoney();
    $(".decimal").maskMoney();

    $('a[data-toggle="tab"]').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })

    $(".celular").on('blur', function(){
      if($(this).val().length < 14 && $(this).val() != ""){
        $(this).val('');
        $(this).focus();
      }
    });

    $(".telefone").on('blur', function(){
      if($(this).val().length < 14 && $(this).val() != ""){
        $(this).val('');
        $(this).focus();
      }
    });

    $( "#menu_toggle" ).click(function() {
      window.setTimeout(function(){
        if($(".nav-md").length){
          $("#logo").attr('src', '{{ url("images/logo.jpg") }}');
        }else{
          $("#logo").attr('src', '{{ url("images/logo_mini.jpg") }}');
        }
      }, 10);
    });

    $(document).ready(function(){
      $('.checkbox').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '20%' // optional
      });

      $(function () {
        $('[data-tooltip="tooltip"]').tooltip();
      });
    });
</script>

</body>
</html>