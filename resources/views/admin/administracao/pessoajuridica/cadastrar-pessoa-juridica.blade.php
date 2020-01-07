@extends('layouts.administracao.layout')

@section('titulo_pagina')
Clínicas Integradas Rio de Janeiro | Clientes | Pessoa Jurídica
@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('pessoa-juridica-cadastrar') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Cadastrar Pessoa Jurídica</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <!-- Renderizo View Component -->
                @render(drclub\Http\ViewComponents\CadastrarPessoaJuridicaComponent::class, 'pagina')

            </div>
        </div>
    </div>

</div>

@stop
