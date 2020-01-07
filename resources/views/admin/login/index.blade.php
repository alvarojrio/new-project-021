<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>CMRJ  - Acesso do Administrador</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="application-name" content="Clínica Rio de Janeiro" />
    <meta name="author" content="Clínica Rio de Janeiro" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="google" value="notranslate" />
    <meta name="dcterms.audience" content="Global" />
    <meta name="dcterms.rights" content="(c) {{ date('Y') }} Dr.Club" /> 

    <!-- FAVICON --> 
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    
    <!-- CSS -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/login/login-admin.css') }}" rel="stylesheet">
    
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <form method="post" action="<?php echo route('admin-logar'); ?>">

              <h4>Acesso do </h4>
              <h1>Administrador</h1>

              @if(session('success') != null)
              <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              @if(session('error') != null)
              <div class="alert alert-danger">{{ session('error') }}</div>
              @endif

              <div>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="{{ old('usuario') }}" autocomplete="off" required />
              </div>

              <div>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="{{ old('senha') }}" required />
              </div>

              <div>
                
                <input type="hidden" id="cod_form" name="cod_form" value="<?php echo Crypt::encrypt('admin'); ?>" />
                
                <button type="button" class="btn btn-warning" onclick="window.location.replace('<?php echo url("/"); ?>');"><i class="fa fa-arrow-circle-left"></i> Voltar</button>
                <button type="submit" class="btn btn-default submit"><i class="fa fa-sign-in"></i> Entrar</button>

              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1>Clínica Rio de Janeiro</h1>
                  <p style="font-size: 11px;">© {{ date('Y') }} Todos direitos reservados - Clínicas Integradas Rio de Janeiro</p>
                </div>
              </div>

            </form>

          </section>
        </div>
      </div>
    </div>
  </body>
</html>
