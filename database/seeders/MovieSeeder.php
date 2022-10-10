<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title'=>'superman',
            'ticket_cost'=>110,
            'created_at'=>'2022-10-10'
        ]);

        DB::table('movies')->insert([
            'title'=>'avengers',
            'ticket_cost'=>150,
            'created_at'=>'2022-10-10'
        ]);
    }
}
