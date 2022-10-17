<?php

namespace Database\Seeders;

use App\Models\Jdata;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = ([
            'name' => 'admin',
            'email' => 'admin@admin.net',
            'password' => '123456',
        ]);
       $user = User::create([

            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456
        ]);
        
        $user->assignRole(['admin']);

        $user->createToken('apptoken')->accessToken;

        Jdata::create(['user_id' => $user['id']]);



        $fields = ([
            'name' => 'user1',
            'email' => 'p1@admin.net',
            'password' => '123456',
        ]);
        
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456
            

        ]);
        $user->createToken('apptoken')->accessToken;

        $user->assignRole(['user']);

        Jdata::create(['user_id' => $user['id']]);
      


        $fields = ([
            'name' => 'user2',
            'email' => 'p2@admin.net',
            'password' => '123456',
        ]);
        $user = User::create([

            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456

        ]);
        $user->createToken('apptoken')->accessToken;

        $user->assignRole(['user']);

        Jdata::create(['user_id' => $user['id']]);
      


        $fields = ([
            'name' => 'user3',
            'email' => 'p3@admin.net',
            'password' => '123456',
        ]);
        $user = User::create([

            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']), // 123456

        ]);
        $user->createToken('apptoken')->accessToken;

        $user->assignRole(['user']);

        Jdata::create(['user_id' => $user['id']]);
    }
}
