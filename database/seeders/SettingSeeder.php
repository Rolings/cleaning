<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['key' => 'contact_phone', 'value' => '+012 345 67890',],
            ['key' => 'contact_email', 'value' => 'info@example.com'],
            ['key' => 'contact_facebook', 'value' => 'https://www.facebook.com/'],
            ['key' => 'contact_twitter', 'value' => 'https://twitter.com/'],
            ['key' => 'contact_instagram', 'value' => 'https://www.instagram.com/'],
            ['key' => 'contact_youtube', 'value' => 'https://www.youtube.com/'],
            ['key' => 'contact_linkedin', 'value' => 'https://www.linkedin.com/'],
            ['key' => 'about_title', 'value' => '10 Years Experience'],
            ['key' => 'about_description', 'value' => "
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.</p>
            "],
            ['key' => 'choose_us_title', 'value' => 'Expert Cleaners and World Class Services',],
            ['key' => 'choose_us_description', 'value' => "<p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
            </p>",],
            ['key' => 'contact_phone', 'value' => '+012 345 67890',],

        ];

        foreach ($data as $item) {
            Setting::create($item);
        }
    }
}
