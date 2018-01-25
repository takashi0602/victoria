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
        for ($i = 1; $i <= 50; $i++) {
            DB::table('tweets')->insert([
                'tweet' => $i,
                'created_at' => date("Y/m/d H:i:s", strtotime('+' . $i . ' day')),
            ]);
        }
    }
}
