@extends('layouts.site.layout')

@section('titulo_pagina')
CMRJ | Sala de espera | Cadastrar
@stop

@section('includes_no_head')

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="shortcut icon"
        href="https://cdn.evbstatic.com/s3-build/perm_001/471d17/django/images/favicons/favicon.ico">

        <script type="text/javascript" src="{{ PagSeguro::getUrl()['javascript'] }}"></script>

       


<link href="{{ asset('site/css/chekout-estilo.css') }}" rel="stylesheet">
<link href="{{ asset('card/card.css') }}" rel="stylesheet">
<style type="text/css">
    
.active{
    background-color: #f7f7f7 !important;
    color: #000000 !important;
    font-weight: 600;
    border: 1px solid #dee2e6;
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
cursor: pointer;
background-color: #e6e6e6;
color: #565656;
}

     </style>
@stop

@section('conteudo')


 <?php
  
  if(!Auth::guard('cliente')->check()){
     header("Location: " . URL::to('/login?checkout=true'), true, 302);
     exit();
  }
      
   //dd($evento);

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
                <h3><?=$dados['nome_evento']?></h3>
                <p class="lead"><?=$dia_semana?>, <?=substr($dados['data_inicio'], 8, 6)?> de <?=$mes?> de <?=substr($dados['data_inicio'], 0, 4)?> (Horário Padrão de Brasília
                    Horário Brasil <?=substr($dados['hora_inicio'], 0, 5)?> – 
<?=substr($dados['hora_fim'], 0, 5)?> 
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

      
         
        <section class="row mt-5">
           
            <ul class="nav nav-tabs" style="width: 100%;margin-left: 15px;">
              <li class="dsvt active" onclick="activeCielo()"> CIELO CRÉDITO</li>
              <li class="dsvt"        onclick="activePagseguro()"> PAGSEGURO - CRÉDITO</li>
              <li class="dsvt"        onclick="activeBoleto()">BOLETO</li>
            </ul>


            <div class="col-md-12 view-cielo">

                <div class="card ">
                    <div class="card-header">
                     
                       @include('site.cielo')

                  </div>
                <!--fim do card-->
            </div>





            <div class="col-md-12 view-pagseguro" style="display:none">

                <div class="card">
                    <div class="card-header">
                     
                       @include('site.pagseguro')

                  </div>
                <!--fim do card-->
            </div>







            

        </section>


        <section class="mt-5">

            <div class="accordion" id="accordionExample">

                <!-- FORMULÁRIO  Ingresso 1 - PACOTE E-SUITES (DUPLO) -->
                

  <?php
 // dd($produtos;
     for ($i=0; $i < count($produtos); $i++) { 

      
            ?>
                <div class="card">
                <input type="hidden" id="produto_idt" value="<?=$produtos[$i]['cod_ingresso']?>">
             
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
                            

                              

                                <div class="form-group">
                                    <label for="nome1">Nome:
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="nome1" name="nome" require="true" placeholder="digite o nome">
                                </div>

                                

                                <div class="form-group">
                                    <label for="email1">Email:
                                    </label>
                                    <input type="email" class="form-control" id="email1" name="email" placeholder="name@example.com">
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
                                    <input type="tel" class="form-control" id="cel1" name="celular" placeholder="digite seu celular">
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
                                    <input type="date" id="nascimento1" class="form-control">
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
                                    <input class="form-check-input"  type="checkbox" value="" id="termocheck1">
                                    <label class="form-check-label" for="termocheck1">
                                        Concordo com os termos adicionais acima
                                    </label>
                                </div>

                             

                      
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

         <div class="view-cielo"  style="display:block">
              <button type="button" class="btn btn-lg btn-success finalizar-pagamento" onclick="FinalizarPagamentoCielo()">Pagar Agora</button>
          </div>
          
          <div class="view-pagseguro"  style="display:none">
              <button type="button" class="btn btn-lg btn-success finalizar-pagamento" onclick="FinalizarPagamentoPagseguroCredito()">Pagar Agora</button>
          </div>

          <div class="view-boleto" style="display:none">
              <button type="button" class="btn btn-lg btn-success finalizar-pagamento" onclick="FinalizarPagamentoPagseguroBoleto()">Pagar Agora</button>
          </div>



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
   
   
     <input type="hidden" id="valor_total_checkout" value="<?=$valor_total?>">
               
   


        <script type="text/javascript" src="{{ asset('card/payment.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('card/card.js') }}"></script> 





<script type="text/javascript">

const cod_evento = <?=$cod_evento?>;
console.log(cod_evento);
$(document).ready(function(){
    
    PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}'); //PagSeguroRecorrente tem um método identico, use o que preferir neste caso, não tem diferença.

    $('.pagseguro_cc_card_num').keyup(function(){
        pagseguroValidateCard(this, false);
    });
    $('.pagseguro_cc_card_num').focusout(function(){
        pagseguroValidateCard(this, true);
    });
    $('input.pagseguro_radio').change(function(){
        $('.pagseguro-form').hide();
        $('.pagseguro-' + $('input.pagseguro_radio:checked').val() ).show();
    });
});





var paymentModule = 'pagseguro_app';



function pagseguroValidateCard (element, bypassLengthTest) {
   
   // $('input[name=tokencard]').val('');
    var cardNum = $(element).val().replace(/[^\d.]/g, '');
    var card_invalid = 'Validamos os primeiros 6 números do seu cartão de crédito e está inválido. Por favor esvazie o campo e tente digitar de novo.';

    if (cardNum.length == 6 || (bypassLengthTest && cardNum.length >= 6)) {
        console.log(cardNum);
        PagSeguroDirectPayment.getBrand({
        cardBin: cardNum.substr(0, 6),
        success: function(response) {
            if (typeof response.brand.name != 'undefined') {
                $('#band').val(response.brand.name);
                let valor_total = $('#valor_total_checkout').val();
              
                PagSeguroDirectPayment.getInstallments({
                    amount: valor_total,
                    brand: response.brand.name,
                    success: function(response1) {
                        $('select[name=pagseguroParcelas]').html('');
                        $.each(response1.installments[response.brand.name], function(key, value){
                            $('select[name=pagseguroParcelas]').append('<option value="'+value.quantity+'x'+value.installmentAmount.toFixed(2)+'">'+value.quantity+' vezes R$: '+value.installmentAmount.toFixed(2).replace('.', ',')+' (Total: '+value.totalAmount.toFixed(2).replace('.', ',')+') - ' + response.brand.name.toUpperCase() + '</option>');
                             // console.log('<option value="'+value.quantity+'x'+value.installmentAmount.toFixed(2)+'">'+value.quantity+' vezes {{ ('currency_symbol') }} '+value.installmentAmount.toFixed(2).replace('.', ',')+' (Total: '+value.totalAmount.toFixed(2).replace('.', ',')+') - ' + response.brand.name.toUpperCase() + '</option>');
                        });
                       // $('.pagseguro-installments').show();
                       // $('.pagseguro-installments-info').hide();
                    },
                    error: function(){
                        alert(card_invalid);
                    }
                });

            }else{
                alert(card_invalid);
            }
        },
        error: function(response) {
            alert(card_invalid);
        }});
    }
}



</script>







<script type="text/javascript">



function activeCielo(){
   
    $(".view-cielo").css('display','block');
    $(".view-pagseguro").css('display','none');
    $(".view-boleto").css('display','none');

    return false;

}
function activePagseguro(){
   
    $(".view-cielo").css('display','none');
    $(".view-pagseguro").css('display','block');
    $(".view-boleto").css('display','none');

    return false;
}


     

       
$( document ).ready(function() {
   
    setTimeout(function(){ 
        //alert(PagSeguroDirectPayment.getSenderHash()); 
        $('#senderHash').val(PagSeguroDirectPayment.getSenderHash()); 

   }, 3000);

});
  

//cielo
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

//pagseguro
new Card({
    form: document.querySelector('.form2'),
            container: '.card-wrapper2',

placeholders: {
    number: '•••• •••• •••• ••••',
    name: 'NOME IMPRESSO NO CARTÃO',
    expiry: '••/••',
    cvc: '•••'
}
});



//etapa 1 papgseguro

function FinalizarPagamentoPagseguroCredito(){
   
    let InfoAdicionais = [];

    let nome_cartao =      $("#titular_pagseguro").val();
    let numero_cartao =    $(".numero_cartao_pagseguro").val();
    let cod_seguranca =    $("#cod_cartao_pagseguro").val();
    let data_vencimento =  $("#validade_pagseguro").val();
    let qnt_parcelas =     $("#pagseguroParcelas").val();
    let band =     $("#band").val();
    
    var mes_ano = data_vencimento.split('/');
    
    pagseguroCheckout(band,numero_cartao.trim(),cod_seguranca,mes_ano[0].trim(),mes_ano[1].trim());
   
  return false;

}


//etapa 2 pagseguro
 function pagseguroCheckout(bandeira,cartao,cvv,mes,ano) {
  
       var param = {
                brand: bandeira,
                cardNumber: cartao,
                cvv: cvv,
                expirationMonth: mes,
                expirationYear: ano,
                success: function(response) {
                   
                    $('input[name=tokencard]').val(response.card.token);
                    //exe a requisição
                     actionAjaxPagseguro();

                },
                error: function(response) {
                   
                    alert('Cartão de crédito inválido. Não conseguimos processar seu pedido.');
                    return false;

                }
            }
           
            PagSeguroDirectPayment.createCardToken(param);

}


//ultima etapa pagseguro
function actionAjaxPagseguro(){
 
    let InfoAdicionais = [];

    let nome_cartao =      $("#titular_pagseguro").val();
    let numero_cartao =    $(".numero_cartao_pagseguro").val();
    let cod_seguranca =    $("#cod_cartao_pagseguro").val();
    let data_vencimento =  $("#validade_pagseguro").val();
    let qnt_parcelas =     $("#pagseguroParcelas").val();
    let valor_total = $('#valor_total_checkout').val();

    ///gerador apos
    let senderHash =     $("#senderHash").val();
    let band       =     $("#band").val();
    let tokencard  =     $("#tokencard").val();

    var mes_ano = data_vencimento.split('/');


    $.ajax({
        cache: false,
        type: "POST",
        url: "<?php echo url('/finalizar-pedido-pagseguro-credito'); ?>",
        data: { 
            "nome_cartao": nome_cartao,
            "numero_cartao": numero_cartao,
            "cod_seguranca": cod_seguranca,
            "mes_vencimento":mes_ano[0].trim(),
            "ano_vencimento":mes_ano[1].trim(),
            "qnt_parcelas": qnt_parcelas,
            'valor_total': valor_total,
            "senderHash": senderHash,
            "band": band,
            "cod_evento": cod_evento,
            "tokencard": tokencard,
        },
        beforeSend: function() {  
            //loand
        },
        success: function(response) {

            console.log(response);

        }
    });


}

 function FinalizarPagamentoCielo(){
   
      let InfoAdicionais = [];

      let nome_cartao =      $("#titular_cielo").val();
      let numero_cartao =    $("#cc-number").val();
      let cod_seguranca =    $("#cartao_codigo_cielo").val();
      let data_vencimento =  $("#validadecielo").val();
      let qnt_parcelas =     $("#qtd_parcelas_cielo").val();
     
      
      $('.accordion > .card').each(function() {
        
        
            //"termocheck1 = $('#termocheck1', this).val();

            cpf_do_beneficiario = $('#nome1', this).val();
            email1 = $('#email1', this).val();
            telfixo1 = $('#telfixo1', this).val();
            cel1 = $('#cel1', this).val();
            sexo1 = $('#sexo1', this).val();
            nascimento1 = $('#nascimento1', this).val();
            oe1 = $('#oe1', this).val();
            rc1 = $('#rc1', this).val();
            produto_id = $('#produto_idt', this).val();
            
            console.log(produto_id);
            texto = 'INFORMAÇÃO ADICIONAIS<br>';
            texto += 'CPF'+ cpf_do_beneficiario;
            texto += '<br>E-MAIL: '+ email1;
            texto += '<br>TELEFONE FIXO: '+ telfixo1;
            texto += '<br>CELULAR: '+ cel1;
            texto += '<br>SEXO: '+ sexo1;
            texto += '<br>DATA NASCIMENTO: '+ nascimento1;
            texto += '<br>Orgão Exp: '+ oe1;
            texto += 'CPF/RG: '+ rc1;
            
           infos = {
            "produto_id": produto_id,
			"texto": texto
		    }

		  InfoAdicionais.push(infos);
          infos = null;

      });

      let valor_total = $('#valor_total_checkout').val();

        

    
  $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/finalizar-pedido-cielo'); ?>",
      data: { 
          "nome_cartao": nome_cartao,
          "numero_cartao": numero_cartao,
          "cod_seguranca": cod_seguranca,
          "data_vencimento": data_vencimento,
          "qnt_parcelas": qnt_parcelas,
          "total": valor_total,
          "cod_evento": cod_evento,
          "info_dados": InfoAdicionais
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {

          console.log(response);

      }
  });

   return false;
}

function FinalizarPagamentoBoleto(){

var data = JSON.stringify( $("#form_cieloo").serializeArray() ); 

 console.log(JSON.parse(data));

 return false;

 
}

function FinalizarPagamentoPagseguro(){

var data = JSON.stringify( $("#form_cieloo").serializeArray() ); 

 console.log(JSON.parse(data));

 return false;

 
}

</script>
</body>

</html>
      






@stop



