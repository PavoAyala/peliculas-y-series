@extends('layouts.app')

@section('title', $movie->name . ' - Cinepolis')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                @if($movie->poster_path)
                <img src="{{ $movie->poster_path }}" class="card-img-top" alt="{{ $movie->name }}" loading="lazy">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $movie->name }}
                        @if($movie->is_series)
                        <span class="badge bg-info">Serie</span>
                        @else
                        <span class="badge bg-primary">Película</span>
                        @endif
                    </h5>
                    <p class="card-text">
                        <strong>Clasificación:</strong> {{ $movie->classification }}<br>
                        <strong>Fecha de Estreno:</strong> {{ $movie->release_date->format('d/m/Y') }}<br>
                        @if($movie->is_series)
                        <strong>Temporada:</strong> {{ $movie->season }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sinopsis</h5>
                    <p class="card-text">{{ $movie->review }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Personajes</h5>
                    @if($movie->characters->count() > 0)
                        <div class="row">
                            @foreach($movie->characters as $character)
                            <div class="col-md-4 mb-3">
                                <div class="card character-card">
                                    @if($character->photo_path)
                                    <img src="{{ $character->photo_path }}" class="card-img-top" alt="{{ $character->name }}" loading="lazy">
                                    @endif
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $character->name }}</h6>
                                        <p class="card-text">
                                            <strong>Rol:</strong> {{ $character->role }}<br>
                                            <strong>Actor:</strong> {{ $character->actor_name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No hay personajes registrados para este título.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 