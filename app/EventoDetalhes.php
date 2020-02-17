<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoDetalhes extends Model
{
    //
    protected $table = 'eventos_detalhes'; // nome da tabela
    protected $primaryKey = 'cod_detalhe'; // chave primária
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = false; // ativa os campos created_at e updated_at

    /* fillable possibilitará criar novos registros simplesmente usando
     * o método create e outros da classe Model passando
     * um array associativo as colunas da classe
     */
	 
	protected $fillable = [
            'cod_evento',
            'imagem',
            'descricao', 
            'titulo'	
	];

}
