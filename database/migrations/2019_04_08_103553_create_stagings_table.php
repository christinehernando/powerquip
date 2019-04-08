<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagings', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('tool_serial');
            $table->unsignedInteger('inventory_tool_id');
            $table->string('status')->default('added to cart');
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
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
        Schema::dropIfExists('stagings');
    }
}
