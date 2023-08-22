<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "indonesia_provinces";
    protected $fillable = [
        'code ','name', 'meta'
    ];

    
    public function pendaftar(){
        return $this->hasMany(Pendaftar::class, 'id_provinsi');
    }
}
