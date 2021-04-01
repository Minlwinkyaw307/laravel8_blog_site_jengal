<?php

namespace Database\Seeders;

use App\Models\BlogStatus;
use Illuminate\Database\Seeder;

class BlogStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            ['name' => 'Pending', 'color' => 'FF8700'],
            ['name' => 'Draft', 'color' => 'F4D03F'],
            ['name' => 'Published', 'color' => '82E0AA'],
            ['name' => 'Cancelled', 'color' => 'E74C3C'],
        ];

        BlogStatus::truncate();
        BlogStatus::insert($rows);
    }
}
