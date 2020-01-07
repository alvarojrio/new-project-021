@extends('layouts.administracao.layout')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Não há formas de pagamentos no banco de dados:<br/>
                        <small>Ainda não há registros de - <b> formas de pagamentos no sistema.</b></small>
                    </h3>
                </div>
                <div class="panel-body">
                    <h2 class="text-danger">Atenção!</h2> 
                     Contate o administrador para que o mesmo alimente a base com as formas de pagamentos!
                     <br /><br />
                </div>
            </div>
        </div>

    </div>

</div>

@stop