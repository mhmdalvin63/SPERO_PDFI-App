<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_user');
    }

    public function tipe(){
        return $this->hasMany(Type::class, 'id_user');
    }

    public function anggota(){
        return $this->hasMany(Anggota::class, 'id_user');
    }

    public function agenda(){
        return $this->hasMany(Agenda::class, 'id_user');
    }

    public function upd(){
        return $this->BelongsToMany(Update::class, 'like_updates', 'id_user',  'id_update');
    }

    public function kota(){
        return $this->BelongsTo(City::class, 'asal_cabang');
    }
}
