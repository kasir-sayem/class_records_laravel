<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('marks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('studentid');
        $table->date('mdate');
        $table->integer('mark');
        $table->string('type');
        $table->unsignedBigInteger('subjectid');
        $table->timestamps();
        
        $table->foreign('studentid')->references('id')->on('students');
        $table->foreign('subjectid')->references('id')->on('subjects');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
