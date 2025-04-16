@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h2 class="mb-0"><i class="bi bi-info-circle"></i> Detalhes da Pizza</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($pizza->foto)
                        <img src="{{ asset($pizza->foto) }}" class="img-fluid rounded mb-3" alt="{{ $pizza->nome }}">
                    @else
                        <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-image" style="font-size: 3rem"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h3>{{ $pizza->nome }}</h3>
                    <p class="text-muted">
                        @foreach($pizza->sabores as $sabor)
                            <span class="badge bg-primary me-1">{{ $sabor->nome }}</span>
                        @endforeach
                    </p>
                    <h5 class="text-danger">R$ {{ number_format($pizza->preco, 2) }}</h5>
                    <hr>
                    <h5>Ingredientes:</h5>
                    <p>{{ $pizza->ingredientes }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
            <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Editar
            </a>
        </div>
    </div>
@endsection