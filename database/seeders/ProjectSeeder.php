<?php

namespace Database\Seeders;

use Illuminate\Support\Collection;

use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()->count(10)->create();

        foreach (Project::all() as $project) {
            $users=\App\Models\User::inRandomOrder()->take(rand(1,5))->pluck('id');
            $project->users()->attach($users);
        }
    }
}
