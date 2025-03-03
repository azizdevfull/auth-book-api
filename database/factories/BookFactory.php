<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'author_id' => User::factory(),
        ];
    }
    public function withImage()
    {
        return $this->afterCreating(function (Book $book) {
            $book->images()->create(Image::factory()->make()->toArray());
        });
    }
}
