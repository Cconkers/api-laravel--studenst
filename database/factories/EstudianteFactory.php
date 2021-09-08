<?php

namespace Database\Factories;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;


class EstudianteFactory extends Factory
{
    public function definition()
    {
        $gender = array('men','women');
        $randomGender = array_rand($gender);
        $randomNumber =  rand(1,75);
        return [
            'nombre' => $this -> faker -> name(),
            'email' => $this->faker->unique()->safeEmail(),
            'foto'=> 'https://randomuser.me/api/portraits/'.$gender[$randomGender].'/'.$randomNumber.'.jpg',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];
    }
}
