<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class Eleve extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'firstname',
        'telephone',
        'email',
        /* 'password', */
        'classe_id',
        'parent_id',
    ];

    protected $guarded = ['id'];
    /* protected $hidden = [
        'password',
    ]; */
    public function getAuthPassword()
    {
        return $this->password;
    }


    public function bulletinNote()
    {
        return $this->hasOne(BulletinNote::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function emploiElv()
    {
        return $this->belongsTo(EmploiElv::class);
    }

    public function parent()
    {
        return $this->belongsTo(Parents::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
