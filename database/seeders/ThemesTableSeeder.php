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
        
        
        $blockchainUserId = 27;

        // Seed themes
        Theme::create([
            'name' => 'Blockchain',
            'description' => 'A decentralized and distributed digital ledger technology that ensures secure, transparent, and tamper-proof transactions across multiple parties without the need for a central authority.',
            'user_id' => $blockchainUserId, // Linking to the user
        ]);//

       

        
    }
}
