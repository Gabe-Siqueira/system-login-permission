<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use App\Models\UserMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Usuário',
            'link'=> 'user.index',
            'order' => 1,
        ]);

        $user = User::where('id_profile', 1)->orWhere('id_profile', 2)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }

        // Menu
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Menu',
            'link'=> 'menu.index',
            'order' => 2,
        ]);

        $user = User::where('id_profile', 1)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }

        // Permission
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Permissão',
            'link'=> 'permission.index',
            'order' => 3,
        ]);

        $user = User::where('id_profile', 1)->orWhere('id_profile', 2)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }

        // Course
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Curso',
            'link'=> 'course.index',
            'order' => 1,
        ]);

        $user = User::where('id_profile', 1)->orWhere('id_profile', 3)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }

        // Category
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Categoria',
            'link'=> 'category.index',
            'order' => 1,
        ]);

        $user = User::where('id_profile', 1)->orWhere('id_profile', 3)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }

        // File
        $menu = Menu::updateOrCreate([
            'id_menu_type' => 3,
            'name' => 'Arquivo',
            'link'=> 'file.index',
            'order' => 1,
        ]);

        $user = User::where('id_profile', 1)->orWhere('id_profile', 3)->get();

        foreach ($user as $key => $value) {
            UserMenu::updateOrCreate([
                'id_user' => $value->id,
                'id_menu' => $menu->id,
            ]);
        }
    }
}
