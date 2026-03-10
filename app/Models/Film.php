<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;

class Film extends Model{
    protected $table = 'film';
    protected $primaryKey = 'idFil';
    public $timestamps = false;
    protected $fillable = [
        'titreFil',
        'descFil',
        'imgFil',
        'dureFil',
        'idGenre'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idGenre', 'idGenre');
    }

    public function personnes()
    {
        return $this->belongsToMany(\App\Models\Personne::class, 'participe', 'idFil', 'idPer')
            ->withPivot('idRolePer');
    }

    public function acteurs()
    {
        return $this->personnes()->wherePivot('idRolePer', 1);
    }

    public function realisateurs()
    {
        return $this->personnes()->wherePivot('idRolePer', 2);
    }

    public function scenaristes()
    {
        return $this->personnes()->wherePivot('idRolePer', 3);
    }

    public function seances() {
        return $this->hasMany(Seance::class, 'idFil', 'idFil');
    }
}
