<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactUsesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_uses')->delete();
        
        \DB::table('contact_uses')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Sumsul Karim',
                'email' => 'prireq@gmail.com',
                'phone' => '01575434262',
                'message' => 'dsafdsf',
                'created_at' => '2023-02-15 09:42:03',
                'updated_at' => '2023-02-15 09:42:03',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Sumon Vai',
                'email' => 'moreinfo.sbit@gmail.com',
                'phone' => '01575434262',
                'message' => 'TEST',
                'created_at' => '2023-02-15 09:47:07',
                'updated_at' => '2023-02-15 09:47:07',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'Asad',
                'email' => 'prireq@gmail.com',
                'phone' => '01575434262',
                'message' => 'TEXT',
                'created_at' => '2023-02-15 10:13:24',
                'updated_at' => '2023-02-15 10:13:24',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'Nazim',
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'phone' => '3894707089',
                'message' => 'hello we are coming for pri ting',
                'created_at' => '2023-02-28 03:45:30',
                'updated_at' => '2023-02-28 03:45:30',
            ),
        ));
        
        
    }
}