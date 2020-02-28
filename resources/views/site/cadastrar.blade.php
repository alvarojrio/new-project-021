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

<?php
/*if(Auth::guard('cliente')->check())
     php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    endphp
 endif*/

 ?>



 <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}" ></script>




    <main class="container mt-5">


        <div>
            <h3 class="m-0 mr-3 texto-titulo">
                    <img style="font-size: 10px" class=" img-fluid" src="https://img.icons8.com/dusk/38/000000/user.png">
                Cadastro</h3>
           <hr>
        </div>


  <div class="col-md-12" > 

          
           <div class="erros"></div>

            <form method="post" id="cadastradocliente" name="cadastradocliente">

           

            <div class="bkg-white bloco-m clearfix">

              <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nome Completo *</label>                            

                            <input name="nome" type="text" class="form-control text-uppercase" id="nome" required="" value="">

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>Telefone Celular *</label>                            

                            <input name="telefone1" type="text" class="form-control" id="telefone" maxlength="15" required="">

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>Telefone Residencial</label>

                            <input name="telefone2" type="text" class="form-control" id="telefone2" value="" maxlength="15" required="">

                        </div>

                    </div>
 </div> 
              <div class="row">

                    <div class="col-md-2">                                    

                        <div class="form-group">

                            <label>Data De Nascimento</label>

                            <input type="text" name="nascimento" id="campoData" class="form-control" value="" data-date-format="DD/MM/YYYY"  required="">                                            

                        </div>

                    </div>

                    <div class="col-md-2">

                        <label>Sexo</label>

                        <div class="select-helper">

                            <select name="sexo" id="sexo" class="form-control">

                                <option value="M" selected="">selecione</option>

                                <option value="F">Feminino</option>

                                <option value="M">Masculino</option>

                            </select>

                        </div>

                    </div>

                


                   <div class="col-md-2">                                    

                        <div class="form-group">

                            <label>RG</label>

                            <input type="text" name="rg" id="rg" class="form-control" value=""  required="">                                            

                        </div>

                    </div>

                    <div class="col-md-2">                        

                        <div class="form-group">

                            <label>CEP</label>

                            <input type="text" name="cep" style="height: 28px;

    width: 113px;

    float: left;

"  id="cep"  required="">

                            <button onclick="return false" class="lupa"><i class="fa fa-search" aria-hidden="true"></i></button>

                        </div>

                    </div>

                    

                  

                    

                    <div class="col-md-4">

                        <div class="form-group">

                            <label>Endereço *</label>                            

                            <input name="endereco" type="text" class="form-control text-uppercase" id="rua" value="" required="">

                        </div>

                    </div>

               </div>
               
               <div class="row">    

                    <div class="col-md-1">

                        <div class="form-group">

                            <label>Número</label>

                            <input name="numero" type="number" class="form-control" id="numero" value="" required="">

                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="form-group">

                            <label>Complemento</label>

                            <input name="complemento" type="text" class="form-control text-uppercase" id="complemento" value=""  >

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>Bairro</label>

                            <input name="bairro" type="text" class="form-control text-uppercase" id="bairro" value=""  required="">

                        </div>

                    </div>

                    <div class="col-md-5">

                        <div class="form-group">

                            <label>Cidade</label>

                            <input name="cidade" type="text" class="form-control text-uppercase" id="cidade" value=""  required="">

                        </div>

                    </div>

                    <div class="col-md-1">

                            <label>UF</label>

                            <div class="select-helper">

                                <select name="uf" id="uf" class="form-control">

                                    <option value="RJ" selected="">RJ</option>

                                    <option value="AC">AC</option>

                                    <option value="AL">AL</option>

                                    <option value="AP">AP</option>

                                    <option value="AM">AM</option>

                                    <option value="BA">BA</option>

                                    <option value="CE">CE</option>

                                    <option value="DF">DF</option>

                                    <option value="ES">ES</option>

                                    <option value="GO">GO</option>

                                    <option value="MA">MA</option>

                                    <option value="MG">MG</option>

                                    <option value="MT">MT</option>

                                    <option value="MS">MS</option>

                                    <option value="PA">PA</option>

                                    <option value="PB">PB</option>

                                    <option value="PR">PR</option>

                                    <option value="PI">PI</option>

                                    <option value="PE">PE</option>

                                    <option value="RJ">RJ</option>

                                    <option value="RN">RN</option>

                                    <option value="RO">RO</option>

                                    <option value="RR">RR</option>

                                    <option value="RS">RS</option>

                                    <option value="SC">SC</option>

                                    <option value="SE">SE</option>

                                    <option value="SP">SP</option>

                                    <option value="TO">TO</option>

                                    <option value="EXT">EXT</option>

                                </select>

                        </div>

                    </div>
</div>  

 <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Email:</label>

                            <input name="email" type="email" class="form-control text-lowercase" id="email"  required="">

                        </div>

                    </div>
</div>

<div class="row">

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>Crie uma senha:</label>

                            <input name="senha" type="password" class="form-control text-lowercase" id="senha"  required="">

                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">

                            <label>Repita sua senha:</label>

                            <input name="repitasenha" type="password" class="form-control text-lowercase" id="repitasenha"  required="">

                        </div>

                    </div>


</div>


                 <button class="bt-login btn btn-success bnt-block"><i class="fa fa-sign-in" aria-hidden="true"></i> Cadastrar</button>

</br>
</br>

                  


    </div>

</form>



    </main>




<script type="text/javascript">
    
 /**  CADASTRAR CLIENTE **/
         $("#cadastradocliente").submit(function(){
               
            //  $(".bnt-block").prop('disabled', true);

             $.ajax({
               url:"<?php echo url('/cadastrarUsuario'); ?>",
               type:"post",
               data: $("#cadastradocliente").serialize(),
                success: function(data) {
                      
                    json = JSON.parse(data); 
                  //$(".bnt-block").prop('disabled', false);

                    
                   if(json.status_requisicao == "sucesso"){
                       // alert("Parabéns conta criada..");
                     
                        window.location= "<?php echo url('/login'); ?>"; 

                    }else if(json.status_requisicao == "error_form"){
                      
                             $(".erros").html('');                       
                             $(".erros").html(json.dados);                       
                        }else{

                           alert("Ops, error tente novamente mais tarde.");
                   };
                }

               })

               return false;
         });
     





$("#form").submit(function() {
     
    let login = $("#usuario").val();
    let senha = $("#senha").val();

    $(".bnt-block").prop('disabled', true);

  if(login.length < 3 && senha.length < 3  ){
   
     $(".msg-error").css("display","block");
     $(".msg-error").html(" ");
     $(".msg-error").html("Digite as informação corretamente  ! ");
     return false;
  }

  $.ajax({
      cache: false,
      type: "POST",
      url: "<?php echo url('/loginuser'); ?>",
      data: { 
          "usuario": login,
          "senha": senha
      },
      beforeSend: function() {  
            //loand
      },
      success: function(response) {
            
              console.log(response);
    $(".bnt-block").prop('disabled', false);

            if(response == 1){
             
                 alert("Login realizado com sucesso ");

            }else{

                   $(".msg-error").css("display","block");
                   $(".msg-error").html(" ");
                   $(".msg-error").html("Ops.. Senha e/ou Login invalidos ! ");

            }

        }

  });
            


                return false;
  });

</script>

<script>

jQuery(function($){

$("#campoData").mask("99/99/9999");

$("#telefone").mask("(99) 99999-9999");

$("#telefone2").mask("(99) 9999-9999");

$(".copf").mask("999.999.999-99");

$("#campoSenha").mask("***-****");

});



 $(document).ready(function() {



            function limpa_formulário_cep() {

                // Limpa valores do formulário de cep.

                $("#rua").val("");

                $("#bairro").val("");

                $("#cidade").val("");

                //$("#uf").val("");

                //$("#ibge").val("");

            }

            

            //Quando o campo cep perde o foco.

            $("#cep").blur(function() {



                //Nova variável "cep" somente com dígitos.

                var cep = $(this).val().replace(/\D/g, '');



                //Verifica se campo cep possui valor informado.

                if (cep != "") {



                    //Expressão regular para validar o CEP.

                    var validacep = /^[0-9]{8}$/;



                    //Valida o formato do CEP.

                    if(validacep.test(cep)) {



                        //Preenche os campos com "..." enquanto consulta webservice.

                        $("#rua").val("...");

                        $("#bairro").val("...");

                        $("#cidade").val("...");

                        //$("#uf").val("...");

                        $//("#ibge").val("...");



                        //Consulta o webservice viacep.com.br/

                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {



                            if (!("erro" in dados)) {

                                //Atualiza os campos com os valores da consulta.

                                $("#rua").val(dados.logradouro);

                                $("#bairro").val(dados.bairro);

                                $("#cidade").val(dados.localidade);

                                //$("#uf").val(dados.uf);

                               // $("#ibge").val(dados.ibge);

                            } //end if.

                            else {

                                //CEP pesquisado não foi encontrado.

                                limpa_formulário_cep();

                                alert("CEP não encontrado.");

                            }

                        });

                    } //end if.

                    else {

                        //cep é inválido.

                        limpa_formulário_cep();

                        alert("Formato de CEP inválido.");

                    }

                } //end if.

                else {

                    //cep sem valor, limpa formulário.

                    limpa_formulário_cep();

                }

            });

        });



</script>
@stop