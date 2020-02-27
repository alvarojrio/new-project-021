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

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    	  $event = Evento::with('detalhes')->where('eventos.status', '=', 1)->find($id);
         
          if($event){


           $array = $event->toArray();
         
          $dia   = array('Dom', 'Seg', 'Ter', 'Quar', 'Qui', 'Sex', 'Sab');

          $meses = array(
			    '01'=>'Janeiro',
			    '02'=>'Fevereiro',
			    '03'=>'Março',
			    '04'=>'Abril',
			    '05'=>'Maio',
			    '06'=>'Junho',
			    '07'=>'Julho',
			    '08'=>'Agosto',
			    '09'=>'Setembro',
			    '10'=>'Outubro',
			    '11'=>'Novembro',
			    '12'=>'Dezembro'
			);

          $mes  = substr($array['data_inicio'], 5, 2);
          $mesr = $meses[$mes];

          $d    =  date('w', strtotime($array['data_inicio']));
          $diar = $dia[$d]; 

          return view('site.index')->with('dados', $array)
                                   ->with('dia_semana', $diar)
                                   ->with('mes', $mesr);
         }else{
              echo 'laravel ta maluco';
         }


    }
  

    public function UpdateCart($quantidade,$produto){

        $items = $request->session()->get('cart');

			foreach ($items as &$item) {
			  if ($item['product_id'] == $produto) {
			      $item['quantidade'] = $quantidade;
			    }
			}

		  $request->session()->put('cart', $items);

    }

   public function VerificaProdutoCarrinho($produto){
            $items  =  session('cart', []);
          
            dd($items );
			foreach ($items as $item) {
			   print_r($item);
			}

          return false;

    }

    


     //verifica se o evento tem disponivel, tipo de ingresso grupo ou/e pf
     public function addCart(Request $request){

     	  $evento             = $request->input('id_evento');
          $produto            = $request->input('produto');
          $produto_quantidade = $request->input('produto_quantidade');
          $produto_preco      = $request->input('produto_preco');

		
	      
		  
		 if (!session()->has('carreto')){
		  
		  $produto_novo = [
				[
				     "cod_evento"  => $evento,
                     "cod_produto" => $produto,
                     "quantidade"  => $produto_quantidade,
                     "valor"       => $produto_preco
				]
			];

		  	session(['carreto' => $produto_novo]);
		  	//dd(session('cart'));
		  	echo 'session created';
		  	

		  }else{

                $produto_novo   = session('carreto');
                $produto_novo[] = [
				[
				     "cod_evento"  => $evento,
                     "cod_produto" => $produto,
                     "quantidade"  => $produto_quantidade,
                     "valor"       => $produto_preco
				   ]
			    ];
		         
		        Session::put('carreto', $produto_novo);
                   
                 echo 'auto incremnet';

		  }

          

             //add cart 
		     //session()->put('cart', $data);
             // session(['cart' => $data]);
            //recupa cart
            //$cart = $request->session()->get('cart');
             dd(session('carreto'));
            /// dd($request->session()->get('cart'));
   
           
 

     }

       //verifica se o evento tem disponivel, tipo de ingresso grupo ou/e pf
     public function buscarIngressosPf(Request $request){

         $id_evento = $request->input('id_evento');

          $evento = DB::table('eventos_ingressos')->where('cod_evento', '=', $id_evento)->get();
         
            if($evento){

            	return json_encode(array(
                    'dados' => $evento,
                    'return' => 1
                ));

            }else{

           return json_encode(array(
                      'return' => 0
                ));

            }

     } 

    //verifica se o evento tem disponivel, tipo de ingresso grupo ou/e pf
     public function buscarTipoIngressos(Request $request){

         $id_evento = $request->input('id_evento');

          $evento = DB::table('eventos')->where('cod_evento', '=', $id_evento)->first();
         
            if($evento->venda_grupo == 1){
                  return 'grupo';
            }else{
                  return 'pf';
            }

     } 

}
