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
         Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'city')){
             $table->string("city")->default("karachi");
            }
            if (!Schema::hasColumn('users', 'referal_id')) {
                $table->unsignedBigInteger('referal_id');



                $table->foreign('referal_id')->references('id')->on('referals')->onDelete('cascade');
            }
            if (!Schema::hasColumn('users', 'from_referal_id')) {
                $table->unsignedBigInteger('from_referal_id')->nullable();



                $table->foreign('from_referal_id')->references('id')->on('referals')->onDelete('cascade');
            }
            
            
           
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
