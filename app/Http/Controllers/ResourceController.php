<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $project_id)
    {
        return Resource::where('project_id', $project_id)->get();
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
            'type' => 'nullable',
            'number' => 'nullable',
            'cost' => 'nullable',
            'description' => 'nullable',
        ]);
        return Resource::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    // Get project resources chart data
    public function resources_chart_data(string $project_id)
    {
        $resources = Resource::where('project_id', $project_id)->get();

        // Get years
        $years = [];
        foreach ($resources as $resource) {
            if (!in_array(substr($resource->created_at, 0, 4), $years)) {
                array_push($years, substr($resource->created_at, 0, 4));
            }
        }
        // return $years;
        // Get months
        $data = [];
        foreach ($years as $year) {
            $months = [];
            $costs = [];
            foreach ($resources as $resource) {
                if (substr($resource->created_at, 0, 4) === $year && !in_array(substr($resource->created_at, 5, 2), $months)) {
                    array_push($months, substr($resource->created_at, 5, 2));
                }
            }

            foreach ($months as $month) {
                $cost = 0;
                foreach ($resources as $resource) {
                    if (substr($resource->created_at, 0, 4) === $year && substr($resource->created_at, 5, 2) === $month) {
                        $cost += $resource->cost;
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
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource, string $id)
    {
        $resource = Resource::find($id);
        $form_fields = $request->validate([
            'project_id' => 'required',
            'title' => 'required',
            'type' => 'string',
            'number' => 'string',
            'cost' => 'string',
            'description' => 'string',
        ]);
        $resource->where('id', $id)->update($form_fields);
        return $resource;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource, string $id)
    {
        return Resource::destroy($id);
    }
}
