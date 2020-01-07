@extends('layouts.administracao.layout')

@section('titulo_pagina')
CMRJ | Contas | Caixas
@stop

@section('includes_no_head')

<link href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@stop

@section('conteudo')

{!! Breadcrumbs::render('contas') !!}

<div class="page-title">
 <div class="title_left">
   <h3>Caixas</h3>
 </div>
</div>
<div class="clearfix"></div>
<div class="row">
 <div class="col-xs-12">
   <div class="x_panel">
     <div class="x_content">

       <a class="btn btn-primary" href="{{ url('admin/painel/contas/caixas/cadastrar-caixa') }}"><i class="fa fa-plus"></i> Cadastrar Novo Caixa</a>

       <div class="clearfix"></div>

       <div class="table-responsive">

           <table class="table table-striped table-bordered tabela">
           <thead>
               <tr>
                   <th>Nome</th>
                   <th>Unidade</th>
                   
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>
                   <th>&nbsp;</th>	
               </tr>
           </thead>
           <tbody>

              @foreach($subcontas as $subconta)
                      
                      <td>{{ $subconta->nome }}</td>
                      <td>{{ $subconta->nome_unidade }}</td>

                      <td class="text-center col-xs">
                
                           <a class="btn btn-sm btn-default" data-tooltip="tooltip" title="Visualizar" href="{{ url('admin/painel/contas/caixas/visualizar-caixa/'. Crypt::encrypt($subconta->funcionarios->cod_funcionario)) }}">
                               <i class="fas fa-search"></i>
                           </a>
                           
                       </td>
                       <td class="text-center col-xs">
                           
                           <a class="btn btn-sm btn-info" data-tooltip="tooltip" title="Alterar" href="#">
                               <i class="fas fa-edit"></i>
                           </a>

                       </td>
                       
                       <td class="text-center col-xs">
                           
                           <?php  
                            switch ($subconta->status) {
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

           <br />
   
           <a class="btn btn-sm btn-danger" href="#"> <i class="fas fa-list-ul"></i> Listagem Inativos</a>                                            
            
        </div>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_upload" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="" id="form_upload">
        <div class="modal-header">
          <h4 class="modal-title">Upload de Arquivos</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Arquivo</label>
            <input type="file" class="form-control" name="arquivo" id="arquivo">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label class="control-label">Extensões permitidas</label>
              <ul>
                  <li><strong>Documentos:</strong> doc, docx, rtf, pdf e odt</li>
                  <li><strong>Imagens:</strong> jpg, jpeg, png, bmp, tiff e gif</li>
              </ul>  
          </div>
        </div>  
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('includes_no_body')

<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
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
                                console.log(response);
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