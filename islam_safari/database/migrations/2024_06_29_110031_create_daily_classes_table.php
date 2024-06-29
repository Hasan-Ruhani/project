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
        Schema::create('daily_classes', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('courses_id');
            $table -> string('date');
            $table -> string('title', 50);
            $table -> string('description', 80);


            $table -> foreign('courses_id') -> references('id') -> on('courses')
            -> cascadeOnDelete() -> cascadeOnUpdate();

            $table -> timestamp('created_at')->useCurrent();
            $table -> timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_classes');
    }
};
