@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Sala de espera
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

<!-- Renderizo o Breadcrumb -->
{!! Breadcrumbs::render('sala-espera') !!}

<div class="page-title">
    <div class="title_left">
        <h3>Sala de Espera</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">

    <div class="col-xs-12">
        
      <div class="x_panel">
                    
         <div class="x_content">

             <!-- INICIO LINHA -->
             <div class="row">

                 <!-- Espaço para exibição de erros de validação -->
                 <div id="avisoValidacao">

                     <div class="col-xs-12">
                         <div class="alert alert-danger msg_erro" style="display: none;"></div>
                     </div>

                 </div>

             </div>
             <!-- FIM LINHA -->


             <!-- INICIO LINHA -->
             <div class="row">

                 <!-- INICIO COLUNA -->
                 <div class="col-xs-12">

                      <div class="x_panel">

                         <div class="x_content">

                            <a class="btn btn-primary" href="{{ url('admin/painel/salasespera/cadastrar-sala-espera') }}"><i class="fa fa-plus"></i> Cadastrar Nova Sala de Espera</a>

                            <br /><br />

                            <div class="clearfix"></div>

                               <div class="table-responsive">

                                  <table class="table table-striped table-bordered tabela">

                                     <thead>
                                       <tr>								
                                           <th>Sala de espera</th>
                                           <th>Unidade</th>
                                           <th style="width: 25px">&nbsp;</th>
                                           <th style="width: 25px">&nbsp;</th>
                                           <th style="width: 25px">&nbsp;</th>
                                           <th style="width: 25px">&nbsp;</th>
                                       </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <?php foreach($salas_espera as $s): ?>
                                        <tr>
                                           
                                            <td><?php echo $s->nome_sala_espera; ?></td>

                                            <td><?php echo $s->nome_unidade; ?></td>

                                            <td class="text-center col-xs">

                                                <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/salasespera/visualizar-sala-espera/'. Crypt::encrypt($s->cod_sala_espera)) }}">
                                                    <i class="fa fa-search"></i>
                                                </a>

                                            </td>
                                            <td class="text-center col-xs">

                                                    <a class="btn btn-sm btn-info" disabled="disabled" data-tooltip="tooltip" title="Alterar" href="#">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                            </td>
                                            <td class="text-center col-xs">

                                                    <a class="btn btn-sm btn-primary" data-tooltip="tooltip" title="" href="{{ url('admin/painel/salasespera/vincular-consultorio-sala-espera/'. Crypt::encrypt($s->cod_sala_espera)) }}" data-original-title="Vincular" aria-describedby="tooltip74310">
                                                              <i class="fa fa-link"></i>
                                                    </a>
                                            </td>

                                            <td class="text-center col-xs">

                                                <?php  
                                                switch ($s->status) {
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
                 <!-- FIM COLUNA -->

             </div>
             <!-- FIM LINHA -->

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
