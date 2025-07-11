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
        Schema::create('courses', function (Blueprint $table) {
              $table->id();
            $table->string("title");
            $table->string("author");
            $table->foreignId("category_id")->constrained();
            $table->float("fees")->default(0.0);
            $table->float("discount_price")->nullable();
            $table->text("description");
            $table->integer("duration"); //in week
            $table->string("image");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
