<?php

namespace App\Models;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "anggotas";
    protected $fillable = [
        'nama_anggota','no_telp', 'email'
    ];

    public function agenda(){
        return $this->hasMany(Agenda::class);
    }
}
