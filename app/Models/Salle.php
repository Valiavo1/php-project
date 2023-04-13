<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'design',
        'occupation'
    ];

    public function emploisDuTemps()
    {
        return $this->hasMany(EmploiDuTemps::class, 'id_salle');
    }
}
