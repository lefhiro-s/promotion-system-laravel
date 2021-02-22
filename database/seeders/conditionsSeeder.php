<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class conditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_promotion_condition')->insert([
            [
                'id' => '1',
                'description' => 'Valido para habitaciones en doble ocupación, dias de semana.',
                'id_promotion' => '1',
            ],
            [
                'id' => '2',
                'description' => 'No aplica para Feriados, puentes ni fines de semana',
                'id_promotion' => '1',
            ],
            [
                'id' => '3',
                'description' => 'Incluye todos los sabores exibidos en la tienda.',
                'id_promotion' => '2',
            ],
            [
                'id' => '4',
                'description' => 'Maximo 2 cupones por comprador.',
                'id_promotion' => '2',
            ],
            [
                'id' => '5',
                'description' => 'Disponibilidad sujeta a disponibilidad de los modelos: Aveo, corsa, spark. Unicamente en caja manual y 5 puertas.',
                'id_promotion' => '3',
            ],
            [
                'id' => '6',
                'description' => 'Aplica para todos los dias bajo previa cita.',
                'id_promotion' => '4',
            ],
            [
                'id' => '7',
                'description' => 'Solo para mayores de edad. Todos los dias desde Lunes a Viernes. No aplica para los dias SAbado y domingo',
                'id_promotion' => '5',
            ]
        ]);
    }
}
