<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory('App\Models\User'),
            'label' => $this->faker->text(10),
            'task_name'=> $this->faker->text(10),
            'start_date'=> $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'end_date'=> $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'status' => $this->faker->randomElement(['1', '2', '3']),
            'priority' => $this->faker->randomElement(['1', '2', '3', '4']),
            'task_description'=> $this->faker->text(10),
        ];
    }
}
