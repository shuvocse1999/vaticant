<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfferInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('offer_infos')->delete();
        
        \DB::table('offer_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index_no' => 1,
                'offer_name' => 'BLACK FRIDAY',
                'offer_name_italic' => NULL,
                'description' => '30% DISCOUNT FOR THIS BLACK FRIDAY',
                'description_italic' => NULL,
                'image' => '1390973240.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 06:50:25',
            ),
        ));
        
        
    }
}