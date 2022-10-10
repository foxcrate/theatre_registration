<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('show_times')->insert([
            'time'=>'11:05',
            'event_day_id'=>1,
            'movie_id'=>1
        ]);

        DB::table('show_times')->insert([
            'time'=>'01:05',
            'event_day_id'=>1,
            'movie_id'=>1
        ]);
    }
}
