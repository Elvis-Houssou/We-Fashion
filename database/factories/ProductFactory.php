<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Faker\generator as Faker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'price'=>$this->faker->numberBetween(30, 50) * 100,
            'images'=>$this->faker->file('C:\Users\houss\Downloads\We_Fashion_ressources\images\femmes', 'public/storage/images/femmes', false),
            'reference'=>$this->faker->sentence(),
            'visibility'=>$this->faker->randomElement(['publie', 'non publie']),
            'state'=>$this->faker->randomElement(['en solde', 'standard']),
            'id_category'=> "2",
            'size'=>$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
        ];
    }
}
