<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // firstOrCreate (not updateOrCreate): the seeder runs on every deploy, and must not
        // reset a password the admin has already changed in Admin > Settings.
        $admin = User::firstOrCreate(
            ['email' => 'admin@rolliepods.com'],
            [
                'full_name' => 'Rolliepods Admin',
                'password_hash' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        if (Post::count() === 0) {
            Post::create([
                'title' => 'Quiet hours',
                'card_color' => 'orange',
                'content' => "Shhh... someone's recharging.\nQuiet hours are from 10:00 PM to 7:00 AM. Let everyone rest peacefully.",
                'author_id' => $admin->user_id,
                'is_published' => true,
            ]);

            Post::create([
                'title' => 'Lighten your load',
                'card_color' => 'blue',
                'content' => 'Please clean the area after use and keep laundry moving for the next person.',
                'author_id' => $admin->user_id,
                'is_published' => true,
            ]);

            Post::create([
                'title' => 'Welcome, new tenants',
                'card_color' => 'green',
                'content' => 'Say hi to our newest pod mates. Good spaces, good people.',
                'author_id' => $admin->user_id,
                'is_published' => true,
            ]);
        }
    }
}
