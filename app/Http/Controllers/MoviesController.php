<?php

namespace App\Http\Controllers;

use App\DevLog;
use App\Http\Requests;
use App\Http\Requests\MovieRequest;
use App\lib\ContentGenerator;
use App\Movie;
use Illuminate\Http\Request;

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
        if ($movie->save()) {
            $devlog = new DevLog();
            $devlog->addLog('New Movie Created', $request->user()->id, array($movie->title));
            $devlog->save();
        }
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
        return view('pages.movies.edit', compact('movie', 'page_title', 'page_description'));
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        if ($movie->update($request->all())) {
            $devlog = new DevLog();
            $devlog->addLog('Movie Updated', $request->user()->id, array($movie->title));
            $devlog->save();
        }
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

    public function postFilter(Request $request, Movie $movie)
    {
        foreach ($request->get('filters') as $filter) {
            $movie->filters()->attach($filter + 1);
        }
        if ($movie->save()) {
            $devlog = new DevLog();
            $devlog->addLog('New Filter Attached', $request->user()->id, array($movie->title));
            $devlog->save();

        }
        flash('New Filter Attached.');
        return redirect('movies/' . $movie->id);
    }
}
