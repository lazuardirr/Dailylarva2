<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MovieRequest;
use App\lib\ContentGenerator;
use App\Movie;

class MoviesController extends Controller
{
    /**
     * Show all movies
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $movies = Movie::oldest()->get();//all();
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

        flash('New Agent have been created.');

        return redirect('movies');
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
