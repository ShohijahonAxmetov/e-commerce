<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'Smartphones'
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'Apple smartphones'
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'name' => 'Samsung smartphones'
            ],
            [
                'id' => 4,
                'parent_id' => null,
                'name' => 'Autos'
            ],
            [
                'id' => 5,
                'parent_id' => 4,
                'name' => 'Legkie auto'
            ],
            [
                'id' => 6,
                'parent_id' => null,
                'name' => 'Napitki'
            ],
            [
                'id' => 7,
                'parent_id' => 6,
                'name' => 'Semya Coca Cola'
            ],
        ];

        foreach($data as $item) {
            if (!Category::find($item['id'])) Category::create($item);
        }
    }
}
