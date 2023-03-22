<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faqs')->delete();
        
        \DB::table('faqs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index_no' => 1,
                'questions' => 'WHERE IS PRINT SHOP IN ROME?',
                'questions_italic' => 'DOVE SI TROVA LA TIPOGRAFIA A ROMA?',
                'answer' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'answer_italic' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'status' => 1,
                'created_at' => '2023-02-15 05:44:29',
                'updated_at' => '2023-02-26 18:53:18',
            ),
            1 => 
            array (
                'id' => 2,
                'index_no' => 2,
                'questions' => 'WHERE IS WESTERN UNION IN ROME?',
                'questions_italic' => 'DOV\'È WESTERN UNION A ROMA?',
                'answer' => 'Piazza dei Cinquecento, 43, 00185 Roma RM, Italy',
                'answer_italic' => 'Piazza dei Cinquecento, 43, 00185 Roma RM, Italy',
                'status' => 1,
                'created_at' => '2023-02-15 05:48:01',
                'updated_at' => '2023-02-26 19:35:15',
            ),
            2 => 
            array (
                'id' => 3,
                'index_no' => 3,
                'questions' => 'WHERE IS MONEYGRAM?',
                'questions_italic' => 'DOV\'È MONEYGRAM?',
                'answer' => 'MoneyGram Via Gioberti, 11 · +39 06 488 0363',
                'answer_italic' => 'MoneyGram Via Gioberti, 11 · +39 06 488 0363',
                'status' => 1,
                'created_at' => '2023-02-26 18:52:17',
                'updated_at' => '2023-02-26 18:52:17',
            ),
            3 => 
            array (
                'id' => 4,
                'index_no' => 4,
                'questions' => 'WHERE IS AMAZON PAYMENT?',
                'questions_italic' => 'DOV\'È IL PAGAMENTO AMAZON?',
                'answer' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'answer_italic' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'status' => 1,
                'created_at' => '2023-02-26 19:37:55',
                'updated_at' => '2023-02-26 19:37:55',
            ),
            4 => 
            array (
                'id' => 5,
                'index_no' => 5,
                'questions' => 'WHERE IS SIM CARDS SHOP?',
                'questions_italic' => 'DOV\'È SIM CARD SHOP?',
                'answer' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'answer_italic' => 'METRO OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'status' => 1,
                'created_at' => '2023-02-26 19:43:38',
                'updated_at' => '2023-02-26 19:43:38',
            ),
            5 => 
            array (
                'id' => 6,
                'index_no' => 6,
                'questions' => 'WHERE IS COLOSSEIUM VATICAN TKT?',
                'questions_italic' => 'DOV\'È IL COLOSSEO VATICANO TKT?',
                'answer' => 'Via Ulpiano, 43, 00193 Roma RM, Italy',
                'answer_italic' => 'Via Ulpiano, 43, 00193 Roma RM, Italy',
                'status' => 1,
                'created_at' => '2023-02-26 19:49:18',
                'updated_at' => '2023-02-26 19:49:18',
            ),
            6 => 
            array (
                'id' => 7,
                'index_no' => 7,
                'questions' => 'WHERE IS DHL SHIPPING  UPS POINT?',
                'questions_italic' => 'DOVE SI TROVA DHL SHIPPING PUNTO DI SALITA?',
                'answer' => 'Via Ulpiano, 43, 00193 Roma RM, Italy',
                'answer_italic' => 'Via Ulpiano, 43, 00193 Roma RM, Italy',
                'status' => 1,
                'created_at' => '2023-02-26 19:50:29',
                'updated_at' => '2023-02-26 19:50:29',
            ),
            7 => 
            array (
                'id' => 8,
                'index_no' => 8,
                'questions' => 'WHERE IS MOBILE ACCESSORIES STORE?',
                'questions_italic' => 'DOV\'È MOBILE ACCESSORIES STORE?',
                'answer' => 'Ulpiano, 43, 00193 Roma RM, Italy',
                'answer_italic' => 'Ulpiano, 43, 00193 Roma RM, Italy',
                'status' => 1,
                'created_at' => '2023-02-26 19:52:14',
                'updated_at' => '2023-02-26 19:52:14',
            ),
            8 => 
            array (
                'id' => 9,
                'index_no' => 9,
                'questions' => 'WHERE IS SHOPPING MATERIAL IN ROME?',
                'questions_italic' => 'DOV\'È IL MATERIALE PER LO SHOPPING A ROMA?',
                'answer' => 'OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'answer_italic' => 'OTTAVIANO
VIA OSTIA 4 00192 ROME',
                'status' => 1,
                'created_at' => '2023-02-26 19:53:28',
                'updated_at' => '2023-02-26 19:53:28',
            ),
        ));
        
        
    }
}