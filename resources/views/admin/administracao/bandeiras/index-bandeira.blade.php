@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Bandeiras
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop


@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('bandeiras') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Bandeiras</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <a class="btn btn-primary" href="{{ url('admin/painel/bandeiras/cadastrar-bandeira') }}"><i class="fa fa-plus"></i> Cadastrar Nova Bandeira</a>                                          

                <br /><br />

                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Operadora</th>  
                                <th>Tipo</th>  
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bandeiras as $bandeira)
                                <tr data-row-id="">
                                    <td class="text-center">
                                    <?php  
                                        switch ($bandeira->nome_bandeira) {
                                            case "VISA":
                                            ?>
                                                <i class="fab fa-cc-visa fa-2x"></i>   
                                            <?php            
                                            break;

                                            case "MASTER":
                                            ?>    
                                                <i class="fab fa-cc-mastercard fa-2x"></i>
                                            <?php    
                                            break;

                                            default:
                                                echo $bandeira->nome_bandeira;
                                            break;
                                        }                                                   
                                        ?>
                                    
                                    </td>
                                    
                                    <td>
                                        <?php echo $bandeira->nome_operadora_cartao; ?>                                                                    
                                    </td>
       
                                    <td class="col-xs">
                                        
                                        
                                            <?php 
                                                if (in_array($bandeira->cod_bandeira, $bandeira->operadoras_cartao()->where('bandeiras_operadoras_cartao.tipo_bandeira',1)->pluck('bandeiras_operadoras_cartao.cod_bandeira')->toArray())) {echo"<span class='label label-success' style='font-size:12px'> Débito </span>&nbsp;";}
                                        
                                                if (in_array($bandeira->cod_bandeira, $bandeira->operadoras_cartao()->where('bandeiras_operadoras_cartao.tipo_bandeira',2)->pluck('bandeiras_operadoras_cartao.cod_bandeira')->toArray())) {echo"<span class='label label-primary' style='font-size:12px'> Crédito </span>&nbsp;";} 
                                            ?>  
                                        
                                            
                                    </td>
                                    
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/bandeiras/visualizar-bandeira/'. Crypt::encrypt($bandeira->cod_bandeira)) }}">
                                            <i class="fa fa-search"></i>
                                        </a>

                                    </td>
                                    
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>                                                                                									

                                    <td class="text-center col-xs">
                                        
                                        <?php  
                                        switch ($bandeira->status) {
                                            case 0:
                                            ?>
                                                <a class="btn btn-sm btn-secondary" data-tooltip="tooltip" title="Reativar"  href="#">
                                                    <i class="fas fa-power-off"></i>
                                                </a>    
                                            <?php            
                                            break;

                                            case 1:
                                            ?>    
                                                <a class="btn btn-sm btn-danger" data-tooltip="tooltip" title="Inativar"  href="#">
                                                    <i class="fas fa-power-off"></i>
                                                </a>
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
