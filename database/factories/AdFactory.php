<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
			'title' 		=> $this->faker->sentence(),
			'description' 	=> $this->faker->text(),
			'user_id'		=> User::factory(),
			'category_id'	=> Category::factory(),
			'price'			=> $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
