<?php

namespace Database\Seeders;

use App\Enums\User\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(3)
            ->sequence(function (Sequence $sequence) {
                return [
                    'email' => 'admin' . $sequence->index . '@admin.com',
                ];
            })
            ->create([
                'type'     => UserTypeEnum::ADMIN->value,
                'password' => Hash::make('admin'),
            ]);

        User::factory()->count(25)->create([
            'type' => UserTypeEnum::EMPLOYEES->value
        ]);

        User::factory()->count(150)->create([
            'type' => UserTypeEnum::CLIENT->value
        ]);
    }
}
