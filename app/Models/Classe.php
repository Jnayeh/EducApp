<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'niveau',
        'emploi_elv'
    ];

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class);
    }

    public function homeWorks()
    {
        return $this->belongsToMany(HomeWork::class);
    }
}
