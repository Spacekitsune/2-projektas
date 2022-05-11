<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Status;
use App\Models\Priority;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StatusSeeder::class,
            PrioritySeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class           
        ]);
    }
}
