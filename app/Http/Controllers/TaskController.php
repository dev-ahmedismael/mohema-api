<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return task::all();
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
            'project_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'cost' => 'nullable',
            'start_date' => 'required',
            'expiry_date' => 'required',
            'completness' => 'required',
            'created_by' => 'required'
        ]);

        return task::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(task $task, string $id)
    {
        return task::find($id);
    }

    // Get project tasks
    public function show_project_tasks(string $project_id)
    {
        return task::where('project_id', $project_id)->get();
    }

    // Get project tasks dates for chart use

    public function tasks_chart_data(string $project_id)
    {
        $tasks = task::where('project_id', $project_id)->get();

        // Get years
        $years = [];
        foreach ($tasks as $task) {
            if (!in_array(substr($task->start_date, 0, 4), $years)) {
                array_push($years, substr($task->start_date, 0, 4));
            }
        }
        // return $years;
        // Get months
        $data = [];
        foreach ($years as $year) {
            $months = [];
            $costs = [];
            foreach ($tasks as $task) {
                if (substr($task->start_date, 0, 4) === $year && !in_array(substr($task->start_date, 5, 2), $months)) {
                    array_push($months, substr($task->start_date, 5, 2));
                }
            }

            foreach ($months as $month) {
                $cost = 0;
                foreach ($tasks as $task) {
                    if (substr($task->start_date, 0, 4) === $year && substr($task->start_date, 5, 2) === $month) {
                        $cost += $task->cost;
                    };
                }
                array_push($costs, $cost);
            }

            array_push($data, array("year" => $year, "months" => $months, "costs" => $costs));
        }

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, task $task, string $id)
    {
        $task = task::find($id);
        $form_fields = $request->validate([
            'project_id' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'cost' => 'nullable',
            'start_date' => 'nullable',
            'expiry_date' => 'nullable',
            'completness' => 'nullable',
            'created_by' => 'nullable'
        ]);

        $task::where('id', $id)->update($form_fields);
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task, string $id)
    {
        return task::destroy($id);
    }

    public function store_task_user(Request $request, string $task_id)
    {
        $task = task::find($task_id);
        $user_id = $request->user_id;
        $task->users()->attach($user_id);
        return response()->json(['message' => 'success']);
    }

    public function get_task_user(string $task_id)
    {
        $task = task::find($task_id);
        return $task->users;
    }
}
