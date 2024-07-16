<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory , Sluggable;

    protected $table = "articles";
    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categoryName()
    {
        return $this->belongsTo(Category::class , 'category');
    }

    public function creatorArticle()
    {
        return $this->belongsTo(User::class , 'writer');
    }
}
