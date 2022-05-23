<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Parents extends Model
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
    ];

    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function reclamations()
    {
        return $this->hasManyThrough(Reclamation::class, Eleve::class);
    }

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
