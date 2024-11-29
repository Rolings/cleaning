<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = Service::all();

        Order::factory()->count(500)->create([
            'service_id' => $service->random()->id,
        ]);
    }
}
