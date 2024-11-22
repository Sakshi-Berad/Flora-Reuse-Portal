<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = fake()->unique()->name();
        $slug = Str::slug($title);

        $subCategory= [25,26];
        $subCatRandKey = array_rand($subCategory);

        $brand= [10,14];
        $brandId = array_rand($brand);
        return [
            'title' => $title,
            'slug' => $slug,
            'category_id' => 63,
            'sub_category_id' => $subCategory[$subCatRandKey],
            'brand_id' =>$brand[$brandId],
            'price' => rand(500,70000),
            'sku' => rand(1000,10000),
            'track_qty' => 'Yes',
            'qty' => 10,
            'is_featured' => 'Yes',
            'status' => 1,

        ];
    }
}
