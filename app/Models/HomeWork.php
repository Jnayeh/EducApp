<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo',
        'professeur_id',
    ];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
