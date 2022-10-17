<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Admin => 
        User => 
        */

        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        //Permission::create(['name' => 'login'])->syncRoles([$admin, $user]);
        
        Permission::create(['name' => 'users.store'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'logout'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'users.list'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.winner'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.loser'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.ranks'])->syncRoles([$admin]);
        Permission::create(['name' => 'games.list'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'users.game'])->syncRoles([$admin, $user]);
        Permission::create(['name' => 'games.delete'])->syncRoles([$admin, $user]);


    }
    
}
