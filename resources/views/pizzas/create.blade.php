@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h2 class="mb-0"><i class="bi bi-plus-lg"></i> Cadastrar Nova Pizza</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pizzas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome da Pizza</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="ingredientes" class="form-label">Ingredientes</label>
                    <textarea class="form-control" id="ingredientes" name="ingredientes" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" step="0.01" class="form-control" id="preco" name="preco" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto da Pizza</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>

                <div class="mb-4">
                    <label class="form-label">Sabores</label>
                    <div class="border p-3 rounded">
                        @foreach($sabores as $sabor)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="sabores[]" 
                                       value="{{ $sabor->id }}"
                                       id="sabor{{ $sabor->id }}">
                                <label class="form-check-label" for="sabor{{ $sabor->id }}">
                                    {{ $sabor->nome }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-save"></i> Salvar Pizza
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection