<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSession extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->integer('service_id');
            $table->integer('client_id');
            $table->text('note');
            $table->decimal('total_price',7,3);
            $table->decimal('paid',7,3);
            $table->decimal('reminding',7,3);
            $table->integer('invoice_id');
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
        //
    }
}
