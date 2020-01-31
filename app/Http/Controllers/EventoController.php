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
        //
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
         // dd($request->all());
        $file = $request->file;
       
        // Se informou o arquivo, retorna um boolean
      
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
                        
                        echo $upload;

                 }
            } 
       
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

       $evento->nome_evento =  $request->input('evento_nome');
       $evento->cod_local =  $request->input('select-localidade');
     //  $evento->data_inicio =   date('Y-m-d')//$request->input('data_comeco');
      // $evento->hora_inicio =  $request->input('horario_comeco');
    //   $evento->nome_evento =  $request->input('data_fim');
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
        
         $evento = Evento::find($id);
       
         return view('admin.eventos.editar.step_one_basic')->with('dados', $evento);

    }


     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function step_two_detais($id)
    {
      
        $evento = DB::table('eventos_detalhes')->where('cod_evento', '=', $id)->get();

        return view('admin.eventos.editar.step_two_detais')->with('dados', $evento);

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

        return view('admin.eventos.editar.step_one_tickets')->with('dados', $ingresso)->with('id_evento', $id);


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
