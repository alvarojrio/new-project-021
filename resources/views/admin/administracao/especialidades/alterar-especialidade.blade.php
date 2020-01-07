@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Especialidades | Alterar
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('especialidades-alterar') !!}

<div class="page-title">
  <div class="title_left">
    <h3>Alterar Especialidades</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-xs-12">
    <div class="x_panel">
      <div class="x_content">
        <div class="row">
          <form method="POST" action="<?php echo url('admin/painel/especialidades/alterar-especialidade'); ?>" onsubmit="return validaCampos()">
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
            <div class="col-sm-6 col-xs-12">
                
                <div class="row">
                    <div class="form-group col-xs-12 col-xs-10 col-xs-10">
                        <label class="control-label">Nome da Especialidade <span class="required-red">*</span></label>
                        <input type="text" class="form-control caixa_alta" name="nome_especialidade" id="nome_especialidade" value="<?php echo $especialidade->nome_especialidade; ?>" minlength="8" autofocus="off" autocomplete="off" required="required">
                    </div>
                    
                    
                    <div class="form-group col-lg-2 col-md-2 col-xs-12">
                        <label class="control-label">Sigla <span class="required-red">*</span></label>
                        <input type="text" class="form-control caixa_alta" name="sigla_especialidade" id="sigla_especialidade" value="<?php echo $especialidade->sigla_especialidade; ?>" maxlength="4" autocomplete="off" required="required">
                    </div>
                </div>     
                
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Unidades <span class="required-red">*</span></label>
                        <select class="form-control select2_multiple" name="unidades[]" id="unidades" style="width:100%" multiple required="required">
                                    
                            <?php foreach($unidades as $unidade): ?>
                                    <option value="<?php echo $unidade->cod_unidade; ?>" <?php if (in_array($unidade->cod_unidade, $especialidade->unidades()->where('unidades_especialidades.status',1)->pluck('unidades_especialidades.cod_unidade')->toArray())) { echo "selected"; } ?>><?php echo $unidade->nome_unidade; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
     
                </div>
              
                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <label class="control-label">Categoria Financeira <span class="required-red">*</span></label>
                        <select class="form-control" name="sub_categorias_financeiras" id="sub_categorias_financeiras" style="width:100%" required="required">
                            
                            
                            @foreach($sub_categorias_financeiras as $s)
                                <option value="{{ $s->cod_sub_categoria_financeira }}" <?php if($especialidade->cod_sub_categoria_financeira == $s->cod_sub_categoria_financeira){ echo 'selected'; } ?> >{{$s->nome_sub_categoria_financeira}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
      
            </div>
            
            <div class="col-sm-6 col-xs-12">
               
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Idade mínima <span class="required-red">*</span></label>
                      <input type="number" class="form-control" name="idade_minima" id="idade_minima" placeholder="Idade mínima" value="<?php echo $especialidade->idade_minima; ?>" min="0" max="120"  autocomplete="off" required="required">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Periodicidade <span class="required-red">*</span></label>
                      
                        <select class="form-control" name="periodicidade_minima" id="periodicidade_minima" required="required">
                            <option value="">Selecione</option>
                            <option value="1" <?php if ($especialidade->periodicidade_minima == 1) { echo "selected";} ?>>Dias</option>
                            <option value="2" <?php if ($especialidade->periodicidade_minima == 2) { echo "selected";} ?>>Meses</option>
                            <option value="3" <?php if ($especialidade->periodicidade_minima == 3) { echo "selected";} ?>>Anos</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                      <label class="control-label">Idade máxima <span class="required-red">*</span></label>
                      <input type="number" class="form-control" name="idade_maxima" id="idade_maxima" placeholder="Idade máxima" value="<?php echo $especialidade->idade_maxima; ?>" min="0" max="120" autocomplete="off" required="required">
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-12 col-xs-12">
                        <label class="control-label">Periodicidade <span class="required-red">*</span></label>
                        <select class="form-control" name="periodicidade_maxima" id="periodicidade_maxima" required="required">
                            <option value="">Selecione</option>
                            <option value="1" <?php if ($especialidade->periodicidade_maxima == 1) { echo "selected";} ?>>Dias</option>
                            <option value="2" <?php if ($especialidade->periodicidade_maxima == 2) { echo "selected";} ?>>Meses</option>
                            <option value="3" <?php if ($especialidade->periodicidade_maxima == 3) { echo "selected";} ?>>Anos</option>
                        </select>
                    </div>
                </div>
                
                 <div class="row">    
                    
                    <div class="form-group col-lg-8 col-md-8 col-xs-8">
                        <label class="control-label">Sexo <span class="required-red">*</span></label>

                        <select class="form-control" name="sexo" id="sexo" required="required">
                            <option value="">Selecione</option>
                            <option value="3" <?php if($especialidade->sexo_especialidade == 3) { echo "selected";} ?>>Ambos</option>
                            <option value="2" <?php if($especialidade->sexo_especialidade == 2) { echo "selected";} ?>>Feminino</option>
                            <option value="1" <?php if($especialidade->sexo_especialidade == 1){ echo "selected";} ?>>Masculino</option>
                        </select>

                    </div>
                    
                    <div class="form-group col-xs-4 col-xs-4 col-xs-4">
                        <label class="control-label">Agendável? </label><br/>
                        <input type="checkbox" name="agendavel" id="agendavel" value="Sim"  <?php if ($especialidade->agendamento == 1) { echo "checked";} ?> > Sim
                    </div>
                </div>
              
            </div>
              

            <div class="col-xs-12">
              <br/><br/>
              <input type="hidden" id="cod_especialidade" name="cod_especialidade" value="{{Crypt::encrypt($especialidade->cod_especialidade)}}" />  
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