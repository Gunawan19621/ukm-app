<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logbook>
 */
class LogbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'progress'=>2,
            'uraian'=>$this->faker->paragraph(2),
            'hasil'=>$this->faker->paragraph(2),
            'kendala'=>$this->faker->paragraph(2),
            'tgl_logbook'=>$this->faker->dateTime(),
            'kegiatan_id'=>mt_rand(1,10)
        ];
    }
}
