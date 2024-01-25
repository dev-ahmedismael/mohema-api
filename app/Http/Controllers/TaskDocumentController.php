<?php

namespace App\Http\Controllers;

use App\Models\TaskDocument;
use Illuminate\Http\Request;

class TaskDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskDocument::all();
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
            'task_document' => 'required',
            'title' => 'nullable'
        ]);
        if ($request->hasFile('task_document')) {
            $file_name = $request->file('task_document')->getClientOriginalName();
            $file = $request->file('task_document')->storeAs('tasks/' . $form_fields['task_id'] . '/documents', $file_name, ['disk' => 'images']);
            $form_fields['task_document'] = $file;
            $form_fields['title'] = $file_name;
        }

        return TaskDocument::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskDocument $taskDocument, string $id)
    {
        return TaskDocument::find($id);
    }

    public function show_task_documents(string $task_id)
    {
        return TaskDocument::where('project_id', $task_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskDocument $taskDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskDocument $taskDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskDocument $taskDocument, string $id)
    {
        return TaskDocument::destroy($id);
    }
}
