<?php

namespace Database\Seeders;

use App\Models\Callback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Callback::factory()->count(5)->create();
    }
}
