<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function create($data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create($data + [
                    'password' => Hash::make(Str::random(16))
                ]);

//            abort(500, 'Ooops');

            $user->roles()->attach(Role::whereName('default')->first());

            return $user;
        });
    }
}
