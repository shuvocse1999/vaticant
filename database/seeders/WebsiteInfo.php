<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_infos')->insert([
            'title_en'=>'Vetican Multi Service',
            'phone'=>'01800000000',
            'email'=>'info@sbit.com.bd',
            'logo'=>'logo.png',
            'favicon'=>'favicon.png',
        ]);
    }
}
