<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Demo admin: username "admin" / password "admin123". Change it before going live.
        User::firstOrCreate(
            ['email' => 'admin@rolliepods.com'],
            ['name' => 'admin', 'password' => 'admin123', 'role' => 'admin']
        );

        if (Post::count() === 0) {
            Post::create(['title' => 'Quiet hours', 'card_color' => 'orange', 'content' => "Shhh... someone's recharging.\nQuiet hours are from 10:00 PM to 7:00 AM. Let everyone rest peacefully."]);
            Post::create(['title' => 'Lighten your load', 'card_color' => 'blue', 'content' => 'Please clean the area after use and keep laundry moving for the next person.']);
            Post::create(['title' => 'Welcome, new tenants', 'card_color' => 'green', 'content' => 'Say hi to our newest pod mates. Good spaces, good people.']);
        }
    }
}
