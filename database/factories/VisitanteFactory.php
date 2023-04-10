<?php

namespace Database\Factories;

use App\Models\Visitante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VisitanteFactory extends Factory
{
    protected $model = Visitante::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'departamento' => $this->faker->name,
        ];
    }
}
