<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactFactory extends Factory {
    protected $model = Contact::class;

    public function definition(): array {
        return [
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'location' => $this->faker->word(),
            'map' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
