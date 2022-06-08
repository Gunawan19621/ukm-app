<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laporan>
 */
class LaporanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_laporan'=>$this->faker->sentence(3),
            'keterangan'=>$this->faker->paragraph(),
            'tgl_laporan'=>$this->faker->dateTime(),
            'kegiatan_id'=>mt_rand(1,10)
        ];
    }
}
