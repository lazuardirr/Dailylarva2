<?php

namespace App\Http\Controllers;

use App\Agent;
use App\DevLog;
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

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        flash('New Agent have been created.');
        if($agent->save())
        {
            $devlog = new DevLog();
            $devlog->addLog('New Agent Created', $request->user()->id, array($agent->email));
            $devlog->save();
        }
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
        if($agent->update($request->all()))
        {
            $devlog = new DevLog();
            $devlog->addLog('Agent Updated', $request->user()->id, array($agent->email));
            $devlog->save();
        }
        flash('Agent have been updated.');
        return redirect('agents/' . $agent->id);
    }
}
