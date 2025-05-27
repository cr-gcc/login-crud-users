<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        $users = User::all();
        return view('dashboard', ['data'=>$users]);
    }

    public function create() {
        return view('user.store');
    }

    public function edit(string $id){
        $id = (int)$id;
        $user = User::find($id);
        return view('user.update', ['data'=>$user]);
    }

    public function show(string $id){
        $id = (int)$id;
        $user = User::find($id);
        return view('user.show', ['data'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    
}
