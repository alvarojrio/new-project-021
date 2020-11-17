<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Financeirocategoria;
use DB;
use App\Compras;
use App\Compras_itens;
use Illuminate\Foundation\Console\Presets\React;

class  LancamentosController extends Controller
{
  //
  public function faturasClientes()
  {

    $dados = Compras::paginate(15);

    return view('cliente.fatura.index')->with('dados', $dados);;
  }


  public function index()
  {

    $dados =
      Compras::join('clientes', 'clientes.cod_usuario', 'compras.compras_cliente_id')
      ->join('eventos', 'eventos.cod_evento', 'compras.compras_pacote')
      ->paginate(20);


    return view('admin.lancamentos.lancamentos')->with('dados', $dados);
  }

  public function detalhe($id)
  {

 
    
    $dados =
      Compras::join('clientes', 'clientes.cod_usuario', 'compras.compras_cliente_id')
      ->join('eventos', 'eventos.cod_evento', 'compras.compras_pacote')
      ->join('compras_pagto', 'compras_pagto.comprasp_compras_id', 'compras.compras_id')
      ->where('compras.compras_id', $id)
      ->first(); 
      
      
      $Compras_itens =
      Compras_itens::join('eventos_ingressos','eventos_ingressos.cod_ingresso', 'compras_itens.compras_produto')->where('Compras_itens.compras_id', $id)
      ->get();
      


    return view('admin.lancamentos.detalhes')->with('compras', $dados)->with('itens', $Compras_itens);
  }
}
