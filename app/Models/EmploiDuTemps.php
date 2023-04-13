<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Professeur;

class EmploiDuTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_salle',
        'id_prof',
        'id_classe',
        'cours',
        'date',
        'start',
        'end'
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'id_prof');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }
}
