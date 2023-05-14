<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Anas',
            'last_name' => 'Ibraheem',
            'email' => 'anas@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'active' => 'yes'
        ]);
    }
}
