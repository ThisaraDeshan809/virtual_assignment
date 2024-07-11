<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TaskAssign;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::with('taskAssign.user')->get();
        return view('pages.task.index',compact('tasks'));
    }

    public function create() {
        $employees = User::all();
        return view('pages.task.create',compact('employees'));
    }

    public function store(TaskRequest $request) {
        $validatedData = $request->validated();

        try {
            $task = new Task();
            $task->title = $validatedData['title'];
            $task->description = $validatedData['description'];
            $task->status = $validatedData['status'];
            $task->save();

            $task_assign = new TaskAssign();
            $task_assign->user_id = $validatedData['assign'];
            $task_assign->task_id = $task->id;
            $task_assign->start_at = $validatedData['start_at'];
            $task_assign->finished_at = $validatedData['finished_at'];
            $task_assign->deadline_at = $validatedData['deadline_at'];
            $task_assign->remark = $validatedData['remark'];
            $task_assign->save();

            return redirect()->route('Tasks.index')->with('success', 'Task added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add task. ' . $e->getMessage());
        }
    }

    public function edit($id) {
        $task = Task::where('id',$id)->first();
        $employees = User::all();
        return view('pages.task.edit',compact('task','employees'));
    }

    public function update(TaskRequest $request,$id) {
        $validatedData = $request->validated();

        try {
            $task = Task::findOrFail($id);

            $task->title = $validatedData['title'];
            $task->description = $validatedData['description'];
            $task->status = $validatedData['status'];
            $task->save();

            $task_assign = TaskAssign::where('task_id', $task->id)->firstOrNew();
            $task_assign->user_id = $validatedData['assign'];
            $task_assign->start_at = $validatedData['start_at'];
            $task_assign->finished_at = $validatedData['finished_at'];
            $task_assign->deadline_at = $validatedData['deadline_at'];
            $task_assign->remark = $validatedData['remark'];
            $task_assign->save();

            return redirect()->route('Tasks.index')->with('success', 'Task updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update task. ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            $taskAssign = TaskAssign::where('task_id', $id)->first();
            if ($taskAssign) {
                $taskAssign->delete();
            }

            return redirect()->route('Tasks.index')->with('success', 'Task deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete task.');
        }
    }
}
