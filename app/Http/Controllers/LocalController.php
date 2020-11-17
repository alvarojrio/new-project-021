<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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





}
