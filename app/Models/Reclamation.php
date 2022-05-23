<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'details',
        'professeur_id',
        'eleve_id',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }
    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}
