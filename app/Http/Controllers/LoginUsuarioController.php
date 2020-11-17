<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ingresso;
use App\Biblioteca\FuncoesGlobais;
use App\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginUsuarioController extends Controller
{
  

   public function loginUsuario(Request $request){

             // Array de informações do usuário 
            $infoUsuario = array(
                'usuario' => $request->input('usuario'),
                'password' => $request->input('senha'),
                'status' => 1
            );

          //  dd($request->all());

            // Efetua tentativa de login
            $login = Auth::guard('cliente')->attempt($infoUsuario);

 
            if($login){

                      Session::regenerate();
                      return 1;
            }else{
                     return 0;
            }

    }



public function consultarUsuarioLogado(){

           return  Auth::guard('cliente')->user() ;
}

 
 public function createUser(Request $request){

         $usuario = new Usuarios;
         
         $senha = Hash::make('123456');

         $usuario->cod_perfil = 1;
         $usuario->tipo = 1;
         $usuario->usuario = $request->input('usuario');
         $usuario->senha   = $senha;
         $usuario->email = 1;
         
         $usuario->save();


 

    }


 public function criarUsuario($login, $senha, $cod_cliente){

         $usuario = new Usuarios;
         
         $senha = Hash::make($senha);

         $usuario->clientes_id =  $cod_cliente;
         $usuario->tipo = 1;
         $usuario->usuario = $login;
         $usuario->senha   = $senha;
         $usuario->email = 1;
        
         return $usuario->save();
 

    }


  

}
