<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Http\Requests;
use App\Http\Requests\AgentRequest;

/**
 * Class AgentsController
 * Handle control function of agent
 *
 * @package App\Http\Controllers
 */
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
     * @param AgentRequest $request
     * @return Response
     */
    public function store(AgentRequest $request)
    {
        Agent::create($request->all());
        return redirect('agents');
    }

    /**
     * Show the form page to edit existing agent.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $agent = Agent::findOrFail($id);
        return view('pages.agents.edit', compact('agent'));
    }

    /**
     * Update existing agent.
     *
     * @param $id
     * @param AgentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, AgentRequest $request)
    {
        $agent = Agent::findOrFail($id);
        $agent->update($request->all());
        return redirect('agents');
    }
}
