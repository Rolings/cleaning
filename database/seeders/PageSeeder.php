<?php

namespace Database\Seeders;

use App\Http\Middleware\MetaDataMiddleware;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = array_values(array_filter(array_map(function ($route) {
            if (in_array(MetaDataMiddleware::class, $route->middleware()) && strripos($route->getName(), '.index') !== false) {
                return $route->uri;
            }
        }, Route::getRoutes()->getRoutes()), function ($route) {
            return !is_null($route);
        }));

        Page::factory()
            ->count(count($pages))
            ->sequence(function (Sequence $sequence) use ($pages) {
                return [
                    'name' => $this->unSlug($pages[$sequence->index]),
                    'slug' => $pages[$sequence->index]
                ];

            })
            ->create();
    }

    /**
     * @param string $slug
     * @return string
     */
    private function unSlug(string $slug): string
    {
        return ucwords(str_replace('-', ' ', $slug));
    }
}
