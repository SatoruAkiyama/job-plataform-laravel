<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, javascript',
            'company' => $this->faker->company(),
            'location' => 'Boston, MA',
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'tasks' => $this->faker->paragraph(2),
            'requirements' => $this->faker->paragraph(2),
            'benefits' => $this->faker->paragraph(2),
            'salary' => '3000-5000 $ / month'
        ];
    }
}
