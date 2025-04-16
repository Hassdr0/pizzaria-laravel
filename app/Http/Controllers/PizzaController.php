<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Sabor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    // Listar pizzas
    public function index()
    {
        $pizzas = Pizza::with('sabores')->get();
        return view('pizzas.index', compact('pizzas'));
    }

    // formulário de criação
    public function create()
    {
        $sabores = Sabor::all();
        return view('pizzas.create', compact('sabores'));
    }

    // Salvar pizza
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'ingredientes' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'foto' => 'nullable|image|max:2048',
            'sabores' => 'required|array|min:1'
        ]);

        // Upload 
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/pizzas');
            $foto = str_replace('public/', 'storage/', $path);
        }

        $pizza = Pizza::create([
            'nome' => $request->nome,
            'ingredientes' => $request->ingredientes,
            'preco' => $request->preco,
            'foto' => $foto ?? null
        ]);

        $pizza->sabores()->attach($request->sabores);

        return redirect()->route('pizzas.index')->with('success', 'Pizza criada com sucesso!');
    }

    // detalhes 
    public function show(Pizza $pizza)
    {
        return view('pizzas.show', compact('pizza'));
    }

    // edição
    public function edit(Pizza $pizza)
    {
        $sabores = Sabor::all();
        return view('pizzas.edit', compact('pizza', 'sabores'));
    }

    // Atualizar pizza
    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'ingredientes' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'foto' => 'nullable|image|max:2048',
            'sabores' => 'required|array|min:1'
        ]);

        if ($request->hasFile('foto')) {
            // Remove a foto antiga 
            if ($pizza->foto) {
                Storage::delete(str_replace('storage/', 'public/', $pizza->foto));
            }
            
            $path = $request->file('foto')->store('public/pizzas');
            $pizza->foto = str_replace('public/', 'storage/', $path);
        }

        $pizza->update([
            'nome' => $request->nome,
            'ingredientes' => $request->ingredientes,
            'preco' => $request->preco
        ]);

        $pizza->sabores()->sync($request->sabores);

        return redirect()->route('pizzas.index')->with('success', 'Pizza atualizada!');
    }

    // Excluir 
    public function destroy(Pizza $pizza)
    {
        if ($pizza->foto) {
            Storage::delete(str_replace('storage/', 'public/', $pizza->foto));
        }
        
        $pizza->delete();
        return redirect()->route('pizzas.index')->with('success', 'Pizza removida!');
    }
}