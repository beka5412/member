<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => $this->faker->phoneNumber(),
            'store_id' => '1',
            'taxpayer' => $this->faker->regexify('[0-9]{11}'),
            'status' => 'on',
            'avatar' => 'avatar.png',
            'lang' => 'en',
        ];
    }
}
