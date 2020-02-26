<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Evento;
use App\Ingresso;
use App\EventoDetalhes;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $eventos = Evento::with('detalhes')->get();
             return view('admin.eventos.listar')
              ->with('dados', $eventos);

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



 
 public function detalhesCreate(Request $request){
        


    
        $subtitulo = $request->input('subtitulo');
        $detalhe = $request->input('detalhe');
        $id = $request->input('id');

        $verificar = EventoDetalhes::where('cod_evento','=',$id)->get();

        if($verificar):
       
           
            $vetorUpdate = array(
               
                      'titulo' => $subtitulo,
                      'descricao' => $detalhe,
               );

             if($request->hasFile('file') == true){
                 if($request->file('file')->isValid() == true){

                         $upload = $request->file->store('imagens');
                         
                        $vetorUpdate = array('imagem' => $upload ) + $vetorUpdate;
                         
                 }
            }


            

         //  $update =  DB::table('eventos_detalhes')->where('cod_evento',$id)->update($vetorUpdate);
         $update = EventoDetalhes::where('cod_evento', $id)->update($vetorUpdate);
         

            if($update):
                     
                       return 1;
             else:
                     return 0;
            endif;

          

        else:
       
        $file = $request->file;

        $upload = 'imagens/sem-imagem.png';

           if($request->hasFile('file') == true){
                 if($request->file('file')->isValid() == true){
                        /*// Retorna mime type do arquivo (Exemplo image/png)
                        $request->imagem->getMimeType()

                        // Retorna o nome original do arquivo
                        $request->imagem->getClientOriginalName() 

                        // Extensão do arquivo
                        $request->imagem->getClientOriginalExtension()
                        $request->imagem->extension()

                        // Tamanho do arquivo
                        $request->imagem->getClientSize()*/

                        $upload = $request->file->store('imagens');
                        
                 }
            } 

            $Detalhes = new EventoDetalhes;
            $Detalhes->titulo = $subtitulo;
            $Detalhes->descricao = $detalhe;
            $Detalhes->imagem = $upload;
            $Detalhes->cod_evento = $id;
            $i = $Detalhes->save();
            if($i){
                return 1;
            }else{
               return 0;
            }

         endif;

       
      }
 

    /**
     * Store a bnewly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $evento =  new Evento;

       $evento->nome_evento =  $request->input('nome_sala_espera');
       $evento->cod_local   =   $request->input('btn_unidade');
       $evento->data_inicio =  $request->input('data_inicio');
       $evento->hora_inicio =  $request->input('horario_inicio');
       $evento->data_fim    =  $request->input('data_fim');
       $evento->hora_fim    =  $request->input('horario_fim');

       $r = $evento->save();
        
       if($r){
        
            return redirect()->route('start-step', ['param' => $evento->cod_evento]);
       }


       
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function step_one($id)
    {
        
         $evento = Evento::find($id)->toArray();
             

         return view('admin.eventos.editar.step_one_basic')
                  ->with('dados', $evento)
                  ->with('getMenu', $id);

    }


     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function step_two_detais($id)
    {
      
        $evento = DB::table('eventos_detalhes')->where('cod_evento', '=', $id)->first();

        return view('admin.eventos.editar.step_two_detais')
                   ->with('dados', $evento)                  
                   ->with('getMenu', $id);

    }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function step_one_tickets($id)
    {
        

        $ingresso = Ingresso::where('cod_evento', '=', $id)->get();

        return view('admin.eventos.editar.step_one_tickets')
              ->with('dados', $ingresso)
              ->with('id_evento', $id)
              ->with('getMenu', $id);


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
    public function update(Request $request)
    {
        //
          // dd($request->all());

      $evento = array();

       $id                    =  $request->input('id');
       $evento['nome_evento'] =  $request->input('nome_sala_espera');
       $evento['cod_local']   =   $request->input('btn_unidade');
       $evento['data_inicio'] =  $request->input('data_inicio');
       $evento['hora_inicio'] =  $request->input('horario_inicio');
       $evento['data_fim']    =  $request->input('data_fim');
       $evento['hora_fim']    =  $request->input('horario_fim');


         //dd($evento);
     $update = Evento::where('cod_evento', $id)->update($evento);
    if($update){
        
            return redirect()->route('start-step', ['param' => $id]);
       }


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
