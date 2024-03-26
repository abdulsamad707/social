<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events_attendee extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo(User::class);
       }
}
