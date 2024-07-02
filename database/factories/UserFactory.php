<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'vin' => $this->faker->unique()->numerify('##########'), 
            'phone' => $this->faker->unique()->phoneNumber,
            'department_id' => $this->faker->numberBetween(1, 10), 
            'faculty_id' => $this->faker->numberBetween(1, 30), 
            'photo' => $this->faker->imageUrl(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    // $table->string('name');
    // $table->string('email')->unique();
    // $table->string('vin')->unique()->nullable();
    // $table->string('phone')->unique()->default();
    // $table->foreignIdFor(State::class)->nullable();
    // $table->foreignIdFor(Lga::class)->nullable();
    // $table->string('photo')->nullable();

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
