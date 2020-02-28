<?php

namespace App\Http\Controllers;

use App\Cliente;
//use App\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cliente\ClienteFormStoreRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\LoginUsuarioController;
class ClienteController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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



    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
