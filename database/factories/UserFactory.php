<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

//User::factory()->count(50)->make();



class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do{
            $from = rand(1,15);
            $to = rand(1,15);
            $is_read = rand(0,1);
        }while ($from === $to);

        return [
            'from' => $this->faker->numberBetween(1, 20),
            'to' => $this->faker->numberBetween(1, 20),
            'message' => $this->faker->realText(180),
            'is_read' => $this->faker->numberBetween(0, 1)
            
        ];
    }
}
