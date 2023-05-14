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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file')->nullable();
            $table->integer('count_votes')->default(0);
            $table->longText('link')->nullable();
            $table->date('date');
            $table->string('time');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
