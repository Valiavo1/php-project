<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmploiDuTemps;

class Professeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_prof',
        'nom',
        'prenoms',
        'grade'
    ];

    public function emploisDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class, 'id_prof');
    }
}
