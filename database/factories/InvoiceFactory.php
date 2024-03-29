<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = $this->faker->randomElement(['paid', 'unpaid', 'void']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->randomFloat(100, 10000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'paid' ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}
