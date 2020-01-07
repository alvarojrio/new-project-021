@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Cadastrar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-cadastrar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Cadastrar Especialidades</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <form method="POST" action="<?php echo url('admin/painel/especialidades/cadastrar-especialidade'); ?>" onsubmit="return validaCampos()">
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
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                
                <div class="row">
                    <div class="form-group col-lg-10 col-md-10 col-xs-12">
                        <label class="control-label">Nome da Especialidade <span class="required-red">*</span></label>
                        <input type="text" class="form-control caixa_alta" name="nome_especialidade" id="nome_especialidade" placeholder="Nome da especialidade" <?php if (!empty(old('nome_especialidade'))) { ?>value="<?php echo old('nome_especialidade'); ?>"<?php } ?> minlength="8" autofocus="off" autocomplete="off" required="required">
                    </div>
                    
                    
                    <div class="form-group col-lg-2 col-md-2 col-xs-12">
                        <label class="control-label">Sigla <span class="required-red">*</span></label>
                        <input type="text" class="form-control caixa_alta" name="sigla_especialidade" id="sigla_especialidade" placeholder="sigla" <?php if (!empty(old('sigla_especialidade'))) { ?>value="<?php echo old('sigla_especialidade'); ?>"<?php } ?> maxlength="4" autocomplete="off" required="required">
                    </div>
                </div>    
                
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Categoria Financeira <span class="required-red">*</span></label>
                        <select class="form-control" name="sub_categorias_financeiras" id="sub_categorias_financeiras" style="width:100%" required="required">
                            
                            <option value="">Selecione</option>
                            
                            @foreach($sub_categorias_financeiras as $s)
                                <option value="{{ $s->cod_sub_categoria_financeira }}" <?php if(old('sub_categorias_financeiras') && in_array($s->cod_sub_categoria_financeira, old('sub_categorias_financeiras'))){ echo "selected"; }?> >{{$s->nome_sub_categoria_financeira}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Unidades <span class="required-red">*</span></label>
                        <select class="form-control select2_multiple" name="unidades[]" id="unidades" style="width:100%" multiple required="required">
                                    
                            @foreach($unidades as $un)
                                <option value="{{ $un->cod_unidade }}" <?php if(old('unidades') && in_array($un->cod_unidade, old('unidades'))){ echo "selected"; }?> >{{$un->nome_unidade}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
              
            </div>
            
            <div class="col-sm-6 col-xs-12">
               
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Idade mínima <span class="required-red">*</span></label>
                      <input type="number" class="form-control" name="idade_minima" id="idade_minima" placeholder="Idade mínima" <?php if (!empty(old('idade_minima'))) { ?>value="<?php echo old('idade_minima'); ?>"<?php } ?> min="0" max="120"  autocomplete="off" required="required">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Periodicidade <span class="required-red">*</span></label>
                      
                        <select class="form-control" name="periodicidade_minima" id="periodicidade_minima" required="required">
                            <option value="">Selecione</option>
                            <option value="1" <?php if (old('periodicidade_minima') == 1) { echo "selected";} ?>>Dias</option>
                            <option value="2" <?php if (old('periodicidade_minima') == 2) { echo "selected";} ?>>Meses</option>
                            <option value="3" <?php if (old('periodicidade_minima') == 3) { echo "selected";} ?>>Anos</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Idade máxima <span class="required-red">*</span></label>
                      <input type="number" class="form-control" name="idade_maxima" id="idade_maxima" placeholder="Idade máxima" <?php if (!empty(old('idade_maxima'))) { ?>value="<?php echo old('idade_maxima'); ?>"<?php } ?> min="0" max="120" autocomplete="off" required="required">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Periodicidade <span class="required-red">*</span></label>
                        <select class="form-control" name="periodicidade_maxima" id="periodicidade_maxima" required="required">
                            <option value="">Selecione</option>
                            <option value="1" <?php if (old('periodicidade_maxima') == 1) { echo "selected";} ?>>Dias</option>
                            <option value="2" <?php if (old('periodicidade_maxima') == 2) { echo "selected";} ?>>Meses</option>
                            <option value="3" <?php if (old('periodicidade_maxima') == 3) { echo "selected";} ?>>Anos</option>
                        </select>
                    </div>
                </div>
              
                <div class="row">    
                    
                    <div class="form-group col-lg-6 col-md-6 col-xs-6">
                        <label class="control-label">Sexo <span class="required-red">*</span></label>

                        <select class="form-control" name="sexo" id="sexo" required="required">
                            <option value="">Selecione</option>
                            <option value="3" <?php if (old('sexo') == 3) { echo "selected";} ?>>Ambos</option>
                            <option value="2" <?php if (old('sexo') == 2) { echo "selected";} ?>>Feminino</option>
                            <option value="1" <?php if (old('sexo') == 1) { echo "selected";} ?>>Masculino</option>
                        </select>

                    </div>
                    
                    <div class="form-group col-xs-4 col-xs-4 col-xs-4">
                        <label class="control-label">Agendável? </label><br/>
                        <input type="checkbox" name="agendavel" id="agendavel" value="Sim"  <?php if (old('agendavel') == "Sim") { echo "checked";} ?> > Sim
                    </div>
                </div>
                
            </div>

            <div class="col-xs-12">
              <br/><br/>
              <button type="submit" class="btn btn-success pull-right"><i class="far fa-save"></i> Salvar</button>
              <a href="{{ url('admin/painel/especialidades/') }}" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
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
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/valida_cpf_cnpj.js') }}"></script>

<script type="text/javascript">
    
$(".select2_multiple").select2({
  placeholder: "Selecione as unidades",
  allowClear: true
});
    
// função para permitir apenas caracter informado no regex
$("#nome_especialidade").on("input", function(){
  var regexp = /[^a-zA-Zâ-ûÂ-Ûá-úÁ-Úà-ùÀ-ÙçÇãõÃÕ- ]/g;
  if(this.value.match(regexp)){
    $(this).val(this.value.replace(regexp,''));
  }
});

$("#idade_minima").on("input", function(){
    var regexp = /[^0-9]/g;
    if(this.value.match(regexp)){
      $(this).val(this.value.replace(regexp,''));
    }
});

$("#idade_maxima").on("input", function(){
    var regexp = /[^0-9]/g;
    if(this.value.match(regexp)){
      $(this).val(this.value.replace(regexp,''));
    }
});
    
</script>
@stop