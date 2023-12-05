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
        Schema::create('portfolio_details', function (Blueprint $table) {
            $table -> id();
            $table -> string('head_line', 50);
            $table -> string('description', 1000);
            $table -> string('client', 50);
            $table -> string('date', 50);
            $table -> string('project_url', 500);

            $table -> string('image1', 200);
            $table -> string('image2', 200);
            $table -> string('image3', 200);
            $table -> string('image4', 200);
  
            $table -> unsignedBigInteger('portfolio_id');
            $table -> foreign('portfolio_id') -> references('id') -> on('portfolio_items')
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
        Schema::dropIfExists('portfolio_details');
    }
};
