<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *protected $model = Category::class;
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'Address' => $this->faker->address(),
            'mobileno' => $this->faker->randomDigit(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'Aadharno'=> $this->faker->randomDigit(),
            'image'=> $this->faker->image(),
            'Aadharimg'=> $this->faker->image(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
