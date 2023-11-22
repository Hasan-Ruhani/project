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
        Schema::create('specific_contacts', function (Blueprint $table) {
            $table -> id();

            $table -> unsignedBigInteger('profile_id');
            $table -> string('name', 50);
            $table -> string('email', 50);
            $table -> string('clint_email', 50);
            $table -> string('subject', 50);
            $table -> string('message', 1000);
            
            $table->foreign('profile_id')->references('id')->on('profiles') 
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
        Schema::dropIfExists('specific_contacts');
    }
};
