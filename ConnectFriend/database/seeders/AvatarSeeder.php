<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Avatar;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avatar::factory()->createMany([
            [
                'id' => 1,
                'AvatarName' => 'Avatar 1',
                'AvatarImage' => './profile_picture/Profile1.png',
                'AvatarPrice' => 1000,
            ],
            [
                'id' => 2,
                'AvatarName' => 'Avatar 2',
                'AvatarImage' => './profile_picture/Profile2.png',
                'AvatarPrice' => 2000,
            ],
            [
                'id' => 3,
                'AvatarName' => 'Avatar 3',
                'AvatarImage' => './profile_picture/Profile3.png',
                'AvatarPrice' => 3000,
            ],
            [
                'id' => 4,
                'AvatarName' => 'Avatar 4',
                'AvatarImage' => './profile_picture/Profile4.png',
                'AvatarPrice' => 4000,
            ],
            [
                'id' => 5,
                'AvatarName' => 'Avatar 5',
                'AvatarImage' => './profile_picture/Profile5.png',
                'AvatarPrice' => 5000,
            ],
            [
                'id' => 6,
                'AvatarName' => 'Avatar 6',
                'AvatarImage' => './profile_picture/Profile6.png',
                'AvatarPrice' => 6000,
            ]
        ]);
    }
}
