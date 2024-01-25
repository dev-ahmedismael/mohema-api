<?php

namespace App\Http\Controllers;

use App\Models\CompanyGoal;
use Illuminate\Http\Request;

class CompanyGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompanyGoal::all();
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
            'company_id'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

        return CompanyGoal::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CompanyGoal::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyGoal $companyGoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyGoal $companyGoal, string $id)
    {
        $company_goal = CompanyGoal::find($id);

        $form_fields = $request->validate([
            'company_id'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

        $company_goal::where('id', $id)->update($form_fields);
        return $company_goal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyGoal $companyGoal, string $id)
    {
        return CompanyGoal::destroy($id);
    }
}
