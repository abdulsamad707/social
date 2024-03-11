<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\friendship_status;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        friendship_status::insert([
            ['friend_ship_status_name'=>"Pending","friend_ship_status_id"=>1],
            [
                "friend_ship_status_name"=>"Accepted","friend_ship_status_id"=>5
            ]
        ]);

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
