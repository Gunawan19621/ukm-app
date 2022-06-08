<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kegiatan'=>$this->faker->sentence(3),
            'slug'=>$this->faker->word(),
            'deskripsi'=>$this->faker->paragraph(),
            'tgl_kegiatan'=>$this->faker->dateTime(),
            'ukm_id'=>mt_rand(1,8)
        ];
    }
}
