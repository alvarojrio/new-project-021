@extends('layouts.site.layout')

@section('titulo_pagina')
CMRJ | Sala de espera | Cadastrar
@stop

@section('includes_no_head')

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="shortcut icon"
        href="https://cdn.evbstatic.com/s3-build/perm_001/471d17/django/images/favicons/favicon.ico">


<link href="{{ asset('site/css/chekout-estilo.css') }}" rel="stylesheet">
<link href="{{ asset('card/card.css') }}" rel="stylesheet">

@stop

@section('conteudo')


 <?php
  
  if(!Auth::guard('cliente')->check()){
     header("Location: " . URL::to('/login?checkout=true'), true, 302);
     exit();
  }
      

  ?>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="d-flex flex-grow-1">
                <!-- A logo no menu -->
                <a class="texto-logo navbar-brand d-lg-inline-block" href="#">
                    eventbrite
                </a>

                <!-- O botão de esconder menu quando diminuir a tela  -->
        </nav>

    </header>



    <main class="container mt-5">

        <section class="row">

            <div class="col-md-8 mb-3">
                <h3>VILLA MIX BH 2019</h3>
                <p class="lead">Terça-feira, 3 de setembro de 2019 das 15:00 às 18:00 (Horário Padrão de Brasília
                    Horário Brasil (São Paulo))
                    São José, MG</p>
            </div>

            <div class="col-md-4">
                <img src="{{asset('site/img/logo-mini.jpg')}}" class="img-fluid" alt="Villa Mix BH">
            </div>
        </section>

        <section class="row mt-5">
            <div class="col-md-8 col-sm-8 col-12 mt-3">
                <div class="card bg-white">
                    <h5 class="card-header">Resumo do pedido</h5>

                    <div class="card-body">

                        <p> TIPO DE INGRESSO: <span class="text-primary">Valor aqui</span></p>
                        <p>PREÇO: <span class="text-primary">Valor aqui</span></p>
                        <p>TAXA: <span class="text-primary">Valor aqui</span></p>
                        <p>QUANTIDADE: <span class="text-primary">Valor aqui</span></p>

                    </div>

                    <div class="card-footer">

                        <p>
                            <h6>Total: <?=$valor_total?></h6>
                        </p>

                    </div>
                </div><!-- Fim da div card-->
            </div>
            <!--FIM DA DIV COL-->

            <div class="col-md-4 col-sm-4 col-12 mt-3">
                <div class="card bg-white">
                    <h6 class="card-header">Quando e onde</h6>

                    <div class="card-body">

                        <p class="text-primary">
                            <b>Mineirão</b><br>
                            1001 Avenida Antônio Abrahão Caran
                            São José, MG 31275-000
                            Brasil
                        </p>

                        <p class="text-primary">
                            Terça-feira, 3 de setembro de 2019 das 15:00 às 18:00 (Horário Padrão de Brasília Horário
                            Brasil
                            (São Paulo))
                        </p>

                    </div><!-- Fim da div card-body -->

                </div><!-- Fim da div card-->
            </div>
            <!--FIM DA DIV COL-->


        </section>

       

        <section class="row mt-5" style="display: none">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <h5>Comprador do ingresso</h5>
                        <span class="text-danger texto-pequeno">* Campo obrigatório</span>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nome
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="digite o nome">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Sobrenome
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="digite o sobrenome">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Repita Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>

                        </form>
                    </div>
                    <!--fim do card-body-->

                </div>
                <!--fim do card-->


            </div>

        </section>

      
         <style type="text/css">
    
    .devtap{
                  height: 35px;
    background-color: #d6d5d5;
    width: 143px;
    text-align: center;
    margin: 0px;
    padding: 0px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    margin-right: 15px;
    cursor:  pointer
         } 
        .dsvt{
                  height: 35px;
    width: 203px;
    text-align: center;
    margin: 0px;
    padding: 0px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    margin-right: 10px;
    cursor:  pointer
         }
         </style>
        <section class="row mt-5">
           
            <ul class="nav nav-tabs" style="width: 100%;
    margin-left: 15px;">
              <li class="active devtap"> CIELO CRÉDITO</li>
              <li class="dsvt"> PAGSEGURO - CRÉDITO</li>
              <li class="dsvt">BOLETO</li>
            </ul>


            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">


                    @include('site.cielo')

                  </div>
                <!--fim do card-->
            </div>

        </section>


        <section class="mt-5">

            <div class="accordion" id="accordionExample">

                <!-- FORMULÁRIO  Ingresso 1 - PACOTE E-SUITES (DUPLO) -->
            <?php
 
     for ($i=0; $i < count($produtos ); $i++) { 
          
      
            ?>
                <div class="card">
                    <div class="card-header" id="headingOne_<?php echo $i; ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne_<?php echo $i; ?>"
                                aria-expanded="true" aria-controls="collapseOne_<?php echo $i; ?>">
                                <?=$produtos[$i]['nome']?>
                            </button>
                        </h2>
                    </div><!-- FIM DO CARD HEADER-->

                    <div id="collapseOne_<?php echo $i; ?>" class="collapse" aria-labelledby="headingOne_<?php echo $i; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="">

                              

                                <div class="form-group">
                                    <label for="nome1">Nome:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nome1" placeholder="digite o nome">
                                </div>

                                

                                <div class="form-group">
                                    <label for="email1">Email:
                                    </label>
                                    <input type="email" class="form-control" id="email1" placeholder="name@example.com">
                                </div>

                                <div class="form-group">
                                    <label for="telfixo1">Telefone Residencial:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" id="telfixo1"
                                        placeholder="digite seu telefone fixo">
                                </div>

                                <div class="form-group">
                                    <label for="cel1">Celular:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" id="cel1" placeholder="digite seu celular">
                                </div>


                                <h3>Outras informações</h3>

                                <div class="form-group">
                                    <label for="sexo1">Sexo:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" id="sexo1">
                                        <option>Masculino</option>
                                        <option>Feminino</option>
                                        <option>Outro</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="data1">Data de Nascimento
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" id="data1" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="oe1">RG / Órgão Emissor:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="oe1" placeholder="digite o orgão emissor"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="rc1">RG / CPF:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="rc1" placeholder="digite RG ou CPF" class="form-control">
                                </div>

                                <h3>Termos adicionais</h3>

                                <div class="form-group">
                                    <label for="ca1">Contrato de Adesão:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" id="ca1"
                                        rows="6">REGULAMENTO PARA CONHECIMENTO PRÉVIO DO CONSUMIDOR NORMAS GERAIS DE COMPRA E PARTICIPAÇÃO LEITURA OBRIGATORIAANTES DE EFETUAR A SUA COMPRA Pelo presente instrumento, o CONTRATANTE,cadastrado eletronicamente (IP) no siteFOLIASHOP (www.foliashop.com.br) celebra por meio cartão de crédito utilizado na compra e assinar um termo de confirmação do reconhecimento da operação.</textarea>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="termocheck1">
                                    <label class="form-check-label" for="termocheck1">
                                        Concordo com os termos adicionais acima
                                    </label>
                                </div>

                             

                            </form>
                        </div>
                        <!--FIM DA DIV CARD-BODY -->
                    </div><!--  FIM DA DIV COLLAPSE -->
                </div><!-- FIM DA DIV CARD -->

              
        
<?php
 }
?>
                <!--FIM DA DIV CARD-->
            </div>
            <!--FIM DA DIV ACCORDION-->
        </section>

        <section class="mt-5 mb-5 bg-light border p-3 text-center">

            <button type="button" class="btn btn-lg btn-success finalizar-pagamento" onclick="finalizarpagamento()">Pagar Agora</button>

            <div class="p-3">
                <p class="texto-pequeno">
                    Aceito os <a href="#">termos de serviço</a> e li a <a href="#">de privacidade</a> política .<br>
                    Concordo que a Eventbrite poderá
                    <a href="#">compartilhar minhas
                        informações</a><br> com o organizador do evento.
                </p>
            </div>

            <div class="text-center">

                <img title="mastercard" class="img-fluid" src="https://img.icons8.com/color/50/000000/mastercard.png">

                <img title="visa" class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png">

                <img title="amex" class="img-fluid" src="https://img.icons8.com/color/48/000000/amex.png">

                <img title="boleto" class="img-fluid" src="https://img.icons8.com/color/48/000000/boleto-bankario.png">

            </div>
        </section>
    </main>

    <footer class="p-3 mt-5 cor-fundo">

        <section class="row">

            <div class="col-md-8 col-sm-8 col-12">
                <p class="texto-pequeno">Utilize a Eventbrite para <a class="text-white" href="#">vender ingressos</a>
                    ou <a class="text-white" href="#">receber inscrições online</a> para seus eventos.</p>
                <nav>
                    <ul class="nav lista-estilo">

                        <li class="nav-item"><a class="nav-link" href="#">Denunciar evento</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Centro de ajuda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Termos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Privacidade</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Diretrizes da comunidade</a></li>
                    </ul>
                </nav>

            </div>

            <div class="texto-pequeno col-sm-4 col-md-4 col-12">
                Já se inscreveu? <a href="#" class="text-white">Obter seus ingressos</a><br>
                Dúvidas? <a href="#" class="text-white">Entrar em contato com o organizador</a>

            </div>
        </section>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>


        <script type="text/javascript" src="{{ asset('card/payment.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('card/card.js') }}"></script> 

<script type="text/javascript">
            
 new Card({
            form: document.querySelector('.form'),
            container: '.card-wrapper',
      
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'NOME IMPRESSO NO CARTÃO',
        expiry: '••/••',
        cvc: '•••'
        }
        });

 function finalizarpagamento(){

  var data = JSON.stringify( $("#form_cieloo").serializeArray() ); 
  
   console.log(JSON.parse(data));

   return false;
}
</script>
</body>

</html>
      






@stop



