<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogView;
use App\Models\ContactMessage;
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
            SiteConfigSeeder::class,
        ]);
        User::factory(1)->create();

        Blog::factory(100)->create();

        BlogView::factory(200)->create();

        BlogComment::factory(200)->create();

        ContactMessage::factory(15)->create();
    }
}
