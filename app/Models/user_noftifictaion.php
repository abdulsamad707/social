<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_noftifictaion extends Model
{
    use HasFactory;
    public $table="users_notification";

    public function getTimediffAttribute()
    {
        // Assuming there's a column named 'role' in the users table
        return "ddddd";
    }



}
