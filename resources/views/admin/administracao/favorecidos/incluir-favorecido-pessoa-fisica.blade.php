@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Favorecidos | Incluir
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2-4.0.6/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('favorecido-incluir') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Incluir Categoria Finaneceira </h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  
    <div class="col-xs-12">
    
        <div class="x_panel">
      
            <div class="x_content">
        
                <div class="row">
          
                    <div class="col-xs-12">
                        
                        <h2 class="text-info"><strong>Nome da Pessoa:</strong> {{$pessoa->nome}}</h2>
                        
                        <hr/>
                        
                    </div>
          
                   
                    <div class="col-xs-12">
                    
                        <label class="control-label alert alert-info col-xs-12">Está pessoa já tem cadastro, caso deseja incluir ela também como um favorecido (fornecedor) escolha a categoria financeira abaixo. </label>
                        
                    </div>

                    <form method="POST" action="<?php echo url('admin/painel/favorecidos/incluir-favorecido-pessoa-fisica'); ?>" enctype="multipart/form-data" id="form_salas">
            
                        <div id="avisoValidacao">
              
                            @if (count($errors) > 0)
              
                            <div class="col-xs-12">
                
                                <div class="alert alert-danger">
                  
                                    <ul>
                    
                                        @foreach ($errors->all() as $error)
                    
                                        <li>{{ $error }}</li>
                    
                                        @endforeach
                  
                                    </ul>
                
                                </div>
              
                            </div>
              
                            @endif
            
                        </div>
            
                        <div class="col-lg-6 col-xs-12">
              
                
                            <div class="form-group">
                                
                                <label class="control-label">Categoria financeira <span class="required-red">*</span></label>
                    
                                <select class="control-label select2_multiple" name="cod_categoria_financeira[]" id="cod_categoria_financeira" style='width:100%' multiple>
                                    
                                    <?php foreach($categoria_financeira as $c_f): ?>
                                        <option value="<?php echo $c_f->cod_sub_categoria_financeira; ?>" <?php if(old('cod_categoria') && in_array($c_f->cod_sub_categoria_financeira, old('cod_categoria'))){ echo "selected"; }?>><?php echo $c_f->nome_sub_categoria_financeira ?></option>
                                    <?php endforeach; ?>
                                </select>
                
                            </div>
              
                
                            <div class="form-group">
                  
              
                
                            </div>
              
               
                
                            Deseja realmente incluir está pessoa como favorecido (fornecedor)?

               
                
                            <br /><br />

               
                
                            <!-- BOTÃO SIM -->
               
                
                            <div class="pull-left">

                 
                    
                                <button id="sim" type="submit" class="btn btn-success btn-lg">
                   
                        
                                    <i class="fa fa-check"></i> Sim
                 
                    
                                </button>

               
                
                            </div>       

               
                
                            <!-- BOTÃO NÃO -->
               
                
                            <div class="pull-left">

                 
                    
                                <button id="nao" type="button" class="btn btn-danger btn-lg" onclick="window.location.replace('<?php echo URL::previous(); ?>');">
                   
                        
                                    <i class="fa fa-times"></i> Não
                 
                    
                                </button>

               
                
                            </div>

               
                
                            <div class="limpar_float"></div>  

               
                
                            <br /><br />

               
                
                            <input type="hidden" id="cod_pessoa" name="cod_pessoa" value="{{Crypt::encrypt($pessoa->cod_pessoa)}}" />

                        </div>
          
          
                    </form>
        
                </div>
      
            </div>
    
        </div>
  
    </div>

</div>
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('plugins/select2-4.0.6/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>
<script src="{{ asset('plugins/webcamjs/webcam.min.js') }}"></script>

<script type="text/javascript">

    $(".select2_multiple").select2({
      placeholder: "Selecione as categorias",
      allowClear: true
    });

</script>
@stop      

