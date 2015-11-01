<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class DevelopmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.dev.index');
    }


}
