<?php

use Illuminate\Database\Seeder;

class RegistryToolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registry_tools')->delete();
        
        \DB::table('registry_tools')->insert(array (
            0 => 
            array (
                'id' => 1,
                'asset_name' => 'sander-asd',
                'category_id' => 1,
                'image_path' => 'saw1.jpg',
                'description' => 'go lang',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-03-29 12:40:58',
                'updated_at' => '2019-03-29 12:40:58',
            ),
            1 => 
            array (
                'id' => 2,
                'asset_name' => 'saw',
                'category_id' => 1,
                'image_path' => 'saw1.jpg',
                'description' => '165mm Diameter carbide tooth blade delivers a 54mm cutting capacity for a variety of cutting applications',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:51:42',
                'updated_at' => '2019-04-01 10:51:42',
            ),
            2 => 
            array (
                'id' => 3,
            'asset_name' => 'STANLEY® Saw FATMAX® 18V LI-ION RANDOM ORBITAL SANDER (BARE UNIT)',
                'category_id' => 2,
                'image_path' => 'sd',
                'description' => 'Multi position handle for increased control and usage',
                'status' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-04-01 10:58:53',
                'updated_at' => '2019-04-02 10:01:11',
            ),
            3 => 
            array (
                'id' => 4,
                'asset_name' => 'blah blah',
                'category_id' => 3,
                'image_path' => 'sd',
                'description' => 'blah blah desc',
                'status' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 10:38:13',
                'updated_at' => '2019-04-04 11:20:27',
            ),
            4 => 
            array (
                'id' => 5,
                'asset_name' => 'jfkjgkq',
                'category_id' => 3,
                'image_path' => 'ksjdk',
                'description' => 'jkdjf',
                'status' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 10:43:41',
                'updated_at' => '2019-04-04 11:20:29',
            ),
            5 => 
            array (
                'id' => 6,
                'asset_name' => 'test',
                'category_id' => 8,
                'image_path' => 'pexels-photo-1963076.jpeg',
                'description' => 'lang',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 12:26:09',
                'updated_at' => '2019-04-02 12:26:09',
            ),
            6 => 
            array (
                'id' => 7,
                'asset_name' => 'screw',
                'category_id' => 1,
                'image_path' => 'one_day.jpg',
                'description' => 'dads',
                'status' => '0',
                'deleted_at' => NULL,
                'created_at' => '2019-04-02 12:30:09',
                'updated_at' => '2019-04-02 12:30:09',
            ),
        ));
        
        
    }
}