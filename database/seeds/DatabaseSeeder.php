<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
            - use $this' call method to run the UsersTableSeeder class
                - $this->?(?::?);

            - use $this' call method to run the CategoriesTableSeeder class
                - $this->?(?::?); 
        */

            $this->call(InventoryToolsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegistryToolsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
