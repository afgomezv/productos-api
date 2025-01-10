<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        
        return [
            'name' => $this->faker->randomElement(['Laptop', 'Mouse', 'Teclado', 'Monitor', 'Impresora', 'Disco Duro', 'Memoria RAM', 'Smartphone']),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
        
    }
}
