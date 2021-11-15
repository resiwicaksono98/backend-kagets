<?php

namespace Database\Factories;

use App\Models\Complaint;
use App\Models\Status_Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

class Status_ComplaintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Status_Complaint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'complaint_id' => Complaint::factory(),
            'user_id' => Complaint::factory(),
            'when' => now(),
            'status' => 'Sedang Verifikasi',
            'file' => $this->faker->sentence()
        ];
    }
}
