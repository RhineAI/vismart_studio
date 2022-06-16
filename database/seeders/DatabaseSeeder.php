<?php

namespace Database\Seeders;

use App\Models\Advantage;
use App\Models\Feature;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SettingDashboard;
use App\Models\SettingHome;
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
            'description' => 'We make logo for your Web Design'
        ]);

        Advantage::create([
            'image' => 'img/icon.png',
            'advantage' => 'Coding Tutorials',
            'description' => 'We create a tutorial coding for you'
        ]);

        Advantage::create([
            'image' => 'img/icon.png',
            'advantage' => 'HD Templates',
            'description' => 'HD template for your Web Design'
        ]);

        Setting::create([
            'is_landing_page' => true,
            'is_info' => true,
            'is_previllege' => true,
            'is_jasa' => true,
            'is_portofolio' => true,
            'is_testimonial' => true,
            'is_package' => true,
        ]);

        SettingHome::create([
            'landing_page' => true,
            'info' => true,
            'logo_branding' => true,
            'design_feed' => true,
            'digital_marketing' => true,
            'smm' => true,
            'marketing_communications' => true,
            'client' => true,
        ]);

        SettingDashboard::create([
            'clock' => true
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
