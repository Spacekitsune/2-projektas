<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Task;

use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Task::factory()->count(30)->create();

        DB::table('tasks')->insert([
            'title' => 'Synergistic solution-oriented intranet',
            'description' => 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.',
            'project_id' => '1',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '1'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Operative web-enabled installation',
            'description' => 'Phasellus in felis. Donec semper sapien a libero. Nam dui.',
            'project_id' => '1',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '1'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Quality-focused multi-state project',
            'description' => 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.',
            'project_id' => '1',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '1'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Balanced responsive matrices',
            'description' => 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.',
            'project_id' => '2',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '2'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Automated exuding Graphical User Interface',
            'description' => 'Fusce consequat. Nulla nisl. Nunc nisl.',
            'project_id' => '2',
            'user_id' => '1',
            'status_id' => '2',
            'priority_id' => '2'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Secured background initiative',
            'description' => 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.',
            'project_id' => '2',
            'user_id' => '1',
            'status_id' => '2',
            'priority_id' => '2'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Configurable well-modulated approach',
            'description' => 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.',
            'project_id' => '3',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '3'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Cross-group explicit functionalities',
            'description' => 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.',
            'project_id' => '3',
            'user_id' => '1',
            'status_id' => '2',
            'priority_id' => '3'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Up-sized holistic contingency',
            'description' => 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
            'project_id' => '3',
            'user_id' => '1',
            'status_id' => '1',
            'priority_id' => '3'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Profit-focused systematic hierarchy',
            'description' => 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.',
            'project_id' => '5',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '1'
        ]);

        DB::table('tasks')->insert([
            'title' => 'Business-focused encompassing capacity',
            'description' => 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.',
            'project_id' => '5',
            'user_id' => '1',
            'status_id' => '3',
            'priority_id' => '1'
        ]);
    }
}
