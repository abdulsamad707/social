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
        Schema::create('event_rating', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("ratings");
            $table->foreign('event_id')->references('id')->on('users_events')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
