<?php

namespace Database\Seeders;

use App\Enums\User\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    const ADMIN_PASSWORD = 'jk67e!Js4o4';

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
                'password' => Hash::make(self::ADMIN_PASSWORD),
            ]);

        User::factory()->count(25)
            ->sequence(function (Sequence $sequence) {
                return [
                    'top' => $sequence->index < 4,
                ];
            })
            ->create([
                'type' => UserTypeEnum::EMPLOYEES->value
            ]);

        User::factory()->count(150)->create([
            'type' => UserTypeEnum::CLIENT->value
        ]);
    }
}
