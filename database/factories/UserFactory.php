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
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the user has two-factor authentication enabled.
     */
    public function withTwoFactorAuth(string $secret = null): static
    {
        $secret = $secret ?? app('pragmarx.google2fa')->generateSecretKey();
        $recoveryCodes = json_encode([
            'RECOVERY1'.Str::random(5),
            'RECOVERY2'.Str::random(5),
            'RECOVERY3'.Str::random(5),
            'RECOVERY4'.Str::random(5),
            'RECOVERY5'.Str::random(5),
        ]);

        return $this->state(fn (array $attributes) => [
            'two_factor_secret' => encrypt($secret),
            'two_factor_recovery_codes' => encrypt($recoveryCodes),
            'two_factor_confirmed_at' => now(),
        ]);
    }

    /**
     * Indicate that the user is an admin.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }
}
