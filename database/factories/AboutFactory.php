<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AboutFactory extends Factory {
    protected $model = About::class;

    public function definition(): array {
        return [
            'title' => $this->faker->word(),
            'subtitle' => $this->faker->word(),
            'text' => $this->faker->text(),
            'section_title' => $this->faker->word(),
            'section_text' => $this->faker->text(),
            'section_image' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
