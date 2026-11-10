<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Teclado mecánico', 'precio' => 899.90, 'stock' => 15],
            ['nombre' => 'Laptop Dynabook 15.6"', 'precio' => 20550.00, 'stock' => 30],
            ['nombre' => 'Mouse inalámbrico Logitech', 'precio' => 450.00, 'stock' => 50],
            ['nombre' => 'Monitor 24 pulgadas', 'precio' => 3200.00, 'stock' => 12],
            ['nombre' => 'Audífonos Gamer con micrófono', 'precio' => 650.00, 'stock' => 25],
            ['nombre' => 'Memoria USB 64GB', 'precio' => 180.00, 'stock' => 100],
            ['nombre' => 'Disco duro externo 1TB', 'precio' => 1400.00, 'stock' => 20],
            ['nombre' => 'Silla ergonómica de oficina', 'precio' => 2800.00, 'stock' => 8],
            ['nombre' => 'Base enfriadora para laptop', 'precio' => 350.00, 'stock' => 40],
            ['nombre' => 'Cable HDMI 2 metros', 'precio' => 120.00, 'stock' => 60],
        ];

        foreach ($productos as $prod) {
            Producto::create($prod);
        }
    }
}