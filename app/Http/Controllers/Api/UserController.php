<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return response()->json($users);
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
