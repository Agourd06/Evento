<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('date');
            $table->string('location');
            $table->string('sets');
            $table->string('setsLeft');
            $table->string('price');
            $table->string('image');
            $table->softDeletes();

            $table->foreignId('organizer_id')->constrained('organizers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('acceptation', ['automatically','manually'])->default('automatically');
            $table->enum('status', ['0','1','2','3'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
