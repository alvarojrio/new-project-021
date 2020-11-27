<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoLocal extends Model
{


	protected $table = 'evento_local'; // nome da tabela
    protected $primaryKey = 'cod_local'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = true; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
 	    'complemento',
		'localizacao',
		'detalhe'

    ];

}
