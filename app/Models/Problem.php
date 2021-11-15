<?php

namespace App\Models;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Problem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function complaint()
    {
        return $this->belongsToMany(Complaint::class);
    }
}
