@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Cardápio de Pizzas</h1>
        <a href="{{ route('pizzas.create') }}" class="btn btn-danger">
            <i class="bi bi-plus-lg"></i> Nova Pizza
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($pizzas as $pizza)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    @if($pizza->foto)
                        <img src="{{ asset($pizza->foto) }}" class="card-img-top" alt="{{ $pizza->nome }}">
                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center">
                            <i class="bi bi-image text-white" style="font-size: 3rem"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $pizza->nome }}</h5>
                        <p class="text-muted mb-2">
                            @foreach($pizza->sabores as $sabor)
                                <span class="badge bg-primary me-1">{{ $sabor->nome }}</span>
                            @endforeach
                        </p>
                        <p class="card-text">{{ Str::limit($pizza->ingredientes, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-danger">R$ {{ number_format($pizza->preco, 2) }}</span>
                            <div>
                                <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Nenhuma pizza cadastrada ainda.</div>
            </div>
        @endforelse
    </div>
@endsection