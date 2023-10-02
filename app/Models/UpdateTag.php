<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateTag extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "update_tags";
    protected $fillable = [
        'id_update', 'id_tag'
    ];

    
}
