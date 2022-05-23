<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photos',
        'home_work_id',
        'eleve_id',
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
    public function homeWork()
    {
        return $this->belongsTo(HomeWork::class);
    }
}
