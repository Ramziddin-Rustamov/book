<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title(),
            'category_id'=>Category::all()->random()->id,
            'slug'=>$this->faker->name(),
            'author'=>$this->faker->firstName(),
            'description'=>$this->faker->paragraph(),
            'rating'=>$this->faker->numberBetween(0,5),
            'image'=>$this->faker->name()
        ];
    }
}
