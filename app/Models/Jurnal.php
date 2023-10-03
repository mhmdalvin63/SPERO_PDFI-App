<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Jurnal extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "jurnals";
    protected $fillable = [
        'link_jurnal','foto', 'judul_jurnal', 'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul_jurnal')
            ->saveSlugsTo('slug');
    }
}
