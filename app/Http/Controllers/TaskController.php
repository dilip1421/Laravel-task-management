<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function task_create()
    {
        return view('task.create');
    }
    public function taskCreate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'tags' => 'required'
        ]);
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->priority = $request->input('priority');
        $task->tags = json_encode($request->input('tags'));
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect()->route('dashboard')->withSuccess('New Task is added successfully.');
    }
    public function task_edit($id)
    {
        $tasks = Task::find($id);
        $data = compact('tasks');
        return view('task.edit')->with($data);
    }
    public function taskEdit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'priority' => 'required',
            'tags' => 'required'
        ]);
        $id = $request->input('taskId');
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->priority = $request->input('priority');
        $task->tags = json_encode($request->input('tags'));
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect()->route('dashboard')->withSuccess('Task is updated successfully.');
    }
    public function taskDelete($id)
    {
        Task::find($id)->delete();
        return redirect()->route('dashboard')->withSuccess('Task is deleted successfully.');
    }
}
