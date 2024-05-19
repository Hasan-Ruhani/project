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
        Schema::create('profiles', function (Blueprint $table) {
            $table -> id();
            
            $table -> unsignedBigInteger('user_id') -> unique();
            $table->string('designation', 50)->default('Student');
            $table -> string('description', 2000)->nullable();
            $table->string('image', 1000)->nullable(); // Set default image path
            // $table->string('image', 1000)->default('path/to/default/image.jpg'); // Set default image path
  
            $table->string('facebook', 500)->nullable();
            $table->string('whatsapp', 500)->nullable();

            $table->foreign('user_id')->references('id')->on('users') 
            -> restrictOnDelete() -> cascadeOnUpdate();
  
            $table -> timestamp('created_at')->useCurrent();
            $table -> timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
