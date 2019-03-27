<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            - use the schema builder to create a 'books' table with the ff. columns and their respective data types:
                ok- 'id' column, data type integer that auto-increments
                ok tool_serial- 'isbn' column, data type bigInteger
                ok not needed- 'name' column, data type string
                ok registry_tool_id - 'category_id' column, data type unsigned integer
                ok not needed - 'quantity' column, data type integer
                ok not on this table - 'available' column, data type integer
                ok not on this table- 'image_path' column, data type string
                ok not on this table- 'description' column, data type string that is nullable
                ok used string for more flexibility- 'status' column, data type char with a default value of '1'
               ok  - use the softDeletes method of $table
               ok  - use the timestamps method of $table
        */


        Schema::create('inventory_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('registry_tool_id');
            $table->bigInteger('tool_serial')->unique();
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('registry_tool_id')->references('id')->on('registry_tools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_tools');
    }
}
