<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission';

    protected $fillable = [
        'id_menu',
        'name',
    ];

    public function user()
    {
        return $this->hasMany(UserPermission::class, 'id_permission', 'id');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id_menu', 'id');
    }
}
