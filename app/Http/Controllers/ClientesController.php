<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use DataTables;
use Hash;
use App\Http\Requests\Cliente\ClienteFormStoreRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LoginUsuarioController;
use App\Usuarios;



class ClientesController extends Controller
{
    //

    public function listar(){
       
      return   view('admin.clientes.index');
   }
   
   public function ajaxListar(Request $request){

     
    if($request->ajax())
    {
        $data = Cliente::all();
        return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="'.url('admin/clientes/editar')."/".$data->clientes_id.'"><button type="button" name="edit" id="" class="edit btn btn-primary btn-sm">Edit</button></a>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
    }  


}

public function editar($id){
 

    $dados = Cliente::find($id);
    return view('admin.clientes.editar')->with('dados',$dados);

}

public function getCriarUsuario(){

    return view('admin.clientes.cadastrar');

}



public function acaoEditar(Request $request){


    $validRequest = new  ClienteFormStoreRequest;
    $v = Validator::make($request->all(), $validRequest->rules());

    if ($v->fails())
    {
         $errosImpode = array();
    
     foreach ($v->errors()->all() as $erro) {
            $errosImpode[] =  "<div class='alert alert-danger' role='alert'>".$erro."</div>";
         }
         
         $errors_form = (implode('<br>',$errosImpode));

     return json_encode(array(
            'status_requisicao' => 'error_form',
            'dados' =>  $errors_form
        ));
   }

   $NSACIOMETN = implode("-",array_reverse(explode("/",$request->input('nascimento'))));

   $data = array();
   $data['clientes_nome']         = $request->input('nome');
   $data['clientes_cpf']         = 13262916706;
   $data['clientes_senha']        = 0;
   $data['clientes_cep']          = $request->input('cep');
   $data['clientes_logradouro']   = $request->input('endereco');
   $data['clientes_numero']       = $request->input('numero');
   $data['clientes_complemento']  = $request->input('complemento');
   $data['clientes_bairro']       = $request->input('bairro');
   $data['clientes_cidade']       = $request->input('cidade');
   $data['clientes_uf']           = $request->input('uf');
   $data['clientes_pais']         = 'br';
   $data['clientes_telefone']     = $request->input('telefone1');
   $data['clientes_telefone2']    = $request->input('telefone2');
   $data['clientes_email']        = $request->input('email');
   $data['clientes_sexo']         = $request->input('sexo');
   $data['clientes_nascimento']   = $NSACIOMETN;//$request->input('nascimento');
   $data['rg']                    = $request->input('rg');
   $id =  $request->input('id');


    $rep = Cliente::where('clientes_id', $id)->update($data);

    if($rep){
        
      
       if(empty($request->input('senha'))){
      
        return json_encode(array(
            'status_requisicao' => 'sucesso',
             'dados' =>  ''
          ));
       }
      
        $data2 = array();
        $data2['senha'] =  Hash::make($request->input('senha'));

        $resultado = Usuarios::where('clientes_id', $id)->update($data2);

        if($resultado){
            return json_encode(array(
                'status_requisicao' => 'sucesso',
                'dados' =>  ''
            ));
        }else{
            return json_encode(array(
                'status_requisicao' => 'error_geral',
                'dados' =>  ''
            ));
        }
    }



}


public function createUser(){
      //
      $validRequest = new  ClienteFormStoreRequest;
      $v = Validator::make($request->all(), $validRequest->rules());

      if ($v->fails())
      {
           $errosImpode = array();
           foreach ($v->errors()->all() as $erro) {
              $errosImpode[] =  "<div class='alert alert-danger' role='alert'>".$erro."</div>";
           }
           
           $errors_form = (implode('<br>',$errosImpode));

       return json_encode(array(
              'status_requisicao' => 'error_form',
              'dados' =>  $errors_form
          ));
     }
      

      $data = implode("-",array_reverse(explode("/",$request->input('nascimento'))));
      $Cliente = new Cliente;

      $Cliente->clientes_nome        = $request->input('nome');
      $Cliente->clientes_cpf         = 13262916706;
      $Cliente->clientes_senha       = 0;
      $Cliente->clientes_cep         = $request->input('cep');
      $Cliente->clientes_logradouro  = $request->input('endereco');
      $Cliente->clientes_numero      = $request->input('numero');
      $Cliente->clientes_complemento = $request->input('complemento');
      $Cliente->clientes_bairro      = $request->input('bairro');
      $Cliente->clientes_cidade      = $request->input('cidade');
      $Cliente->clientes_uf          = $request->input('uf');
      $Cliente->clientes_pais        = 'br';
      $Cliente->clientes_telefone    = $request->input('telefone1');
      $Cliente->clientes_telefone2   = $request->input('telefone2');
      $Cliente->clientes_email       = $request->input('email');
      $Cliente->clientes_sexo        = $request->input('sexo');
      $Cliente->clientes_nascimento  = $data;
      $Cliente->rg                   = $request->input('rg');

      $resultado = $Cliente->save();
         
     if( $resultado ){

       $criar_usuario = new  LoginUsuarioController;
       $criar_usuario->criarUsuario($request->input('email'),$request->input('senha'),$Cliente->clientes_id);
       
       return json_encode(array(
              'status_requisicao' => 'sucesso',
              'dados' => 'ok'
          ));

  }else{

  return json_encode(array(
              'status_requisicao' => 'error_database',
              'dados' => 'false'
          ));

  }
 
}

    
}
