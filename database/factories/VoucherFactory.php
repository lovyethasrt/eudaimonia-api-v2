<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'discount' => rand(10000, 23000),
            'quota' => rand(10, 65),
            'active_at' => now()->toDateTimeString(),
            'expire_at' => now()->addDays(30)->toDateTimeString(),
        ];
    }
}
