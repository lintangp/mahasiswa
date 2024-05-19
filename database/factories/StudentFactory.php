<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'nrp' => $this->faker->unique()->numerify('#######'),
            'nama' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Teknologi Informasi', 'Pendidikan Teknologi Informasi']),
        ];
    }
}
