<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Weight_log;

class Weight_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 35),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(2,20,150),
            'calories' => $this->faker->randomNumber(4, true),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(),
        ];
    }
}
