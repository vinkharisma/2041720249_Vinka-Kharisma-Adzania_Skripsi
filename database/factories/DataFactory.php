<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'tanggal' => $this->faker->tanggal(),
            // 'name' => $this->faker->name(),
            // 'stok_awal' => $this->faker->stok_awal(),
            // 'masuk' => $this->faker->masuk(),
            // 'keluar' => $this->faker->keluar(),
            // 'stok_akhir' => $this->faker->stok_akhir(),
            // 'jumlah_stok_palet_baik' => $this->faker->jumlah_stok_palet_baik(),
            // 'jumlah_stok_palet_rusak' => $this->faker->jumlah_stok_palet_rusak(),

            // 'tanggal' => $this->faker->date('Y-m-d'), // Gunakan format yang sesuai
            // 'name' => $this->faker->name,
            // 'stok_awal' => $this->faker->numberBetween(0, 100),
            // 'masuk' => $this->faker->numberBetween(0, 50),
            // 'keluar' => $this->faker->numberBetween(0, 20),
            // 'stok_akhir' => $this->faker->numberBetween(0, 100),
            // 'jumlah_stok_palet_baik' => $this->faker->numberBetween(0, 50),
            // 'jumlah_stok_palet_rusak' => $this->faker->numberBetween(0, 10),
        ];
    }
}
