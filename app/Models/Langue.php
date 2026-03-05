<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model{
    protected $table = 'langue';
    protected $primaryKey = 'idLangue';
    public $timestamps = false;
    protected $fillable = [
        'LangueSea',
    ];
    public function seance(){
        return $this->hasMany(Seance::class, 'idLangue', 'idLangue');
    }
}
