<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->sentence,
        'image' =>$this->faker->imageUrl(),
        'desc' =>$this->faker->paragraph(2),
        'content' => $this->faker->realText(500),
        'slug' => $this->faker->slug,
        'created_at' => $this->faker->dateTime(),
        ];
    }
}
