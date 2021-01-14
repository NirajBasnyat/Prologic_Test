<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'is_published' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'description' => $this->faker->sentence(10),
            'category_id' => Category::all()->random()
        ];
    }
}
