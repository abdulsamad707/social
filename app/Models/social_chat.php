<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social_chat extends Model
{
    use HasFactory;
    protected $fillable = [
        "receiver_id",
        "sender_id",
        "msg",
        "receiver_photo",
        "filechats",
        "file_type",
        "deleted_chats_at"
     
    
    ];
}
