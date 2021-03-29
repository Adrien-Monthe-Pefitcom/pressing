<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClothsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('description')->nullable();
            $table->string('state')->nullable();
            $table->float('price')->nullable();
            $table->string('collected')->nullable();
            $table->string('return_status')->nullable();
            $table->integer('id_order');
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
        Schema::dropIfExists('cloths');
    }
}
