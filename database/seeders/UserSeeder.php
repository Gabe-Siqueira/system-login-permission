<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Root
        $profile = new Profile();
        $profile = $profile->where('name', 'root')->get()->toArray();

        foreach ($profile as $key => $value) {
            User::updateOrCreate([
                'id_profile' => $value['id'],
                'name' => 'root',
                'email' => 'root@root.com',
                'email_verified_at' => now(),
                'password' => bcrypt('P@ssw0rd'),
                'created_at' => now(),
            ]);
        }

        // Admin
        $profile = new Profile();
        $profile = $profile->where('name', 'admin')->get()->toArray();

        foreach ($profile as $key => $value) {
            User::updateOrCreate([
                'id_profile' => $value['id'],
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('P@ssw0rd'),
                'created_at' => now(),
            ]);
        }

        // User
        $profile = new Profile();
        $profile = $profile->where('name', 'user')->get()->toArray();

        foreach ($profile as $key => $value) {
            User::updateOrCreate([
                'id_profile' => $value['id'],
                'name' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' => bcrypt('P@ssw0rd'),
                'created_at' => now(),
            ]);
        }
    }
}
