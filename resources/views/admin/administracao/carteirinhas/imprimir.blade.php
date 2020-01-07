@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ| Imprimir Carteirinha
@stop

@section('conteudo')









<style type="text/css">
	
	@media print {
    
       @page {
              size: 100mm 200mm landscape;
         }
         
	 }

</style>


<div class="row">
	<div class="col-xs-12">
		<div class="x_panel">
			<div class="x_content">
				<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
					<!--<div class="carteirinha" id="printable">
						@if($cliente->tipo == 1)
							<h3>Titular</h3>
						@else
							<h3>Dependente</h3>
						@endif
						<h2>{{ $cliente->nome }}</h2>
						<div class="row">
							<div class="col-xs-6">
								<p>Código: {{ $numero_contrato }}</p>
								<p>Início: {{ date('d/m/Y', strtotime($cliente->created_at)) }}</p>
							</div>
							<div class="col-xs-6">
								<p>Dt. Nasc.: {{ date('d/m/Y', strtotime($cliente->data_nascimento)) }}</p>
								<p>PLANO SUPER ESPECIAL</p>
							</div>
						</div>
						<p>Obs: Atendimento somente com a identidade, a carteira e o último recibo de pagamento.</p>
						<small>SÃO JOÃO DE MIRITI (21) 3613-5556</small>
					</div>-->


					 <div class="caixa-modelo">
                                            
                                            <div class="card2">

                                                <div class="caixa-empresa font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            REDE DE MERCADOS GUANABARA<br/><small><b>Empresa</b></small>
                                                        </div>
                                                    </div>
                                                </div>  

                                                <div class="caixa-linha font-9-pt">
                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">
                                                            VITOR ARAUJO GONÇALVES<br/><small><b>Nome</b></small>
                                                        </div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-2">000000<br/><small><b>Contrato</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Nasc.</b></small></div>
                                                        <div class="coluna-2">14/03/2018<br/><small><b>Inclusão</b></small></div>
                                                    </div>  

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1">PLANO AUTO GESTÃO 1.0<br/><small><b>Plano</b></small></div>
                                                    </div>

                                                    <div class="linha  padding-bottom-03-cm">
                                                        <div class="coluna-1"> is simply dummy text of the printing and typesetting  <br/><small><b>OBS</b></small></div>
                                                    </div>    
                                                </div> 

                                            </div>
                                        </div>
                                        

                                    </div>


					<div class="form-group text-center" style="margin-top:20px">
						<button class="btn btn-info" onclick="printar_carteirinha()"><i class="fa fa-print"></i> Imprimir</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('includes_no_body')
<script type="text/javascript" src="{{ asset('js/jquery.printelement.min.js') }}"></script>

<script type="text/javascript">
	function PrintAll(file1, file2, file3) {
    window.print();
    var pages = [file1, file2, file3];
    for (var i = 0; i < pages.length; i++) {
        if (pages[i] != undefined) {
            var oWindow = window.open(pages[i], "print");
            oWindow.print();
            oWindow.close();
        }
    }
}

$('.print-btn').click(function() {
    PrintAll('/wp-content/uploads/Golden-China1.pdf');
});
</script>
@stop