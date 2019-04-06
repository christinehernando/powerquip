<?php

use Illuminate\Database\Seeder;

class InventoryToolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('inventory_tools')->delete();
        
        \DB::table('inventory_tools')->insert(array (
            0 => 
            array (
                'id' => 1,
                'registry_tool_id' => 1,
                'tool_serial' => 1904011361634780,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:50:47',
                'updated_at' => '2019-04-01 10:50:47',
            ),
            1 => 
            array (
                'id' => 2,
                'registry_tool_id' => 1,
                'tool_serial' => 1904011482525097,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:50:50',
                'updated_at' => '2019-04-01 10:50:50',
            ),
            2 => 
            array (
                'id' => 3,
                'registry_tool_id' => 3,
                'tool_serial' => 190401380494762,
                'status' => 'pending',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:59:13',
                'updated_at' => '2019-04-01 10:59:13',
            ),
            3 => 
            array (
                'id' => 4,
                'registry_tool_id' => 3,
                'tool_serial' => 1904011762095873,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:59:18',
                'updated_at' => '2019-04-01 10:59:18',
            ),
            4 => 
            array (
                'id' => 5,
                'registry_tool_id' => 2,
                'tool_serial' => 19040193287879,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:59:44',
                'updated_at' => '2019-04-01 10:59:44',
            ),
            5 => 
            array (
                'id' => 6,
                'registry_tool_id' => 5,
                'tool_serial' => 1904021673642251,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 11:55:47',
                'updated_at' => '2019-04-02 11:55:47',
            ),
            6 => 
            array (
                'id' => 7,
                'registry_tool_id' => 4,
                'tool_serial' => 190402774435239,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 11:55:52',
                'updated_at' => '2019-04-02 11:55:52',
            ),
            7 => 
            array (
                'id' => 8,
                'registry_tool_id' => 4,
                'tool_serial' => 1904021173680857,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 11:55:58',
                'updated_at' => '2019-04-02 11:55:58',
            ),
            8 => 
            array (
                'id' => 9,
                'registry_tool_id' => 1,
                'tool_serial' => 1546565656,
                'status' => 'functioning',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}