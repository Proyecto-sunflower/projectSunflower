<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => 'Antonio',
            'last_name' => 'Veizaga',
            'email' => 'sunflowerschoolantofagasta@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('W6Zb!eW.uOTo'), // Hashed password
            'remember_token' => Str::random(10),
            'gender'        => 'Masculino',
            'nationality'   => 'Chileno',
            'phone'         => '+56912321231',
            'address'       => 'Calle Falsa 123',
            'address2'      => 'Same',
            'city'          => 'Antofagasta',
            'zip'           => '1245',
            'photo'         => null,
            'role'          => 'admin',
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
