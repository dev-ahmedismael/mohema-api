<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Project::all();
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
            'company_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'logo' => 'nullable',
            'start_date' => 'required',
            'expiry_date' => 'required',
            'completness' => 'required',
            'created_by' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo')->store('images/companies', 'images');
            $form_fields['logo'] = $file;
        }

        return Project::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, string $id)
    {
        return Project::find($id);
    }

    // Get company project
    public function show_company_projects(string $company_id)
    {
        return Project::where('company_id', $company_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, string $id)
    {
        $project = Project::find($id);
        $form_fields = $request->validate([
            'company_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'logo' => 'nullable',
            'start_date' => 'nullable',
            'expiry_date' => 'nullable',
            'completness' => 'nullable',
            'created_by' => 'nullable'
        ]);

        $project::where('id', $id)->update($form_fields);
        return $project;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, string $id)
    {
        return Project::destroy($id);
    }

    public function store_project(Request $request, string $project_id)
    {
        $project = Project::find($project_id);
        $user_id = $request->user_id;
        $project->users()->attach($user_id);
        return response()->json(['message' => 'success']);
    }

    public function get_project_user(string $project_id)
    {
        $project = Project::find($project_id);
        return $project->users;
    }
}
