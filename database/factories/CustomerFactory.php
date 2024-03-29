<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $type = $this->faker->randomElement(['individual', 'business']);
        $name = $type == 'individual' ? $this->faker->name() : $this->faker->company();

        return [
            'name' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'region' => $this->faker->state(),
        ];
    }
}
