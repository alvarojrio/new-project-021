<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventoLocal;

class LocalController extends Controller
{
    //

    public function getLocal(){
        return view('admin.local.index');
    }

    public function getLocalCadastrar(){
        return view('admin.local.cadastrar');
    }

    public function getLocalEditar(){
        return view('admin.local.editar');
    }

    public function postLocalCadastrar(Request $request){
        
        $local = EventoLocal::create($request->all());
            if($local){
              return  redirect()->back()->withSuccess('IT WORKS!');
            }          
    
        } 
        
    public function postLocalEditar(Request $request){
    $id    =  $request->input('id');
    $array = $request->all();
    unset($array['id']);

    $local = EventoLocal::where("cod_local", '=', $id)->update($array);
       
       if($local){
            return  redirect()->back()->withSuccess('IT WORKS!');
        }          

    }



}
