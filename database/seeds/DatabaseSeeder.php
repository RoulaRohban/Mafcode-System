<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'first_name' => 'Anas',
            'last_name' => 'Ibraheem',
            'email' => 'anas@admin.com',
            'username' => 'anas',
            'phone' => '2226677',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'active' => 'yes'
        ]);


        DB::table('settings')->insert([
            'key' => 'privacy_and_policy',
            'value' => ''
        ]);

        DB::table('settings')->insert([
            'key' => 'contact_us',
            'value' => ''
        ]);

        DB::table('settings')->insert([
            'key' => 'about_us',
            'value' => ''
        ]);

        DB::table('settings')->insert([
            'key' => 'about_app',
            'value' => ''
        ]);


        DB::table('settings')->insert([
            'key' => 'vat_value',
            'value' => ''
        ]);


        DB::table('settings')->insert([
            'key' => 'usage',
            'value' => ''
        ]);

        DB::table('settings')->insert([
            'key' => 'layout_language',
            'value' => 'en'
        ]);


    }
}
