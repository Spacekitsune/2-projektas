<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
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
            'status_id' => rand(1,3)    
        ];
    }
}
