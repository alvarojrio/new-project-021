<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_detalhes extends Model
{


	protected $table = 'compra_detalhes'; // nome da tabela
    protected $primaryKey = 'cod_detalhes_compra'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
        'cod_detalhes_compra',
        'cod_compra',
        'cod_produto',
        'detalhe'
    ];

}
