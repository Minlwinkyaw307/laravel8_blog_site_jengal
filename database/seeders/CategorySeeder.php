<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
                'description' => '',
                'color' => 'A569BD',
                'deleted_at' => null,
            ],
            [
                'name' => 'PHP',
                'description' => '',
                'color' => '3498DB',
                'deleted_at' => null,
            ],
            [
                'name' => 'JavaScript',
                'description' => '',
                'color' => 'F4D03F',
                'deleted_at' => null,
            ],
            [
                'name' => 'Laravel',
                'description' => '',
                'color' => 'E74C3C',
                'deleted_at' => null,
            ],
        ];

        Category::truncate();
        Category::insert($rows);
    }
}
