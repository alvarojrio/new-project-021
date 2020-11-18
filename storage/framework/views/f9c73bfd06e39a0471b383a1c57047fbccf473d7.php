<?php $__env->startSection('titulo_pagina'); ?>
CMRJ | Categoria Financeira
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_head'); ?>

<link href="<?php echo e(asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

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

                <a class="btn btn-primary" href="<?php echo e(url('admin/painel/categoriasfinanceiras/cadastrar-categoria-financeira')); ?>"><i class="fa fa-plus"></i> Cadastrar Nova Categoria Financeira</a>                                          

                <br /><br />

                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered tabela">
                        <thead>
                            <tr>
                                
                                <th>Código Peiddo</th>
                                <th>Cliente</th>
                                <th>Evento</th>
                                <th>Valor Total</th>
                                <th>Data da Compra</th>  
                                <th>Vencimento</th>  
                                <th>Detalhes</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoriafinanceira): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-row-id="">
                                    
                                    <td><?php echo e($categoriafinanceira->compras_id); ?></td>
                                    <td><?php echo e($categoriafinanceira->clientes_nome); ?></td>
                                    <td><?php echo e($categoriafinanceira->nome_evento); ?></td>
                                    
                                    <td><?php echo e($categoriafinanceira->valor_total); ?></td>
                                    <td><?php echo e($categoriafinanceira->compras_data); ?></td>
                                    <td><?php echo e($categoriafinanceira->compras_hora); ?></td>


                                    <td class="text-center col-xs-1">

                                        <a class="btn btn-sm btn-info"  data-tooltip="tooltip" title="Alterar" href="<?php echo e(route('detalhes-lancamento',$categoriafinanceira->compras_id)); ?>">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                    </td>                                                                                									

                                    <td class="text-center col-xs-1">
                                        -

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_body'); ?>

<script src="<?php echo e(asset('js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.administracao.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/admin/lancamentos/lancamentos.blade.php ENDPATH**/ ?>