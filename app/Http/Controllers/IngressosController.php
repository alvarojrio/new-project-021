<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ingresso;

class IngressosController extends Controller
{
    //
    public function showTickets(Request $request){


         $evento = Ingresso::all();
       
          if (count($evento) > 0) {

            // Retorno
            return json_encode(array(
                'status_requisicao' => 'sucesso',
                'dados' => $evento
            ));

        } else {

            // Retorno
            return json_encode(array(
                'status_requisicao' => 'nada-encontrado',
                'dados' => ''
            ));

        }
    }

/*array:8 [
  "nome" => "ALVARO DE CARVALHO SANTOS"
  "valor" => "200.00"
  "quantidade" => "5"
  "iniciar_quando" => "1"
  "data_inicio" => "1992-10-10"
  "horario_inicio" => "10:00"
  "data_fim" => "1992-10-10"
  "horario_fim" => "23:44"
]*/
 public function createTicket(Request $request){

                $nome = $request->input('nome');
                $valor = $request->input('valor');
                $quantidade = $request->input('quantidade');
               
                $iniciar_quando = $request->input('iniciar_quando');

                $data_inicio =  $request->input('data_inicio');
                $horario_inicio =  $request->input('horario_inicio');
                $data_fim =  $request->input('data_fim');
                $horario_fim =  $request->input('horario_fim');
               

                $ingresso = new Ingresso;

                $ingresso->tipo_ingresso;

    }

}
