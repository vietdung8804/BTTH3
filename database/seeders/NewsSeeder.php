<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 30 bản ghi mẫu
        News::factory()->count(30)->create();
    }
}
