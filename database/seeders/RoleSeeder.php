<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- For Admin --- \\ 
        DB::table('users')->insert([
            'email'   =>'admin@jhnnews.com',
            'name'    =>'Admin',
            'usertype' =>'admin',
            'is_verified' =>'1',
            'password'=>Hash::make('Admin@1234') // <---- check this
        ]);

        DB::table('users')->insert([
            'email'   =>'test@jhnnews.com',
            'name'    =>'Admin',
            'usertype' =>'admin',
            'is_verified' =>'1',
            'password'=>Hash::make('Test@1234') // <---- check this
        ]);

        // --- For BC --- \\
        DB::table('users')->insert([
            'email'   =>'bc@jhnnews.com',
            'name'    =>'BC',
            'usertype' =>'bc',
            'is_verified' =>'1',
            'password'=>Hash::make('Bc@1234') // <---- check this
        ]);

        // --- For Reporter --- \\
        DB::table('users')->insert([
            'email'   =>'reporter@jhnnews.com',
            'name'    =>'Reporter',
            'usertype' =>'reporter',
            'is_verified' =>'1',
            'password'=>Hash::make('Reporter@1234') // <---- check this
        ]);

        // --- Editor --- \\
        DB::table('users')->insert([
            'email'   =>'editor@jhnnews.com',
            'name'    =>'Editor',
            'usertype' =>'editor',
            'is_verified' =>'1',
            'password'=>Hash::make('Editor@1234') // <---- check this
        ]);

        // --- Dummy User --- \\
        DB::table('users')->insert([
            'email'   =>'user@jhnnews.com',
            'name'    =>'User',
            'usertype' =>'user',
            'is_verified' =>'1',
            'password'=>Hash::make('User@1234') // <---- check this
        ]);
    }
}
