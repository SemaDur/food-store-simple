<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name' => 'Cola',
                'price' => '3',
                'description' => 'Obicna Cola',
                'image' => 'cola.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Sprite',
                'price' => '3',
                'description' => 'Good old Sprite',
                'image' => 'sprite.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pileca Supa',
                'price' => '4',
                'description' => 'Lagana pileca supa',
                'image' => 'supapileca.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pizza Margarita',
                'price' => '10',
                'description' => 'Pizza sa sirom paradajz sosa',
                'image' => 'pizzamarg.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Doner Durum',
                'price' => '7',
                'description' => 'Doner zamotan arabskom lepinom',
                'image' => 'donerdurum.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Torta Schwarzwald',
                'price' => '4',
                'description' => 'Komad schwarzwald torte, cokoloda itd',
                'image' => 'torschwarzwald.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jabuka Kolac',
                'price' => '4',
                'description' => 'Kolac od jabuke',
                'image' => 'koljabuka.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cesar Salata',
                'price' => '5',
                'description' => 'Pileca salata',
                'image' => 'cesarsalat.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]


        ]);
    }
}
