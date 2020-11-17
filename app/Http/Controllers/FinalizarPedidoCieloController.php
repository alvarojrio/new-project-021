<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Carrinho;
use Session;
use App\Ingresso;
use App\Compras;
use App\Compras_itens;
use App\Compras_pagto;
use App\Compra_detalhes;

use Illuminate\Support\Facades\Auth;
class FinalizarPedidoCieloController extends Controller
{
    //

    public function postPagarCielo(Request $request){
    
     
       
        $items       = session('carrinhob');
        $produtos    = array();
        $valor_total = 0;
        $i           = 0; 


        for ($i=0; $i < count($items) ; $i++) {
             //$items[$i][0]['cod_produto'];
             //$items[$i][0]['cod_evento'];
           //  $items[$i][0]['quantidade'];
           $valor_total +=  $items[$i][0]['valor'];
      }
        

       
       
       
        $nome_cartao = $request->input('nome_cartao');
        $numero_cartao = $request->input('numero_cartao');
        $cod_seguranca = $request->input('cod_seguranca');
        $data_vencimento = $request->input('data_vencimento');
        $qnt_parcelas = $request->input('qnt_parcelas');
        $info_dados = $request->input('info_dados');
        
        $cod_evento = $request->input('cod_evento');
        $valor_total2 = $request->input('valor_total');
       



      








        // Ambiente de testes
        $environment = \Rede\Environment::sandbox();

            // Configuração da loja informando o ambiente
    
        $store = new \Rede\Store('10005606', '5bc6d78d607643fd9d06fdeb44a3b4f7', $environment);  


     
       // Transação que será autorizada
       $transaction = (new \Rede\Transaction($valor_total, 'pedido' . time()))->creditCard(
           '5448280000000007',
           '235',
           '12',
           '2020',
           'John Snow'
       )->capture(false);
       
       // Autoriza a transação
       $transaction = (new \Rede\eRede($store))->create($transaction);
       

       if ($transaction->getReturnCode() == '00') {

        $compra = new Compras;
        $compra->compras_cliente_id = 1;//Auth::guard('admin')->user()->cod_cliente;
        $compra->compras_pacote     =    $cod_evento;
        $compra->compras_status     = 1;
        $compra->valor_total     =  $valor_total;
        $compra->bandeira_compra     =  'VISA';
        
        $compra->compras_data =  date('Y-m-d');
        $compra->compras_hora = time('H:m:s');
        $compra->compras_tipopagto =  1;//cielo//credit
        $compra->entrega = '0';
        $compra->retirada_status = '0';
        $compra_save = $compra->save();
       

        $cod_compras_unid = $compra->compras_id;
        
        if($compra_save){
       
         $compras_pagto = new Compras_pagto;

         $compras_pagto->comprasp_tid =  $transaction->getTid();
         $compras_pagto->comprasp_pan = '0';
         $compras_pagto->comprasp_compras_id = $cod_compras_unid;
         $compras_pagto->comprasp_valor = 200;
         $compras_pagto->comprasp_parcelas = $qnt_parcelas;
         $compras_pagto->comprasp_status = '1';
         $compras_pagto->comprasp_bandeira = 'VISA';
         $compras_pagto->comprasp_atcod = $transaction->getAuthorizationCode();
         $compras_pagto->comprasp_azcod = $transaction->getReturnCode();
         $compras_pagto->comprasp_lr = $transaction->getSecurityCode();
         $compras_pagto->comprasp_arp = '';//$transaction->getBrandTid();
         $compras_pagto->comprasp_nsu =  $transaction->getNsu();
         $compras_pagto->comprasp_capmensagem = $transaction->getReturnMessage();
         $compras_pagto->comprasp_capcodi =   $transaction->getReference();
         $compras_pagto->comprasp_data = date('Y-m-d');
         $compras_pagto->comprasp_hora = time('H:m:s');
        
         $compra_pagto_save = $compras_pagto->save();
        
         if( $compra_pagto_save ){
           
               
            for ($i=0; $i < count($items) ; $i++) {
               
                $itens = new Compras_itens;

                $itens->compras_id = $cod_compras_unid;
                $itens->compras_produto = $items[$i][0]['cod_produto'];
                $itens->compras_subproduto = $items[$i][0]['cod_evento'];
                $itens->compras_valor = $items[$i][0]['valor'];
                $itens->compras_qtd = $items[$i][0]['quantidade']; 

                $itens->save();
        
                unset($itens);

           }

            if(!empty($info_dados)){

            for ($i=0; $i < count($info_dados) ; $i++) {
                
            $detalheis = new Compra_detalhes;

            $detalheis->cod_compra = $cod_compras_unid;
            $detalheis->cod_produto = $info_dados[$i]['produto_id'];
            $detalheis->detalhe = $info_dados[$i]['texto'];

            $detalheis->save();

            unset($detalheis);

            }
        }

          
           echo 'ok';

         }


        }


       }//transaão rede




       // dd($request->all());

      

    }

}
