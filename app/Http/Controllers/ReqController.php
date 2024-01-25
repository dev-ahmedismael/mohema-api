<?php

namespace App\Http\Controllers;

use App\Models\Req;
use Illuminate\Http\Request;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $project_id)
    {
        return Req::where('project_id', $project_id)->get();
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
        $from_fields = $request->validate([
            'project_id' => 'required',
            'from' => 'required',
            'from_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'to' => 'required',
            'to_id' => 'required',
            'status' => 'nullable',
        ]);

        if (empty($from_fields['status'])) {
            $from_fields['status'] = 'بانتظار الرد';
        }

        return Req::create($from_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(Req $req)
    {
        //
    }

    public function out_request(Request $request, string $user_id)
    {
        $project_id = $request->project_id;
        return Req::where('project_id', $project_id)->where('from_id', $user_id)->get();
    }
    public function in_request(Request $request, string $user_id)
    {
        $project_id = $request->project_id;
        return Req::where('project_id', $project_id)->where('to_id', $user_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Req $req, string $id)
    {
        $req = Req::find($id);
        $from_fields = $request->validate([
            'project_id' => 'required',
            'from' => 'required',
            'from_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'to' => 'required',
            'to_id' => 'required',
            'status' => 'nullable',
        ]);

        $req::where('id', $id)->update($from_fields);
        return $req;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req, string $id)
    {
        return Req::destroy($id);
    }
}
