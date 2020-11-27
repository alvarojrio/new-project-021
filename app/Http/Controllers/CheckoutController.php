<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ingresso;
use App\Usuarios;
use App\Evento;

use Auth;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      

    

          $items      = session('carrinhob');
          $produtos   = array();
          $valor_total = 0;
          $i=0; 
          $cod_evento = $items[0][0]['cod_evento'];

   
          for ($i=0; $i < count($items) ; $i++) {

          $id = ($items[$i][0]['cod_produto']);
           
             
             $result = Ingresso::find($id);
            if ($result->count()){
                $produtos[] = $result->ToArray();  
                $valor_total +=  $result['preco'] * $items[$i][0]['quantidade'];
              }
          }

        


        
         // $buscar_cliente = Usuarios::with('Clientes')->find(Auth::guard('cliente')->user()->cod_usuario);
         $event = Evento::with('detalhes')->where('eventos.status', '=', 1)->find($cod_evento);
        
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


         /***
          * quando adicionar um produto extra, adiciona o puto dentro o vetor session, no  session('carrinhob')
          "cod_evento" => 12
    "cod_local" => 1
    "data_inicio" => "2020-01-02"
    "data_fim" => "2020-02-03"
    "hora_inicio" => "10:00:00"
    "hora_fim" => "23:00:00"
    "nome_evento" => "VILLA MIX BH 2019"
    "updated_at" => "2020-02-25 21:36:53"
    "created_at" => "2020-02-25 21:36:53"
    "status" => 1
    "venda_grupo" => 0
    "tipo_grupo" => 0
         
          "cod_evento" => 12
          "cod_local" => 1
          "data_inicio" => "2020-01-02"
          "data_fim" => "2020-02-03"
          "hora_inicio" => "10:00:00"
          "hora_fim" => "23:00:00"
          "nome_evento" => "VILLA MIX BH 2019"
          "updated_at" => "2020-02-25 21:36:53"
          "created_at" => "2020-02-25 21:36:53"
          "status" => 1
          "venda_grupo" => 0
          "tipo_grupo" => 0
          "detalhes"
        //  dd( $event->nome_evento);
         dd($array); */
         return view('site.checkout')
                          ->with('produtos', $produtos)
                          ->with('total_produto', count($produtos))
                          ->with('valor_total', $valor_total)
                          ->with('dados', $array)
                          ->with('cod_evento', $cod_evento)
                          ->with('dia_semana', $diar)
                          ->with('mes', $mesr);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
