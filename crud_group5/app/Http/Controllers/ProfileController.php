<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
        *-------------------
        * PAUL MANGADAP
        *------------------
     */
    public function index()
    {
      $profiles = Profile::all();

        return response()->json($profiles, 200);
    }


    /**
     * Store a newly created resource in storage.
        *-------------------
        * JANEL VALDEZ
        *------------------
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'    => 'required|string|max:50',
            'middle_name'   => 'nullable|string|max:50',
            'last_name'     => 'required|string|max:50',
            'age'           => 'required|integer|min:0',
            'date_of_birth' => 'required|date',
            'address'       => 'required|string',
            'email'         => 'required|email|unique:personal_info,email',
            'phone_number'  => 'required|string|max:20',
        ]);

        $profile = Profile::create($validated);

        return response()->json([
            'message' => 'Profile created successfully!',
            'profile' => $profile
        ], 201);
    }


    /**
     * Display the specified resource.
        *-------------------
        * PAUL MANGADAP
        *------------------
     */
    public function show(string $id)
    {
        
    $profile = Profile::findOrFail($id);

        return response()->json($profile, 200);
    }


    /**
     * Update the specified resource in storage.
        *-------------------
        * DANIEL DULATRE
        *------------------
     */
    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
        *-------------------
        * DONNAJANE CHAVEZ
        *------------------
     */
    public function destroy(string $id)
    {
        //
    }
}
