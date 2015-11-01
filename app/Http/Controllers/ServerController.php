<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.server.view', compact('page_title'));
    }

    public function monitor()
    {

    }
}
