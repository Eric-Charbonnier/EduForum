<?php

namespace Database\Factories;

use App\Models\etudiant;
use App\Models\ville;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class etudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name,
          'address' => $this->faker->address,
          'phone' => $this->faker->phoneNumber,
          'email' => $this->faker->unique()->safeEmail(),
          'birthdate' => $this->faker->date(),
          // 'ville_id' => $this->faker->numberBetween(1,15),
          'ville_id' => ville::all()->random()->id,
        ];
    }
}
