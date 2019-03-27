<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
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
                - 'id' column, data type integer that auto-increments
                - 'isbn' column, data type bigInteger
                - 'name' column, data type string
                - 'category_id' column, data type unsigned integer
                - 'quantity' column, data type integer
                - 'available' column, data type integer
                - 'image_path' column, data type string
                - 'description' column, data type string that is nullable
                - 'status' column, data type char with a default value of '1'
                - use the softDeletes method of $table
                - use the timestamps method of $table
        */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
