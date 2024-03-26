<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_event extends Model
{
    use HasFactory;
   function attendesscount(){
    return $this->hasMany(events_attendee::class,"event_id");
   }
   function avgcount(){
    return $this->hasMany(event_rating::class,"event_id");
   }
   function user(){
    return $this->belongsTo(User::class);
   }
}
