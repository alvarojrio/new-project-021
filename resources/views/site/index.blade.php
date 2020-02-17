@extends('layouts.site.layout')

@section('titulo_pagina')
CMRJ | Sala de espera | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">

@stop

@section('conteudo')

<body>
    
    <!-- <div class="container w-80 fixed-top" id="menu-ingresso">
        <nav class=" row bg-white p-3">

            <div class="col-md-8 col-sm-6 col-6">
              
                <a href="#">
                    <img src="https://img.icons8.com/windows/32/000000/upload.png">
                </a>
          
                <a href="#">
                    <img src="https://img.icons8.com/ios/32/000000/hearts.png">
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-6 text-right">
                <button class="btn btn-block btn-cor">Ingressos</button>
            </div>
        </nav>
    </div> -->

    
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="d-flex flex-grow-1">
                <!-- A logo no menu -->
                <a class="texto navbar-brand d-lg-inline-block" href="#">
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
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <main class="container w-80 mt-5 bg-white">

        <section class="row">
            <div class="col-md-8 p-0">
                <img src="{{ asset('site/img/logo.jpg') }}" alt="Villa Mix" class="img-fluid">
            </div>

            <div class="col-md-4 border p-3 posicionamento-detalhe">
                SET <br />03

                <h5 class="mb-5">VILLA MIX BH 2019</h5>
                <div class="p-3">
                    <p>R$60 – R$1.000<p>
                </div>
            </div>
        </section>


        <section class="row border p-2">

            <div class="col-md-8 col-sm-6 col-6">
                <!-- Botão de compartilhar -->
                <a href="#">
                    <img src="https://img.icons8.com/windows/32/000000/upload.png">
                </a>
                <!-- Botão de Curtir -->
                <a href="#">
                    <img src="https://img.icons8.com/ios/32/000000/hearts.png">
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-6 text-right">
                <button class="btn btn-block btn-cor" data-target="#modal-ingresso" data-toggle="modal"
                    id="btn-ingresso">Ingressos</button>
            </div>
        </section>

        <section class="row cor-texto">
            <!-- Descrição do Evento -->
            <div class="col-md-8 col-sm-8 col-12 p-5">

                <b>
                    Excursão Villa Mix Belo Horizonte saindo do Rio de Janeiro, pacote completo com ingressos,
                    hotéis e transporte!
                    Sobre este evento
                </b>

                <h5> --- EM BREVE VALORES -----</h5>

                <p> Villa Mix Belo Horizonte 2019

                    Nosso pacote para o Villa Mix Belo Horizonte 2019 não poderia ser diferente dos outros anos né ?

                    Pool Party CONFIRMADA COM OPEN BAR !

                    Com o sucesso da nossa Pool Party em 2018, Trazemos NOVIDADES.</p>

                <h5> ...::::: ATRAÇÕES :::::...</h5>

                <p>DJ Betinho (Residente)

                    Fabiano e Bonatto (Sertanejo)

                    A All Time Party/Folia Rio que juntas levaram mais de 700 pessoas para o Villa Mix BH do ano
                    passado, se
                    juntaram para fazer o inexplicável para seus clientes, se liga:<p>

                        <h5> 📆 DATA: 30/03/2018</h5>

                        <p> 🚦 Saídas: São Gonçalo, Niterói, Rio de Janeiro.

                            🚌 Ônibus Executivo Super luxo.

                            ✈ Pacote aéreo, saindo do Rio de Janeiro valor sob-consulta.

                            🏨 Hotel com piscina e Suítes duplas completas com café da manhã.</p>

                        <h5> 🎉 Pool Party OPEN BAR 🍻</h5>

                        <p> 🎤 Atrações na Pool Party: A dupla consagrada Fabiano & Bonatto.

                            📸 Cobertura Fotográfica com Drone e fotógrafos profissionais,

                            💰 Valores Rodoviário + Hotel da Pool Party Esuites

                            R$ 399,00 via depósito bancário ou 10x de R$43,90 no cartão de crédito.</p>

                        <h5> 🔊 INGRESSOS EM BREVE </h5>

                        <p> ☑ Maiores informações:

                            📲 (21) 98310-2430 - 📲(21) 97579-0635

                            🏢 Av. Rio Branco, 181 sala 2009

                            Horário: 10h as 19h - Segunda a Sexta.</p>

            </div>

            <div class="col-md-4 col-sm-4 col-12 mb-3">

                <div class="mt-5">
                    <h6> Data E Hora </h6>
                    ter, 3 de setembro de 2019

                    15:00 – 18:00 Horário Padrão de Brasília Horário Brasil (São Paulo) <br>

                    <a href="#" class="btn-link"> Adicionar ao calendário</a>
                </div>

                <div class="mt-5">
                    <h6>Localização</h6>
                    Mineirão

                    1001 Avenida Antônio Abrahão Caran

                    São José, MG 31275-000 <br>

                    <a href="#" class="btn-link">Ver mapa</a>
                </div>

            </div>


        </section>

        <section class="row">
            <!-- Mapa do google incorporado com a localização do evento -->
            <div class="embed-responsive embed-responsive-21by9">
                <iframe class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17849.0419564544!2d-43.97181666770698!3d-19.869598896480163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa690f7ef4b8959%3A0x3dea902c03827392!2sAv.+Ant%C3%B4nio+Abrah%C3%A3o+Caram%2C+1001+-+S%C3%A3o+Jos%C3%A9%2C+Belo+Horizonte+-+MG%2C+31275-200!5e0!3m2!1spt-BR!2sbr!4v1560801737419!5m2!1spt-BR!2sbr"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>

        <section class="row">
            <div class="text-center p-3 m-auto">
                <h5> VILLA MIX BH 2019</h5>
                em
                <h6>Mineirão</h6>
                <p class="cor-texto">1001 Avenida Antônio Abrahão Caran, São José, MG 31275-000</p>
            </div>
        </section>

    </main>


    <footer class="p-3 mt-5 cor-fundo">

        <section class="row cor-lista">

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Use a Eventbrite</span>
                    <li><a href="#">Como funciona</a></li>
                    <li><a href="#">Quanto custa</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Planeje eventos</span>
                    <li><a href="#">Inscrições Online</a></li>
                    <li><a href="#"> Organizar Eventos</a></li>
                    <li><a href="#">Organização de Congressos</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Encontre eventos</span>
                    <li><a href="#">Procurar eventos: Local</a></li>
                    <li><a href="#">Obter o aplicativo da Eventbrite</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-12 col-12">
                <ul class="lista-estilo">
                    <span>Conecte-se com a gente</span>
                    <li><a href="#">Denunciar evento</a></li>
                    <li><a href="#">Centro de ajuda</a></li>
                    <li><a href="#">Termos</a></li>
                    <li><a href="#">Privacidade</a></li>
                    <li><a href="#">Diretrizes da comunidade</a></li>
                </ul>
            </div>

        </section>

    </footer>



      

  <script type="text/javascript" src="{{ asset('site/js/index-script.js') }}"></script>



</body>

</html>



<!-- ingresso PESSOA FISIC OU GRUPO --> 
@include('site.modal.ingresso');

<!-- CARREGA O TIPO DE INGRESSO, PESSOA FISICA OU GRUPO -->
@include('site.modal.tipo_ingresso');





@stop