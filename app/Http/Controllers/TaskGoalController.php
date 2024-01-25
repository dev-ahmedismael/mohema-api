<?php

namespace App\Http\Controllers;

use App\Models\TaskGoal;
use Illuminate\Http\Request;

class TaskGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskGoal::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_fields = $request->validate([
            'task_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        return TaskGoal::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskGoal $taskGoal, string $id)
    {
        return TaskGoal::find($id);
    }

    public function show_task_goals(string $task_id)
    {
        return TaskGoal::where('task_id', $task_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskGoal $taskGoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskGoal $taskGoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskGoal $taskGoal, string $id)
    {
        return TaskGoal::destroy($id);
    }
}
