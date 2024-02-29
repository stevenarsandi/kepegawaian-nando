<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('users')->insert([
            'username' => 'Fernando',
            'email' => 'nando@gmail.com',
            'password' => bcrypt('nando')
        ]);
    }
}
