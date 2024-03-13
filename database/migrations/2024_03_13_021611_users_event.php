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
        Schema::create('users_events', function (Blueprint $table) {
            $table->id();
            $table->text("event_name");
            $table->text("event_image");
            $table->dateTime("event_date");
            $table->unsignedBigInteger('user_id');
            $table->dateTime("end_time")->nullable();
            $table->dateTime("start_time")->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("event_ratings");
            $table->timestamps();
        });
        Schema::create('events_attendees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
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
        //
    }
};
