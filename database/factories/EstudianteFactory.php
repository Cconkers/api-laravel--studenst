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
            'foto'=> 'https://randomuser.me/api/portraits/'.$gender[$randomGender].'/'.$randomNumber.'.jpg',
        ];
    }
}
