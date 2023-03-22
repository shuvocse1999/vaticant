<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('website_infos')->delete();
        
        \DB::table('website_infos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title_en' => 'Vatican Multi Site',
                'title_italian' => 'Vatican Site',
                'phone' => '3511496463',
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'facebook' => 'https://www.facebook.com/vaticanmultiservice/',
                'instagram' => 'https://www.instagram.com/vaticanmultiservicepoint8/',
                'twitter' => 'https://twitter.com/vaticanservice1?lang=en',
                'youtube' => 'yotube.com',
                'logo' => 'logo.png',
                'favicon' => 'favicon.png',
                'created_at' => NULL,
                'updated_at' => '2023-02-28 07:08:41',
            ),
        ));
        
        
    }
}