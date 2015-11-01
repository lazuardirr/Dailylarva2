<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MovieRequest;
use App\lib\ContentGenerator;
use App\Movie;

class MoviesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show all movies
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::oldest()->paginate(10);
        return view('pages.movies.view', compact('movies'));
    }

    /**
     * Show movies creation form page
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.movies.create');
    }

    /**
     * Save new Movie.
     *
     * @param MovieRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MovieRequest $request)
    {
        $content = new ContentGenerator($request->get('id'));
        $movie = new Movie($request->all());
        $movie->setThumbnail($content);
        $movie->setDescription($content);
        $movie->save();
        flash('New Movie have been created.');
        return redirect('movies');
    }

    public function show(Movie $movie)
    {
        return view('pages.movies.show', compact('movie'));
    }


    /**
     * Show movie edition page.
     *
     * @param Movie $movie
     * @return \Illuminate\View\View
     */
    public function edit(Movie $movie)
    {
        $page_title = $movie->title;
        $page_description = 'Edit selected movie.';
        return view('pages.movies.edit', compact('movie', 'page_title', 'page_description'));
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        $movie->update($request->all());
        flash('Movie have been updated.');
        return redirect('movies/' . $movie->id);
    }

    /**
     * Handle AJAX request of movie id search tools.
     *
     * @param $title
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMovie($title)
    {
        $data = json_decode(file_get_contents('http://cdn.asghia.com/index.php?query=' . $title));

        return response()->json($data);
    }
}
