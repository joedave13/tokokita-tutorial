<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Buku Sketsa',
                'price' => 100,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam nostrum quaerat doloribus mollitia, quidem, dolores culpa modi asperiores, voluptatum ad hic? Quo, beatae similique ad labore unde dignissimos accusantium perferendis atque reprehenderit. Earum qui cupiditate veniam a maiores, rem harum mollitia fugit doloremque quibusdam? Doloribus soluta ea eaque repellendus beatae!'
            ],
            [
                'name' => 'Mug',
                'price' => 300,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, quam! Illo esse sequi quia perspiciatis, distinctio aut facere numquam veniam.'
            ]
        ];

        foreach ($products as $key => $value) {
            Product::query()->create($value);
        }
    }
}
