<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Merchant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Facades\App\Services\UserService;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
//        $users = User::orderBy('name')->get();
//        $users = User::paginate(5);
//        $users = User::withTrashed()->get();

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
//        $user = User::create($request->all() + [
//            'password' => Hash::make(Str::random(16))
//        ]);
//
//        $user->roles()->attach(Role::whereName('default')->first());

        UserService::create($request->all());

        return redirect()->route('users.index')->with('status', 'User created');
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->all());

        return redirect()->back()->with('status', 'User updated');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted');
    }
}
