<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu = $menu->get()->toArray();

        foreach ($menu as $key => $value) {
            Permission::updateOrCreate([
                'id_menu' => $value['id'],
                'name' => $value['name'],
            ]);
        }

    }
}
