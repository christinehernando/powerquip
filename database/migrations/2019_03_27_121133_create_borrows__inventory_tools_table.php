<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsInventoryToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows__inventory_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inventory_tool_id'); 
            $table->unsignedInteger('borrow_id'); 
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('inventory_tool_id')->references('id')->on('inventory_tools');
            $table->foreign('borrow_id')->references('id')->on('borrows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows__inventory_tools');
    }
}
