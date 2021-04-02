<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $blog_count = Blog::count();
        return [
            'blog_id'       => rand(1, $blog_count),
            'name'          => $this->faker->name,
            'email'         => $this->faker->email,
            'website'       => $this->faker->url,
            'comment'       => $this->faker->realText(),
        ];
    }
}
