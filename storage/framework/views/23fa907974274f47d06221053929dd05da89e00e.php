<?php $__env->startSection('titulo_pagina'); ?>
GRUPO021 | EVENTOS | Cadastrar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_head'); ?>
<link href="<?php echo e(asset('plugins/select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>


<div class="page-title">
  <div class="title_left">
    <h3> LISTA DE EVENTOS</h3>
  </div>
</div>

<div class="clearfix"></div>

<!-- INICIO DA LINHA -->
<div class="row">
    
   <!-- INICIO DA COLUNA --> 
   <div class="col-xs-12">
    
        
      <div class="x_panel">
      
            
         <div class="x_content">
        
                
            <div class="row">


             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
                     <!-- INICIO PANEL -->
                     <div class="panel panel-info"> 

                        <!-- INICIO DO PANEL-HEADER -->
                        <div class="panel-heading">
                           
                           <i class="fas fa-weight"></i> Cadastrar Eventos
                        </div>
                        <!-- FIM DO PANEL-HEADER -->

                        <!-- INICIO DO PANEL-BODY -->
                        <div class="panel-body">
                        
     
                           <!-- INICIO DA LINHA -->
                           <div class="row">
                               
                               
                                <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Vendidos/Quantidade</th>
                                                <th>Bruto</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                                <th>Desativar</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            
                                          <?php
                                         // [0]->getRelations())

                                            foreach ($dados as $key ) {
                                            
                                             //   print_r($key->getRelations()['detalhes']['titulo']);

                                            

                                          ?>
                                 <tr>
                                      <td> <?=$key['nome_evento']?></td>
                                      <td> 0/200 </td>
                                      <td> 0 </td>
                                      
                                      <td> 
                                        <a href="<?php echo url('evento/basico/'); ?>/<?=$key['cod_evento']?>">
                                        <div type="button" class="btn btn-primary">Editar</div>
                                        </a>
                                      </td>
                                     
                                      <td>
                                        <button type="button" class="btn btn-danger">Excluir</button>
                                      </td>

                                      <td>
                                        <button type="button" class="btn btn-light">Desativar</button>
                                      </td>
                                     
                                  </tr>
                           
                                           <?php
                                        

                                            }

                                          ?>

                                                                         
                                       </tbody>
                                   </table>


                           </div>
                           <!-- FIM DA LINHA -->


                        </div>    
                        <!-- FIM DO PANEL-BODY -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                           <br/><br/>

                           <button type="submit" class="btn btn-success pull-right" id="btn_salvar_sala_espera"><i class="far fa-save"></i> Salvar</button>

                           <a href="" class="btn btn-default pull-right"><i class="fas fa-arrow-circle-left"></i> Voltar</a>

                        </div>

                     </div>
                     <!-- FIM DO PANEL -->
</form>
               </div>    

            </div>
    
         </div>

      </div>

   </div>
   <!-- FIM DA COLUNA -->

</div>
<!-- FIM DA LINHA -->




 
<script type="text/javascript">
  var URL_INGRESSO = '<?php echo url('ingresso/showTickets'); ?>';
  var URL_INGRESSO_CREATE = '<?php echo url('ingresso/createTicket'); ?>';
  var URL_INGRESSO_UPDATE = '<?php echo url('ingresso/updateTicket'); ?>';
  var URL_INGRESSO_SHOW = '<?php echo url('ingresso/showTicketsid'); ?>';
  var URL_INGRESSO_DELETE = '<?php echo url('ingresso/excluirTickets'); ?>';

  console.log(URL_INGRESSO);
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('includes_no_body'); ?>
<script src="<?php echo e(asset('js/jquery.mask.min.js')); ?>"></script>    
<script src="<?php echo e(asset('js/funcoes_forms.js?time=4444')); ?>"></script>    
<script src="<?php echo e(asset('plugins/select2/dist/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/toast-kamranahmed/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/timepicker/bootstrap-timepicker.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script type="text/javascript">
    
/*
 #  INICIO
 #  Definição de mascaras
 #  

*/
$(document).ready(function() {
    $('#example').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false
    });
} );



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.administracao.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-project-021\resources\views/admin/eventos/listar.blade.php ENDPATH**/ ?>