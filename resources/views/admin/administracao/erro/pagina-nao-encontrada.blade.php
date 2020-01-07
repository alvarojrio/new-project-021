<?php
// Defino o charset php para o padrao UTF 8
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('titulo_pagina')</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="application-name" content="Dr.Club" />
    <meta name="author" content="FQL Solution" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="google" value="notranslate" />
    <meta name="dcterms.audience" content="Global" />
    <meta name="dcterms.rights" content="(c) {{ date('Y') }} Dr.Club" /> 

    <!-- FAVICON --> 
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />

<!-- MAIN SCRIPTS (NECESSARIOS PARA TODAS AS PAGINAS)-->
<!-- DECLARO CSS -->
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ asset('public/css/errors/pagina-nao-encontrada.css') }}">
    

<link media="all" type="text/css" rel="stylesheet" href="<?php echo URL::asset('public/css/pace.customizado.css'); ?>" />

 <!-- MAIN JAVASCRIPT -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="no-padding-top fundo-erro-alerta">

<div class="container">
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <h3 class="text-center">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Oops:
          <small>Página não encontrada - <b>Erro 404</b></small>
          </h3>
        </div>
        <div class="panel-body">
          <p>A página que você está procurando pode ter sido removida, mudado de nome, ou está temporariamente indisponível. Tente o seguinte:</p>

            <ul class="list-group">
              <li class="list-group-item">Certifique-se de que o endereço do site exibido na barra de endereços do seu navegador está escrito e formatado corretamente.</li>
              <li class="list-group-item">Se você chegou a esta página clicando em um link,
                <a href="http://clinicariodejaneiro.com.br"><b>contate-nos</b></a> para nos alertar que o link está formatado incorretamente.</li>
                <li class="list-group-item">Esqueça que isso aconteceu, e vá para <a href="/">sua <b>Página Inicial</b></a> :)</li>
              </ul>
          </div>
        </div>
      </div>
      <div class="col-md-2">

      </div>
    </div>
    
        
</div>




<!-- MAIN SCRIPTS (NECESSARIOS PARA TODAS AS PAGINAS) -->
<!-- DECLARO JAVASCRIPT -->
<script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
$.ajaxSetup ({cache: false});

// Setando opções do pace.js (BARRA DE CARREGAMENTO DE PÁGINA)
paceOptions = {

  // Disable the 'elements' source
  elements: false,

  // Only show the progress on regular and ajax-y page navigation, not every request
  restartOnRequestAfter: false

}

$(document).ready(function() {

    // Something here

});
</script>

</body>
</html>
