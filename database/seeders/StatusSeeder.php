<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'title' => 'To do'
        ]);

        DB::table('statuses')->insert([
            'title' => 'In progress'
        ]);

        DB::table('statuses')->insert([
            'title' => 'Done'
        ]);
    }
}
