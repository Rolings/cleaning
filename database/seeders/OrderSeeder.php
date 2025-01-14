<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = Offer::onlyActive()->get();

        Order::factory()->count(3)->create([
            'offer_id' => $offers->random()->id,
        ]);
    }
}
