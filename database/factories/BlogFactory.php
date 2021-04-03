<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogStatus;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $blog_status_count = BlogStatus::count();
        $category_count = Category::count();

        return [
            'thumbnail'             => $this->faker->image(),
            'image'                 => $this->faker->image(),
            'user_id'               => 1,
            'title'                 => $this->faker->realText(25),
            'slug'                  => Str::slug($this->faker->realText(25)) . '-' . Str::random(5),
            'content'               => $this->faker->realText(),
            'blog_status_id'        => rand(1, $blog_status_count),
            'category_id'           => rand(1, $category_count),
            'published_at'          => $this->faker->dateTimeBetween('-1 month', 'now'),
            'is_featured'           => $this->faker->boolean(40),
            'deleted_at'            => null,
        ];
    }
}
