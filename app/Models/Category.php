<?php

namespace App\Models;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function complaint()
    {
        return $this->hasMany(Complaint::class);
    }


}
