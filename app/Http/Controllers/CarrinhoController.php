<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Evento;
use App\Ingresso;
use App\EventoDetalhes;
use App\Carrinho;
use Session;
use Illuminate\Session\Middleware\StartSession;

class CarrinhoController extends Controller
{
    
  public function UpdateCart($quantidade,$produto){

        $items = session('carrinhob');
          
            for ($i=0; $i < count($items) ; $i++) { 
                  if($items[$i][0]['cod_produto'] == $produto){
                     
                       $items[$i][0]['quantidade'] = $quantidade;

                   }   
               }

          Session(['carrinhob' => $items]);
          
    }


   public function VerificaProdutoCarrinho($produto){
            
            echo 'verificacaoo';
            
            $items = session('carrinhob');
          
            for ($i=0; $i < count($items) ; $i++) { 
                  if($items[$i][0]['cod_produto'] == $produto){
                     return $items[$i][0]['cod_produto'];
                   }   
               }

             return false;
    }

    


  //verifica se o evento tem disponivel, tipo de ingresso grupo ou/e pf
  public function addCart(Request $request){

     	    $evento             = $request->input('id_evento');
          $produto            = $request->input('produto');
          $produto_quantidade = $request->input('produto_quantidade');
          $produto_preco      = $request->input('produto_preco');

		
		    
		 if (session()->has('carrinhob') == false){
		  
      $produto_novo = array();

		  $produto_novo[] = 
                  [
                    [
                    "cod_evento"  => $evento,
                    "cod_produto" => $produto,
                    "quantidade"  => $produto_quantidade,
                    "valor"       => $produto_preco
                  ]
                ];

        $request->session()->put('carrinhob',  $produto_novo);
		  	//session(['carreto' => $produto_novo]);
		  	//dd(session('cart'));
		  	echo 'session created';
		  	

		  }else{

          
          $original   = $request->session()->get('carrinhob');
          
          $returno = $this->VerificaProdutoCarrinho($produto);
            
            if($returno){
             
              $up = $this->UpdateCart($produto_quantidade,$returno);

               dd(session('carrinhob'));

             }

          $novo[] = 
                  [
                    [
                    "cod_evento"  => $evento,
                    "cod_produto" => $produto,
                    "quantidade"  => $produto_quantidade,
                    "valor"       => $produto_preco
                  ]
            ];
		        
            $result = array_merge($original, $novo);
       
            $request->session()->put('carrinhob',  $result);


		  }
    }


}
