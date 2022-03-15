<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedLeave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function leave(){
        return $this->belongsTo(Leave::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
