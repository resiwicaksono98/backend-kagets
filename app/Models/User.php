<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\News;
use App\Models\Category;
use App\Models\Complaint;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;


    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'mitra_type'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mitra_type' => $this->mitra_type,
        ];
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function complaint()
    {
        return $this->hasMany(Complaint::class);
    }

    public function getPictureAttribute()
    {
        return asset('storage/'. $this->picture_path);
    }


   
}
