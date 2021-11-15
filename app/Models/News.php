<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function booted()
    {
        static::creating(function(News $news){
            $news->slug = strtolower(Str::slug($news->title . '-' . Str::random(6)));
        });
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPictureAttribute()
    {
       return asset('storage/' . $this->picture_path) ;
    }
    
}
