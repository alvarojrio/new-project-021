<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ingresso;
use App\Biblioteca\FuncoesGlobais;

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



   public function showTicketsid(Request $request){

         $id_igr = $request->input('cod_ingresso');
        
         $ig = Ingresso::where('cod_ingresso', '=',  $id_igr)->get();
          $ig[0]['preco'] = FuncoesGlobais::formatarMoedaParaFront($ig[0]['preco']); 

       if (count($ig) > 0) {

             
            // Retorno
            return json_encode(array(
                'status_requisicao' => 'sucesso',
                'dados' => $ig
            ));

            

        } else {

            // Retorno
            return json_encode(array(
                'status_requisicao' => 'nada-encontrado',
                'dados' => ''
            ));

        }
    }


//excluir
 public function excluirTickets(Request $request){

                 $id_ticket    =  $request->input('id_ticket');
                 
                 $return = Ingresso::where('cod_ingresso', $id_ticket)->delete();

                echo  $return;
}

 public function updateTicket(Request $request){

                $nome           = $request->input('nome');
                $valor          = $request->input('valor');
                $quantidade     = $request->input('quantidade');
                $iniciar_quando = $request->input('iniciar_quando');
                $data_inicio    =  $request->input('data_inicio');
                $horario_inicio =  $request->input('horario_inicio');
                $data_fim       =  $request->input('data_fim');
                $horario_fim    =  $request->input('horario_fim');
                $cod_evento    =  $request->input('cod_evento');
                $id_ticket    =  $request->input('id_ticket');

                if($iniciar_quando == 1){ $p = 'vendas'; }else{  $p = 'data';}


                $return = Ingresso::where('cod_ingresso', $id_ticket)->update(
                                 [
                                   'nome' => $nome,
                                   'preco' =>  FuncoesGlobais::formatarMoedaParaDatabase($valor),
                                   'quantidade' => $quantidade,
                                   'cod_evento' => $cod_evento,
                                   'data_inicio' => $data_inicio,
                                   'hora_inicio' => $horario_inicio,
                                   'data_fim' => $data_fim,
                                   'hora_fim' => $horario_fim,
                                   'regra_inicio' => $p,
                                 ]);

                echo  $return;

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

                $nome           = $request->input('nome');
                $valor          = $request->input('valor');
                $quantidade     = $request->input('quantidade');
                $iniciar_quando = $request->input('iniciar_quando');
                $data_inicio    =  $request->input('data_inicio');
                $horario_inicio =  $request->input('horario_inicio');
                $data_fim       =  $request->input('data_fim');
                $horario_fim    =  $request->input('horario_fim');
                $cod_evento    =  $request->input('cod_evento');

                if($iniciar_quando == 1){ $p = 'vendas'; }else{  $p = 'data';}


                $ingresso = new Ingresso;

                $ingresso->nome           =  $nome;
                $ingresso->preco          =  FuncoesGlobais::formatarMoedaParaDatabase($valor); 
                $ingresso->quantidade     =  $quantidade;
                $ingresso->cod_evento     =  $cod_evento;
               

                $ingresso->data_inicio    =  $data_inicio;
                $ingresso->hora_inicio    =  $horario_inicio;

                $ingresso->data_fim       =  $data_fim;
                $ingresso->hora_fim       =  $horario_fim;
                $ingresso->regra_inicio   =  $p;


                $return = $ingresso->save();

               // if($return){
                     return true;
               // }else{
                    // return false;
                //}

    }

}
