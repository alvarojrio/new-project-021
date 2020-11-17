<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras_itens extends Model
{


	protected $table = 'compras_itens'; // nome da tabela
    protected $primaryKey = 'compras_itens_id'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
        'compras_itens_id',
        'compras_id',
        'compras_produto',
        'compras_subproduto',
        'compras_valor',
        'compras_qtd',
        'compras_data',
        'compras_hora',
        'produto_nome',
        'subproduto_nome',
        'sexo',
        'diadasemana',
        'lote'
    ];

}
