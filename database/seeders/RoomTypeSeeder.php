<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Bedroom'],
            ['name' => 'Bathroom'],
            ['name' => 'Kitchen'],
            ['name' => 'Living room'],
            ['name' => 'Garage'],
            ['name' => 'Backyard'],
        ];

        RoomType::onWriteConnection()->insertOrIgnore($data);
    }
}
