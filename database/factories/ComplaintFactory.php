<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,3),
            'mitra_type' => $mitra = $this->faker->sentence(),
            'slug' => Str::slug($mitra),
            'problem' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'support_image' => $this->faker->sentence(),
            'when' => now()
            
        ];
    }
}
