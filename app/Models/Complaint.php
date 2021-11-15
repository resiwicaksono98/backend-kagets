<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\Problem;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;
    protected $guarded =[];



    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status_complaints()
    {
        return $this->belongsTo(Status_Complaint::class);
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'sender_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function getPictureAttribute()
    {
       return asset('storage/' . $this->support_image) ;
    }

    
   
    }

