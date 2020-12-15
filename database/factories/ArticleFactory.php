<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'title' => $title,
            'author' => $this->faker->name,
            'image_url' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'content' => $this->faker->realText(5000),
            'slug' => $slug,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
