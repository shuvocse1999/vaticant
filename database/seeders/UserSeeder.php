<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'admin_id'=>'ADM-000001',
            'user_type'=>'Super Admin',
            'name'=>'SBIT',
            'email'=>'info@sbit.com.bd',
            'password'=>Hash::make('123'),
            'pass_recover'=>'123',
            'status'=>1,
            'image'=>'0',
        ]);
    }
}
