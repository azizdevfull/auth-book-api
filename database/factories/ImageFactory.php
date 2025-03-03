<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    public function definition(): array
    {
        return [
            'imageable_id' => null,
            'imageable_type' => null,
            'path' => 'uploads/' . $this->faker->image('public/uploads', 640, 480, null, false),
        ];
    }
}
