<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => 2,
                'post_id' => 4,
                'body' => 'test'
            ],
            [
                'user_id' => 2,
                'post_id' => 4,
                'body' => 'test'
            ],
            [
                'user_id' => 2,
                'post_id' => 4,
                'body' => 'test'
            ],
        
        ]);
    }
} 
