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
        $agents = Agent::oldest('created_at')->paginate(10);
        return view('pages.agents.view', compact('agents'));
    }

    /**
     * Show a single agents
     *
     * @param Agent $agent
     * @return Response
     */
    public function show(Agent $agent)
    {
        return view('pages.agents.show', compact('agent'));
    }

    /**
     * Show the page to create new agent.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.agents.create');
    }

    /**
     * Save a new Agent.
     *
     * @param AgentRequest $request
     * @return Response
     */
    public function store(AgentRequest $request)
    {
        $agent = new Agent($request->all());
        $agent->save();
        flash('New Agent have been created.');
        return redirect('agents');
    }

    /**
     * Show the form page to edit existing agent.
     *
     * @param Agent $agent
     * @return \Illuminate\View\View
     */
    public function edit(Agent $agent)
    {
        return view('pages.agents.edit', compact('agent'));
    }

    /**
     * Update existing agent.
     *
     * @param Agent $agent
     * @param AgentRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Agent $agent, AgentRequest $request)
    {
        $agent->update($request->all());
        flash('Agent have been updated.');
        return redirect('agents/' . $agent->id);
    }
}
