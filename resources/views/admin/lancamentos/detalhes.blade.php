@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categoria Financeira
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->

<div class="page-title">
    <div class="title_left">
        <h3>Categorias Financeiras</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

       
              
                <div class="col-lg-6 col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2"><i class="fas fa-user"></i> Informações da Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="2">
                                    <img src="http://teste.drclubmais.com.br/uploads/convenios/logotipos/sem_foto.png" alt="Imagem" width="200px" height="200px" accesskey="" class="img-thumbnail">
                                </td>
                            </tr>
                            <tr>
                                <th style="width:180px">Nome do cliente: </th>
                                <td>{{$compras->clientes_nome}}</td>
                            </tr>
                            <tr>
                                <th style="width:10px">Evento: </th>
                                <td>{{$compras->nome_evento}}</td>
                            </tr>
                            <tr>
                                <th style="width:180px">Valor total: </th>
                                <td>{{$compras->valor_total}}</td>
                            </tr>
                            <tr>
                                <th style="width:180px">Data e Hora: </th>
                                <td>{{$compras->compras_data}}</td>
                            </tr>
                            <tr>
                                <th style="width:180px">Local do Evento: </th>
                                <td></td>
                            </tr>
                         
                           
                        </tbody>
                    </table>
                </div>

  
                <div class="col-lg-6 col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2"><i class="fas fa-user"></i> Informações de Pagamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <th style="width:180px">Forma de Pagamento: </th>
                                <td>{{($compras->compras_tipopagto == 1)? 'Cielo' : 'PagSeguro'}}</td>
                            </tr>
                            <tr>
                                <th style="width:10px">Vaor Pago: </th>
                                <td>{{$compras->comprasp_valor}}</td>
                            </tr>
                            <tr>
                                <th style="width:180px">Parcelamento: </th>
                                <td>{{$compras->valor_parcela}} / {{$compras->comprasp_parcelas}}</td>
                            </tr>
                            <tr>
                                <th style="width:180px">Numero do cartão: </th>
                                <td> {{$compras->comprasp_ctnumero}}</td>
                            </tr> 
                            
                            <tr>
                                <th style="width:180px">Bandeira: </th>
                                <td> {{$compras->comprasp_atcod}} </td>
                            </tr>
                            <tr>
                                <th style="width:180px">Código da Transação: </th>
                                <td>{{$compras->comprasp_atcod}}</td>
                            </tr>
                         
                            <tr>
                                <th style="width:180px">Código de Autorização: </th>
                                <td>{{$compras->comprasp_nsu}}</td>
                            </tr>
                         
                           
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-12 col-xs-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th colspan="2">Ingressos Comprado</th>
                            <th >Ingressos Comprado</th>
                            <th >Ingressos Comprado</th>
                            <th >Ingressos Comprado</th>
                            <th >Ingressos Comprado</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($itens as $item)
                        <tr>
                                <td>{{$item->compras_valor}}</td>
                                <td>{{$item->nome}}</td>
                                <td>{{$item->compras_qtd}}</td>
                                <td>{{$item->compras_valor}}</td>
                                <td>{{$item->compras_data}}</td>
                                <td>{{$item->compras_hora}}</td>
                        </tr>
                           
                        @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>
</div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
    function atualiza_modal_deletar(url) {
        $("#form_deletar").attr('action', url);
    }

    var options = {
        success: function(response) {
            if (response.status == 1) {
                toastr.success(response.mensagem, "Sucesso!");
                $("table").find("[data-row-id='" + response.cod + "']").remove();
                $("#modal_deletar").modal('hide');
            } else {
                console.log(response);
                toastr.error(response.mensagem, "Erro!");
            };
        },
        error: function(response) {
            console.log(response);
        }
    };

    $('#form_deletar').ajaxForm(options);

    $(".tabela").DataTable({
        pageLength: 15,
        lengthMenu: [
            [15, 25, 50, 100, 150, 200],
            [15, 25, 50, 100, 150, 200]
        ],
        pagingType: "full_numbers",
        language: {
            "emptyTable": "Não foram encontrados registros",
            "zeroRecords": "Não há registros para exibir",
            "processing": "Reunindo dados",
            "loadingRecords": "Carregando...",
            "lengthMenu": "Mostrar _MENU_ itens por página",
            "search": "Buscar:",
            "infoEmpty": "Exibindo registros 0 a 0 de 0 registros",
            "info": "Exibindo registros _START_ a _END_ de _TOTAL_ registros", // Showing _START_ to _END_ of _TOTAL_ entries
            "infoFiltered": " (filtrado de _MAX_ registros)",
            "paginate": {
                "first": "<<",
                "previous": "<",
                "next": ">",
                "last": ">>"
            }
        }
    });
</script>

@stop