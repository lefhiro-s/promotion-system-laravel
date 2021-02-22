<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_promotion_item')->insert([
            [
                'id' => '1',
                'id_promotion' => '1',
                'price' => '22.0',
                'total_sale' => '2',
                'title' => '2 noches',
                'quantity' => '40',
                'total_pay' => '2.0',
                'comission_site' => '10.0',
            ],
            [
                'id' => '2',
                'id_promotion' => '1',
                'price' => '45.0',
                'total_sale' => '4',
                'title' => '3 noches',
                'quantity' => '10',
                'total_pay' => '4.0',
                'comission_site' => '10.0',
            ],
            [
                'id' => '3',
                'id_promotion' => '2',
                'price' => '8.0',
                'total_sale' => '3',
                'title' => 'Lleva 12 paga 6',
                'quantity' => '20',
                'total_pay' => '3.0',
                'comission_site' => '10.0',
            ],
            [
                'id' => '5',
                'id_promotion' => '3',
                'price' => '100.0',
                'total_sale' => '6',
                'title' => 'Alquiler x 4 días',
                'quantity' => '20',
                'total_pay' => '5.5',
                'comission_site' => '10.0',
            ],
            [
                'id' => '6',
                'id_promotion' => '3',
                'price' => '180.0',
                'total_sale' => '3',
                'title' => 'Alquiler x 8 días',
                'quantity' => '45',
                'total_pay' => '3.0',
                'comission_site' => '10.0',
            ],
            [
                'id' => '7',
                'id_promotion' => '4',
                'price' => '10.0',
                'total_sale' => '2',
                'title' => 'Corte y Secado en Promoción',
                'quantity' => '20',
                'total_pay' => '2.0',
                'comission_site' => '10.0',
            ],
            [
                'id' => '8',
                'id_promotion' => '5',
                'price' => '600.0',
                'total_sale' => '60',
                'title' => 'Habitacion de 30 mts',
                'quantity' => '10',
                'total_pay' => '60.0',
                'comission_site' => '10.0',
            ]
        ]);
    }
}
