<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Requests;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Show all agents.
     *
     * @return Response
     */
    public function index()
    {
        $agents = Agent::oldest('created_at')->get();
        return view('pages.agents.view', compact('agents'));
    }

    /**
     * Show a single agents
     *
     * @param integer $id
     * @return Response
     */
    public function show($id)
    {
        $agent = Agent::findOrFail($id);
        return view('pages.agents.show', compact('agent'));
    }

    /**
     * Show the page to create new agent.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.agents.new');
    }

    /**
     * Save a new Agent.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Agent::create($request->all());
        return redirect('agents');
    }
}
