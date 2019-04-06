<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'drills',
                'description' => 'cge daw edit daw bi',
                'status' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-03-29 11:58:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'sanders',
                'description' => 'hooray!',
                'status' => '1',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-03-29 12:10:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'saw',
                'description' => 'saw gud',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 12:32:00',
                'updated_at' => '2019-04-01 12:32:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'saw',
                'description' => 'saw gud',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 12:33:30',
                'updated_at' => '2019-04-01 12:33:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'saw',
                'description' => 'saw gud',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 12:33:35',
                'updated_at' => '2019-04-01 12:33:35',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'saw',
                'description' => 'saw gud',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 12:35:54',
                'updated_at' => '2019-04-01 12:35:54',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'cutters',
                'description' => 'hjhjhjh',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 10:38:29',
                'updated_at' => '2019-04-02 10:38:29',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'HDJHFJDHFJ',
                'description' => 'SJDKJSDKF',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 10:39:24',
                'updated_at' => '2019-04-02 10:39:24',
            ),
        ));
        
        
    }
}