<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::all();
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
            'company_name' => 'required',
            'company_logo' => 'required',
        ]);
        if ($request->hasFile('company_logo')) {
             $file = $request->file('company_logo')->store('images/companies', 'images');
             $form_fields['company_logo'] = $file;
        }


        return Company::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company, string $id)
    {
        return Company::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
