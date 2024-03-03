<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function likes()
{
    return $this->hasMany(like::class);
}
public function comments()
{
    return $this->hasMany(comment::class);
}
public function social_page()
{
    return $this->belongsTo(social_page::class);
}
        


}
