<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model{
    protected $table = 'personne';
    protected $primaryKey = 'idPer';
    public $timestamps = false;
    protected $fillable = [
        'nomPer',
        'prenomPer',
        'bioPer',
        'dateNaisPer',
        'agePer',
        'lieuNaisPer',
        'idRolePer'
    ];

    public function rolepersonne()
    {
        return $this->belongsTo(RolePersonne::class, 'idRolePer', 'idRolePer');
    }
}
