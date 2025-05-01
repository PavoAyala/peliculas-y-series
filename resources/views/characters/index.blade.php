@extends('layouts.app')

@section('title', 'Personajes - Cinepolis')

@section('content')
<div class="container">
    <div class="characters-section">
        <h2 class="section-title mb-4">
            <i class="fas fa-users"></i>
            Personajes
        </h2>
        <div class="row">
            @foreach($characters as $character)
            <div class="col-md-3 mb-4">
                <div class="card character-card h-100">
                    @if($character->photo_path)
                    <img src="{{ $character->photo_path }}" class="card-img-top" alt="{{ $character->name }}" loading="lazy">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $character->name }}</h5>
                        <p class="card-text">
                            <strong>Actor:</strong> {{ $character->actor_name }}<br>
                            <strong>Rol:</strong> {{ $character->role }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                Aparece en: 
                                @foreach($character->movies as $movie)
                                    <span class="badge bg-secondary">{{ $movie->name }}</span>
                                @endforeach
                            </small>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection 