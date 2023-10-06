<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUpdate extends Model
{
    use HasFactory;
    protected $table = "like_updates";
    protected $fillable = [
        'id_update', 'id_user'
    ];

}
