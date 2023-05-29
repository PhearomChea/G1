<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(['Message' => 'Here is all the users!', 'User' => $user], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = User::create($validator->validated());
        return response()->json(['message' => 'Successfully created!', 'User' => $user], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $user = new UserResource($user);
        return response()->json(['Message' => 'Here is the user!', 'User' => $user], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password')
        ]);
        return response()->json(['Message' => 'user successfully updated!', 'User' => $user], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['Message' => 'user successfully deleted!'], 200);
    }
    
}
