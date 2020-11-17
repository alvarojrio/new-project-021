@extends('layouts.administracao.layout')

@section('titulo_pagina')
GRUPO021 | EVENTOS | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('conteudo')


<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Bandeira</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                        <div id="avisoValidacao">
                          
                        </div>

                        <div class="col-xs-12">
                            
                            <div class="row">
                                
                                <div class="panel panel-default"> 
                                    
                                    <div class="panel-heading"><i class="far fa-flag"></i> Dados da bandeira</div>                                
                                    
                                    <div class="panel-body">
                                       
                                        <div class="col-xs-12">
                                            
                                            



<div class="col-md-12" > 

  
   <div class="erros"></div>

    <form method="post" id="cadastradocliente" name="cadastradocliente">

   

    <div class="bkg-white bloco-m clearfix">

      <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label>Nome Completo *</label>                            

                    <input name="nome" type="text"  class="form-control text-uppercase" id="nome" required="" value="<?=$dados->clientes_nome?>">
                    <input name="id" type="hidden"  class="form-control text-uppercase" id="id" required="" value="<?=$dados->clientes_id?>">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Telefone Celular *</label>                            

                    <input name="telefone1" type="text" class="form-control" id="telefone" maxlength="15" required="" value="<?=$dados->clientes_telefone?>">

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Telefone Residencial</label>

                    <input name="telefone2" type="text" class="form-control" id="telefone2" maxlength="15" required="" value="<?=$dados->clientes_telefone2?>">

                </div>

            </div>
</div> 
      <div class="row">

            <div class="col-md-2">                                    

                <div class="form-group">

                    <label>Data De Nascimento</label>

                    <input type="text" name="nascimento" id="campoData" class="form-control"  data-date-format="DD/MM/YYYY"  required="" 
                    value="13/09/1992">                                            

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

                    <input type="text" name="rg" id="rg" value="<?=$dados->rg?>" class="form-control" value="4564564"  required="">                                            

                </div>

            </div>

            <div class="col-md-2">                        

                <div class="form-group">

                    <label>CEP</label>

                    <input type="text" name="cep" style="height: 28px;

width: 113px;

float: left;

"  id="cep"  value="<?=$dados->clientes_cep?>" required="">

                    <button onclick="return false" class="lupa"><i class="fa fa-search" aria-hidden="true"></i></button>

                </div>

            </div>

            

          

            

            <div class="col-md-4">

                <div class="form-group">

                    <label>Endereço *</label>                            

                    <input name="endereco" type="text"  class="form-control text-uppercase" id="rua" value="<?=$dados->clientes_logradouro?>"  required="">

                </div>

            </div>

       </div>
       
       <div class="row">    

            <div class="col-md-1">

                <div class="form-group">

                    <label>Número</label>

                    <input name="numero" type="number" class="form-control" id="numero" value="<?=$dados->clientes_numero?>"  required="">

                </div>

            </div>

            <div class="col-md-2">

                <div class="form-group">

                    <label>Complemento</label>

                    <input name="complemento" type="text" class="form-control text-uppercase" id="complemento" value="<?=$dados->clientes_complemento?>"   >

                </div>

            </div>

            <div class="col-md-3">

                <div class="form-group">

                    <label>Bairro</label>

                    <input name="bairro" type="text" class="form-control text-uppercase" id="bairro" value="<?=$dados->clientes_bairro?>"  required="">

                </div>

            </div>

            <div class="col-md-5">

                <div class="form-group">

                    <label>Cidade</label>

                    <input name="cidade" type="text" class="form-control text-uppercase" id="cidade"  value="<?=$dados->clientes_cidade?>"  required="">

                </div>

            </div>

            <div class="col-md-1">

                    <label>UF</label>

                    <div class="select-helper">

                        <select name="uf" id="uf" class="form-control">

                           <option value="<?=$dados->clientes_uf?>" selected=""><?=$dados->clientes_uf?></option>
                        

                            <option value="AC">AC</option>

                            <option value="AL">AL</option>

                            <option value="AP">AP</option>

                            <option value="AM">AM</option>

                            <option value="BA">BA</option>

                            <option value="CE">CE</option>

                            <option value="DF">DF</option>

                            <option value="ES">ES</option>

                            <option value="GO">GO</option>
                            <option value="RJ" >RJ</option>

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

</br>



</div>







                                        
                                        </div>    
                                    
                                    </div>

                                    <br/>

                                </div>
                                
                            </div>
                            
                            <div class="row" id="credito">
                                
                                <!-- INICIO PANEL-DEFAULT -->						
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Configurações de crédito</div>
                                    <!-- INICIO PANEL-BODY -->							
                                    
                                    <div class="panel-body">                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-xs-12">
                                                
                                            <div class="row">

            <div class="col-md-6">

                <div class="form-group">

                    <label>Email:</label>

                    <input name="email" type="email" class="form-control text-lowercase" id="email" value="<?=$dados->clientes_email?>"  required="">

                </div>

            </div>


<div class="col-md-3">

    <div class="form-group">

        <label>Crie uma senha:</label>

        <input name="senha" type="password" class="form-control text-lowercase" id="senha" value="123456"  required="">

    </div>

</div>

<div class="col-md-3">

    <div class="form-group">

        <label>Repita sua senha:</label>

        <input name="repitasenha" type="password" class="form-control text-lowercase" id="repitasenha"  value="123456"  required="">

    </div>

</div>


</div>


                                                
                                            </div>
                                            
                                        </div>
                                        
                                     
                                        
                                    </div>
                                    <!-- FIM PANEL-BODY -->
                                    
                                </div>
                                <!-- FIM PANEL-DEFAULT -->
                                
                            </div>
                            
                        
                           
                                 <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12">
                                
                                <button type="submit" id="88" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
                                
                            
                            </div>                            
                            
                            <!-- LINHA -->
                            <div id="msg_processando">
                                
                                <div id="txt_msg_processando">
                                    
                                    <i class="fa fa-exchange"></i> PROCESSANDO...
                                </div>
                                
                            </div>

                        </div>
               
                    </form>        
            
                </div>
        
            </div>
    
        </div>

    </div> 

</div>   
</div>
</div>
</div>

@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('js/funcoes_forms.js?time=4444') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script type="text/javascript">
    
 /**  CADASTRAR CLIENTE **/
         $("#cadastradocliente").submit(function(){
               
            

             $(".bnt-block").prop('disabled', true);

             $.ajax({
               url:"<?php echo url('/admin/clientes/acaoEditar'); ?>",
               type:"post",
               data: $("#cadastradocliente").serialize(),
                success: function(data) {
                      
                    json = JSON.parse(data); 
                  $(".bnt-block").prop('disabled', false);

                    
                   if(json.status_requisicao == "sucesso"){
                       // alert("Parabéns conta criada..");

                     
                        //window.location = "< echo url('/login'); ?>"; 

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
