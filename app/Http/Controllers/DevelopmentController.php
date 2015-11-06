<?php

namespace App\Http\Controllers;

use App\DevIssue;
use App\DevLog;
use App\Http\Requests;
use App\Http\Requests\IssueRequest;
use App\Http\Requests\TaskRequest;
use App\SubTask;
use App\Task;

class DevelopmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::get();
        return view('pages.dev.index', compact('tasks'));
    }

    public function progress()
    {
        $tasks = Task::get();
        $issuesData = DevIssue::get();
        $subTasksData = SubTask::get();
        $issues['total'] = $issuesData->count();
        $issues['regress'] = $issuesData->count() > 0 ? round($issuesData->count() / ($subTasksData->count() + $issuesData->count()) * 100, 2) : 0;
        $subTasks['total'] = $subTasksData->count();
        $subTasks['progress'] = $subTasksData->count() > 0 ? round($subTasksData->where('progress', 1)->count() / ($subTasksData->count() + $issuesData->count()) * 100, 2) : 0;
        return view('pages.dev.index', compact('tasks', 'subTasks', 'issues'));
    }

    public function getTask()
    {
        $tasks = Task::get();
        return view('pages.dev.tasks', compact('tasks'));
    }

    public function postTask(TaskRequest $request)
    {
        $subTasksData = $request->get('subTask');
        $taskData = $request->except('subTask');
        $logcontent = [];

        $task = new Task($taskData);
        $task->save();
        array_push($logcontent, $task->task);

        foreach($subTasksData as $val)
        {
            $subTask = new SubTask();
            $subTask->task_id = $task->id;
            $subTask->sub_task = $val;
            $subTask->progress = 0;
            $subTask->save();
            array_push($logcontent, $subTask->sub_task);
        }

        $dev = new DevLog();
        $dev->addLog('New Task Added', $request->user()->id, $logcontent);
        $dev->save();

        return redirect('dev/progress');
    }

    public function showTask(Task $task)
    {
        return view('pages.dev.showTask', compact('task'));
    }

    public function taskProgress(Task $task, TaskRequest $request)
    {
        $logcontent = [];
        foreach($request->get('subtask') as $subtask_id => $progress)
        {
            $subtask = $task->subTask()->find($subtask_id);
            $subtask->progress = 1;
            $subtask->update();
            array_push($logcontent, '<i class="fa fa-check"></i>' . $subtask->sub_task);
        }

        $log = new DevLog();
        $log->addLog('Task Completed', $request->user()->id, $logcontent);
        $log->save();
        return redirect('dev/progress');
    }

    public function getIssue()
    {
        return view('pages.dev.getissue');
    }

    public function postIssue(IssueRequest $request)
    {
        $issue = new DevIssue($request->all());
        if ($issue->save()) {
            $devlog = new DevLog();
            $devlog->addLog(
                'New Issue Added',
                $request->user()->id,
                $issue->detail)
                ->save();
        }

        return redirect('dev/progress');
    }

    public function getFixIssue(DevIssue $issue)
    {
        return view('pages.dev.getfixissue', compact('issue'));
    }

}
