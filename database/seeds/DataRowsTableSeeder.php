<?php

use Illuminate\Database\Seeder;

class DataRowsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_rows')->delete();
        
        \DB::table('data_rows')->insert(array (
            0 => 
            array (
                'id' => 99,
                'data_type_id' => 4,
                'field' => 'id',
                'type' => 'text',
                'display_name' => 'Id',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '{}',
                'order' => 1,
            ),
            1 => 
            array (
                'id' => 100,
                'data_type_id' => 4,
                'field' => 'user_id',
                'type' => 'text',
                'display_name' => 'User Id',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '{}',
                'order' => 4,
            ),
            2 => 
            array (
                'id' => 101,
                'data_type_id' => 4,
                'field' => 'state_id',
                'type' => 'text',
                'display_name' => 'State Id',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '{}',
                'order' => 5,
            ),
            3 => 
            array (
                'id' => 102,
                'data_type_id' => 4,
                'field' => 'description',
                'type' => 'text_area',
                'display_name' => 'Description',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 6,
            ),
            4 => 
            array (
                'id' => 103,
                'data_type_id' => 4,
                'field' => 'slug',
                'type' => 'text',
                'display_name' => 'Slug',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 7,
            ),
            5 => 
            array (
                'id' => 104,
                'data_type_id' => 4,
                'field' => 'speaks_english',
                'type' => 'checkbox',
                'display_name' => 'Speaks English',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 8,
            ),
            6 => 
            array (
                'id' => 105,
                'data_type_id' => 4,
                'field' => 'phone',
                'type' => 'text',
                'display_name' => 'Phone',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 9,
            ),
            7 => 
            array (
                'id' => 106,
                'data_type_id' => 4,
                'field' => 'second_phone',
                'type' => 'text',
                'display_name' => 'Second Phone',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 10,
            ),
            8 => 
            array (
                'id' => 107,
                'data_type_id' => 4,
                'field' => 'website',
                'type' => 'text',
                'display_name' => 'Website',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 11,
            ),
            9 => 
            array (
                'id' => 108,
                'data_type_id' => 4,
                'field' => 'street',
                'type' => 'text',
                'display_name' => 'Street',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 12,
            ),
            10 => 
            array (
                'id' => 109,
                'data_type_id' => 4,
                'field' => 'city',
                'type' => 'text',
                'display_name' => 'City',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 13,
            ),
            11 => 
            array (
                'id' => 110,
                'data_type_id' => 4,
                'field' => 'country',
                'type' => 'text',
                'display_name' => 'Country',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 14,
            ),
            12 => 
            array (
                'id' => 111,
                'data_type_id' => 4,
                'field' => 'post_code',
                'type' => 'text',
                'display_name' => 'Post Code',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 15,
            ),
            13 => 
            array (
                'id' => 112,
                'data_type_id' => 4,
                'field' => 'latitude',
                'type' => 'text',
                'display_name' => 'Latitude',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 16,
            ),
            14 => 
            array (
                'id' => 113,
                'data_type_id' => 4,
                'field' => 'longitude',
                'type' => 'text',
                'display_name' => 'Longitude',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 17,
            ),
            15 => 
            array (
                'id' => 114,
                'data_type_id' => 4,
                'field' => 'working_doctors_count',
                'type' => 'number',
                'display_name' => 'Working Doctors Count',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 18,
            ),
            16 => 
            array (
                'id' => 115,
                'data_type_id' => 4,
                'field' => 'working_doctors_names',
                'type' => 'text',
                'display_name' => 'Working Doctors Names',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 19,
            ),
            17 => 
            array (
                'id' => 116,
                'data_type_id' => 4,
                'field' => 'nurses_count',
                'type' => 'number',
                'display_name' => 'Nurses Count',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 20,
            ),
            18 => 
            array (
                'id' => 117,
                'data_type_id' => 4,
                'field' => 'other_workers_count',
                'type' => 'number',
                'display_name' => 'Other Workers Count',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 21,
            ),
            19 => 
            array (
                'id' => 118,
                'data_type_id' => 4,
                'field' => 'gdpr_agreed',
                'type' => 'checkbox',
                'display_name' => 'Gdpr Agreed',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 22,
            ),
            20 => 
            array (
                'id' => 119,
                'data_type_id' => 4,
                'field' => 'gdpr_agreed_date',
                'type' => 'date',
                'display_name' => 'Gdpr Agreed Date',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 23,
            ),
            21 => 
            array (
                'id' => 120,
                'data_type_id' => 4,
                'field' => 'profile_completedness',
                'type' => 'number',
                'display_name' => 'Profile Completedness',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 24,
            ),
            22 => 
            array (
                'id' => 121,
                'data_type_id' => 4,
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => 'Created At',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 0,
                'delete' => 1,
                'details' => '{}',
                'order' => 25,
            ),
            23 => 
            array (
                'id' => 122,
                'data_type_id' => 4,
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => 'Updated At',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '{}',
                'order' => 26,
            ),
            24 => 
            array (
                'id' => 123,
                'data_type_id' => 4,
                'field' => 'search_name',
                'type' => 'text',
                'display_name' => 'Search Name',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{}',
                'order' => 27,
            ),
            25 => 
            array (
                'id' => 124,
                'data_type_id' => 4,
                'field' => 'doctor_belongsto_user_relationship',
                'type' => 'relationship',
                'display_name' => 'users',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\\User","table":"users","type":"belongsTo","column":"user_id","key":"id","label":"name","pivot_table":"czech_names","pivot":"0","taggable":"0"}',
                'order' => 3,
            ),
            26 => 
            array (
                'id' => 125,
                'data_type_id' => 4,
                'field' => 'doctor_hasone_state_relationship',
                'type' => 'relationship',
                'display_name' => 'states',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '{"model":"App\\\\Models\\\\State","table":"states","type":"belongsTo","column":"state_id","key":"id","label":"name","pivot_table":"czech_names","pivot":"0","taggable":"0"}',
                'order' => 2,
            ),
        ));
        
        
    }
}