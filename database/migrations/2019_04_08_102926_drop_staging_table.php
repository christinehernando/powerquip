<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropStagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('staging');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('staging', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('tool_serial');
            $table->string('status')->default('added to cart');
            $table->string('username')->nullable();
            $table->string('first_name')->nullable();
            $table->timestamps();

        });
    }
}
