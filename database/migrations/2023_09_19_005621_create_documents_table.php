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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proponent_id')->nullable();
            //$table->foreign('proponent_id')->references('id')->on('document')->onDelete('constraint');
            $table->unsignedBigInteger('data_type_id')->nullable();
            //$table->foreign('data_type_id')->references('id')->on('document')->onDelete('constraint');
            $table->string('created_by')->nullable();
            $table->string('hashid')->nullable();
            $table->dateTime('date_time_received');
            $table->string('document_no');
            $table->integer('reading_no')->nullable();
            $table->string('class')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
