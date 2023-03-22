<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_infos')->delete();
        
        \DB::table('service_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index_no' => 1,
                'service_name' => 'Airport Shuttle/Transfer',
                'service_name_italic' => NULL,
                'description' => 'Description Goes Here',
                'description_italic' => NULL,
                'image' => '1156764893.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 05:02:39',
            ),
            1 => 
            array (
                'id' => 2,
                'index_no' => 2,
                'service_name' => 'Postal Service',
                'service_name_italic' => NULL,
                'description' => 'Description Goes Here',
                'description_italic' => NULL,
                'image' => '1396313428.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 05:03:07',
            ),
            2 => 
            array (
                'id' => 3,
                'index_no' => 3,
                'service_name' => 'Accessories Cellular',
                'service_name_italic' => NULL,
                'description' => 'Description Goes Here',
                'description_italic' => NULL,
                'image' => '669356182.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 05:03:35',
            ),
            3 => 
            array (
                'id' => 4,
                'index_no' => 4,
                'service_name' => 'Souvenir',
                'service_name_italic' => NULL,
                'description' => 'Description Goes Here',
                'description_italic' => NULL,
                'image' => '1836947857.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 05:03:57',
            ),
            4 => 
            array (
                'id' => 6,
                'index_no' => 5,
                'service_name' => 'Shuttle Bus Tickets',
                'service_name_italic' => NULL,
                'description' => 'Description goes here',
                'description_italic' => NULL,
                'image' => '1819097599.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:17:36',
            ),
            5 => 
            array (
                'id' => 7,
                'index_no' => 6,
                'service_name' => 'Mobile Repaire',
                'service_name_italic' => NULL,
                'description' => 'Description goes here',
                'description_italic' => NULL,
                'image' => '978192053.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:18:42',
            ),
            6 => 
            array (
                'id' => 8,
                'index_no' => 7,
                'service_name' => 'Posta Express',
                'service_name_italic' => NULL,
                'description' => 'Description goes here',
                'description_italic' => NULL,
                'image' => '1757342366.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:19:38',
            ),
            7 => 
            array (
                'id' => 9,
                'index_no' => 8,
                'service_name' => 'Stampa A3 A4 A5',
                'service_name_italic' => NULL,
                'description' => 'Description goes here',
                'description_italic' => NULL,
                'image' => '498136317.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:20:34',
            ),
        ));
        
        
    }
}