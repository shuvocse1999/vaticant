<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopInfosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shop_infos')->delete();
        
        \DB::table('shop_infos')->insert(array (
            0 => 
            array (
                'id' => 2,
                'index_no' => 1,
                'shop_name' => 'Metro Ottaviano',
                'shop_name_italic' => 'Metro Ottaviano',
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'phone' => '390669323760',
                'adress' => 'Via Ostia 4 00192  Rome',
                'adress_italic' => 'VIA OSTIA 4 00192 ROME',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d524.8907469500513!2d12.453277473362403!3d41.909414965730655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f606248f1f0a7%3A0x6693b0de0a7c89d1!2sVia%20Ostia%2C%204%2C%2000192%20Roma%20RM%2C%20Italy!5e0!3m2!1sen!2sbd!4v1675918516263!5m2!1sen!2sbd" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'image' => '1345710787.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 05:11:06',
            ),
            1 => 
            array (
                'id' => 3,
                'index_no' => 2,
                'shop_name' => 'CASTEL SANT\'ANGELO',
                'shop_name_italic' => 'CASTEL SANT\'ANGELO',
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'phone' => '0669323760',
                'adress' => 'VIA ULPIANO 43 00193 ROME',
                'adress_italic' => 'VIA ULPIANO 43 00193 ROME',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d524.9283537689324!2d12.47137883898348!3d41.90484110188288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f6059f127b355%3A0x284f5dd05562f27a!2sVia%20Ulpiano%2C%2043%2C%2000193%20Roma%20RM%2C%20Italy!5e0!3m2!1sen!2sbd!4v1675918596517!5m2!1sen!2sbd" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'image' => '766074514.jpeg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-28 03:53:29',
            ),
            2 => 
            array (
                'id' => 4,
                'index_no' => 3,
                'shop_name' => 'SAINT PETERS E OTTAVIANO',
                'shop_name_italic' => 'SAINT PETERS E OTTAVIANO',
                'email' => 'vaticanmultiservicepoint@gmail.com',
                'phone' => '0683542452',
                'adress' => 'VIA GERMANICO 43 00192 ROME',
                'adress_italic' => 'VIA GERMANICO 43 00192 ROME',
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1212.9085133295002!2d12.456240954626278!3d41.90725431943468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f60611471e4ab%3A0x886e879496d150f1!2sVia%20Germanico%2C%2043%2C%2000192%20Roma%20RM%2C%20Italy!5e0!3m2!1sen!2sbd!4v1675918687500!5m2!1sen!2sbd" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'image' => '755819891.jpg',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2023-02-26 18:04:44',
            ),
        ));
        
        
    }
}