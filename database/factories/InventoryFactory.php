<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

                'cover' => fake()->imageUrl(),


            "Product_name" => $this->faker->name(),


            'Part_No' =>$this->faker->name(2),
            'Vendor' => $this->faker->name(),
            'Supplier' => $this->faker->name(),
            'BIN' => $this->faker->name(),
            'QTY' => $this->faker->numberBetween(1,100),
            'Reorder_QTY' => $this->faker->numberBetween(1,100),
            'Consumption_Rate' => $this->faker->numberBetween(1,100),
            'per' => $this->faker->randomElement([
                "Day",
                "Week",
                "Month",
                "Year"
            ]),
            'Price' => $this->faker->numberBetween(100,1000000),
            'Location' => $this->faker->address(),
            'Cost' => $this->faker->numberBetween(1000,1000000),
            'Reorder_Date' => $this->faker->date(),
            'Other_Features' => $this->faker->name(3),
            'Product_Manager' => $this->faker->name(2),
            'cost_each' => $this->faker->numberBetween(1000,10000000),
            'Description' => $this->faker->paragraph(),
            'Availbility' => $this->faker->randomElement([
                "Yes",
                "No",
            ]),


        ];
    }
}
