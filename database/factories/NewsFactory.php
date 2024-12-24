<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->paragraph(2, true),
            'long_description' => $this->faker->paragraphs(3, true),
            'completed' => $this->faker->boolean(),
            'author_id' => User::factory(), // Tạo liên kết đến bảng users
        ];
    }
}
