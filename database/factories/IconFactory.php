<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Icon>
 */
class IconFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->sentence(3);
        $slug = Str::slug($name, '-');
        return [
            'slug'        => $slug,
            'name'        => $name,
            'priority'    => 0,
            'is_public'   => true,
        ];
    }
}
