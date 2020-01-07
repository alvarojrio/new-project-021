@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Conciliações | Clientes Pessoa Física
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('conciliacao-pf-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Cliente Pessoa Física</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- Renderizo View Component -->
                @render(drclub\Http\ViewComponents\CadastrarConciliacaoPessoaFisicaComponent::class, 'pagina')

            </div>
        </div>
    </div>

</div>

@stop
