<?php

namespace App\Models;

use App\Models\Update;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use HasSlug;
    protected $primaryKey = "id";
    protected $table = "tags";
    protected $fillable = [
        'tag_name','deskripsi', 'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('tag_name')
            ->saveSlugsTo('slug');
    }

    public function upd(){
        return $this->BelongsToMany(Update::class, 'update_tags', 'id_tag', 'id_update');
    }
}
