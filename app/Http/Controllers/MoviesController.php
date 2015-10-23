<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MovieRequest;
use App\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('pages.movies.view', compact('movies'));
    }

    public function create()
    {
        return view('pages.movies.create');
    }

    public function store(MovieRequest $request)
    {
        $movie = new Movie($request->all());
        $movie->setThumbnail();
        $movie->setDescription();
        $movie->save();

        flash('New Agent have been created.');

        return redirect('movies');
    }
}
