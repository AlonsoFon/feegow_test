<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2022-09-14 03:41:56',
                'updated_at' => '2022-09-14 03:41:56',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_consults',
                'table_name' => 'consults',
                'created_at' => '2022-09-14 03:45:50',
                'updated_at' => '2022-09-14 03:45:50',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_consults',
                'table_name' => 'consults',
                'created_at' => '2022-09-14 03:45:50',
                'updated_at' => '2022-09-14 03:45:50',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_consults',
                'table_name' => 'consults',
                'created_at' => '2022-09-14 03:45:50',
                'updated_at' => '2022-09-14 03:45:50',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_consults',
                'table_name' => 'consults',
                'created_at' => '2022-09-14 03:45:50',
                'updated_at' => '2022-09-14 03:45:50',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_consults',
                'table_name' => 'consults',
                'created_at' => '2022-09-14 03:45:50',
                'updated_at' => '2022-09-14 03:45:50',
            ),
        ));
        
        
    }
}