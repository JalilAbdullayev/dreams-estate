<?php

namespace Database\Factories;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingsFactory extends Factory {
    protected $model = Settings::class;

    public function definition(): array {
        return [
            'title' => $this->faker->word(),
            'author' => $this->faker->word(),
            'keywords' => $this->faker->word(),
            'description' => $this->faker->text(),
            'logo' => $this->faker->word(),
            'favicon' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
