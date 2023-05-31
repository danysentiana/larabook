<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    use Sluggable;
    // use SoftDeletes;

    protected $fillable =
    [
        'title',
        'category_id',
        'cover',
        'slug'
    ];

    // slugable
    public function sluggable():array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // relation to book has one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
