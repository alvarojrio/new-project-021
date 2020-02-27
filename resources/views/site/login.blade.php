@extends('layouts.site.layout')

@section('titulo_pagina')
CMRJ | Sala de espera | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
    
 <link rel="stylesheet" href="{{asset('site/css/login-estilo.css')}}">

@stop

@section('conteudo')



<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="d-flex flex-grow-1">
                <!-- A logo no menu -->
                <a class="texto-logo navbar-brand d-lg-inline-block" href="#">
                    eventbrite
                </a>

                <!-- O botão de esconder menu quando diminuir a tela  -->
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

            <!-- O Menu -->
            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
                <ul class="navbar-nav ml-auto flex-nowrap">
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item nav-active">Procruar Evento</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Criar Evento</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class=" nav-link m-2 menu-item dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ajuda
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                    </li>
                  
                </ul>
            </div>
        </nav>

    </header>


    <main class="container mt-5">


        <div>
            <h3 class="m-0 mr-3 texto-titulo">
                    <img class=" img-fluid" src="https://img.icons8.com/dusk/38/000000/password.png">
                Login</h3>
           
        </div>


        <hr class="mt-0">
        <section class="row mt-3">

            <div class="col-md-5 col-sm-12 col-12 mb-5">

                <div class="card">

                    <div class="card-body">
                        <form action="">

                            <div class="form-group">
                                <label for="usuario" class="texto-label">DIGITE SEU E-MAIL/USUÁRIO</label>
                                <input type="text" class="form-control" name="" id="usuario"
                                    placeholder="e-mail/usuário" required>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="texto-label">DIGITE SUA SENHA</label>
                                <input type="password" class="form-control" name="" id="senha" placeholder="senha"
                                    required>
                            </div>

                            <a href="#" class="btn-link texto-pequeno">Esqueci minha senha</a>
                            <button type="submit" class="btn btn-success float-right">Entrar</button>
                        </form>

                    </div>

                </div>

            </div>
            <div class="col-md-3"></div>
            <div class="col-md-4 col-sm-12 col-12 mb-5">

                <div class="card">

                    <div class="card-body">
                        <h6>Cadastro</h6>
                        <hr class="m-0">
                        <form action="" class="mt-3">

                            <div class="form-group">
                                <label for="usuario" class="texto-label">DIGITE SEU CPF</label>
                                <input type="text" class="form-control" name="" id="usuario" placeholder="CPF" required>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Iniciar Cadastro</button>
                        </form>

                    </div>
                </div>


            </div>

        </section>



    </main>


   
</body>

</html>


@stop