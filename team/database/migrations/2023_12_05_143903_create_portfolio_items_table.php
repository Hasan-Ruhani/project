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
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table -> id();
            $table -> string('title', 50);
            $table -> string('short_des', 200);
  
            $table -> unsignedBigInteger('category_id');
            $table -> foreign('category_id') -> references('id') -> on('categories')
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
        Schema::dropIfExists('portfolio_items');
    }
};
