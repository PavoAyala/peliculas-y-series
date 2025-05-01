<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Movie::query();
        
        // Filtro por fecha
        switch($request->get('filter')) {
            case 'past':
                $query->where('release_date', '<', now());
                break;
            case 'upcoming':
                $query->where('release_date', '>', now());
                break;
            case 'current':
                $query->where('release_date', '<=', now())
                      ->where('release_date', '>=', now()->subMonths(3));
                break;
            default:
                // 'all' - no filter needed
                break;
        }

        // Filtro por tipo de contenido
        if ($request->has('type')) {
            switch($request->get('type')) {
                case 'movies':
                    $query->where('is_series', false);
                    break;
                case 'series':
                    $query->where('is_series', true);
                    break;
            }
        }

        $movies = $query->latest()->paginate(9);
        
        // Obtener todos los personajes
        $characters = \App\Models\Character::with('movies')->get();

        return view('movies.index', compact('movies', 'characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'classification' => 'required|string|max:255',
            'release_date' => 'required|date',
            'review' => 'required|string',
            'season' => 'nullable|integer',
            'is_series' => 'boolean',
            'poster' => 'nullable|image|max:2048',
        ]);

        $movie = Movie::create($validated);

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $movie->update(['poster_path' => $path]);
        }

        return redirect()->route('movies.index')->with('success', 'Película creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
