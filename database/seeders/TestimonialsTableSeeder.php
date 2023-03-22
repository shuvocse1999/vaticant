<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index_no' => 101,
                'description' => 'This Is Quite Good',
                'description_italic' => 'Thastre good simpre',
                'client_name' => 'Abdul Mannan',
                'designation' => 'CEO',
                'image' => '1466078130.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 04:24:24',
            ),
            1 => 
            array (
                'id' => 2,
                'index_no' => 2,
                'description' => 'I Have A Great Experience With That',
                'description_italic' => NULL,
                'client_name' => 'Asadur Rahman Tareq',
                'designation' => 'Manager',
                'image' => '723052044.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 04:25:30',
            ),
            2 => 
            array (
                'id' => 3,
                'index_no' => 3,
                'description' => 'This Project Was Good',
                'description_italic' => NULL,
                'client_name' => 'Sumsul Karim Chowdhury',
                'designation' => 'Developer',
                'image' => '384882440.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-15 04:26:23',
            ),
        ));
        
        
    }
}