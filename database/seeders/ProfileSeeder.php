<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::updateOrCreate([
            'name' => 'root',
            'created_at' => now(),
        ]);

        Profile::updateOrCreate([
            'name' => 'admin',
            'created_at' => now(),
        ]);

        Profile::updateOrCreate([
            'name' => 'user',
            'created_at' => now(),
        ]);
    }
}
