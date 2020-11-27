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
        <h3>Cadastrar Local</h3>
    </div>
</div>
<div class="clearfix"></div>
@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif
                            
                            <div class="row" id="credito">
                                
                                <!-- INICIO PANEL-DEFAULT -->						
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading"><i class="far fa-credit-card"></i> Configurações de Local</div>
                                    <!-- INICIO PANEL-BODY -->							
                                    
                                    <div class="panel-body">                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-xs-12">

         <form method="POST" action="<?php echo url('admin/local/cadastrar') ?>">                                     
 <div class="row">

        <div class="col-md-6">

            <div class="form-group">

                <label>Local Google Maps:</label>

                <input name="localizacao" type="text" class="form-control text-lowercase" id="text"   required="">

            </div>

        </div>


        <div class="col-md-6">

            <div class="form-group">

                <label>Complemento (Opticional)</label>:</label>

                <input name="complemento" type="text" class="form-control text-lowercase" id="senha" value=""  required="">

            </div>

        </div>

        <div class="col-md-12">

            <div class="form-group">

                <label>Descrição do Local e Hora:</label>

                <textarea class="form-control caixa_alta" name="detalhe" required="required">            
                
                </textarea>
                

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
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script src="{{ asset('js/funcoes_forms.js?time=15721415') }}"></script>    
<script>
CKEDITOR.replace( 'detalhe' );
</script>
<script type="text/javascript">
    
 /**  CADASTRAR CLIENTE **/
         $("#cadastradocliente").submit(function(){
               
            

             $(".bnt-block").prop('disabled', true);

             $.ajax({
               url:"<?php echo url('/admin/clientes/acaoCreate'); ?>",
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
