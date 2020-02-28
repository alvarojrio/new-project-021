<?php
//===========
// ATUALIZADO 
//===========

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Usuarios extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $table = 'usuarios'; // nome da tabela
    protected $primaryKey = 'cod_usuario'; // chave primária  
    public $incrementing = true; // indica se os IDs são auto-incremento
    public $timestamps = true; // ativa os campos created_at e updated_at

    /* Fillable possibilitará criar novos registros simplesmente usando
     * o método create e outros da classe Model passando
     * um array associativo as colunas da classe
     */
    protected $fillable = [
        'cod_perfil',
        'tipo',
        'usuario',
        'senha',
        'email',
        'primeiro_acesso',
        'ultimo_login',
        'status'
    ];



    // METODOS DO AUTHENTICATABLE ----------------------------------
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->senha;
    }

    public function getReminderEmail() {
        return $this->email;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    



    /*
      CASO FOR: (MUITOS [N] P/ MUITOS [N])
      Cada [NOME DESTE MODEL] pertence vários [NOME DO RELACIONADO]
      return $this->belongsToMany()
      No Model de IDA e no de Model de Volta.
      OBS: Não precisa criar o model da tabela de ligação o mesmo será acessado usando o comando pivot
     * **************************************************************
      CASO FOR: (1 P/ N)
      Em caso de 1 [ENTIDADE A] P/ N [ENTIDADE B]
      no model ENTIDADE A FICA O hasMany()
      no model ENTIDADE B FICA O belongsTo()

    ***************************************************************
      CASO FOR: (1 P/ 1)
      Cada [USUARIO] possui um [TELEFONE]
      return $this->hasOne()
      OBS >> O hasOne aponta para o model que (recebeu), ou seja, está com a chave estrangeira

     * * * VOLTA
      [TELEFONE] pertence a um [USUÁRIO]
      belongsTo()

     */
}
