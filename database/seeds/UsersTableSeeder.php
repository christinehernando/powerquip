<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'juanacruz',
                'password' => '$2y$10$JJ9BSIyCcjal1P7AdpH1gexQFp4XOKgwNchWO8TPBQU.F5JGftW0C',
                'first_name' => 'Juana',
                'middle_initial' => NULL,
                'last_name' => 'Cruz',
                'birthday' => '1990-01-01 00:00:00',
                'email' => 'juana@gmail.com',
                'contact_number' => '12345678912',
                'type' => 'admin',
                'status' => '1',
                'email_verified_at' => NULL,
                'remember_token' => 'DiMIntQizRBZluaf2zeDODuQhrGw5EqqqVMTkx0n1bMBWf6yYVDCLJzAuA17',
                'deleted_at' => NULL,
                'created_at' => '2019-03-28 10:32:09',
                'updated_at' => '2019-03-28 10:32:09',
            ),
            1 => 
            array (
                'id' => 2,
                'username' => 'juanicruz',
                'password' => '$2y$10$PrtD3d7ZIWSNIl4/cisfCeZ91V8gKUEe6A7SVfurlldLNy9FX/bcC',
                'first_name' => 'juani',
                'middle_initial' => 'I',
                'last_name' => 'Cruz',
                'birthday' => '1990-02-02 00:00:00',
                'email' => 'juani@gmail.com',
                'contact_number' => '12345678912',
                'type' => 'user',
                'status' => '1',
                'email_verified_at' => NULL,
                'remember_token' => 'lXoEjAqLZaB3bPXVeyura3o3SO3Y41cqyFnzb3JThRZsA5nnWxzMBW2gWo5s',
                'deleted_at' => NULL,
                'created_at' => '2019-03-28 12:36:00',
                'updated_at' => '2019-03-28 12:41:31',
            ),
            2 => 
            array (
                'id' => 3,
                'username' => 'juanecruz',
                'password' => '$2y$10$4yLu7RnHkp9ocRe14IVdhOxlXeHZzKm61a2t9kdfsmPzB4eSHXaka',
                'first_name' => 'Juane',
                'middle_initial' => 'I',
                'last_name' => 'Cruz',
                'birthday' => '1990-03-03 00:00:00',
                'email' => 'juane@gmail.com',
                'contact_number' => '12345678912',
                'type' => 'admin',
                'status' => '1',
                'email_verified_at' => NULL,
                'remember_token' => 'tdsZnazMe8XD33Uls2Mq8aKh8isNJjXGKDQDbar05pc6R6lt5BbIqnJVQuIr',
                'deleted_at' => NULL,
                'created_at' => '2019-03-28 13:01:23',
                'updated_at' => '2019-03-28 13:01:23',
            ),
        ));
        
        
    }
}