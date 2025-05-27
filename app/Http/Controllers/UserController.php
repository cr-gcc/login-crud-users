<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\ProfileUpdateRequest;
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
        //var_dump($user);
        return view('user.update', ['user'=>$user]);
    }

    public function show(string $id){
        $id = (int)$id;
        $user = User::find($id);
        return view('user.show', ['user'=>$user]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect(route('dashboard', absolute: false));
    }

    public function update(Request $request, string $id){
        $id = (int)$id;
        $user = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($data['password'])) {
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        return redirect(route('dashboard', absolute: false));
    }

    public function destroy(Request $request){
        $id = (int)$request->id;
        User::destroy($id);
        return redirect(route('dashboard', absolute: false));
    }   
}
