<?php

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-12-18 10:05:35',
                'updated_at' => '2018-12-18 10:05:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-12-18 10:05:35',
                'updated_at' => '2018-12-18 10:05:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2018-12-18 10:05:35',
                'updated_at' => '2018-12-18 10:05:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'doctors',
                'slug' => 'doctors',
                'display_name_singular' => 'Doctor',
                'display_name_plural' => 'Doctors',
                'icon' => 'voyager-people',
                'model_name' => 'App\\Doctor',
                'policy_name' => NULL,
                'controller' => 'Voyager\\DoctorController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 1,
                'details' => '{"order_column":"created_at","order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2019-01-24 13:23:41',
                'updated_at' => '2019-05-14 09:06:33',
            ),
        ));
        
        
    }
}