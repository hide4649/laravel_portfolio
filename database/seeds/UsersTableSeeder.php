<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     'name' => 'hide',
        //     'email' => 'hide@yahoo.co.jp',
        //     'password' => 26311976
        // ]);

        DB::table('users')->truncate();
    }
}
