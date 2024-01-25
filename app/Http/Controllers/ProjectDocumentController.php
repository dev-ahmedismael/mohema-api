<?php

namespace App\Http\Controllers;

use App\Models\ProjectDocument;
use Illuminate\Http\Request;

class ProjectDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectDocument::all();
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
            'project_document' => 'required',
            'title' => 'nullable'
        ]);
        if($request->hasFile('project_document')) {
            $file_name = $request->file('project_document')->getClientOriginalName();
            $file = $request->file('project_document')->storeAs('projects/'.$form_fields['project_id'].'/documents', $file_name, ['disk'=>'images']);
            $form_fields['project_document'] = $file;
            $form_fields['title'] = $file_name;
        }

        return ProjectDocument::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectDocument $projectDocuments, string $id)
    {
        return ProjectDocument::find($id);
    }

    public function show_project_documents(string $project_id){
        return ProjectDocument::where('project_id', $project_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectDocument $projectDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectDocument $projectDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectDocument $projectDocuments, string $id)
    {
        return ProjectDocument::destroy($id);
    }
}
