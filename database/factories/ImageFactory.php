<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
		$path = public_path('ad-images');
		$files = scandir($path);
		array_shift($files);
		array_shift($files);
		shuffle($files);
		$file = array_pop($files);
        return [
			'name' => $file,
			'ad_id' => Ad::factory()->create(),
        ];
    }
}
