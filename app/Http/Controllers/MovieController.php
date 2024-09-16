<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function show($id) {
        $movie = Movie::findOrFail($id);

        return view('movies.index', compact('movie'));
    }

    public function edit($id) {
        $movie = Movie::findOrFail($id);

        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request) {
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $movie = Movie::findOrFail($request->input('movieID'));

        $movie->title = $request->input('title');
        $movie->save();

        return redirect()->route('movie.edit', ['id' => $request->input('movieID')])->with('status', 'movie-updated');
    }

    public function delete(Request $request) {
        $movie = Movie::findOrFail($request->input('movieID'));

        $movie->delete();

        return redirect()->route('dashboard');
    }
}
