<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePersonne extends Model{
    protected $table = 'role_personnes';
    protected $primaryKey = 'idRolePer';
    public $timestamps = false;
    protected $fillable = [
      'libRolePer'
    ];

    public function personnes()
    {
        return $this->hasMany(Personne::class, 'idRolePer', 'idRolePer');
    }
}
