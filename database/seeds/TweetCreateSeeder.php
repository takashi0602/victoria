<?php

use Illuminate\Database\Seeder;

class TweetCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('tweets')->insert(['tweet' => 'hoge']);
        }
    }
}
