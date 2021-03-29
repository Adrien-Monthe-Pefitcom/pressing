<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('status')->nullable();
            $table->float('total_cost');
            $table->float('amount_perceived');
            $table->date('predicted_return')->nullable();
            $table->string('return_status')->nullable();
            $table->string('collected')->nullable();
            $table->string('client_id');
            $table->string('client_name');
            $table->string('employee_id');
            $table->string('additional_intel')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
