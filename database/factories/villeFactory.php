<?php

namespace Database\Factories;

use App\Models\etudiant;
use App\Models\ville;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class villeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->city,
        ];
    }
}
