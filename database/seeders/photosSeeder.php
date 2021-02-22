<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class photosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_promotion_photo')->insert([
            [
              'id' => '1',
              'url' => 'https://optolapp.com/fotosqpomborrar/hotel.jpg',
              'id_promotion' => '1',
            ],
            [
              'id' => '2',
              'url' => 'https://optolapp.com/fotosqpomborrar/hotel2.jpg',
              'id_promotion' => '1',
            ],
            [
              'id' => '3',
              'url' => 'https://optolapp.com/fotosqpomborrar/carro2.jpg',
              'id_promotion' => '3',
            ],
            [
              'id' => '4',
              'url' => 'https://optolapp.com/fotosqpomborrar/donas.jpg',
              'id_promotion' => '2',
            ],
            [
              'id' => '5',
              'url' => 'https://optolapp.com/fotosqpomborrar/donas2.jpg',
              'id_promotion' => '2',
            ],
            [
              'id' => '6',
              'url' => 'https://optolapp.com/fotosqpomborrar/carro.jpg',
              'id_promotion' => '3',
            ],
            [
              'id' => '7',
              'url' => 'https://optolapp.com/fotosqpomborrar/cabello.jpg',
              'id_promotion' => '4',
            ],
            [
              'id' => '8',
              'url' => 'https://optolapp.com/fotosqpomborrar/peluqueria2.jpg',
              'id_promotion' => '4',
            ],
            [
              'id' => '9',
              'url' => 'https://optolapp.com/fotosqpomborrar/habitacion.png',
              'id_promotion' => '5',
            ],
            [
              'id' => '10',
              'url' => 'https://optolapp.com/fotosqpomborrar/habitacion2.jpg',
              'id_promotion' => '5',
            ]
        ]);
    }
}
