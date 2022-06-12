<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Feature;
use App\Models\Service;
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
        

        Advantage::create([
            'image' => 'img/icon.png',
            'advantage' => 'For Web Design',
        ]);

        Advantage::create([
            'image' => 'img/icon.png',
            'advantage' => 'Coding Tutorials',
        ]);

        Advantage::create([
            'image' => 'img/icon.png',
            'advantage' => 'HD Templates',
        ]);



        // Service::create([
        //     'image' => 'img-seeder/logobranding.png',
        //     'title' => 'Logo Branding',
        // ]);

        // Service::create([
        //     'image' => 'img-seeder/designfeedinstagram.png',
        //     'title' => 'Design Feed Instagram',
        // ]);

        // Service::create([
        //     'image' => 'img-seeder/digitalmarketing.png',
        //     'title' => 'Digital Marketing',
        // ]);

        // Service::create([
        //     'image' => 'img-seeder/icon.png',
        //     'title' => 'Social Media Management',
        // ]);

        // Service::create([
        //     'image' => 'img-seeder/marketingcommunications.png',
        //     'title' => 'Marketing Communications',
        // ]);
    }
}
