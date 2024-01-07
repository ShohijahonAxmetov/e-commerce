<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make(123123)
            ]
        ];

        foreach ($data as $item) {
            if (!Admin::find($item['id'])) Admin::create($item);
        }
    }
}
