<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogView;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           BlogStatusSeeder::class,
           CategorySeeder::class,
        ]);
        User::factory(1)->create();

        Blog::factory(10)->create();

        BlogView::factory(50)->create();
    }
}
