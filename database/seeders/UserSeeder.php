<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::whereName('default')->first();

        User::factory()->create([
            'email' => 'richard.vachula.rv@gmail.com',
            'name' => 'Richard Vachula',
            'password' => Hash::make('kakao')
        ])->roles()->attach($role);

        User::factory(5)->create()->each(function ($user) use ($role) {
            $user->roles()->attach($role);
        });
    }
}
