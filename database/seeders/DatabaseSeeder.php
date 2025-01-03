<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateSeeder::class,
            SettingSeeder::class,
            TermConditionSeeder::class,
            PageSeeder::class,
            UserSeeder::class,
            AdditionalServiceSeeder::class,
            ServiceSeeder::class,
            OfferSeeder::class,
            ProjectSeeder::class,
            HistorySeeder::class,
            QuestionSeeder::class,
            ReviewSeeder::class,
            CallbackSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
