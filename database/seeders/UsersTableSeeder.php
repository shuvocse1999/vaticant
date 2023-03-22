<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'admin_id' => 'ADM-000001',
                'user_type' => 'Super Admin',
                'name' => 'SBIT',
                'fathers_name' => NULL,
                'mothers_name' => NULL,
                'email' => 'info@sbit.com.bd',
                'phone' => '01575434262',
                'designation' => 'Trainer',
                'address' => 'Feni',
                'email_verified_at' => NULL,
                'password' => '$2y$10$83AdRgda9ywsU6kzyfkPiOfmIULF1bbv2qv0By3U.7HkDMflymhju',
                'pass_recover' => '123',
                'status' => 1,
                'image' => 'ADM-000001.jpg',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'admin_id' => 'ADM-000002',
                'user_type' => 'Super Admin',
                'name' => 'Tazim',
                'fathers_name' => NULL,
                'mothers_name' => NULL,
                'email' => 'tjm4181@gmail.com',
                'phone' => '01900000000',
                'designation' => NULL,
                'address' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$dV1FCFW43x7gm5KIuUQeOOMBl.ekPJuEDi72lyVremyXKoU/g2EA6',
                'pass_recover' => '2023@123',
                'status' => 1,
                'image' => 'ADM-000002.jpg',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'admin_id' => 'ADM-000003',
                'user_type' => 'Super Admin',
                'name' => 'Vatican',
                'fathers_name' => NULL,
                'mothers_name' => NULL,
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'phone' => NULL,
                'designation' => NULL,
                'address' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$kZfHfv945ZeIa6/KS.EstepkUNxzNCeONKnCJbhYJNU0V4J8H7y12',
                'pass_recover' => '12345678',
                'status' => 1,
                'image' => 'ADM-000003.png',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}