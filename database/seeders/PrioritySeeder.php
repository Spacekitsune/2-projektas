<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'title' => 'Low'
        ]);

        DB::table('priorities')->insert([
            'title' => 'Medium'
        ]);

        DB::table('priorities')->insert([
            'title' => 'High'
        ]);
    }
}
