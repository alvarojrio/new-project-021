@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Formas de pagamento
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop


@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('formaspagamentos') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Formas pagamentos</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <a class="btn btn-primary" href="{{ url('admin/painel/formaspagamentos/habilitar-forma-pagamento') }}"><i class="fas fa-credit-card"></i> Habilitar Formas de Pagamento</a>                                          

                <br /><br />

                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                <th class="text-center col-xs-1">Status</th>  
                                <th>Forma de pagamento</th>  
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formaspagamentos as $formapagamento)
                                <tr data-row-id="">
                                    
                                    <td>
                                        <?php if($formapagamento->tipo_pagamento == 1){ ?> 
                    
                                            <i class="far fa-money-bill-alt"> DINHEIRO</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 2){ ?> 

                                            <i class="fas fa-barcode"> BOLETO</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 3){?> 

                                            <i class="fas fa-money-check"> CHEQUE</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 4){ ?> 

                                            <i class="fas fa-business-time"> CHEQUE PRÉ-DATADO</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 5){ ?> 

                                            <i class="fas fa-exchange-alt"> TRANSFERÊNCIA</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 6){ ?> 

                                            <i class="fas fa-piggy-bank"> DEPÓSITO </i>

                                        <?php }else if($formapagamento->tipo_pagamento == 7){?> 

                                            <i class="fas fa-gift"> CORTESIA</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 8){?> 

                                            <i class="far fa-handshake"> CONVÊNIO</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 9){?> 

                                            <i class="fas fa-credit-card"> CARTÃO DE DÉBITO</i>

                                        <?php }else if($formapagamento->tipo_pagamento == 10){?> 

                                            <i class="far fa-credit-card"> CARTÃO DE CRÉDITO</i>

                                        <?php }?> 
                                            
                                    </td>
                                    
                                    <td class="text-center col-xs-1">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/formaspagamentos/visualizar-forma-pagamento/'. Crypt::encrypt($formapagamento->cod_forma_pagamento)) }}">
                                            <i class="fa fa-search"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs-1">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs-1">
                           
                                        <?php  
                                         switch ($formapagamento->status) {
                                             case 0:
                                             ?>
                                                <button type="button" class="btn-sm btn-secondary" disabled="disabled"><i class="fas fa-power-off"></i></button>
                                             <?php            
                                             break;

                                             case 1:
                                             ?>    
                                                <button type="button" class="btn-sm btn-danger" disabled="disabled"><i class="fas fa-power-off"></i></button>
                                             <?php    
                                             break;

                                             default:
                                                 echo "-";
                                             break;
                                         }                                                   
                                         ?>

                                    </td>

                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                    
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
$(".tabela").DataTable({
    pageLength: 15,
    lengthMenu: [[15, 25, 50, 100, 150, 200], [15, 25, 50, 100, 150, 200]],
    pagingType: "full_numbers",
    language: {
        "emptyTable": "Não foram encontrados registros",
        "zeroRecords": "Não há registros para exibir",
        "processing": "Reunindo dados",
        "loadingRecords": "Carregando...",
        "lengthMenu": "Mostrar _MENU_ itens por página",
        "search": "Buscar:" ,
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