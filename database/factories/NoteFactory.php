<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Note;
use App\Models\User;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::first()->id,
            'title' => $this->faker->sentence(4),
            'body' => $this->faker->text(),
            'send_date' => $this->faker->date('Y-m-d', '+10 days'),
            'recepient' => $this->faker->word(),
            'is_published' => $this->faker->boolean(),
            'heart_count' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
