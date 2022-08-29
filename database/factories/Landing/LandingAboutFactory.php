<?php

namespace Database\Factories\Landing;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Landing\LandingAbout>
 */
class LandingAboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'about_title' => $this->faker->unique()->sentence(1),
            'about_short' => $this->faker->unique()->sentence(5),
            'about_desc' => $this->faker->unique()->realText(),

            'created_at' => $this->faker->dateTimeBetween('-2 month', '-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('-2 month', 'now'),
        ];
    }
}
