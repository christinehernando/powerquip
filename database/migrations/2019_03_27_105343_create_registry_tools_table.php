<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistryToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registry_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asset_name');
            $table->unsignedInteger('category_id');
            $table->string('image_path');
            $table->string('description');
            $table->char('status')->default('0'); //0 - not in use, 1 - in use
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registry_tools');
    }
}
