<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function validateCredentials(string $email, string $password): User|null
    {
       $user = User::where('email', $email)->first();

       if (!$user) return null;

       if (!Hash::check($password, $user->password)) return null;

       Auth::attempt(compact('email', 'password'));

       return $user;
    }

}
