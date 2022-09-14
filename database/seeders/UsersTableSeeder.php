<?php

namespace Database\Seeders;

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
                'role_id' => 1,
                'name' => 'feegow',
                'email' => 'admin@feegow.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vqniQWbRyjfyPHkqr5R7FOg8yZeLknpzl/gGTPzclpo/ExSMOON1u',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2022-09-14 03:42:42',
                'updated_at' => '2022-09-14 03:42:42',
            ),
        ));
        
        
    }
}