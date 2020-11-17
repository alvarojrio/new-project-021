<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras_pagto extends Model
{


	protected $table = 'compras_pagto'; // nome da tabela
    protected $primaryKey = 'comprasp_id'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
    'comprasp_id',
    'comprasp_tid',
    'comprasp_pan',
    'comprasp_compras_id',
    'comprasp_valor',
    'comprasp_parcelas',
    'comprasp_status',
    'comprasp_bandeira',
    'comprasp_atcod',
    'comprasp_azcod',
    'comprasp_lr',
    'comprasp_arp',
    'comprasp_nsu',
    'comprasp_capmensagem',
    'comprasp_capcodi',
    'comprasp_data',
    'comprasp_hora',
    'comprasp_ctnumero',
    'link_boleto',
    'id_compra',
    'captura_codigo',
    'captura_mensagem',
    'captura_data_hora',
    'captura_valor',
    'cancelamento_codigo',
    'cancelamento_mensagem',
    'cancelamento_data_hora',
    'cancelamento_valor',
    'valor_parcela'
    ];

}
