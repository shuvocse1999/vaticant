<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_infos')->delete();
        
        \DB::table('blog_infos')->insert(array (
            0 => 
            array (
                'id' => 2,
                'index_no' => 1,
                'blog_title' => 'How to Code a Scrolling “Alien Lander” Website',
                'blog_title_italic' => NULL,
                'description' => 'We’ll be putting things together so that as you scroll down from the top of the page you’ll see an “Alien Lander” making its way to touch down.',
                'description_italic' => NULL,
                'image' => '908057789.png',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:23:07',
            ),
            1 => 
            array (
                'id' => 3,
                'index_no' => 2,
                'blog_title' => 'How to Create a “Stranger Things” Text Effect in Adobe Photoshop',
                'blog_title_italic' => NULL,
                'description' => 'We’ll be putting things together so that as you scroll down from the top of the page you’ll see an “Alien Lander” making its way to touch down.',
                'description_italic' => NULL,
                'image' => '1316112140.jpg',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:24:16',
            ),
            2 => 
            array (
                'id' => 4,
                'index_no' => 3,
                'blog_title' => '5 Inspirational Business Portraits and How to Make Your Own',
                'blog_title_italic' => NULL,
                'description' => 'We’ll be putting things together so that as you scroll down from the top of the page you’ll see an “Alien Lander” making its way to touch down.',
                'description_italic' => NULL,
                'image' => '2102415572.jpg',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:25:02',
            ),
            3 => 
            array (
                'id' => 5,
                'index_no' => 4,
                'blog_title' => 'Notes From Behind the Firewall: The State of Web Design in China',
                'blog_title_italic' => NULL,
                'description' => 'Description Goes Here',
                'description_italic' => NULL,
                'image' => '1321751419.png',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:26:40',
            ),
            4 => 
            array (
                'id' => 6,
                'index_no' => 5,
                'blog_title' => 'How much is the fee for international money transfers?',
                'blog_title_italic' => NULL,
                'description' => 'The fees for international money transfers may significantly vary depending on the bank in your home country. We strongly recommend that you ask your bank directly before transferring the required blocked amount to make sure that the blocked account will be covered in total. Please note that we can not issue the blocking confirmation unless the full required amount has been covered in total.
As soon as the money is credited to your account, you will be notified automatically by email and the blocking confirmation will be made available for download in the \'Documents\' section of the Fintiba web application.',
                'description_italic' => NULL,
                'image' => '688830187.jpg',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:31:00',
            ),
            5 => 
            array (
                'id' => 7,
                'index_no' => 6,
                'blog_title' => 'What is meant by money exchange?',
                'blog_title_italic' => NULL,
                'description' => '“Currency Exchange or Foreign Currency Exchange” – means advertising, soliciting, or accepting for a fee the currency or other negotiable instrument denominated in the currency of one government in exchange for the currency or other negotiable instrument denominated in the currency of another government.',
                'description_italic' => NULL,
                'image' => '2100290693.jpg',
                'admin_id' => 'ADM-000001',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 01:32:57',
            ),
        ));
        
        
    }
}