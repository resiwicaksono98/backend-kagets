<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'picture_path' => $this->faker->sentence(),
            'rate' => '4.2'
        ];
    }
}
