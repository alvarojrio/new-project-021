<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


	protected $table = 'clientes'; // nome da tabela
    protected $primaryKey = 'clientes_id'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = true; // ativa os campos created_at e updated_at


    //
 protected  $fillable = [
 	   'clientes_id',
		'clientes_nome',
		'clientes_cpf',
		'clientes_senha',
		'clientes_cep',
		'clientes_logradouro',
		'clientes_numero',
		'clientes_complemento',
		'clientes_bairro',
		'clientes_cidade',
		'clientes_uf',
		'clientes_pais',
		'clientes_telefone',
		'clientes_telefone2',
		'clientes_email',
		'clientes_sexo',
		'clientes_nascimento',
		'rg'

    ];

}
