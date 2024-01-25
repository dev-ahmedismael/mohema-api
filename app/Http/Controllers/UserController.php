<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    public function company_users(string $company_id)
    {
        return User::where('company_id', $company_id)->get();
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
            'username' => 'required',
            'job' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);

        return User::create($form_fields);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        return User::where('email', $email)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $form_fields = $request->validate([
            'company_id' => 'string',
            'username' => 'string',
            'job' => 'string',
            'password' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'role' => 'string'
        ]);
        if (empty($form_fields['password'])) unset($form_fields['password']);
        else $form_fields['password'] = Hash::make($form_fields['password']);


        $user::where('id', $id)->update($form_fields);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return User::destroy($id);
    }

    public function get_user_tasks(string $user_id)
    {
        $user = User::find($user_id);
        return $user->task;
    }
}
