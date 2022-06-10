<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Vismart Studio',
            'username' => 'vismart_studio',
            'password' => Hash::make('vismart_studio'),
            'remember_token' => NULL
        ]);

        Feature::create([
            'feature' => 'Get more Benefits'
        ]);

        Feature::create([
            'feature' => 'Unlimited Downloads'
        ]);

        Feature::create([
            'feature' => 'Access Premium'
        ]);

        Feature::create([
            'feature' => 'Custom Badges on Profile'
        ]);

        Feature::create([
            'feature' => 'Fast Respond Services'
        ]);
    }
}
