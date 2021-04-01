<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogStatus;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'thumbnail'             => $this->faker->image(),
            'image'                 => $this->faker->image(),
            'user_id'               => 1,
            'title'                 => $this->faker->title(),
            'content'               => $this->faker->realText(),
            'blog_status_id'        => BlogStatus::inRandomOrder()->first()->id,
            'category_id'           => Category::inRandomOrder()->first()->id,
            'published_at'          => $this->faker->dateTimeBetween('-1 month', 'now'),
            'deleted_at'            => null,
        ];
    }
}
