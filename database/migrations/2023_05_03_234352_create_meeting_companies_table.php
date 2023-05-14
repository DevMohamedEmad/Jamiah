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
        Schema::create('meeting_companies', function (Blueprint $table) {
            $table->id();
            $table->enum('attendance',['لم تحدد','حاضر','معتزر']);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('meeting_id');
            $table->foreign('company_id')->on('companies')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('meeting_id')->on('meetings')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_companies');
    }
};
