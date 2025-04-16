<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
public function run(): void
{
    $this->call([
        PizzasSeeder::class,  
        
    ]);

    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    \App\Models\Sabor::create(['nome' => 'Calabresa', 'descricao' => 'Molho, mussarela e calabresa']);
    \App\Models\Sabor::create(['nome' => 'Portuguesa', 'descricao' => 'Ovos, cebola, azeitona e presunto']);

    $pizza = \App\Models\Pizza::create([
        'nome' => 'Margherita',
        'ingredientes' => 'Molho de tomate, mussarela e manjericão',
        'preco' => 49.90
    ]);

    $pizza->sabores()->attach([1, 2]); // associa  sabores
}
    
}




