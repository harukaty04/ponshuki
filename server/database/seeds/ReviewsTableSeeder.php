<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('reviews')->insert([
                'user_id'          => 1,
                'title'            => "ねぶた",
                'content'          => "おいしい！！！！！！！！！！",
                'taste_intensity'  => 3,
                'scent_strength'   => 5,
                'evaluation'       => 5,
                'image'            => null,
            ]);
        }
    }
}
