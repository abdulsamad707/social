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





           
    

     



          //Create friend_ship_status table
          Schema::create('friendship_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('friend_ship_status_id');
            $table->string('friend_ship_status_name');
        
            $table->timestamps();
        });
        //Create friend_ships table
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
         
            $table->unsignedBigInteger('friend_id');
           
    
            $table->unsignedBigInteger('friend_ship_status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('social_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
         
            $table->string("group_name")->nullable();
            $table->text("group_logo")->nullable();
            $table->string("group_status")->nullable();
            $table->string("group_type")->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
      
            $table->timestamps();
        });
        Schema::create('social_groups_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_group_id');
         
      
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('social_group_id')->references('id')->on('social_groups')->onDelete('cascade');
      
            $table->timestamps();
        });
        Schema::create('social_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
        
            $table->string("page_name")->nullable();
            $table->string("page_status")->nullable();
           $table->text("page_logo")->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('social_page_followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('social_page_id');
      
      
            $table->unsignedBigInteger('user_id');
            $table->foreign('social_page_id')->references('id')->on('social_pages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      
            $table->timestamps();
        });
        Schema::create('social_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
         
      
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
      
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string("visibility");
            $table->unsignedBigInteger('social_page_id')->nullable();
       
            $table->unsignedBigInteger('social_group_id')->nullable();
            $table->foreign('social_page_id')->references('id')->on('social_pages')->onDelete('cascade');
            $table->foreign('social_group_id')->references('id')->on('social_groups')->onDelete('cascade');
            $table->string("except_user_ids")->nullable();
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
