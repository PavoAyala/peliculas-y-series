@extends('layouts.app')

@section('title', 'Películas y Series - Cinepolis')

@section('content')
<div class="filter-menu">
    <div class="row">
        <div class="col-12">
            <div class="filters-container">
                <div class="filters-section">
                    <h4 class="filter-title">
                        <i class="fas fa-filter"></i>
                        Filtrar por Fecha
                    </h4>
                    <div class="filter-buttons">
                        <a href="{{ route('movies.index', ['filter' => 'all']) }}" 
                           class="filter-btn {{ !request('filter') || request('filter') === 'all' ? 'active' : '' }}">
                            <i class="fas fa-infinity"></i> Todo
                        </a>
                        <a href="{{ route('movies.index', ['filter' => 'current']) }}" 
                           class="filter-btn {{ request('filter') === 'current' ? 'active' : '' }}">
                            <i class="fas fa-play"></i> En Cartelera
                        </a>
                        <a href="{{ route('movies.index', ['filter' => 'upcoming']) }}" 
                           class="filter-btn {{ request('filter') === 'upcoming' ? 'active' : '' }}">
                            <i class="fas fa-clock"></i> Próximos Estrenos
                        </a>
                        <a href="{{ route('movies.index', ['filter' => 'past']) }}" 
                           class="filter-btn {{ request('filter') === 'past' ? 'active' : '' }}">
                            <i class="fas fa-history"></i> Anteriores
                        </a>
                    </div>
                </div>

                <div class="filters-section">
                    <h4 class="filter-title">
                        <i class="fas fa-film"></i>
                        Tipo de Contenido
                    </h4>
                    <div class="filter-buttons">
                        <a href="{{ route('movies.index', array_merge(request()->except('type'), ['type' => 'movies'])) }}" 
                           class="filter-btn {{ request('type') === 'movies' ? 'active' : '' }}">
                            <i class="fas fa-film"></i> Películas
                        </a>
                        <a href="{{ route('movies.index', array_merge(request()->except('type'), ['type' => 'series'])) }}" 
                           class="filter-btn {{ request('type') === 'series' ? 'active' : '' }}">
                            <i class="fas fa-tv"></i> Series
                        </a>
                        @if(request('type'))
                        <a href="{{ route('movies.index', request()->except('type')) }}" 
                           class="filter-btn-clear">
                            <i class="fas fa-times"></i> Limpiar Filtro
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @foreach($movies as $movie)
    <div class="col-md-4 mb-4">
        <div class="card movie-card">
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
                <p class="card-text">{{ Str::limit($movie->review, 100) }}</p>
                <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary">Ver Detalles</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@if($movies->isEmpty())
<div class="alert alert-info">
    No se encontraron resultados para tu búsqueda.
</div>
@endif

<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>

@endsection 