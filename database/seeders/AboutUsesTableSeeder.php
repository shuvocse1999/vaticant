<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutUsesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('about_uses')->delete();
        
        \DB::table('about_uses')->insert(array (
            0 => 
            array (
                'id' => 1,
            'description' => '<span style="color: rgb(68, 68, 68);">Vatican Multiservice Point is a company built in 2009, We worked with many services like Print, Book binding, Scanning, Plasticization, Fototessera for documents, Shipping service DHL, UPS, FEDEX. Exclusive mobile cover, glass, electronic accessories, packaging materials, Tourist information, Flixbus, Airport Shuttle, Change, Money Transfer, etc. We are highly skilled on this sector, and working long term, Customer satisfactions is our main goal, Don’t hesitate to contact with us!!!</span><br>',
                'created_at' => NULL,
                'updated_at' => '2023-02-15 05:01:20',
            ),
        ));
        
        
    }
}