<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_classe',
        'niveau',
        'design'
    ];

    public function emploisDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class, 'id_classe');
    }
}
