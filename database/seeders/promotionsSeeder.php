<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class promotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_promotion')->insert([ 
            [
                'id' => '1',
                'latitude' => '',
                'longitude' => '',
                'title_long' => 'Pasa la noche en el hotel Sar',
                'title_short' => 'Hotel Savoy',
                'description' => '24 horas con todo incluido, no te lo pierdas',
                'title_main' => 'Noche en el Hotel Savoy con todo incluido',
                'end_time' => '2020-09-09 00:00:00',
                'fech_crea' => '2016-01-01 00:00:00',
                'status' => '1',
                'type' => 'Hoteles',
                'discount' => '-20%',
                'contact_info' => 'Favor llama al 70755658  para reservar tu dia y hora',
                'id_user' => '2',
                'city' => 'lisbon',
            ], 
            [
                'id' => '2',
                'latitude' => '32.6673288',
                'longitude' => '-16.9594723',
                'title_long' => 'Lleva una docena y paga la mitad',
                'title_short' => 'Docena de donas a mitad de precio',
                'description' => 'Lleva 12 donas por el precio de 6, una oferta imperdible',
                'title_main' => 'Docena de donas a mitad de precio !',
                'end_time' => '2021-08-08 00:00:00',
                'fech_crea' => '2018-01-01 00:00:00',
                'status' => '1',
                'type' => 'Restaurantes',
                'discount' => '-32%',
                'contact_info' => 'Fernando Morales, tlf 94625896',
                'id_user' => '2',
                'city' => 'madeira',
            ], 
            [
                'id' => '3',
                'latitude' => '',
                'longitude' => '',
                'title_long' => 'Lleva todo lo necesario en este carro',
                'title_short' => 'Pasea por la isla',
                'description' => 'Kilometraje ilimitado y todos los seguros',
                'title_main' => 'Aveo 4 puertas por 4 dias a mitad de precio',
                'end_time' => '2021-10-18 11:04:00',
                'fech_crea' => '2018-01-01 00:00:00',
                'status' => '1',
                'type' => 'Servicios',
                'discount' => '-50%',
                'contact_info' => 'Antonio Corria 85479965',
                'id_user' => '2',
                'city' => 'portosanto',
            ],
            [
                'id' => '4',
                'latitude' => '32.6673288',
                'longitude' => '-16.9594723',
                'title_long' => 'Corte y secado, a excelente precio',
                'title_short' => 'Ponte bonita con esta promocion',
                'description' => 'Corte de cabello para mujeres o hombres y secado, y solo paga el secado',
                'title_main' => 'Corte y Secado y paga solo el secado',
                'end_time' => '2021-11-11 00:00:00',
                'fech_crea' => '2018-01-01 00:00:00',
                'status' => '1',
                'type' => 'Servicios',
                'discount' => '',
                'contact_info' => 'Puedes llamar para el 75399658',
                'id_user' => '3',
                'city' => 'lisbon',
            ],
            [
                'id' => '5',
                'latitude' => '32.6673288',
                'longitude' => '-16.9594723',
                'title_long' => 'Habitacion de 30 mts',
                'title_short' => 'Habitacion en hotel de lujo',
                'description' => 'Habitacion PRO con jacuzzi y paga sola la habitacion inicial',
                'title_main' => 'Hotel Aladin por 12 horas !',
                'end_time' => '2021-12-12 00:00:00',
                'fech_crea' => '2018-01-01 00:00:00',
                'status' => '1',
                'type' => 'Hoteles',
                'discount' => '-10%',
                'contact_info' => 'Preguntar por Antonio al 07859655',
                'id_user' => '3',
                'city' => 'porto',
            ],
        ]);
    }
}
