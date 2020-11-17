@extends('layouts.administracao.layout')

@section('titulo_pagina')
GRUPO021 | EVENTOS | Cadastrar
@stop

@section('includes_no_head')
<link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo asset('plugins/toast-kamranahmed/jquery.toast.min.css'); ?>">
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}" />

@stop

@section('conteudo')


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
                               
                               
                           <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                    <th width="35%">First Name</th>
                                                <th width="35%">Last Name</th>
                                                <th width="30%">Action</th>
                                    </tr>
                                    </thead>
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
@stop

@section('includes_no_body')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>    
<script src="{{ asset('js/funcoes_forms.js?time=4444') }}"></script>    
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{asset('plugins/toast-kamranahmed/jquery.toast.min.js')}}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.js') }}"></script>
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





$(document).ready(function(){

$('#user_table').DataTable({
 processing: true,
 serverSide: true,
 ajax: {
  url: "<?php echo url('admin/clientes/ajaxListar'); ?>",
  "type": "POST",
 },
 columns: [
  {
   data: 'clientes_nome',
   name: 'clientes_nome'
  },
  {
   data: 'clientes_nome',
   name: 'clientes_nome'
  },
  {
   data: 'action',
   name: 'action',
   orderable: false
  }
 ]
});


 



});
</script>
@stop
