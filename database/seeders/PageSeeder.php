<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            'about.index',
            'contact.index',
            'projects.index',
            'services.index',
            'frequently-questions.index',
            'reviews.index',
            'privacy.policy',
            'terms.condition',
            'cookies'
        ];

        Page::factory()
            ->count(count($pages))
            ->state(new Sequence(function () use (&$pages) {
                return ['page' => array_pop($pages)];
            }))
            ->create();
    }
}
