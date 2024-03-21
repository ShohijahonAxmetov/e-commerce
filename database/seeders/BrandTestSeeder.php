<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => [
                    'ru' => 'Coca Cola'
                ]
            ],
            [
                'id' => 2,
                'name' => [
                    'ru' => 'Apple'
                ]
            ],
            [
                'id' => 3,
                'name' => [
                    'ru' => 'Samsung'
                ]
            ],
            [
                'id' => 4,
                'name' => [
                    'ru' => 'Tesla'
                ]
            ],
        ];

        foreach($data as $item) {
            if (!Brand::find($item['id'])) Brand::create($item);
        }
    }
}
