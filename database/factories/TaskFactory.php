<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase(),  
            'description' => $this->faker->realTextBetween($minNbChars = 3, $maxNbChars = 255, $indexSize = 2),
            'project_id' => rand(1,10),
            'user_id' => rand(1,5),
            'status_id' => rand(1,3),
            'priority_id' => rand(1,3)   
        ];
    }
}
