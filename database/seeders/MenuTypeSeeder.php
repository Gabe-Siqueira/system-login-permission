<?php

namespace Database\Seeders;

use App\Models\MenuType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuType::updateOrCreate([
            'name' => 'menu',
            'created_at' => now(),
        ]);

        MenuType::updateOrCreate([
            'name' => 'submenu',
            'created_at' => now(),
        ]);

        MenuType::updateOrCreate([
            'name' => 'tela',
            'created_at' => now(),
        ]);
    }
}
