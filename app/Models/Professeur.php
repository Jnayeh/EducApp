<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Professeur extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'telephone',
        'role',
        'email',
        'password',
        'matiere_id',
    ];

    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }


    public function emploiProf()
    {
        return $this->hasOne(EmploiProf::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

    public function homeWorks()
    {
        return $this->hasMany(HomeWork::class);
    }

    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

}
