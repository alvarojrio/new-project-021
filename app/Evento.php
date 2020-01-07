<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = 'eventos'; // nome da tabela
    protected $primaryKey = 'cod_evento'; // chave primária
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at

    /* fillable possibilitará criar novos registros simplesmente usando
     * o método create e outros da classe Model passando
     * um array associativo as colunas da classe
     */
	 
	protected $fillable = [
            'cod_evento',
            'cod_local',
            'nome_evento',
            'data_inicio', 
            'hora_inicio'	
	];
}
