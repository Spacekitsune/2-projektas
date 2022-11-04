<?php

namespace Database\Seeders;

use Illuminate\Support\Collection;

use Illuminate\Database\Seeder;

use App\Models\Project;

use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project::factory()->count(10)->create();

        DB::table('projects')->insert([
            'title' => 'Organized incremental function',
            'description' => "Good-bye, feet!' (for when she next peeped out the words: 'Where's the other guinea-pig cheered, and was beating her violently with its eyelids, so he with his nose, and broke to pieces against one of the day; and this time the Queen in a ring, and.",
            'status_id' => '3'
        ]);

        DB::table('projects')->insert([
            'title' => 'De-engineered 4th generation core',
            'description' => "English!' said the Gryphon, sighing in his confusion he bit a large cat which was a body to cut it off from: that he shook his grey locks, 'I kept all my limbs very supple By the use of a book,' thought Alice to herself, as well say,' added the.",
            'status_id' => '2'
        ]);

        DB::table('projects')->insert([
            'title' => 'Proactive fault-tolerant extranet',
            'description' => "In another moment down went Alice after it, never once considering how in the world she was to get out again.",
            'status_id' => '2'
        ]);

        DB::table('projects')->insert([
            'title' => 'Managed mobile focus group',
            'description' => "WHAT are you?' said Alice, 'because I'm not myself, you see.' 'I don't know the meaning of half those long words, and, what's more, I don't think,' Alice went timidly up to the Queen, 'and he shall tell you how it was all dark overhead; before her was.",
            'status_id' => '1'
        ]);

        DB::table('projects')->insert([
            'title' => 'Pre-emptive real-time monitoring',
            'description' => "Alice, with a T!' said the Gryphon whispered in a minute or two, which gave the Pigeon the opportunity of saying to her that she wanted to send the hedgehog to, and, as the White Rabbit, 'and that's why. Pig!' She said this last word two or three times.",
            'status_id' => '3'
        ]);

        

        foreach (Project::all() as $project) {
            $users=\App\Models\User::inRandomOrder()->take(rand(1,5))->pluck('id');
            $project->users()->attach($users);
        }
    }
}
