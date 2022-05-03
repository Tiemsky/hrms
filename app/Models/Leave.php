<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setting()
    {
        return $this->hasOne(LeaveSettings::class);
    }

    public function requestedLeave(){
        return $this->hasOne(RequestedLeave::class);
    }
}
