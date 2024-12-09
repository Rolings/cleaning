<?php

namespace Database\Seeders;

use App\Models\TermCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermCondition::insert([
            [
                'title'       => 'Terms & Conditions',
                'slug'        => 'terms-condition',
                'description' => "",
            ],
            [
                'title'       => 'Privacy Policy',
                'slug'        => 'privacy-policy',
                'description' => "",
            ],
            [
                'title'       => 'Cookies',
                'slug'        => 'cookies',
                'description' => "",
            ]
        ]);
    }
}
