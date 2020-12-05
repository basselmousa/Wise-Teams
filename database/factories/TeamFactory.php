<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'manager_id'=>User::factory(),
            'name' =>"course num " . random_int(10,19),
            'description'=>$this->faker->sentence,
            'joining'=>0,
            'adding'=>0

        ];
    }
}
