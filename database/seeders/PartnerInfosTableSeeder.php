<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PartnerInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('partner_infos')->delete();
        
        \DB::table('partner_infos')->insert(array (
            0 => 
            array (
                'id' => 3,
                'index_no' => 1,
                'partner_name' => 'ITA',
                'partner_name_italic' => 'ital',
                'description' => 'Description',
                'description_italic' => 'description',
                'image' => '375629849.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 06:16:11',
            ),
            1 => 
            array (
                'id' => 4,
                'index_no' => 2,
                'partner_name' => 'DHL',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1287770820.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 06:20:00',
            ),
            2 => 
            array (
                'id' => 5,
                'index_no' => 3,
                'partner_name' => 'UPS',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '118598070.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 06:20:15',
            ),
            3 => 
            array (
                'id' => 6,
                'index_no' => 4,
                'partner_name' => 'Vodafone',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1359416938.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 06:20:37',
            ),
            4 => 
            array (
                'id' => 7,
                'index_no' => 5,
                'partner_name' => 'Canon',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '966124235.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:48:26',
            ),
            5 => 
            array (
                'id' => 8,
                'index_no' => 6,
                'partner_name' => 'OAM',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '197726232.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:47:29',
            ),
            6 => 
            array (
                'id' => 9,
                'index_no' => 7,
                'partner_name' => 'Lycamobile',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '591186193.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:48:06',
            ),
            7 => 
            array (
                'id' => 10,
                'index_no' => 8,
                'partner_name' => 'BAGBNB',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '2104616594.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:49:03',
            ),
            8 => 
            array (
                'id' => 11,
                'index_no' => 9,
                'partner_name' => 'SAMSUNG',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1776168978.png',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:49:33',
            ),
            9 => 
            array (
                'id' => 12,
                'index_no' => 10,
                'partner_name' => 'IMBALLAGGI2000',
                'partner_name_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1012184613.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:51:03',
            ),
        ));
        
        
    }
}