<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotoGalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photo_galleries')->delete();
        
        \DB::table('photo_galleries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index_no' => 1,
                'title' => 'T',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '678216125.jpg',
                'slider' => 1,
                'photo_gallery' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 07:04:55',
            ),
            1 => 
            array (
                'id' => 3,
                'index_no' => 101,
                'title' => 'Title In English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1014889452.jpg',
                'slider' => 1,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 07:04:51',
            ),
            2 => 
            array (
                'id' => 4,
                'index_no' => 102,
                'title' => 'Title In English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1742489693.jpg',
                'slider' => 1,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:44:31',
            ),
            3 => 
            array (
                'id' => 5,
                'index_no' => 103,
                'title' => 'Title In English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1602846053.webp',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:43:31',
            ),
            4 => 
            array (
                'id' => 6,
                'index_no' => 104,
                'title' => 'Title In English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1529209420.jpg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 01:44:18',
            ),
            5 => 
            array (
                'id' => 7,
                'index_no' => 2,
                'title' => 'Title in English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1763542296.jpg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:44:24',
            ),
            6 => 
            array (
                'id' => 8,
                'index_no' => 3,
                'title' => 'Title in English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1925555062.jpeg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 03:18:47',
            ),
            7 => 
            array (
                'id' => 9,
                'index_no' => 4,
                'title' => 'Title in English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '2023670176.jpg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 07:06:51',
            ),
            8 => 
            array (
                'id' => 10,
                'index_no' => 5,
                'title' => 'Title In English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '852682080.jpg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 07:06:55',
            ),
            9 => 
            array (
                'id' => 11,
                'index_no' => 6,
                'title' => 'Title in English',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1160024805.jpg',
                'slider' => 0,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 17:42:42',
            ),
            10 => 
            array (
                'id' => 12,
                'index_no' => 21,
                'title' => 'ULPIANO',
                'title_italic' => NULL,
                'description' => NULL,
                'description_italic' => NULL,
                'image' => '1015298643.jpeg',
                'slider' => 1,
                'photo_gallery' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 03:17:29',
            ),
        ));
        
        
    }
}