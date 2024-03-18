<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users_events', function (Blueprint $table) {
              $table->string("entry_fee")->default("50");
         
          
              $table->string("mode");
              $table->string("entry_fee_currency");
              $table->string("event_type");
            

        });
       
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_event', function (Blueprint $table) {
            //
        });
    }
};
