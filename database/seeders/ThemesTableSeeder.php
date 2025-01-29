<?php

namespace Database\Seeders;
use App\Models\Theme;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        
        $ITUserId = 13;
        $IoTUserId = 15;

        // Seed themes
        Theme::create([
            'name' => 'IoT',
            'description' => 'Internet of Things, connecting physical devices to collect and exchange data',
            'user_id' => $IoTUserId, // Linking to the user
        ]);//

        Theme::create([
            'name' => 'IT',
            'description' => 'The development of computer systems that can perform tasks that typically require human intelligence',
            'user_id' => $ITUserId, // Linking to the user
        ]);//

        
    }
}
