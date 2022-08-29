<?php

namespace Database\Factories\Landing;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Landing\LandingHome>
 */
class LandingHomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(5),
            'content' => $this->faker->unique()->realText(),

            'title_2' => $this->faker->unique()->sentence(5),
            'content_2' => $this->faker->unique()->realText(),

            'created_at' => $this->faker->dateTimeBetween('-2 month', '-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('-2 month', 'now'),
        ];
    }
}
