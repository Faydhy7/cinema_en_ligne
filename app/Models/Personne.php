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
        'lieuNaisPer',
        'imgPer'
    ];
    public function roles()
    {
        return $this->belongsToMany(RolePersonne::class, 'participe', 'idPer', 'idRolePer');
    }
}
