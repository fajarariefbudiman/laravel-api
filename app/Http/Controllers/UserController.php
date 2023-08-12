<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDetailResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        // return response()->json(User::all());
        return UserResource::collection($user);
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
        //
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $users = new User();
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        
        $users->save();
        return response()->json($users,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        // return response()->json($users);
        return new UserDetailResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $username)
    {
        //
        $user = User::find($username);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
        return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if ($user) {
            # code...
            $user->delete();
            return response()->json(["message" => "User Deleted Successful"],204);
        } else {
            # code...
            return response()->json(["message" => "User Not Found"],404);
        }

    }
}
