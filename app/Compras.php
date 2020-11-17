<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{


	protected $table = 'compras'; // nome da tabela
    protected $primaryKey = 'compras_id'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
    'compras_id',
    'compras_cliente_id',
    'compras_cliente_nome',
    'compras_pacote',
    'valor_total',
    'bandeira_compra',
    'compras_cliente_cpf',
    'compras_status',
    'compras_data',
    'compras_hora',
    'compras_tipopagto',
    'entrega',
    'comisssario',
    'typetaxa',
    'valor_taxa',
    'retirada_status',
    'msg_pg'
    ];

}
