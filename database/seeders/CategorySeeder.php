<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'name' => 'Web Development',
                'slug' => Str::slug('Web Development'),
                'description' => '',
                'color' => 'A569BD',
                'deleted_at' => null,
            ],
            [
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
                'description' => '',
                'color' => '3498DB',
                'deleted_at' => null,
            ],
            [
                'name' => 'JavaScript',
                'slug' => Str::slug('JavaScript'),
                'description' => '',
                'color' => 'F4D03F',
                'deleted_at' => null,
            ],
            [
                'name' => 'Laravel',
                'slug' => Str::slug('Laravel'),
                'description' => '',
                'color' => 'E74C3C',
                'deleted_at' => null,
            ],
        ];

        Category::insert($rows);
    }
}
