<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_author'=>$this->faker->name,
            'post_title'=>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'post_desc'=>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}
