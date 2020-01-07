@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Categoria Financeira
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('categoriasfinanceiras') !!}

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

                <a class="btn btn-primary" href="{{ url('admin/painel/categoriasfinanceiras/cadastrar-categoria-financeira') }}"><i class="fa fa-plus"></i> Cadastrar Nova Categoria Financeira</a>                                          

                <br /><br />

                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                
                                <th>Nome categoria</th>
                                <th>Tipo categoria</th>  
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoriasfinanceiras as $categoriafinanceira)
                                <tr data-row-id="">
                                    
                                    <td>{{ $categoriafinanceira->nome_categoria_financeira }}</td>
                                    <td>
                                        <?php if($categoriafinanceira->tipo_categoria_financeira == 1){ ?>                                                                    
                                           <span class="label label-success" style="font-size:14px">ENTRADA</span>
                                        <?php }elseif($categoriafinanceira->tipo_categoria_financeira == 2){ ?>
                                            <span class="label label-danger" style="font-size:14px">SAÍDA</span>
                                        <?php } ?>
                                    </td>

                                    <td class="text-center col-xs-1">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/categoriasfinanceiras/visualizar-categoria-financeira/'. Crypt::encrypt($categoriafinanceira->cod_categoria_financeira)) }}">
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
                                        switch ($categoriafinanceira->status) {
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
    function atualiza_modal_deletar(url){
    $("#form_deletar").attr('action', url);
    }

    var options = {
    success: function(response) {
    if (response.status == 1){
    toastr.success(response.mensagem, "Sucesso!");
    $("table").find("[data-row-id='" + response.cod + "']").remove();
    $("#modal_deletar").modal('hide');
    } else{
    console.log(response);
    toastr.error(response.mensagem, "Erro!");
    };
    },
            error: function(response){
            console.log(response);
            }
    };

$('#form_deletar').ajaxForm(options);

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