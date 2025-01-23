<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            for ($i = 1; $i <= 10; $i++) {
                Task::create([
                    'name' => "Task $i for {$project->name}",
                    'description' => "Description for task $i",
                    'priority' => rand(1, 5),
                    'deadline' => now()->addDays(rand(1, 30)),
                    'user_id' => $project->user_id,
                    'project_id' => $project->id,
                ]);
            }
        }
    }
}
