<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    //
    protected $table = 'eventos_ingressos'; // nome da tabela
    protected $primaryKey = 'cod_ingresso'; // chave primária
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = true; // ativa os campos created_at e updated_at

    /* fillable possibilitará criar novos registros simplesmente usando
     * o método create e outros da classe Model passando
     * um array associativo as colunas da classe
     */
	 
	protected $fillable = [
            'cod_ingresso',
            'cod_local',
            'tipo_ingresso',
            'nome', 
            'preco'	
	];
}
