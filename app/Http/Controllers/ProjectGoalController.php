<?php

namespace App\Http\Controllers;

use App\Models\ProjectGoal;
use Illuminate\Http\Request;

class ProjectGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectGoal::all();
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
            'project_id'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

        return ProjectGoal::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectGoal $projectGoal, string $id)
    {
        return ProjectGoal::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectGoal $projectGoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectGoal $projectGoal, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectGoal $projectGoal, string $id)
    {
        return ProjectGoal::destroy($id);

    }
}
