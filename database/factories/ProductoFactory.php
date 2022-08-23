<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->sentence(2);
        return [
            'nombre' => $nombre,
            'descripcion' => $this->faker->text(),
            'precio' => $this->faker->randomElement([12.99,20.99,45.99]),
            'stock' => $this->faker->randomElement([0,10,20,25,40]),
            'status'=> 2,//publicado
            'imagen' => 'productos/' . $this->faker->image('public/storage/productos',640,480,null,false),
            'categoria_id' => Categoria::all()->random()->id
        ];
    }
}
