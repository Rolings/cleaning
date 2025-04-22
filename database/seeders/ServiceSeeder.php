<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdditionalService;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $additionalServices = AdditionalService::onlyActive()->get();

        Service::factory()->count(3)->create()->each(function ($service) use ($additionalServices) {
            $service->additional()->attach(
                $additionalServices->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
