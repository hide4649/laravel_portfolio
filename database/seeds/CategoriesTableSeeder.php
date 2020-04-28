<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ['category_name' => 'HTML'],
            ['category_name' => 'CSS'],
            ['category_name' => 'Javascript'],
            ['category_name' => 'Ruby'],
            ['category_name' => 'PHP'],
            ['category_name' => 'Java'],
        ]);
    }
}
