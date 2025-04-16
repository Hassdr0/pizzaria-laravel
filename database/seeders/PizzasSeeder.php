<?php

namespace Database\Seeders;

use App\Models\Pizza;
use App\Models\Sabor;
use Illuminate\Database\Seeder;

class PizzasSeeder extends Seeder
{
    public function run()
    {
        // cria sabores
        $calabresa = Sabor::create(['nome' => 'Calabresa', 'descricao' => 'Molho, mussarela e calabresa']);
        $mussarela = Sabor::create(['nome' => 'Mussarela', 'descricao' => 'Molho e mussarela']);
        $portuguesa = Sabor::create(['nome' => 'Portuguesa', 'descricao' => 'Ovos, cebola, azeitona e presunto']);

        // cria pizzas
        $pizza1 = Pizza::create([
            'nome' => 'Calabresa Especial',
            'ingredientes' => 'Molho, mussarela, calabresa e cebola',
            'preco' => 49.90
        ]);
        $pizza1->sabores()->attach([$calabresa->id, $mussarela->id]);

        $pizza2 = Pizza::create([
            'nome' => 'Portuguesa',
            'ingredientes' => 'Molho, mussarela, presunto, ovos, cebola e azeitona',
            'preco' => 55.90
        ]);
        $pizza2->sabores()->attach($portuguesa->id);
    }
}