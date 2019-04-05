<?php

use Illuminate\Database\Seeder;
use DB;




class InventoryToolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory_tools')->insert([
        	"registry_tool_id" => 1,
        	"tool_serial" => 1546565656,
        	"status" => "functioning"
        ]);
    }
}
