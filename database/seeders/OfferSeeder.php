<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{Service, Offer};

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::onlyActive()->get();

        Offer::create([
            'name'        => 'Custom cleaning',
            'slug'        => Str::slug('Custom cleaning'),
            'description' => '',
            'active'      => true
        ]);

        Offer::factory()->count(3)->create()->each(function ($offer) use ($services) {
            $offer->services()->attach(
                $services->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
