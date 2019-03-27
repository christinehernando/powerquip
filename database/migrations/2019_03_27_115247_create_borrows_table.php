<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            - use the schema builder to create a 'book_requests' table with the ff. columns and their respective data types:
               ok - 'id' column, data type integer that auto-increments
                - 'user_id' column, data type unsigned integer
                - 'book_id' column, data type unsigned integer
                - 'quantity' column, data type unsigned integer
                - 'status' column, data type char with a default value of '0'
                - create a foreign key constraint using the 'user_id' column that references the 'id' column on the 'users' table
                - create a foreign key constraint using the 'book_id' column that references the 'id' column on the 'books' table
                - use the softDeletes method of $table
                - use the timestamps method of $table
        */

        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_code',20)->unique();
            $table->unsignedInteger('user_id');
            $table->string('status')->default('reserved');            
            $table->softDeletes();
            $table->timestamps();

             $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');
    }
}
