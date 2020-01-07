@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Parceiros
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('parceiros') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Parceiros</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <a class="btn btn-primary" href="#" disabled="disabled"><i class="fas fa-plus"></i> Cadastrar Novo Parceiro</a>

                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                <th>Nome Fantasia</th>
                                <th>Razão Social</th>
                                <th>Unidades</th>
                            

                                <th>&nbsp;</th>

                                <th>&nbsp;</th>

                                <th>&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach($parceiros as $parceiro): ?>
                            
                                <tr>
                                    
                                    <td><?php echo $parceiro->nome_fantasia; ?></td>
                                    
                                    <td><?php echo $parceiro->razao_social; ?></td>
                                    
                                    <td>
                                        <?php 
                                        
                                            foreach($unidades_parceiras as $unidade_parceira):
                                             
                                                if (in_array($unidade_parceira->cod_parceiro , $parceiro->unidades_parceiros()->pluck('unidades_parceiros.cod_parceiro')->toArray())) { echo $unidade_parceira->nome_unidade_parceiro."<br/>"; } 
                                                
                                            endforeach;
                                            
                                        ?>
                                    </td> 
                                    

                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/parceiros/visualizar-parceiro/'. Crypt::encrypt($parceiro->cod_parceiro)) }}">
                                            <i class="fas fa-search"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#" disabled="disabled">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>
                                    <td class="text-center col-xs">

                                        <?php  
                                            switch ($parceiro->status) {
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
                                
                            <?php endforeach; ?>    
                            
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
    function atualiza_modal_inativar(url){
    $("#form_inativar").attr('action', url);
    }

    var options = {
    success: function(response) {
    if (response.status == 1){
    toastr.success(response.mensagem, "Sucesso!");
    $("table").find("[data-row-id='" + response.cod + "']").remove();
    $("#modal_inativar").modal('hide');
    } else{
    toastr.error(response.mensagem, "Erro!");
    alert('Tente novamente mais tarde!');
    };
    },
            error: function(response){
            alert('Tente novamente mais tarde!');
            }
    };
    $('#form_inativar').ajaxForm(options);
    function atualiza_modal_upload(url){
    $("#form_upload").attr('action', url);
    }

    var options2 = {
    success: function(response) {
    if (response.status == 1){
    toastr.success(response.mensagem, "Sucesso!");
    $("#modal_upload").modal('hide');
    } else{
    toastr.error(response.mensagem, "Erro!");
    };
    },
            error: function(response){
            alert('Tente novamente mais tarde!');
            }
    };

$('#form_upload').ajaxForm(options2);

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