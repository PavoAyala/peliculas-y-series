<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cinepolis')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --cinepolis-primary: #1a1a1a;
            --cinepolis-gold: #ffd700;
            --cinepolis-red: #e31837;
        }

        .navbar {
            background-color: var(--cinepolis-primary);
        }
        .navbar-brand {
            color: var(--cinepolis-gold) !important;
            font-weight: bold;
        }
        .nav-link {
            color: #fff !important;
        }
        .movie-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            background: var(--cinepolis-primary);
            color: #fff;
        }
        .movie-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .movie-card .card-img-top {
            height: 400px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .movie-card .card-body {
            background: linear-gradient(to bottom, rgba(26,26,26,0.8), var(--cinepolis-primary));
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            flex-grow: 1;
        }
        .movie-card .card-title {
            color: var(--cinepolis-gold);
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .movie-card .card-text {
            color: #fff;
            opacity: 0.9;
        }
        .movie-card strong {
            color: var(--cinepolis-gold);
        }
        .filter-menu {
            background-color: var(--cinepolis-primary);
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .filters-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .filters-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            border-radius: 10px;
        }

        .filter-title {
            color: var(--cinepolis-gold);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            border: 1px solid transparent;
        }

        .filter-btn:hover {
            background-color: var(--cinepolis-gold);
            color: var(--cinepolis-primary);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background-color: var(--cinepolis-gold);
            color: var(--cinepolis-primary);
            font-weight: bold;
        }

        .filter-btn-clear {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.2rem;
            background-color: var(--cinepolis-red);
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .filter-btn-clear:hover {
            background-color: #ff1f1f;
            color: #fff;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .filter-menu {
                padding: 1rem;
            }

            .filters-section {
                padding: 1rem;
            }

            .filter-buttons {
                gap: 0.5rem;
            }

            .filter-btn, .filter-btn-clear {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
                width: calc(50% - 0.25rem);
                justify-content: center;
            }

            .movie-card .card-img-top {
                height: 300px;
            }
        }

        /* Estilos de paginación */
        .pagination-nav {
            margin-top: 2rem;
        }
        .pagination-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .pagination-links-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .pagination-info-container {
            text-align: center;
        }
        .pagination-info {
            color: #6c757d;
            font-size: 0.9rem;
            display: block;
            margin-top: 0.5rem;
        }
        .pagination-links {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        .btn-page {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            min-width: 40px;
            font-size: 0.9rem;
        }
        .btn-page:hover:not(.disabled) {
            background-color: var(--cinepolis-gold);
            color: var(--cinepolis-primary);
            border-color: var(--cinepolis-gold);
        }
        .btn-page.active {
            background-color: var(--cinepolis-primary);
            color: var(--cinepolis-gold);
            border-color: var(--cinepolis-primary);
        }
        .btn-page.disabled {
            color: #6c757d;
            pointer-events: none;
            background-color: #f8f9fa;
        }
        
        @media (max-width: 768px) {
            .pagination-container {
                gap: 0.5rem;
            }
            .btn-page {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }
            .pagination-info {
                font-size: 0.85rem;
            }
        }
        
        /* Estilos para las tarjetas */
        .card-body {
            padding: 1.5rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .badge {
            margin-left: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 20px;
        }
        .btn-primary {
            background-color: var(--cinepolis-primary);
            border-color: var(--cinepolis-primary);
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: var(--cinepolis-red);
            border-color: var(--cinepolis-red);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Cinepolis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('movies.index') }}">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('characters.index') }}">Personajes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 